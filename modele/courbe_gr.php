<?php
$gr_date_debut=$_POST['gr_datedebut_y'].'-'.$_POST['gr_datedebut_m'].'-'.$_POST['gr_datedebut_d'];
$gr_date_fin=$_POST['gr_datefin_y'].'-'.$_POST['gr_datefin_m'].'-'.$_POST['gr_datefin_d'];

include ("../jpgraph/jpgraph/src/jpgraph.php");

include ("../jpgraph/jpgraph/src/jpgraph_bar.php");

$tableauElement = array();

$tableauNb = array();

// Requête

try 
{
$bdd=new PDO ('mysql:host=localhost;dbname=llaboratoire','root','vouzanou')  or die(print_r($bdd->errorInfo()));

}

catch (Exception $e)
{
	
	die ('Erreur:'.$e->getMessage());

}


$req=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,gr.gr_numero gr_numero,
gr.gr_bilan bilan,gr.gr_service service,
ps.ps_nom prescripteur,gr.gr_proteine,gr.gr_test,gr.gr_daterendue,gr.gr_glucose,gr.gr_leucocyte,gr.gr_hematie,sv.sv_libelle service_libelle,th.th_libelle technique_libelle,
gr.gr_dateprelevement dateprelevement,gr.gr_daterendue date_rendue
 FROM patient p
 INNER JOIN grossesse gr on p.pa_numero=gr.gr_dossier
 INNER JOIN projet pr ON p.pr_numero=pr.pr_numero 
 INNER JOIN service sv ON sv.sv_numero=gr.gr_service
 INNER JOIN prescripteur ps ON ps.ps_numero=gr.gr_prescripteur
 LEFT JOIN  technique th ON th.th_numero=gr.gr_technique
 WHERE gr_dateprelevement BETWEEN :gr_dateprelevement_debut AND :gr_dateprelevement_fin AND p.pa_dossier=:dossier');
 $req->execute(array('gr_dateprelevement_debut'=>$gr_date_debut,
 'gr_dateprelevement_fin'=>$gr_date_fin,
 'dossier'=>$_POST['search_gr']))
 or die(print_r($req->errorInfo()));

// Fetch sur chaque enregistrement

while ($reponse=$req->fetch()) {

   //Alimentation des tableaux de données

   $tableauElement[]=$reponse['cd8'];

  $tableauNb[]=$reponse['nl_dateprelevment'];


}


// *******************

// Création du graphique

// *******************

// Construction du conteneur

// Spécification largeur et hauteur

$graph = new Graph(900,500);

// Réprésentation linéaire

$graph->SetScale("textlin");

// Fixer les marges

$graph->img->SetMargin(40,30,50,120);

// Création du graphique histogramme

$bplot = new BarPlot($tableauElement);

// Ajouter les barres au conteneur

$graph->Add($bplot);

// Spécification des couleurs des barres

$bplot->SetFillColor(array('#5EB6DD'));

// Afficher les valeurs pour chaque barre

$bplot->value->Show();

// Modifier le rendu de chaque valeur

$bplot->value->SetFormat('%d');

// Le titre

$graph->title->Set("Inventaire Télédistribution");

$graph->title->SetFont(FF_ARIAL,FS_BOLD);

// Taille réduite pour l'axe horizontal(axe x) et vertical (axe y) et mise à 45° des labels

$graph->xaxis->SetTickLabels($tableauNb);

$graph->xaxis->SetLabelAngle(45);

$graph->xaxis->SetFont(FF_ARIAL,FS_BOLD,6);

$graph->yaxis->SetFont(FF_ARIAL,FS_BOLD,6);

// Afficher le graphique

$graph->Stroke();

?>
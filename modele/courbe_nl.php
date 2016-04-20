<?php
$nl_date_debut=$_POST['nl_datedebut_y'].'-'.$_POST['nl_datedebut_m'].'-'.$_POST['nl_datedebut_d'];
$nl_date_fin=$_POST['nl_datefin_y'].'-'.$_POST['nl_datefin_m'].'-'.$_POST['nl_datefin_d'];
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

$req=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,
nl.nl_numero nl_numero,nl.nl_bilan bilan,nl.nl_service service,
nl.nl_prescripteur prescripteur,nl.nl_technique technique,nl.nl_unite unite,nl.nl_conclusion conclusion,nl.nl_remarque,sv.sv_libelle service_libelle,
ps.ps_nom prescripteur,th.th_libelle technique_libelle,nl.nl_norme norme,nl.nl_cd4 cd4,nl.nl_cd8 cd8,nl.nl_cd3 cd3,nl.nl_rapport rapport,
nl.nl_dateprelevement nl_dateprelevment,nl.nl_daterendue nl_daterendue
 FROM patient p 
 INNER JOIN numerationlcd3cd4cd8 nl on p.pa_numero=nl.nl_dossier
 INNER JOIN projet pr ON p.pr_numero=pr.pr_numero 
 INNER JOIN service sv ON sv.sv_numero=nl.nl_service
 INNER JOIN prescripteur ps ON ps.ps_numero=nl.nl_prescripteur
 LEFT JOIN  technique th ON th.th_numero=nl.nl_technique
 WHERE nl_dateprelevement BETWEEN :nl_dateprelevement_debut AND :nl_dateprelevement_fin AND p.pa_dossier=:dossier');
 $req->execute(array('nl_dateprelevement_debut'=>$nl_date_debut,
 'nl_dateprelevement_fin'=>$nl_date_fin,
 'dossier'=>$_POST['search_num']))
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
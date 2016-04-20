<?php
$sr_dateprelevement_debut=$_POST['sr_datedebut_y'].'-'.$_POST['sr_datedebut_m'].'-'.$_POST['sr_datedebut_d'];
$sr_date_fin=$_POST['sr_datefin_y'].'-'.$_POST['sr_datefin_m'].'-'.$_POST['sr_datefin_d'];
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
sr.sr_numero sr_numero,sr.sr_service service,pr.pr_libelle libelle_projet,
sr.sr_prescripteur prescripteur,sr.sr_technique technique,sr.sr_conclusion conclusion,sv.sv_libelle service_libelle,sr.sr_hiv12 hiv12,sr.sr_bispot bispot,sr.sr_profil profil,
ps.ps_nom prescripteur,th.th_libelle technique_libelle,sr_dateprelevement
 FROM patient p 
 INNER JOIN serologie sr ON p.pa_numero=sr.sr_dossier
 INNER JOIN projet pr ON p.pr_numero=pr.pr_numero 
 INNER JOIN service sv ON sv.sv_numero=sr.sr_service
 INNER JOIN prescripteur ps ON ps.ps_numero=sr.sr_prescripteur
 LEFT JOIN  technique th ON th.th_numero=sr.sr_technique WHERE sr_dateprelevement BETWEEN :sr_dateprelevement_debut AND :sr_dateprelevement_fin AND p.pa_dossier=:sr_dossier');
 $req->execute(array('sr_dateprelevement_debut'=>$sr_dateprelevement_debut,
 'sr_dateprelevement_fin'=>$sr_date_fin,
 'sr_dossier'=>$_POST['search_sero']));

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
<?php
$cv_date_debut=$_POST['cv_datedebut_y'].'-'.$_POST['cv_datedebut_m'].'-'.$_POST['cv_datedebut_d'];
$cv_date_fin=$_POST['cv_datefin_y'].'-'.$_POST['cv_datefin_m'].'-'.$_POST['cv_datefin_d'];
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

$req=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,cv.cv_numero cv_numero,cv.cv_bilan bilan,
cv.cv_service service,
cv.cv_prescripteur prescripteur,cv.cv_technique technique,cv.cv_unite unite,cv.cv_chargevirale chargevirale,cv.cv_conclusion conclusion,cv.cv_commentaire remarque,sv.sv_libelle service_libelle,ps.ps_nom prescripteur,
th.th_libelle technique_libelle,
cv.cv_dateprelevement cv_dateprelevement,
cv.cv_daterendue cv_daterendue
 FROM patient p 
 INNER JOIN chargevirale cv on p.pa_numero=cv.cv_dossier
 LEFT JOIN projet pr ON p.pr_numero=pr.pr_numero 
 LEFT JOIN service sv ON sv.sv_numero=cv.cv_service
 LEFT JOIN prescripteur ps ON ps.ps_numero=cv.cv_prescripteur
 LEFT JOIN  technique th ON th.th_numero=cv.cv_technique
 WHERE cv.cv_dateprelevement BETWEEN :cv_dateprelevement_debut AND :cv_dateprelevement_fin AND p.pa_dossier=:dossier');
 $req->execute(array('cv_dateprelevement_debut'=>$cv_date_debut,
 'cv_dateprelevement_fin'=>$cv_date_fin,
 'dossier'=>$_POST['search_cv']))
 or die(print_r($req->errorInfo()));

// Fetch sur chaque enregistrement

while ($reponse=$req->fetch()) {

   //Alimentation des tableaux de données

   $tableauElement[]=$reponse['chargevirale'];

  $tableauNb[]=$reponse['cv_dateprelevement'];


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
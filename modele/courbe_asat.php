<?php
$bi_date_debut=$_POST['bi_datedebut_y'].'-'.$_POST['bi_datedebut_m'].'-'.$_POST['bi_datedebut_d'];
$bi_date_fin=$_POST['bi_datefin_y'].'-'.$_POST['bi_datefin_m'].'-'.$_POST['bi_datefin_d'];
include ("../jpgraph/jpgraph/src/jpgraph.php");

include ("../jpgraph/jpgraph/src/jpgraph_bar.php");

$tableauElement = array();

$tableauNb = array();
$tableauCreat=array ();

// Requête

try 
{
$bdd=new PDO ('mysql:host=localhost;dbname=llaboratoire','root','vouzanou')  or die(print_r($bdd->errorInfo()));

}

catch (Exception $e)
{
	
	die ('Erreur:'.$e->getMessage());

}

$req=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,bi.bi_dossier dossier,
bi.bi_bilan bilan,bi.bi_service service,bi.bi_prescripteur prescripteur,bi.bi_PAL PAL,bi.bi_BID BID,bi.bi_B1T B1T,bi.bi_CHO CHO,bi.bi_Fe Fe,bi.bi_Gly Gly,bi.bi_HDL HDL,bi.bi_LDL LDL,bi.bi_PRO PRO,bi.bi_PHO PHO,
bi.bi_PRU PRU,bi.bi_Tri Tri,bi.bi_CO2 CO2,bi.bi_NO3 NO3,bi.bi_ACB ACB,bi.bi_AU AU,bi.bi_CRE CRE,
bi.bi_CREAT CREAT,bi.bi_FRY FRY,bi.bi_Lactate Lactate,bi.bi_URE URE,bi.bi_GOTASAT GOTASAT,bi.bi_GPTALAT GPTALAT,bi.bi_ANY ANY,bi.bi_CPK CPK,bi.bi_GGT GGT,bi.bi_LDH LDH,bi.bi_Lipase Lipase,
bi.bi_CA CA,bi.bi_CL CL,bi.bi_MG MG,bi.bi_K K,bi.bi_NA NA,bi.bi_technique technique,
sv.sv_libelle service_libelle,ps.ps_nom prescripteur,th.th_libelle technique_libelle,
bi.bi_dateprelevement bi_dateprelevement,
bi.bi_daterendue bi_daterendue,
pr.pr_libelle libelle_projet
 FROM patient p 
 INNER JOIN biochimie bi on p.pa_numero=bi.bi_dossier
 INNER JOIN projet pr ON p.pr_numero=pr.pr_numero 
 INNER JOIN service sv ON sv.sv_numero=bi.bi_service
 LEFT JOIN prescripteur ps ON ps.ps_numero=bi.bi_prescripteur
 LEFT JOIN  technique th ON th.th_numero=bi.bi_technique
 WHERE bi_dateprelevement BETWEEN :bi_dateprelevement_debut AND :bi_dateprelevement_fin AND p.pa_dossier=:dossier');
 $req->execute(array('bi_dateprelevement_debut'=>$bi_date_debut,
 'bi_dateprelevement_fin'=>$bi_date_fin,
 'dossier'=>$_POST['search']))
 or die(print_r($req->errorInfo()));

// Fetch sur chaque enregistrement

while ($reponse=$req->fetch()) {

   //Alimentation des tableaux de données

   $tableauElement[]=$reponse['GOTASAT'];

  $tableauNb[]=$reponse['bi_dateprelevement'];
  
  

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

// Construction du conteneur
// Construction secong graph Creat

// Spécification largeur et hauteur

$graph = new Graph(900,500);

// Réprésentation linéaire

$graph->SetScale("textlin");

// Fixer les marges

$graph->img->SetMargin(40,30,50,120);

// Création du graphique histogramme

$bplot = new BarPlot($tableauCreat);

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
<?php // content="text/plain; charset=utf-8"
$datay1=array();
try 
{
$bdd=new PDO ('mysql:host=localhost;dbname=llaboratoire','root','vouzanou')  or die(print_r($bdd->errorInfo()));

}

catch (Exception $e)
{
	
	die ('Erreur:'.$e->getMessage());

}
$reponse=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,
nl.nl_numero nl_numero,nl.nl_bilan bilan,nl.nl_service service,
nl.nl_prescripteur prescripteur,nl.nl_technique technique,nl.nl_unite unite,nl.nl_conclusion conclusion,nl.nl_remarque remarque,sv.sv_libelle service_libelle,
ps.ps_nom prescripteur,th.th_libelle technique_libelle,nl.nl_unite unite,nl.nl_norme norme,nl.nl_cd4 cd4,nl.nl_cd8 cd8,nl.nl_cd3 cd3,nl.nl_rapport rapport,
DAY(nl.nl_dateprelevement) AS jour_pre,MONTH(nl.nl_dateprelevement) AS mois_pre,YEAR(nl.nl_dateprelevement) AS annees_pre,
DAY(nl.nl_daterendue) AS jour_ren,MONTH(nl.nl_daterendue) AS mois_ren,YEAR(nl.nl_daterendue) AS annees_ren,pr_libelle libelle_projet
 FROM patient p 
 INNER JOIN numerationlcd3cd4cd8 nl on p.pa_numero=nl.nl_dossier
 INNER JOIN projet pr ON p.pr_numero=pr.pr_numero 
 INNER JOIN service sv ON sv.sv_numero=nl.nl_service
 INNER JOIN prescripteur ps ON ps.ps_numero=nl.nl_prescripteur
 LEFT JOIN  technique th ON th.th_numero=nl.nl_technique
 WHERE nl_numero=:nl_numero');
 $reponse->execute(array('nl_numero'=>$_POST['nl_numero'])) or die(print_r($reponse->errorInfo()));
 
 $donnees=$reponse->fetch()<?php

include ("../jpgraph/jpgraph.php");

include ("../jpgraph/jpgraph_bar.php");

$tableauElement = array();

$tableauNb = array();

// Requête

require_once('../connexionbdd.php');

$req=mysql_query("SELECT id, type_ensemble AS ENSEMBLE, nombre AS NBRE_ELEMENT, element AS ELEMENT

                  FROM inventaire WHERE type_ensemble='Teledistribution'

                  GROUP BY element ORDER BY NBRE_ELEMENT DESC");

// Fetch sur chaque enregistrement

while ($row= mysql_fetch_array($req)) {

   // Alimentation des tableaux de données

   $tableauElement[] = $row['ELEMENT'];

   $tableauNb[] = $row['NBRE_ELEMENT'];

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

$bplot = new BarPlot($tableauNb);

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

$graph->xaxis->SetTickLabels($tableauElement);

$graph->xaxis->SetLabelAngle(45);

$graph->xaxis->SetFont(FF_ARIAL,FS_BOLD,6);

$graph->yaxis->SetFont(FF_ARIAL,FS_BOLD,6);

// Afficher le graphique

$graph->Stroke();

?>;
	 $donnees['nl.nl_cd4']=$datay1;
 
  $reponse->closeCursor();
 
require_once ('jpgraph/jpgraph/src/jpgraph.php');
require_once ('jpgraph/jpgraph/src/jpgraph_line.php');



// Setup the graph
$graph = new Graph(300,250);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Filled Y-grid');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Line 1');


$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>


 
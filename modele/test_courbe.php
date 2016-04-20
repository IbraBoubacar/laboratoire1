
<?php

$gr_date_debut=$_POST['gr_datedebut_y'].'-'.$_POST['gr_datedebut_m'].'-'.$_POST['gr_datedebut_d'];
$gr_date_fin=$_POST['gr_datefin_y'].'-'.$_POST['gr_datefin_m'].'-'.$_POST['gr_datefin_d'];
include ('connexion.php');
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

 


  
$req->setFetchMode(PDO::FETCH_ASSOC);
while($donnees = $req->fetch());
{
$donnees['age']	=array();
	$donnees['gr_dateprelevemnt']=$date();
}
    
$req->closeCursor();


require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');



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
$graph->xaxis->SetTickLabels($date());
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot(array());
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Line 1');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Line 2');

// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#FF1493");
$p3->SetLegend('Line 3');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>
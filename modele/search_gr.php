<?php
ob_start();
$gr_date_debut=$_POST['gr_datedebut_y'].'-'.$_POST['gr_datedebut_m'].'-'.$_POST['gr_datedebut_d'];
$gr_date_fin=$_POST['gr_datefin_y'].'-'.$_POST['gr_datefin_m'].'-'.$_POST['gr_datefin_d'];
include ('connexion.php');
$req=$bdd->prepare('SELECT p.pa_dossier dossier,pr.pr_libelle projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,
gr.gr_bilan bilan,
ps.ps_nom prescripteur,gr.gr_proteine,gr.gr_test,gr.gr_glucose,gr.gr_leucocyte,gr.gr_hematie,sv.sv_libelle service_libelle,th.th_libelle technique_libelle,
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
$handle = fopen('php://output', 'w');
 
//On insère les titres
fputcsv($handle, array('dossier','projet','laboratoire','nom','prenom','sexe','age','bilan',
'prescripteur','gr_proteine','gr_test','gr_glucose','gr_leucocyte','gr_hematie','service_libelle','technique',
'date_prelevement','date_rendue'
), ';');
  
$req->setFetchMode(PDO::FETCH_ASSOC);
while($donnees = $req->fetch()) {
    fputcsv($handle, $donnees, ';');
}
$req->closeCursor();
fclose($handle);
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=grossesse_p.csv');
ob_flush();
?>
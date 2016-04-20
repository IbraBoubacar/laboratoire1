<?php
ob_start();
$sr_dateprelevement_debut=$_POST['sr_datedebut_y'].'-'.$_POST['sr_datedebut_m'].'-'.$_POST['sr_datedebut_d'];
$sr_date_fin=$_POST['sr_datefin_y'].'-'.$_POST['sr_datefin_m'].'-'.$_POST['sr_datefin_d'];
include ('connexion.php');
$req=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,
pr.pr_libelle libelle_projet,sr.sr_technique technique,sr.sr_conclusion conclusion,sv.sv_libelle service_libelle,sr.sr_hiv12 hiv12,sr.sr_bispot bispot,sr.sr_profil profil,
ps.ps_nom prescripteur,sr_dateprelevement
 FROM patient p 
 INNER JOIN serologie sr ON p.pa_numero=sr.sr_dossier
 INNER JOIN projet pr ON p.pr_numero=pr.pr_numero 
 INNER JOIN service sv ON sv.sv_numero=sr.sr_service
 INNER JOIN prescripteur ps ON ps.ps_numero=sr.sr_prescripteur
 LEFT JOIN  technique th ON th.th_numero=sr.sr_technique WHERE sr_dateprelevement BETWEEN :sr_dateprelevement_debut AND :sr_dateprelevement_fin AND p.pa_dossier=:sr_dossier');
 $req->execute(array('sr_dateprelevement_debut'=>$sr_dateprelevement_debut,
 'sr_dateprelevement_fin'=>$sr_date_fin,
 'sr_dossier'=>$_POST['search_sero']));
$handle = fopen('php://output', 'w');
//On insère les titres
fputcsv($handle, array('dossier','pa_laboratoire','nom','prenom','sexe','age',
'libelle_projet','technique','conclusion','service_libelle','Determine','bispot','profil','prescripteur','date_prelevement'), ';');
$req->setFetchMode(PDO::FETCH_ASSOC);
while($donnees = $req->fetch()) 
{
fputcsv($handle, $donnees, ';');
}
$req->closeCursor();
fclose($handle);
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=serologie_p.csv');
ob_flush();
?>
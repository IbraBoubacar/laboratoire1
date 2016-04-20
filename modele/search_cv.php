<?php
ob_start();
$cv_date_debut=$_POST['cv_datedebut_y'].'-'.$_POST['cv_datedebut_m'].'-'.$_POST['cv_datedebut_d'];
$cv_date_fin=$_POST['cv_datefin_y'].'-'.$_POST['cv_datefin_m'].'-'.$_POST['cv_datefin_d'];
include ('connexion.php');
$req=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_laboratoire laboratoire,pr.pr_libelle projet,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,cv.cv_numero cv_numero,cv.cv_bilan bilan,
cv.cv_unite unite,cv.cv_chargevirale chargevirale,cv.cv_conclusion conclusion,cv.cv_commentaire remarque,sv.sv_libelle service_libelle,ps.ps_nom prescripteur,
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
$handle = fopen('php://output', 'w');
 
//On insère les titres
fputcsv($handle, array('dossier','pa_laboratoire','projet','nom','prenom','sexe','age','cv_numero','bilan','unite','chargevirale','conclusion','remarque','service_libelle',
'prescripteur','technique','dateprelevement','date_rendue'
), ';');
  
$req->setFetchMode(PDO::FETCH_ASSOC);
while($donnees = $req->fetch()) {
    fputcsv($handle, $donnees, ';');
}
$req->closeCursor();
fclose($handle);
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=chargevirale_p.csv');
ob_flush();
?>
<?php
ob_start();
$nl_date_debut=$_POST['nl_datedebut_y'].'-'.$_POST['nl_datedebut_m'].'-'.$_POST['nl_datedebut_d'];
$nl_date_fin=$_POST['nl_datefin_y'].'-'.$_POST['nl_datefin_m'].'-'.$_POST['nl_datefin_d'];
include ('connexion.php');
$req=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,
nl.nl_bilan bilan,nl.nl_service service,
ps.ps_nom prescripteur,nl.nl_unite unite,nl.nl_conclusion conclusion,nl.nl_remarque,sv.sv_libelle service_libelle,
th.th_libelle technique_libelle,nl.nl_norme norme,nl.nl_cd4 cd4,nl.nl_cd8 cd8,nl.nl_cd3 cd3,nl.nl_rapport rapport,
nl.nl_dateprelevement nl_dateprelevment,nl.nl_daterendue nl_daterendue
 FROM patient p 
INNER JOIN numerationlcd3cd4cd8 nl on p.pa_numero=nl.nl_dossier
 LEFT JOIN projet pr ON p.pr_numero=pr.pr_numero 
 LEFT JOIN service sv ON sv.sv_numero=nl.nl_service
 LEFT JOIN prescripteur ps ON ps.ps_numero=nl.nl_prescripteur
 LEFT JOIN  technique th ON th.th_numero=nl.nl_technique
 WHERE nl_dateprelevement BETWEEN :nl_dateprelevement_debut AND :nl_dateprelevement_fin AND p.pa_dossier=:dossier');
 $req->execute(array('nl_dateprelevement_debut'=>$nl_date_debut,
 'nl_dateprelevement_fin'=>$nl_date_fin,
 'dossier'=>$_POST['search_num']))
 or die(print_r($req->errorInfo()));
$handle = fopen('php://output', 'w');
//On insère les titres
fputcsv($handle, array('dossier','pa_laboratoire','nom','prenom','sexe','age','bilan','service','prescripteur','unite','conclusion','remarque',
'service','technique','norme','cd4','cd8','cd3','rapport','dateprelevment','date_rendue'), ';');
$req->setFetchMode(PDO::FETCH_ASSOC);
while($donnees = $req->fetch()) {
    fputcsv($handle, $donnees, ';');
}
$req->closeCursor();
fclose($handle);
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=numeration_p.csv');
ob_flush();
?>
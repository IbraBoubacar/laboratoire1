<?php
ob_start();
$bi_date_debut=$_POST['bi_datedebut_y'].'-'.$_POST['bi_datedebut_m'].'-'.$_POST['bi_datedebut_d'];
$bi_date_fin=$_POST['bi_datefin_y'].'-'.$_POST['bi_datefin_m'].'-'.$_POST['bi_datefin_d'];
include ('connexion.php');
$req=$bdd->prepare('SELECT p.pa_dossier dossier,pr.pr_libelle projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,
bi.bi_bilan bilan,bi.bi_PAL PAL,bi.bi_BID BID,bi.bi_B1T B1T,bi.bi_CHO CHO,bi.bi_Fe Fe,bi.bi_Gly Gly,bi.bi_HDL HDL,bi.bi_LDL LDL,bi.bi_PRO PRO,bi.bi_PHO PHO,
bi.bi_PRU PRU,bi.bi_Tri Tri,bi.bi_CO2 CO2,bi.bi_NO3 NO3,bi.bi_ACB ACB,bi.bi_AU AU,bi.bi_CRE CRE,
bi.bi_CREAT CREAT,bi.bi_FRY FRY,bi.bi_Lactate Lactate,bi.bi_URE URE,bi.bi_GOTASAT GOTASAT,bi.bi_GPTALAT GPTALAT,bi.bi_ANY ANY,bi.bi_CPK CPK,bi.bi_GGT GGT,bi.bi_LDH LDH,bi.bi_Lipase Lipase,
bi.bi_CA CA,bi.bi_CL CL,bi.bi_MG MG,bi.bi_K K,bi.bi_NA NA,
sv.sv_libelle service_libelle,ps.ps_nom prescripteur,bi.bi_technique,
bi.bi_dateprelevement bi_dateprelevement,
bi.bi_daterendue bi_daterendue
 FROM patient p 
 INNER  JOIN biochimie bi on p.pa_numero=bi.bi_dossier
 LEFT JOIN projet pr ON p.pr_numero=pr.pr_numero 
 LEFT JOIN service sv ON sv.sv_numero=bi.bi_service
 LEFT JOIN prescripteur ps ON ps.ps_numero=bi.bi_prescripteur
 LEFT JOIN  technique th ON th.th_numero=bi.bi_technique
 WHERE bi_dateprelevement BETWEEN :bi_dateprelevement_debut AND :bi_dateprelevement_fin AND p.pa_dossier=:dossier');
 $req->execute(array('bi_dateprelevement_debut'=>$bi_date_debut,
 'bi_dateprelevement_fin'=>$bi_date_fin,
 'dossier'=>$_POST['search']))
 or die(print_r($req->errorInfo()));
$handle=fopen('php://output', 'w');
//On insère les titres
fputcsv($handle,array('dossier','projet','pa_laboratoire','nom','prenom','sexe','age','bilan','PAL','BID','B1T','CHO','Fe','Gly','HDL','LDL','PRO','PHO',
'PRU','Tri','CO2','NO3','ACB','AU','CRE',
'CREAT','FRY','Lactate','URE','GOTASAT','GPTALAT','ANY','CPK','GGT','LDH','Lipase',
'CA','CL','MG','K','NA',
'service_libelle','prescripteur','technique_libelle',
'bi_dateprelevement',
'bi_daterendue'
), ';');
$req->setFetchMode(PDO::FETCH_ASSOC);
while($donnees = $req->fetch()) {
    fputcsv($handle,$donnees,';');
}
$req->closeCursor();
fclose($handle);
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=biochimie_p.csv');
ob_flush();
?>

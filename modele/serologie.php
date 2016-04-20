<?php
session_start();
$sr_dateprelevement=$_POST['dateprelevement_y'].'-'.$_POST['dateprelevement_m'].'-'.$_POST['dateprelevement_d'];
$sr_daterendue=$_POST['sr_daterendue_y'].'-'.$_POST['sr_daterendue_m'].'-'.$_POST['sr_daterendue_d'];
include ('connexion.php');

$req=$bdd->prepare('INSERT INTO serologie(sr_dossier,sr_dateprelevement,sr_service,sr_prescripteur,sr_hiv12,sr_bispot,sr_conclusion,sr_daterendue,sr_aghbs,sr_vhb,sr_vhc,sr_technique,sr_conclusion_sr,sr_profil)
VALUES(:sr_dossier,:sr_dateprelevement,:sr_service,:sr_prescripteur,:sr_hiv12,:sr_bispot,:sr_conclusion,:sr_daterendue,:sr_aghbs,:sr_vhb,:sr_vhc,:sr_technique,:sr_conclusion_sr,:sr_profil)');
$req->execute(array(
'sr_dossier'=>$_SESSION['pa_numero'],
'sr_dateprelevement'=>$sr_dateprelevement,
'sr_service'=>$_POST['service'],
'sr_prescripteur'=>$_POST['prescripteur'],
'sr_hiv12'=>$_POST['sr_hiv12'],
'sr_bispot'=>$_POST['sr_bispot'],
'sr_conclusion'=>$_POST['sr_conclusion'],
'sr_daterendue'=>$sr_daterendue,
'sr_aghbs'=>$_POST['sr_aghbs'],
'sr_vhb'=>$_POST['sr_vhb'],
'sr_vhc'=>$_POST['sr_vhc'],
'sr_technique'=>$_POST['sr_technique'],
'sr_conclusion_sr'=>$_POST['sr_conclusion_sr'],
'sr_profil'=>$_POST['sr_profil']
))
 or die(print_r($req->errorInfo()));
 header ('Location:../vue/serologie.php');
?>


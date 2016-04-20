<?php
session_start();
$gr_dateprelevement=$_POST['dateprelevement_y'].'-'.$_POST['dateprelevement_m'].'-'.$_POST['dateprelevement_d'];
$gr_daterendue=$_POST['gr_daterendue_y'].'-'.$_POST['gr_daterendue_m'].'-'.$_POST['gr_daterendue_d'];
include ('connexion.php');

$req=$bdd->prepare('INSERT INTO grossesse(gr_dossier,gr_dateprelevement,gr_bilan,gr_service,gr_prescripteur,gr_proteine,gr_test,gr_daterendue,gr_glucose,gr_leucocyte,gr_hematie,gr_technique)
VALUES(:gr_dossier,:gr_dateprelevement,:gr_bilan,:gr_service,:gr_prescripteur,:gr_proteine,:gr_test,:gr_daterendue,:gr_glucose,:gr_leucocyte,:gr_hemathie,:gr_technique)');

$req->execute(array(
'gr_dossier'=>$_SESSION['pa_numero'],
'gr_dateprelevement'=>$gr_dateprelevement,
'gr_bilan'=>$_POST['bilan'],
'gr_service'=>$_POST['service'],
'gr_prescripteur'=>$_POST['prescripteur'],
'gr_proteine'=>$_POST['gr_proteine'],
'gr_test'=>$_POST['gr_test'],
'gr_glucose'=>$_POST['gr_glucose'],
'gr_leucocyte'=>$_POST['gr_leucocyte'],
'gr_hemathie'=>$_POST['gr_hemathie'],
'gr_daterendue'=>$gr_daterendue,
'gr_technique'=>$_POST['gr_technique']
))or die(print_r($req->errorInfo()));
header ('Location:../vue/grossesse.php');
?>
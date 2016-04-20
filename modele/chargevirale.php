<?php
session_start();
$cv_dateprelevement=$_POST['dateprelevement_y'].'-'.$_POST['dateprelevement_m'].'-'.$_POST['dateprelevement_d'];
$cv_daterendue=$_POST['cv_daterendue_y'].'-'.$_POST['cv_daterendue_m'].'-'.$_POST['cv_daterendue_d'];
include ('connexion.php');

$req=$bdd->prepare('INSERT INTO chargevirale(cv_dossier,cv_dateprelevement,cv_bilan,cv_service,cv_prescripteur,cv_chargevirale,cv_commentaire,cv_daterendue,cv_technique,cv_conclusion,cv_unite,cv_laboratoire)
VALUES (:cv_dossier,:cv_dateprelevement,:cv_bilan,:cv_service,:cv_prescripteur,:cv_chargevirale,:cv_commentaire,:cv_daterendue,:cv_technique,:cv_conclusion,:cv_unite,:cv_laboratoire)');

$req->execute(array(
'cv_dossier'=>$_SESSION['pa_numero'],
'cv_dateprelevement'=>$cv_dateprelevement,
'cv_bilan'=>$_POST['bilan'],
'cv_service'=>$_POST['service'],
'cv_prescripteur'=>$_POST['prescripteur'],
'cv_chargevirale'=>$_POST['cv_chargevirale'],
'cv_commentaire'=>$_POST['cv_commentaire'],
'cv_daterendue'=>$cv_daterendue,
'cv_technique'=>$_POST['cv_technique'],
'cv_conclusion'=>$_POST['cv_conclusion'],
'cv_unite'=>$_POST['cv_unite'],
'cv_laboratoire'=>$_SESSION['pa_dossier']
))
 or die(print_r($req->errorInfo()));
 header ('Location:../vue/chargevirale.php');
?>

<?php
session_start();
$nl_dateprelevement=$_POST['dateprelevement_y'].'-'.$_POST['dateprelevement_m'].'-'.$_POST['dateprelevement_d'];
$nl_daterendue=$_POST['nl_daterendue_y'].'-'.$_POST['nl_daterendue_m'].'-'.$_POST['nl_daterendue_d'];
include ('connexion.php');

$req=$bdd->prepare('INSERT INTO numerationlcd3cd4cd8(nl_dossier,nl_dateprelevement,nl_bilan,nl_service,nl_prescripteur,nl_cd4,nl_cd3,nl_cd8,nl_rapport,nl_remarque,nl_daterendue,nl_technique,nl_conclusion,nl_unite,nl_norme)
VALUES(:nl_dossier,:nl_dateprelevement,:nl_bilan,:nl_service,:nl_prescripteur,:nl_cd4,:nl_cd3,:nl_cd8,:nl_rapport,:nl_remarque,:nl_daterendue,:nl_technique,:nl_conclusion,:nl_unite,:nl_norme)');

$req->execute(array(
'nl_dossier'=>$_SESSION['pa_numero'],
'nl_dateprelevement'=>$nl_dateprelevement,
'nl_bilan'=>$_POST['bilan'],
'nl_service'=>$_POST['service'],
'nl_prescripteur'=>$_POST['prescripteur'],
'nl_cd3'=>$_POST['nl_cd3'],
'nl_cd4'=>$_POST['nl_cd4'],
'nl_cd8'=>$_POST['nl_cd8'],
'nl_rapport'=>$_POST['nl_rapport'],
'nl_remarque'=>$_POST['nl_remarque'],
'nl_daterendue'=>$nl_daterendue,
'nl_technique'=>$_POST['nl_technique'],
'nl_conclusion'=>$_POST['nl_conclusion'],
'nl_unite'=>$_POST['nl_unite'],
'nl_norme'=>$_POST['nl_norme']
))
 or die(print_r($req->errorInfo()));
 header ('Location:../vue/numerationcd3cd4cd8.php');
?>



<?php
session_start();
$bi_dateprelevement=$_POST['dateprelevement_y'].'-'.$_POST['dateprelevement_m'].'-'.$_POST['dateprelevement_d'];
$bi_daterendue=$_POST['bi_daterendue_y'].'-'.$_POST['bi_daterendue_m'].'-'.$_POST['bi_daterendue_d'];
include ('connexion.php');

$req=$bdd->prepare('INSERT INTO biochimie(bi_dossier,bi_dateprelevement,bi_bilan,bi_service,bi_prescripteur,bi_PAL,bi_BID,bi_B1T,bi_CHO,bi_Fe,bi_Gly,bi_HDL,bi_LDL,bi_PRO,bi_PHO,bi_PRU,bi_Tri,bi_CO2,bi_NO3,bi_ACB,bi_AU,bi_CRE,
bi_CREAT,bi_FRY,bi_Lactate,bi_URE,bi_GOTASAT,bi_GPTALAT,bi_ANY,bi_CPK,bi_GGT,bi_LDH,bi_Lipase,bi_CA,bi_CL,bi_MG,bi_K,bi_NA,bi_daterendue,bi_technique)
VALUES(:bi_dossier,:bi_dateprelevement,:bi_bilan,:bi_service,:bi_prescripteur,:bi_PAL,:bi_BID,:bi_B1T,:bi_CHO,:bi_Fe,:bi_Gly,:bi_HDL,:bi_LDL,:bi_PRO,:bi_PHO,:bi_PRU,:bi_Tri,:bi_CO2,:bi_NO3,:bi_ACB,:bi_AU,:bi_CRE,
:bi_CREAT,:bi_FRY,:bi_Lactate,:bi_URE,:bi_GOTASAT,:bi_GPTALAT,:bi_ANY,:bi_CPK,:bi_GGT,:bi_LDH,:bi_Lipase,:bi_CA,:bi_CL,:bi_MG,:bi_K,:bi_NA,:bi_daterendue,:bi_technique)');

$req->execute(array(
'bi_dossier'=>$_SESSION['pa_numero'],
'bi_dateprelevement'=>$bi_dateprelevement,
'bi_bilan'=>$_POST['bilan'],
'bi_service'=>$_POST['service'],
'bi_prescripteur'=>$_POST['prescripteur'],
'bi_PAL'=>$_POST['bi_PAL'],
'bi_BID'=>$_POST['bi_BID'],
'bi_B1T'=>$_POST['bi_B1T'],
'bi_CHO'=>$_POST['bi_CHO'],
'bi_Fe'=>$_POST['bi_Fe'],
'bi_Gly'=>$_POST['bi_Gly'],
'bi_HDL'=>$_POST['bi_HDL'],
'bi_LDL'=>$_POST['bi_LDL'],
'bi_PRO'=>$_POST['bi_PRO'],
'bi_PHO'=>$_POST['bi_PHO'],
'bi_PRU'=>$_POST['bi_PRU'],
'bi_Tri'=>$_POST['bi_Tri'],
'bi_CO2'=>$_POST['bi_CO2'],
'bi_NO3'=>$_POST['bi_NO3'],
'bi_ACB'=>$_POST['bi_ACB'],
'bi_AU'=>$_POST['bi_AU'],
'bi_CRE'=>$_POST['bi_CRE'],
'bi_CREAT'=>$_POST['bi_CREAT'],
'bi_FRY'=>$_POST['bi_FRY'],
'bi_Lactate'=>$_POST['bi_Lactate'],
'bi_URE'=>$_POST['bi_URE'],
'bi_GOTASAT'=>$_POST['bi_GOTASAT'],
'bi_GPTALAT'=>$_POST['bi_GPTALAT'],
'bi_ANY'=>$_POST['bi_ANY'],
'bi_CPK'=>$_POST['bi_CPK'],
'bi_GGT'=>$_POST['bi_GGT'],
'bi_LDH'=>$_POST['bi_LDH'],
'bi_Lipase'=>$_POST['bi_Lipase'],
'bi_CA'=>$_POST['bi_CA'],
'bi_CL'=>$_POST['bi_CL'],
'bi_MG'=>$_POST['bi_MG'],
'bi_K'=>$_POST['bi_K'],
'bi_NA'=>$_POST['bi_NA'],
'bi_daterendue'=>$bi_daterendue,
'bi_technique'=>$_POST['bi_technique']
))or die(print_r($req->errorInfo()));
 header ('Location:../vue/biochimie.php');
?>


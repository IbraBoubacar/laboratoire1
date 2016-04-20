<?php

include ('connexion.php');

$req=$bdd->prepare('INSERT INTO patient(pa_dossier,pa_nom,pa_prenom,pa_age,pa_sexe,pr_numero,pa_nationalite,pa_adresse,pa_laboratoire)
VALUES (:pa_dossier,:pa_nom,:pa_prenom,:pa_age,:pa_sexe,:pr_numero,:pa_nationalite,:pa_adresse,:pa_laboratoire)');

$req->execute(array(
'pa_dossier'=>$_POST['pa_dossier'],
'pa_nom'=>$_POST['pa_nom'],
'pa_prenom'=>$_POST['pa_prenom'],
'pa_age'=>$_POST['pa_age'],
'pa_sexe'=>$_POST['pa_sexe'],
'pr_numero'=>$_POST['pr_numero'],
'pa_nationalite'=>$_POST['pa_nationalite'],
'pa_adresse'=>$_POST['pa_adresse'],
'pa_laboratoire'=>$_POST['pa_laboratoire'],
))
 or die(print_r($req->errorInfo()));
 header ('Location:../vue/nouveau_dossier.php');
?>
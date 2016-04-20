<?php
session_start();
$_SESSION['pa_numero']=0;
$_SESSION['pa_dossier']=0; 
$_SESSION['pa_nom']=0;
$_SESSION['pa_prenom']=0;
$_SESSION['pa_age']=0; 
$_SESSION['pa_sexe']=0;
$_SESSION['pa_nationalite']=0;
$_SESSION['pa_adresse']=0;


if(isset($_POST['pa_dossier']))
{

include ('connexion.php');	


$req=$bdd->prepare('SELECT pa_dossier,pa_numero,pa_nom,pa_prenom,pa_age,pa_sexe,pr_numero,pa_nationalite,pa_adresse,pa_laboratoire FROM  patient WHERE pa_dossier=?');
$req->execute(array($_POST['pa_dossier'])) or die(print_r($req->errorInfo()));
}
$reponse=$req->fetch();

	
	$_SESSION['pa_numero']=$reponse['pa_numero'];
	$_SESSION['pa_dossier']=$reponse['pa_dossier'];
	$_SESSION['pa_nom']=$reponse['pa_nom'];
	$_SESSION['pa_prenom']=$reponse['pa_prenom'];
	$_SESSION['pa_age']=$reponse['pa_age'];
	$_SESSION['pa_sexe']=$reponse['pa_sexe'];
	$_SESSION['pa_nationalite']=$reponse['pa_nationalite'];
	$_SESSION['pa_adresse']=$reponse['pa_adresse'];
	
header ('Location:../vue/chargevirale.php');



?>
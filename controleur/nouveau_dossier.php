<?php
if (!empty($_POST['pa_laboratoire']) AND !empty($_POST['pa_dossier']) AND !empty($_POST['pa_nom']) AND !empty($_POST['pa_prenom']) AND !empty($_POST['pa_age']) AND !empty($_POST['pa_sexe']))
	
	{
		
		$_POST['pa_laboratoire']=htmlspecialchars($_POST['pa_laboratoire']);
		$_POST['pa_dossier']=htmlspecialchars($_POST['pa_dossier']);
		$_POST['pa_nom']=htmlspecialchars($_POST['pa_nom']);
		$_POST['pa_prenom']=htmlspecialchars($_POST['pa_prenom']);
		$_POST['pa_age']=htmlspecialchars($_POST['pa_age']);
		$_POST['pa_sexe']=htmlspecialchars($_POST['pa_sexe']);
		
		include ('../modele/nouveau_dossier.php');
		
	}
else
{
	
	echo 'Remplir les champs';
}
?>
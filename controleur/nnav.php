<?php


if (!empty($_POST['pa_dossier']))

{
	include ('../modele/nav.php');
	header('Location:../vue/nouveau_dossier.php');
	
}

else 
{
	echo "Veuillez renseignez le champ";
}
?>
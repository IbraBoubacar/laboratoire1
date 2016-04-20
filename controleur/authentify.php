<?php
if (isset($_POST['op_login']) AND isset($_POST['op_password']))
{
$op_login=htmlspecialchars($_POST['op_login']);
$op_password=htmlspecialchars($_POST['op_password']);
}
include ('..\modele\authentify.php');
while($donnees=$reponse->fetch())
	
	{
		if (($donnees['op_login']==$op_login) AND ($donnees ['op_password']==$op_password) )
		
			{
				header('Location:../vue/nouveau_dossier.php');
			}
			else
			{
				header('Location:../index.php');

			}
		
		$reponse->closeCursor();
	}

?>
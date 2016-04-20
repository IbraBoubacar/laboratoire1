<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	 <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratoire</title>
    <meta name="description" content="Le site de la maison de l'architecture">
	<style type="text/css">
	.container{
	
	margin-left:100px;
	margin-top:50px;
	}
	</style>
  </head>
  <body>
    <div class="container">
	<?php
require_once 'nav.php';
?>
<div class="col-md-10">
<?php
include ('connexion.php');
$req=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age FROM
 patient p WHERE pa_nom=:pa_nom AND p.pa_prenom=:pa_prenom');
 
$req->execute(array('pa_nom'=>$_POST['infos_nom'],
'pa_prenom'=>$_POST['infos_prenom']
)) or die(print_r($req->errorInfo()));
?>


<table class="table table-bordered table-stripped table-condensed" style="margin-top:03px">
	<caption><h4>Biochimie<h4></caption>

<?php
while ($donnees=$req->fetch())
{
?>
	
	
	<tr class="success">
	<strong>	<td class="col-md-1"><?php echo $donnees['dossier'];?>
		</td></strong>
		<td class="col-md-1"><?php echo $donnees['age'];?>
		</td>
		<td class="col-md-1"><?php echo $donnees['laboratoire'];?>
		</td>
		<td class="col-md-1"><?php echo $donnees['nom'];?>
		</td>
		<td class="col-md-1"><?php echo $donnees['prenom'];?>
		</td>
	</tr>
	
	
	
<?php	
}
?>
</table>
 
 
 


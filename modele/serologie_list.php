<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link href="../vue/bootstrap/css/bootstrap.css" rel="stylesheet">
	 <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratoire</title>
    <meta name="description" content="Le site de la maison de l'architecture">
	<style type="text/css">
	</style>
	</head>
	<body>
	<div class="container">
<?php


include ('connexion.php');

$reponse=$bdd->query('SELECT p.pa_dossier dossier,p.pa_numero numero,sr.sr_numero sr_numero,DAY(sr.sr_dateprelevement) AS jour,MONTH(sr.sr_dateprelevement) AS mois,YEAR(sr.sr_dateprelevement) AS annees,
DAY(sr.sr_daterendue) AS jour_r,MONTH(sr.sr_daterendue) AS mois_r,YEAR(sr.sr_daterendue) AS annees_r FROM patient p INNER JOIN 
serologie sr on p.pa_numero=sr.sr_dossier ORDER BY sr.sr_daterendue DESC LIMIT 0,100') or die(print_r($reponse->errorInfo()));

?>
<table class="table table-bordered table-stripped table-condensed" style="margin-top:03px">
	<caption><h4>Sérologie<h4></caption>

<?php
while ($donnees=$reponse->fetch())
{
?>
	
	
	<tr class="info">
		<td ><?php echo $donnees['dossier'];?>
		</td>
		<td style="width:450px"><?php echo $donnees['jour_r'].'/'.$donnees['mois_r'].'/'.$donnees['annees_r'];?>
		</td>  
		<td><a target="_blank"href="page_sr_impression.php?page=<?php echo $donnees['sr_numero'];?>">Imprimer</a></td>
	</tr>
	
	
	
<?php	
}
?>

</table>

<?php
include ('connexion.php'); 
$rep=$bdd->query('SELECT COUNT(*) AS nombre FROM patient p INNER JOIN serologie sr ON p.pa_numero=sr.sr_dossier');

$donnee=$rep->fetch();
$nombre=$donnee['nombre'];
$nombre_page=$nombre/5;

 for ($nombre_ini=1;$nombre_ini<20;$nombre_ini++)
 {
	
echo '<a href="page_sr.php?page='.$nombre_ini.'"><button type="button" class="btn btn-info btn-sm">'.$nombre_ini.'</button></a>';	
	 
 }

?>

<button type="button" class="btn btn-info btn-sm"><a href ="../vue/chargevirale.php">Retour</a></button>
</div>
</body>

</html>

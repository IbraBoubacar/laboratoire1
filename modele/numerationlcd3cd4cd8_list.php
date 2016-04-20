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

$reponse=$bdd->query('SELECT p.pa_dossier dossier,p.pa_numero numero,nl.nl_numero nl_numero,DAY(nl.nl_dateprelevement) AS jour,MONTH(nl.nl_dateprelevement) AS mois,YEAR(nl.nl_dateprelevement) AS annees,
nl.nl_daterendue,DAY(nl.nl_daterendue) AS jour_r,MONTH(nl.nl_daterendue) AS mois_r,YEAR(nl.nl_daterendue) AS annees_r FROM patient p INNER JOIN 
numerationlcd3cd4cd8 nl on p.pa_numero=nl.nl_dossier ORDER BY nl.nl_daterendue DESC LIMIT 0,100') or die(print_r($reponse->errorInfo()));



?>
<table class="table table-bordered table-stripped table-condensed" style="margin-top:03px">
	<caption><h4>Numération<h4></caption>

<?php
while ($donnees=$reponse->fetch())
{
?>
	
	
	<tr  class="danger">
		<td class="col-md-2"><?php echo $donnees['dossier'];?>
		</td>
		<td class="col-md-2" style="width:450px"><?php echo $donnees['jour_r'].'/'.$donnees['mois_r'].'/'.$donnees['annees_r'];?>
		</td>
			<td class="col-md-2"><a target="_blank"href="page_nl_impression.php?page=<?php echo $donnees['nl_numero'];?>">Imprimer</a></td>
	</tr>
	
	
	
<?php	
}
?>
</table>
<?php
include ('connexion.php'); 
$rep=$bdd->query('SELECT COUNT(*) AS nombre FROM patient p INNER JOIN numerationlcd3cd4cd8 nl ON p.pa_numero=nl.nl_dossier');

$donnee=$rep->fetch();
$nombre=$donnee['nombre'];
$nombre_page=$nombre/5;

 for ($nombre_ini=1;$nombre_ini<30;$nombre_ini++)
 {
	
echo '<a href="page_nl.php?page='.$nombre_ini.'"><button type="button" class="btn btn-info btn-sm">'.$nombre_ini. '</button></a>';	
	 
 }

?>
<a href ="../vue/chargevirale.php"><button type="button" class="btn btn-info btn-sm">Retour</button></a>
</div>
</body>
</html>
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

$reponse=$bdd->query('SELECT p.pa_dossier dossier,p.pa_numero numero,bi.bi_numero bi_numero,bi.bi_dateprelevement,DAY(bi.bi_dateprelevement) AS jour,MONTH(bi.bi_dateprelevement) AS mois,YEAR(bi.bi_dateprelevement) AS annees,
bi.bi_daterendue,DAY(bi.bi_daterendue) AS jour_r,MONTH(bi.bi_daterendue) AS mois_r,YEAR(bi.bi_daterendue) AS annees_r
 FROM patient p INNER JOIN 
biochimie bi on p.pa_numero=bi.bi_dossier ORDER BY bi.bi_daterendue DESC LIMIT 0,100') or die(print_r($reponse->errorInfo()));
?>
<table class="table table-bordered table-stripped table-condensed" style="margin-top:03px">
	<caption><h4>Biochimie<h4></caption>

<?php
while ($donnees=$reponse->fetch())
{
?>
	
	
	<tr class="success">
	<strong>	<td class="col-md-1"><?php echo $donnees['dossier'];?>
		</td></strong>
		<td class="col-md-1"><?php echo $donnees['jour_r'].'/'.$donnees['mois_r'].'/'.$donnees['annees_r'];?>
		</td>
		<td class="col-md-1"><a target="_blank"href="page_bi_impression.php?page=<?php echo $donnees['bi_numero'];?>">Imprimer</a></td>
	</tr>
	
	
	
<?php	
}
?>
</table>
<?php
include ('connexion.php'); 
$rep=$bdd->query('SELECT COUNT(*) AS nombre FROM patient p INNER JOIN biochimie bi ON p.pa_numero=bi.bi_dossier');

$donnee=$rep->fetch();
$nombre=$donnee['nombre'];
$nombre_page=$nombre/5;

 for ($nombre_ini=1;$nombre_ini<30;$nombre_ini++)
 {
	
echo '<a href="page_bi.php?page='.$nombre_ini.'"><button type="button" class="btn btn-info btn-sm">'.$nombre_ini.'</button></a>';	
	 
 }

?>

<a href ="../vue/chargevirale.php"><button type="button" class="btn btn-info btn-sm">Retour</button></a>
</div>
</body>
</html>
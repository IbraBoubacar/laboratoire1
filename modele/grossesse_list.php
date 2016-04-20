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

$reponse=$bdd->query('SELECT p.pa_dossier dossier,p.pa_numero numero,gr.gr_numero gr_numero,DAY(gr.gr_dateprelevement) AS jour,MONTH(gr.gr_dateprelevement) AS mois,YEAR(gr.gr_dateprelevement) AS annees,
DAY(gr.gr_daterendue) AS jour_r,MONTH(gr.gr_daterendue) AS mois_r,YEAR(gr.gr_daterendue) AS annees_r 
FROM patient p INNER JOIN 
grossesse gr on p.pa_numero=gr.gr_dossier ORDER BY gr.gr_daterendue DESC LIMIT 0,100') or die(print_r($reponse->errorInfo()));

?>
<table class="table table-bordered table-stripped table-condensed" style="margin-top:03px">
	<caption><h4>Grossesse1<h4></caption>

<?php
while ($donnees=$reponse->fetch())
{
?>
	
	
	<tr class="success">
		<td class="col-md-1"><?php echo $donnees['dossier'];?>
		</td>
		<td class="col-md-1" style="width:450px"><?php echo $donnees['jour_r'].'/'.$donnees['mois_r'].'/'.$donnees['annees_r'];?>
		</td>
		<td class="col-md-1"><a target="_blank"href="page_gr_impression.php?page=<?php echo $donnees['gr_numero'];?>">Imprimer</a></td>
	</tr>
	
	
	
<?php	
}
?>
</table>
<?php
include ('connexion.php'); 
$req=$bdd->query('SELECT COUNT(*) AS nombre FROM patient p INNER JOIN grossesse gr ON p.pa_numero=gr.gr_dossier');

$donnees=$req->fetch();
$nombre=$donnees['nombre'];
$nombre_page=$nombre/2;

 for ($nombre_ini=1;$nombre_ini<30;$nombre_ini++)
 {
	
echo '<a href="page_gr.php?page='.$nombre_ini.'"><button type="button" class="btn btn-info btn-sm">'.$nombre_ini.'</button></a>';	
	 
 }

?>

<a href ="../vue/grossesse.php"><button type="button" class="btn btn-info btn-sm">Retour</button></a>
</div>
</body>
</html>
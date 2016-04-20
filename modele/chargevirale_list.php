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

$reponse=$bdd->query('SELECT p.pa_dossier dossier,p.pa_numero numero,cv.cv_numero cv_numero,DAY(cv.cv_dateprelevement) AS jour,MONTH(cv.cv_dateprelevement) AS mois,YEAR(cv.cv_dateprelevement) AS annees, 
DAY(cv.cv_daterendue) AS jour_r,MONTH(cv.cv_daterendue) AS mois_r,YEAR(cv.cv_daterendue) AS annees_r
FROM patient p INNER JOIN 
chargevirale cv on p.pa_numero=cv.cv_dossier ORDER BY cv.cv_daterendue DESC LIMIT 0,100') ;

?>

<table class="table table-bordered table-stripped table-condensed" style="margin-top:03px">
	<caption><h4>Charge Virale <h4></caption>

<?php
/*
Code pour afficher les enregistrements pour impression
*/
while ($donnees=$reponse->fetch())
{
?>
	
	
	<tr class="success">
		<td class="col-md-1"><?php echo $donnees['dossier'];?>
		</td>
		<td class="col-md-1" style="width:450px"><?php echo $donnees['jour_r'].'/'.$donnees['mois_r'].'/'.$donnees['annees_r'];?>
		</td>
		<td class="col-md-1"><a target="_blank"href="page_cv_impression.php?page=<?php echo $donnees['cv_numero'];?>">Imprimer</a></td>
	</tr>
	
	
	
<?php	
}
?>
</table>
<?php
include ('connexion.php'); 
$req=$bdd->query('SELECT COUNT(*) AS nombre FROM patient p INNER JOIN chargevirale cv ON p.pa_numero=cv.cv_dossier');

$donnees=$req->fetch();
$nombre=$donnees['nombre'];
$nombre_page=$nombre/2;

 for ($nombre_ini=1;$nombre_ini<30;$nombre_ini++)
 {
	
echo '<a href="page_cv.php?page='.$nombre_ini.'"><button type="button" class="btn btn-info btn-sm">'.$nombre_ini.'</button></a>';	
	 
 }

?>

<a href ="../vue/chargevirale.php"><button type="button" class="btn btn-info btn-sm">Retour</button></a>
</div>
</body>
</html>
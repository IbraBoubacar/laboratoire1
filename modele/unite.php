 <!DOCTYPE HTML>
<html>
 <meta charset="utf-8">
<?php
include ('connexion.php');
$reponse=$bdd->query('SELECT ut_numero,ut_libelle FROM unite '); 
while ($donnees=$reponse->fetch())
{
 ?>	

 <option value="<?php echo $donnees['ut_libelle'];?>"><?php echo $donnees['ut_libelle']. '</br>' ;?></option>
	
<?php	

}
 $reponse->closeCursor();
?>
</html>
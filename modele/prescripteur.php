<?php
include ('connexion.php');
$reponse=$bdd->query('SELECT ps_numero,ps_nom FROM prescripteur '); 
while ($donnees=$reponse->fetch())
{
 ?>	

 <option value="<?php echo $donnees['ps_numero'];?>"><?php echo $donnees['ps_nom']. '</br>' ;?></option>
	
<?php	

}
 $reponse->closeCursor();
?>
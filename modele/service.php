<?php
include ('connexion.php');
$reponse=$bdd->query('SELECT sv_numero,sv_libelle FROM service '); 
while ($donnees=$reponse->fetch())
{
 ?>	

 <option value="<?php echo $donnees['sv_numero'];?>"><?php echo $donnees['sv_libelle']. '</br>' ;?></option>
	
<?php	

}
 $reponse->closeCursor();
?>
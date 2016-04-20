<?php
include ('connexion.php');
$reponse=$bdd->query('SELECT th_numero,th_libelle FROM technique'); 
while ($donnees=$reponse->fetch())
{
 ?>	

 <option value="<?php echo $donnees['th_libelle'];?>"><?php echo $donnees['th_libelle']. '</br>' ;?></option>
	
<?php	

}
 $reponse->closeCursor();
?>
<?php
try 
{
$bdd=new PDO('mysql:host=localhost;dbname=llaboratoire','root','vouzanou')  or die(print_r($bdd->errorInfo()));
}
catch (Exception $e)
{
	die ('Erreur:'.$e->getMessage());
}
?>
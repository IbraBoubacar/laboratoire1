<?php

include ("connexion.php");
$reponse=$bdd->query('SELECT op_login,op_password FROM operateur'); 

?>
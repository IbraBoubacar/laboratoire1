<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	 <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratoire</title>
    <meta name="description" content="Le site de la maison de l'architecture">
	<style type="text/css">
	.container{
	
	margin-left:100px;
	margin-top:50px;
	}
	</style>
  </head>
  <body>
    <div class="container">
	<?php
require_once 'nav.php';
?>
<div class="col-md-10">
<form method="post" action='../vue/infos_patient_list.php' class="col-md-12">
<h2 class="col-md-offset-5"> Recherche
</h2>
<div class="input-group col-md-12">

	<span  class="input-group-btn">
	<label for="infos_nom" class="btn btn-info" style="width:100px"  type="button"> Nom
	</label>
	</span>
	
	<input type="text" name="infos_nom"  style="width:100px" class="form-control" id="infos_nom">
	<span  class="input-group-btn">
	<label for="infos_prenom" class="btn btn-info" style="width:100px"  type="button"> Prénoms
	</label>
	</span>
	
	<input type="text" name="infos_prenom"  style="width:100px" class="form-control" id="infos_prenom">
	

</div>

<button  class="btn btn-info col-md-offset-5" style="width:110px; margin-top:35px;"  type="submit" ><span class="glyphicon glyphicon-ok-sign" ></span> Enregistrer</button>
</form>


</div>
<script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

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
	
	<form method="post" action='../controleur/nouveau_dossier.php' class="col-md-10">
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="projet" class="btn btn-primary" style="width:200px" type="button"> Programme/Projet
	</label>
</span>	<select  name="pr_numero" id="pr_numero" class="form-control col-md-1"><?php include ('../modele/projet.php');?>
</select>
	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="pa_laboratoire" class="btn btn-primary" style="width:200px"  type="button"> N° Laboratoire
	</label>
</span>	<input type="text" name="pa_laboratoire"  class="form-control" id="laboratoire">


	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="pa_dossier" class="btn btn-primary" style="width:200px"  type="button"> N ° dossier
	</label>
</span>	<input type="text" name="pa_dossier"  class="form-control" id="pa_dossier">

	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="pa_nom" class="btn btn-primary" style="width:200px"  type="button"> Nom
	</label>
</span>	<input type="text" name="pa_nom"  class="form-control" id="pa_nom">

	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="pa_prenoms" class="btn btn-primary" style="width:200px"  type="button"> Prénoms
	</label>
</span>	<input type="text" name="pa_prenom"  class="form-control" id="pa_prenoms">

	</div>
	
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="pa_age" class="btn btn-primary" style="width:200px"  type="button"> Age
	</label>
</span>	<input type="text" name="pa_age"  class="form-control" id="pa_age">

	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="pa_sexe" class="btn btn-primary" style="width:200px"  type="button"> Sexe
	</label>
</span>	<input type="text" name="pa_sexe"  class="form-control" id="pa_sexe">

	</div>
	
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="pa_nationalite" class="btn btn-primary" style="width:200px"  type="button"> Nationalité
	</label>
</span>	<input type="text" name="pa_nationalite"  class="form-control" id="pa_nationalite">

	</div>
	
	
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="pa_adresse" class="btn btn-primary" style="width:200px"  type="button"> Adresse
	</label>
	</span>	<input type="text" name="pa_adresse"  class="form-control" id="pa_adresse">

	</div>
	<footer class="col-md-offset-4" style="margin-top:35px">
	
<button  class="btn btn-info" style="width:110px"  type="submit" ><span class="glyphicon glyphicon-ok-sign" ></span> Enregistrer</button>
<button  class="btn btn-danger " style="width:110px" href="supprimer.php"><span class="glyphicon glyphicon-remove-sign" ></span> <a href="supprimer.php">Supprimer</a></button>
<button  class="btn btn-primary" style="width:110px"><span class="glyphicon glyphicon-plus-sign" ></span> Nouveau</button>
</footer>
	</form>
	</div>
	<script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
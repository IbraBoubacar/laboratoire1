<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link href="vue/bootstrap/css/bootstrap.css" rel="stylesheet">
	 <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratoire</title>
    <meta name="description" content="Le site de la maison de l'architecture">
	<style type="text/css">
	.container{
	padding-top:400px;
	padding-left:100px;
	}
	
	</style>
  </head>
  <body>
    <div class="container col-md-offset-4">
	<form method="post" action="controleur/authentify.php">
	<div class="input-group col-md-3">
	<span  class="input-group-btn">
	<label for="op_login" class="btn btn-primary" style="width:120px" type="button"> Utilisateur
	</label>
</span>	<input type="text" name="op_login" id="op_login" class="form-control col-md-1">
	</div>
	<div class="input-group col-md-3">
	<span  class="input-group-btn">
	<label for="op_password" class="btn btn-primary" style="width:120px"  type="button"> Mot de passe
	</label>
</span>	<input type="password" name="op_password"  class="form-control" id="op_password">

	</div>
	<input  class="col-md-offset-1" type="submit" style="margin-top:5px; width:120px;" value="Connexion"/>
	</form>
	</div>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
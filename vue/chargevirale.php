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
	.btn 
	{
		background-color:green;
	}
	.btn-info{
		background-color:blue;
	}
	.btn-danger{
		background-color:red;
	}
	
	
	</style>
  </head>
  <body>
    <div class="container">
	<?php

require_once 'nav.php';
?>
	
	<form method="post" action="../modele/chargevirale.php" class="col-md-10">
	<h2 class="col-md-offset-5">Charge virale</h2>
	<?php

include('base_page.php');
?>
</span>
<select  name="cv_technique" id="cv_technique" class="form-control" style="width:160px"><?php include ('../modele/technique.php');?>
</select>
<span  class="input-group-btn">
	<label for="cv_unite" class="btn btn-primary" style="width:80px"  type="button">Unité
	</label>
	</span>
<select  name="cv_unite" id="cv_unite" class="form-control" style="width:60px"><?php include ('../modele/unite.php');?>
</select>
	<span  class="input-group-btn">
	<label for="cv_chargevirale" class="btn btn-primary" style="width:105px"  type="button">Résultats
	</label>
	</span>	<input type="text" name="cv_chargevirale"  style="width:120px" class="form-control" id="cv_chargevirale">
	<span  class="input-group-btn">
	<label for="cv_conclusion" class="btn btn-primary" style="width:65px"  type="button">Conclusion
	</span>	<input type="text" name="cv_conclusion"  style="width:130px" class="form-control" id="cv_conclusion">
	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="cv_daterendue" class="btn btn-primary" style="width:200px"  type="button"> Date Rendue
	</label>
	</span>
	<input type="text" name="cv_daterendue_d"  style="width:50px" class="form-control" id="cv_daterendue_d">
<input type="text" name="cv_daterendue_m"  class="form-control"  style="width:50px" id="cv_daterendue_m" >
<input type="text" name="cv_daterendue_y"  class="form-control"  style="width:60px" id="cv_daterendue_y" >
</div>
<div class="input-group col-md-12">
<h3 >Commentaires</h3>

<textarea  name="cv_commentaire"  class="form-control" id="cv_commentaire"></textarea>
</div>
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
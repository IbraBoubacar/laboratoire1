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
		background-color:indigo;
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
	
	<form method="post" action="../modele/grossesse.php" class="col-md-10">
	<h2 class="col-md-offset-5">Grossesse</h2>
	<?php

require_once 'base_page.php';
?>
</span>
<input type="text" name="gr_technique" style="width:715px"   id="gr_technique" class="form-control">
</div>
<h2 class="col-md-offset-5">Examens demandés</h2>
<h3 >Bandelettes Urinaires</h3>
<div class="input-group col-md-2">
<span class="input-group-btn">
<label for="gr_proteine" class="btn btn-primary" style="width:115px"  type="button">Protéine
	</label>
	</span>	<input type="text" name="gr_proteine"  style="width:120px" class="form-control" id="gr_proteine"><span class="input-group-addon">unités mg/dl</span>
	</div>
	<div class="input-group col-md-2">
<span class="input-group-btn">
<label for="gr_glucose" class="btn btn-primary" style="width:115px"  type="button">Glucose
	</label>
	</span>	<input type="text" name="gr_glucose"  style="width:120px" class="form-control" id="gr_glucose"><span class="input-group-addon">unités mg/dl</span>
	</div>
	
<h3 >Bandelettes réactivées</h3>	
<div class="input-group col-md-2">
<span class="input-group-btn">
<label for="gr_test" class="btn btn-primary" style="width:115px"  type="button">Test de grossesse uri.
	</label>
	</span>	<input type="text" name="gr_test"  style="width:120px" class="form-control" id="gr_test"><span class="input-group-addon">unités mg/dl</span>
	</div>
	
<h3 >Formats de cassettes de PHARMA D13</h3>
<div class="input-group col-md-2">
<span class="input-group-btn">
<label for="gr_leucocyte" class="btn btn-primary" style="width:115px"  type="button">Leucocyte
	</label>
	</span>	<input type="text" name="gr_leucocyte"  style="width:120px" class="form-control" id="gr_leucocyte"><span class="input-group-addon">unités mg/dl</span>
	</div>
	<div class="input-group col-md-2">
<span class="input-group-btn">
<label for="gr_hematie" class="btn btn-primary" style="width:115px"  type="button">Hémathie
	</label>
	</span>	<input type="text" name="gr_hemathie"  style="width:120px" class="form-control" id="gr_hematie"><span class="input-group-addon">unités mg/dl</span>
	</div>	
	<h3>Date rendue<h3>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="dateprelevement_d" class="btn btn-primary" style="width:200px"  type="button"> Date prelevement
	</label>
	</span>	<span><input type="text" name="gr_daterendue_d"  style="width:50px" class="form-control" id="gr_daterendue_d">
<input type="text" name="gr_daterendue_m"  class="form-control"  style="width:50px" id="gr_daterendue_m" >
<input type="text" name="gr_daterendue_y"  class="form-control"  style="width:60px" id="gr_daterendue_y" ></span>
</form>
	</div>
	<footer class="col-md-offset-4" style="margin-top:35px">
	
<button  class="btn btn-info" style="width:110px"  type="submit" ><span class="glyphicon glyphicon-ok-sign" ></span> Enregistrer</button>
<button  class="btn btn-danger " style="width:110px" href="supprimer.php"><span class="glyphicon glyphicon-remove-sign" ></span> <a href="supprimer.php">Supprimer</a></button>
<button  class="btn btn-primary" style="width:110px"><span class="glyphicon glyphicon-plus-sign" ></span> Nouveau</button>
</footer>
	<script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
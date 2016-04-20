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
	
	<form method="post" action="../modele/serologie.php" class="col-md-10">
	<h2 class="col-md-offset-5">Sérologie</h2>
	<?php

require_once 'base_page.php';
?>
</span>
<input type="text" name="sr_technique" style="width:160px"  class="form-control" id="sr_technique">
</div>
<h2 class="col-md-offset-5">Résultats
</h2>
<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="sr_hiv12" class="btn btn-primary" style="width:200px"  type="button">Determine HIV1/2
	</label>
	</span>	<input type="text" name="sr_hiv12"  style="width:160px" class="form-control" id="sr_hiv12">
	<span  class="input-group-btn">
	<label for="sr_prescripteur" class="btn btn-primary" style="width:200px"  type="button">ImminuoComb Bispot
	</label></span><input type="text" name="sr_bispot"  style="width:160px" class="form-control" id="sr_prescripteur">
	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="sr_profil" class="btn btn-primary" style="width:200px"  type="button">Profil
	</label>
	</span>	<input type="text" name="sr_profil"  style="width:160px" class="form-control" id="sr_profil">
	<span  class="input-group-btn">
	<label for="sr_conclusion" class="btn btn-primary" style="width:200px"  type="button">Conclusion
	</label></span><input type="text" name="sr_conclusion"  style="width:160px" class="form-control" id="sr_conclusion">
	</div>

	
	<h2 class="col-md-offset-5">Sérologie Hépathite B et C
</h2>
<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="sr_aghbs" class="btn btn-primary" style="width:200px"  type="button">Determine AgHBS
	</label>
	</span>	<input type="text" name="sr_aghbs"  style="width:160px" class="form-control" id="sr_aghbs">
	<span  class="input-group-btn">
	<label for="sr_vhb" class="btn btn-primary" style="width:200px"  type="button">VHB
	</label></span><input type="text" name="sr_vhb"  style="width:160px" class="form-control" id="vhb">
	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="sr_vhc" class="btn btn-primary" style="width:200px"  type="button">VHC
	</label>
	</span>	<input type="text" name="sr_vhc"  style="width:160px" class="form-control" id="vhc">
	<span  class="input-group-btn">
	<label for="sr_conclusion_sr" class="btn btn-primary" style="width:200px"  type="button">Conclusion
	</label></span><input type="text" name="sr_conclusion_sr"  style="width:160px" class="form-control" id="sr_conclusion_sr">
	</div>
	<h4 >Date rendue
</h4>
<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="sr_daterendue_d" class="btn btn-primary" style="width:200px"  type="button"> Date Rendue
	</label>
	</span>
	<input type="text" name="sr_daterendue_d"  style="width:50px" class="form-control" id="sr_daterendue_d">
<input type="text" name="sr_daterendue_m"  class="form-control"  style="width:50px" id="sr_daterendue_m" >
<input type="text" name="sr_daterendue_y"  class="form-control"  style="width:60px" id="sr_daterendue_y" >

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
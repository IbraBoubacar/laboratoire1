
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
	
	<form method="post" action="../modele/numerationcd3cd4cd8.php" class="col-md-10">
	<h2 class="col-md-offset-2">GPL Numération Lymphocitaire CD3/CD4/CD8</h2>
	<?php

require_once 'base_page.php';
?>
	</span>	<input type="text" name="nl_technique"  style="width:160px" class="form-control" id="nl_tecgnique">
	<span  class="input-group-btn">
	<label for="nl_norme" class="btn btn-primary" style="width:80px"  type="button">Norme
	</label>
	</span>	<input type="text" name="nl_norme"  style="width:285px" class="form-control" id="nl_norme">
	<span  class="input-group-btn">
	<label for="nl_unite" class="btn btn-primary" style="width:65px"  type="button">Unité
	</span>	<input type="text" name="nl_unite"  style="width:130px" class="form-control" id="nl_unite">
	</div>
	
	<h1 class="col-md-offset-5">Résultats</h1>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="nl_cd4" class="btn btn-primary" style="width:90px"  type="button">CD4
	</label>
	</span>	<input type="text" name="nl_cd4"  style="width:160px" class="form-control" id="nl_cd4">
	<span  class="input-group-btn">
	<label for="nl_cd8" class="btn btn-primary" style="width:75px"  type="button">CD8
	</label>
	</span>	<input type="text" name="nl_cd8"  style="width:155px" class="form-control" id="nl_cd8">
	<span  class="input-group-btn">
	<label for="nl_cd3" class="btn btn-primary" style="width:95px"  type="button">CD3
	</span>	<input type="text" name="nl_cd3"  style="width:130px" class="form-control" id="nl_cd3">
	<span  class="input-group-btn">
	<label for="nl_rapport" class="btn btn-primary" style="width:95px"  type="button">Rapport
	</span>	<input type="text" name="nl_rapport"  style="width:125px" class="form-control" id="nl_rapport">
	</div>
	
	<div class="input-group col-md-12">
	
<span  class="input-group-btn">
	<label for="nl_conclusion" class="btn btn-primary" style="width:90px"  type="button">Conclusion
	</label>
	</span>	<input type="text" name="nl_conclusion" style="width:390px"  class="form-control" id="nl_conclusion">
	<span class="input-group-btn">
	<label for="nl_daterendue" class="btn btn-primary" style="width:100px"  type="button">	Date rendue
	</label>
	</span>
	<input type="text" name="nl_daterendue_d"  style="width:111px" class="form-control" id="nl_daterendue_d">
<input type="text" name="nl_daterendue_m"  class="form-control"  style="width:110px" id="nl_daterendue_m" >
<input type="text" name="nl_daterendue_y"  class="form-control"  style="width:120px" id="nl_daterendue_y" >
	</div>
	<div class="input-group col-md-12">
	

	<h2 class="col-md-offset-5">Remarques
	</h2>
	
	<textarea  name="nl_remarque"  class="form-control" id="bilan"></textarea>



	</div>
	<footer class="col-md-offset-4" style="margin-top:35px">
	
<button  class="btn btn-info" style="width:110px"  type="submit"><span class="glyphicon glyphicon-ok-sign" ></span> Enregistrer</button>
<button  class="btn " style="width:110px" href="supprimer.php"><span class="glyphicon glyphicon-remove-sign" ></span> <a href="supprimer.php">Supprimer</a></button>
<button  class="btn btn-primary" style="width:110px"><span class="glyphicon glyphicon-plus-sign" ></span> Nouveau</button>
</footer>
	</div>
	
	
	
	
	
	</form>
	</div>
	<script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
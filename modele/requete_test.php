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
<form method="post" action='../modele/test_courbe.php' class="col-md-12">
<h2 class="col-md-offset-5">Sérologie
</h2>
<div class="input-group col-md-12">

	<span  class="input-group-btn">
	<label for="search_sero" class="btn btn-info" style="width:100px"  type="button"> N° patient
	</label>
	</span>
	
	<input type="text" name="search_sero"  style="width:100px" class="form-control" id="search_sero">
	
	<span  class="input-group-btn">
	<label for="sr_daterendue_d" class="btn btn-info" style="width:60px"  type="button"> Début
	</label>
	</span>
	<input type="text" name="sr_datedebut_d"  style="width:50px" class="form-control" id="sr_daterendue_d">
<input type="text" name="sr_datedebut_m"  class="form-control"  style="width:50px" id="sr_daterendue_m" >
<input type="text" name="sr_datedebut_y"  class="form-control"  style="width:50px" id="sr_daterendue_y" >

<span  class="input-group-btn">
	<label for="sr_daterendue_d" class="btn btn-info" style="width:60px"  type="button"> Fin
	</label>
	</span>
	<input type="text" name="sr_datefin_d"  style="width:50px" class="form-control" id="sr_datefin_d">
<input type="text" name="sr_datefin_m"  class="form-control"  style="width:50px" id="sr_datefin_m" >
<input type="text" name="sr_datefin_y"  class="form-control"  style="width:50px" id="sr_datefin_y" >

</div>

<button  class="btn btn-info col-md-offset-5" style="width:110px; margin-top:35px;"  type="submit" ><span class="glyphicon glyphicon-ok-sign" ></span> Enregistrer</button>



</form>

<form method="post" action='../modele/test_courbe.php' class="col-md-12">
<h2 class="col-md-offset-5">Biochimie
</h2>
<div class="input-group col-md-12">

	<span  class="input-group-btn">
	<label for="search_bio" class="btn btn-info" style="width:100px"  type="button"> N° patient
	</label>
	</span>
	
	<input type="text" name="search"  style="width:100px" class="form-control" id="search_sero">
	
	<span  class="input-group-btn">
	<label for="bi_daterendue_d" class="btn btn-info" style="width:60px"  type="button"> Début
	</label>
	</span>
	<input type="text" name="bi_datedebut_d"  style="width:50px" class="form-control" id="bi_daterendue_d">
<input type="text" name="bi_datedebut_m"  class="form-control"  style="width:50px" id="bi_daterendue_m" >
<input type="text" name="bi_datedebut_y"  class="form-control"  style="width:50px" id="bi_daterendue_y" >

<span  class="input-group-btn">
	<label for="sr_daterendue_d" class="btn btn-info" style="width:60px"  type="button"> Fin
	</label>
	</span>
	<input type="text" name="bi_datefin_d"  style="width:50px" class="form-control" id="bi_datefin_d">
<input type="text" name="bi_datefin_m"  class="form-control"  style="width:50px" id="bi_datefin_m" >
<input type="text" name="bi_datefin_y"  class="form-control"  style="width:50px" id="bi_datefin_y" >

</div>

<button  class="btn btn-info col-md-offset-5" style="width:110px; margin-top:35px;"  type="submit" ><span class="glyphicon glyphicon-ok-sign" ></span> Enregistrer</button>



</form>
<form method="post" action='../modele/test_courbe.php' class="col-md-12">
<h2 class="col-md-offset-5">Numération
</h2>
<div class="input-group col-md-12">

	<span  class="input-group-btn">
	<label for="search_num" class="btn btn-info" style="width:100px"  type="button"> N° patient
	</label>
	</span>
	
	<input type="text" name="search_num"  style="width:100px" class="form-control" id="search_sero">
	
	<span  class="input-group-btn">
	<label for="nl_daterendue_d" class="btn btn-info" style="width:60px"  type="button"> Début
	</label>
	</span>
	<input type="text" name="nl_datedebut_d"  style="width:50px" class="form-control" id="nl_daterendue_d">
<input type="text" name="nl_datedebut_m"  class="form-control"  style="width:50px" id="nl_daterendue_m" >
<input type="text" name="nl_datedebut_y"  class="form-control"  style="width:50px" id="nl_daterendue_y" >

<span  class="input-group-btn">
	<label for="nl_daterendue_d" class="btn btn-info" style="width:60px"  type="button"> Fin
	</label>
	</span>
	<input type="text" name="nl_datefin_d"  style="width:50px" class="form-control" id="nl_datefin_d">
<input type="text" name="nl_datefin_m"  class="form-control"  style="width:50px" id="nl_datefin_m" >
<input type="text" name="nl_datefin_y"  class="form-control"  style="width:50px" id="nl_datefin_y" >

</div>

<button  class="btn btn-info col-md-offset-5" style="width:110px; margin-top:35px;"  type="submit" ><span class="glyphicon glyphicon-ok-sign" ></span> Enregistrer</button>



</form>
<form method="post" action='../modele/test_courbe.php' class="col-md-12">
<h2 class="col-md-offset-5">Charge virale
</h2>
<div class="input-group col-md-12">

	<span  class="input-group-btn">
	<label for="search_cv" class="btn btn-info" style="width:100px"  type="button"> N° patient
	</label>
	</span>
	
	<input type="text" name="search_cv"  style="width:100px" class="form-control" id="search_cv">
	
	<span  class="input-group-btn">
	<label for="cv_daterendue_d" class="btn btn-info" style="width:60px"  type="button"> Début
	</label>
	</span>
	<input type="text" name="cv_datedebut_d"  style="width:50px" class="form-control" id="cv_daterendue_d">
<input type="text" name="cv_datedebut_m"  class="form-control"  style="width:50px" id="cv_daterendue_m" >
<input type="text" name="cv_datedebut_y"  class="form-control"  style="width:50px" id="cv_daterendue_y" >

<span  class="input-group-btn">
	<label for="cv_daterendue_d" class="btn btn-info" style="width:60px"  type="button"> Fin
	</label>
	</span>
	<input type="text" name="cv_datefin_d"  style="width:50px" class="form-control" id="cv_datefin_d">
<input type="text" name="cv_datefin_m"  class="form-control"  style="width:50px" id="cv_datefin_m" >
<input type="text" name="cv_datefin_y"  class="form-control"  style="width:50px" id="cv_datefin_y" >

</div>

<button  class="btn btn-info col-md-offset-5" style="width:110px; margin-top:35px;"  type="submit" ><span class="glyphicon glyphicon-ok-sign" ></span> Enregistrer</button>



</form>

<form method="post" action='../modele/test_courbe.php' class="col-md-12">
<h2 class="col-md-offset-5">Grossesse
</h2>
<div class="input-group col-md-12">

	<span  class="input-group-btn">
	<label for="search_gr" class="btn btn-info" style="width:100px"  type="button"> N° patient
	</label>
	</span>
	
	<input type="text" name="search_gr"  style="width:100px" class="form-control" id="search_gr">
	
	<span  class="input-group-btn">
	<label for="gr_daterendue_d" class="btn btn-info" style="width:60px"  type="button"> Début
	</label>
	</span>
	<input type="text" name="gr_datedebut_d"  style="width:50px" class="form-control" id="gr_daterendue_d">
<input type="text" name="gr_datedebut_m"  class="form-control"  style="width:50px" id="gr_daterendue_m" >
<input type="text" name="gr_datedebut_y"  class="form-control"  style="width:50px" id="gr_daterendue_y" >

<span  class="input-group-btn">
	<label for="gr_daterendue_d" class="btn btn-info" style="width:60px"  type="button"> Fin
	</label>
	</span>
	<input type="text" name="gr_datefin_d"  style="width:50px" class="form-control" id="cv_datefin_d">
<input type="text" name="gr_datefin_m"  class="form-control"  style="width:50px" id="cv_datefin_m" >
<input type="text" name="gr_datefin_y"  class="form-control"  style="width:50px" id="cv_datefin_y" >

</div>

<button  class="btn btn-info col-md-offset-5" style="width:110px; margin-top:35px;"  type="submit" ><span class="glyphicon glyphicon-ok-sign" ></span> Enregistrer</button>



</form>
</div>
<script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
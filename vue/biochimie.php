<?php ob_start();?><!DOCTYPE HTML>
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
		background-color:gray;
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
	
	<form method="post" action="../modele/biochimie.php" class="col-md-10">
	<h2 class="col-md-offset-5">Biochimie</h2>
	<?php

require_once 'base_biochimie.php';

?>


<table class="table" style="margin-top:10px">
<caption>Résultats</caption>
<tr><td>PAL:Phosphatase</td>
<td><input type="text" name="bi_PAL"  style="width:450px"  ></td>
<td>100-300 UI/L</td>

</tr>
<tr><td>BID:Bili Directe</td>
<td><input type="text" name="bi_BID"  style="width:450px"  ></td>
<td><2mg/l</td>

</tr>
</tr>
<tr><td>BID:Bili Indiirecte</td>
<td><input type="text" name="bi_B1T"  style="width:450px" ></td>
<td><2mg/l</td>

</tr>
<tr><td>CHO:Cholesterol total</td>
<td><input type="text" name="bi_CHO"  style="width:450px"></td>
<td><0.96-2.70 g/L</td>

</tr>

<tr><td>Fe:Fer</td>
<td><input type="text" name="bi_Fe"  style="width:450px" ></td>
<td><1,0-1,2 mg/L</td>
</tr>
<tr><td>Gly:Glycémie</td>
<td><input type="text" name="bi_Gly"  style="width:450px" ></td>
<td>0,74-1,10g/L</td>
</tr>
<tr><td>HDL:HDLchol</td>
<td><input type="text" name="bi_HDL"  style="width:450px"></td>
<td>0,40-0,70g/L</td>
</tr>
<tr><td>LDL:Ldlchol</td>
<td><input type="text" name="bi_LDL"  style="width:450px"></td>
<td><1,50 g/L</td>
</tr>
<tr><td>PRO:Protéinémie</td>
<td><input type="text" name="bi_PRO"  style="width:450px"></td>
<td>61-76g/l</td>
</tr>
<tr><td>PHO:Phosphore</td>
<td><input type="text" name="bi_PHO"  style="width:450px"></td>
<td>30-40 mg/L</td>
</tr>
<tr><td>PRU:Poteinune</td>
<td><input type="text" name="bi_PRU"  style="width:450px"></td>
<td><154 mg/L</td>
</tr>

<tr><td>Tri:Triglycerides</td>
<td><input type="text" name="bi_Tri"  style="width:450px"  id="prescripteur"></td>
<td>0,4-1,65 g/L</td>
</tr>
<tr><td>CO2:Bicarbonate</td>
<td><input type="text" name="bi_CO2"  style="width:450px"  id="prescripteur"></td>
<td>21-26mmol/L</td>
</tr>
<tr><td>NO3:Amoniac</td>
<td><input type="text" name="bi_NO3"  style="width:450px"  id="prescripteur"></td>
<td><0,5 mg/L</td>
</tr>
<tr><td>ACB:Acide bilaire</td>
<td><input type="text" name="bi_ACB"  style="width:450px"  id="prescripteur"></td>
<td><1,50 g/L</td>
</tr>
<tr><td>AU:Acide Unique</td>
<td><input type="text" name="bi_AU"  style="width:450px"  id="prescripteur"></td>
<td>40-60 g/L</td>
</tr>
<tr><td>Créatinémie</td>
<td><input type="text" name="bi_CRE"  style="width:450px"  id="prescripteur"></td>
<td>6-16 mg/L</td>
</tr>
<tr><td>Créatinurie</td>
<td><input type="text" name="bi_CREAT"  style="width:450px"  id="prescripteur"></td>
<td>H:15-25 mg/Kg/24</td>
</tr>

<tr><td>FRY:frustosamine</td>
<td><input type="text" name="bi_FRY"  style="width:450px"  id="prescripteur"></td>
<td></td>
</tr>
<tr><td>LAC:lactate</td>
<td><input type="text" name="bi_Lactate"  style="width:450px"  id="prescripteur"></td>
<td></td>
</tr>
<tr><td>URE:Urée</td>
<td><input type="text" name="bi_URE"  style="width:450px"  id="prescripteur"></td>
<td>0,1-0,5g/L</td>
</tr>
<tr><td>GOT/ASAT</td>
<td><input type="text" name="bi_GOTASAT"  style="width:450px"  id="prescripteur"></td>
<td>H:7-40;F;5-30UI/L</td>
</tr>
<tr><td>GPT/ALAT</td>
<td><input type="text" name="bi_GPTALAT"  style="width:450px"  id="prescripteur"></td>
<td>H:7-50;F;2-40UI/Ll</td>
</tr>
<tr><td>Amy:Amylasémie</td>
<td><input type="text" name="bi_ANY"  style="width:450px"  id="prescripteur"></td>
<td>30-40 mg/L</td>
</tr>
<tr><td>PRU:Poteinune</td>
<td><input type="text" name="bi_CPK"  style="width:450px"  id="prescripteur"></td>
<td><95 UI/L</td>
</tr>

<tr><td>CPK</td>
<td><input type="text" name="bi_GGT"  style="width:450px"  id="prescripteur"></td>
<td>H:0-195/F:0-170 UI</td>
</tr>
<tr><td>GGT</td>
<td><input type="text" name="bi_LDH"  style="width:450px"  id="prescripteur"></td>
<td><240 UI/L</td>
</tr>
<tr><td>LDH</td>
<td><input type="text" name="bi_Lipase"  style="width:450px"  id="prescripteur"></td>
<td>5-36 UI/L</td>
</tr>
<tr><td>Lipase</td>
<td><input type="text" name="bi_CA"  style="width:450px"  id="prescripteur"></td>
<td><250 u.lip/L</td>
</tr>
<tr><td>Calcium (Ca 2+)</td>
<td><input type="text" name="bi_CL"  style="width:450px"  id="prescripteur"></td>
<td>90-104 mg/L</td>
</tr>
<tr><td>Chlore</td>
<td><input type="text" name="bi_CL"  style="width:450px"  id="prescripteur"></td>
<td>3,5-3,9 g/L</td>
</tr>
<tr><td>Magnésium(Mg 2+)</td>
<td><input type="text" name="bi_MG"  style="width:450px"  id="prescripteur"></td>
<td>17-0,21 g/L</td>
</tr>

<tr><td>Potassium(K+)</td>
<td><input type="text" name="bi_K"  style="width:450px"  id="prescripteur"></td>
<td>0,15-0,2 g/L</td>
</tr>
<tr><td>Sodium (Na+)</td>
<td><input type="text" name="bi_NA"  style="width:450px"  id="prescripteur"></td>
<td>3,15 -3,47 g/L</td>
</tr>
<tr><td>Date rendue</td>
<td><input type="text" name="bi_daterendue_d"  style="width:50px"  id="prescripteur" >
<input type="text" name="bi_daterendue_m"  style="width:100px"  id="prescripteur" >
<input type="text" name="bi_daterendue_y"  style="width:100px"  id="prescripteur" ></td>

</tr>
</table>
<footer class="col-md-offset-4" style="margin-top:35px">
	
<button  class="btn btn-info" style="width:110px"  type="submit"><span class="glyphicon glyphicon-ok-sign" ></span> Enregistrer</button>
<button  class="btn " style="width:110px" href="supprimer.php"><span class="glyphicon glyphicon-remove-sign" ></span> <a href="supprimer.php">Supprimer</a></button>
<button  class="btn btn-primary" style="width:110px"><span class="glyphicon glyphicon-plus-sign" ></span> Nouveau</button>
</footer>
</form>


	</div>

	
	
	<script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php ob_flush();?>
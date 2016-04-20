
<nav class="navbar navbar-default col-md-offset-2 col-md-10">
	<ul class="nav navbar-nav">
	
	
	<li><a href="nouveau_dossier.php">Nouveau dossier</a></li>
	<li><a href="biochimie.php">Biochimie</a></li>
	<li><a href="numerationcd3cd4cd8.php">Numération CD4</a></li>
	<li><a href="serologie.php">Sérologie</a></li>
	<li><a href="chargevirale.php">Charge Virale</a></li>
	<li><a href="grossesse.php">Grossesse</a></li>
	</ul>	
	<form class="navbar-form" action="../modele/nav.php" method="post">
			<input type="text" class="input-sm form-control" style="width:100px" placeholder="Recherche dossier" name="pa_dossier">
			<button class="btn btn-primary btn-sm" type="submit">
					<span class="glyphicon glyphicon-search">Chercher
					</span>
			</button>
	</form>
	</nav>
	<ul class="nav nav-pills nav-stacked col-md-2">
	
	
	<li><a href="courbe.php" data-toogle="tab">Evolution</a></li>
	<li><a href="infos_patient.php" data-toogle="tab">Recherche</a></li>
	<li><a href="../modele/biochimie_list.php" data-toogle="tab">Biochimie</a></li>
	<li><a href="../modele/numerationlcd3cd4cd8_list.php" data-toogle="tab">Numération</a></li>
	<li><a href="../modele/serologie_list.php" data-toogle="tab">Sérologie</a></li>
	<li><a href="../modele/chargevirale_list.php" data-toogle="tab">Charge Virale</a></li>
	<li><a href="../modele/grossesse_list.php" data-toogle="tab">Grossesse</a></li>
		
	<li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Extraction<span class="caret"></span>
    </a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="../vue/extraction.php">Technique</a></li>
    <li><a href="../vue/patient_search.php">Patient</a></li>
   
  </ul>
  </li>
  

	</ul>
	
	
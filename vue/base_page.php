<?php
 session_start();
 ?>
<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="projet" class="btn btn-primary" style="width:200px" type="button"> Programme/Projet
	</label>
</span>	<select  name="pr_numero" id="pr_numero" class="form-control col-md-1"><?php include ('../modele/projet.php');?>
</select>
	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="laboratoire" class="btn btn-primary" style="width:200px"  type="button"> N° Laboratoire
	</label>
</span>	<input type="text" name="laboratoire"  class="form-control" id="laboratoire" placeholder="<?php echo $_SESSION['pa_dossier']; ?>">

	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="dossier" class="btn btn-primary" style="width:200px"  type="button" > N ° dossier
	</label>
</span>	<input type="text" name="dossier"  class="form-control" id="dossier" placeholder="<?php echo $_SESSION['pa_dossier']; ?>">

	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="nom" class="btn btn-primary" style="width:200px"  type="button" > Nom
	</label>
</span>	<input type="text" name="nom"  class="form-control" id="nom" placeholder="<?php echo $_SESSION['pa_nom']; ?>">

	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="prenoms" class="btn btn-primary" style="width:200px"  type="button"> Prénoms
	</label>
</span>	<input type="text" name="prenoms"  class="form-control" id="prenoms" placeholder="<?php echo $_SESSION['pa_prenom']; ?>">

	</div>
	
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="age" class="btn btn-primary" style="width:200px"  type="button"> Age
	</label>
</span>	<input type="text" name="age"  class="form-control" id="age" placeholder="<?php echo $_SESSION['pa_age']; ?>">

	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="sexe" class="btn btn-primary" style="width:200px"  type="button"> Sexe
	</label>
</span>	<input type="text" name="sexe"  class="form-control" id="sexe" value="<?php echo $_SESSION['pa_sexe']; ?>" placeholder="<?php echo $_SESSION['pa_sexe']; ?>">

	</div>
	
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	
	<label for="nationalite" class="btn btn-primary" style="width:200px"  type="button"> Nationalité
	</label>
</span>	<input type="text" name="nationalite"  class="form-control" id="nationalite" value="<?php echo $_SESSION['pa_nationalite']; ?>" placeholder="<?php echo $_SESSION['pa_nationalite']; ?>">

	</div>
	
	
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="adresse" class="btn btn-primary" style="width:200px"  type="button"> Adresse
	</label>
	</span>	<input type="text" name="adresse"  class="form-control" id="adresse" value="<?php echo $_SESSION['pa_adresse']; ?>" placeholder="<?php echo $_SESSION['pa_adresse']; ?>">

	</div>
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="dateprelevement_d" class="btn btn-primary" style="width:200px"  type="button"> Date prelevement
	</label>
	</span>	<span><input type="text" name="dateprelevement_d"  style="width:50px" class="form-control" id="dateprelevement_d">
<input type="text" name="dateprelevement_m"  class="form-control"  style="width:50px" id="dateprelevement_m" >
<input type="text" name="dateprelevement_y"  class="form-control"  style="width:60px" id="dateprelevement_y" ></span>
<span  class="input-group-btn">
	<label for="bilan" class="btn btn-primary" style="width:80px"  type="button">Bilan
	</label>
	</span>	<input type="text" name="bilan"  style="width:50px" class="form-control" id="bilan">
	<span  class="input-group-btn">
	<label for="prescripteur" class="btn btn-primary" style="width:115px"  type="button">Prescripteur
	</label>
	</span><!--<select  name="prescripteur" id="prescripteur" class="form-control" style="width:120px">//
</select>--><input type="text" name="prescripteur"  style="width:115px" class="form-control" id="prescripteur">
	<span  class="input-group-btn">
	<label for="service" class="btn btn-primary" style="width:65px"  type="button">Service
	</span>	<!--<select  name="service" id="service" class="form-control" style="width:130px">
</select>--><input type="text" name="service"  style="width:130px" class="form-control" id="service">

	</div>
	
	
	
	<div class="input-group col-md-12">
	<span  class="input-group-btn">
	<label for="bilan" class="btn btn-primary" style="width:200px"  type="button">Technique
	</label>
	
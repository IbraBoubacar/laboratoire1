
<?php

try 
{
$bdd=new PDO ('mysql:host=localhost;dbname=llaboratoire','root','vouzanou')  or die(print_r($bdd->errorInfo()));

}

catch (Exception $e)
{
	
	die ('Erreur:'.$e->getMessage());
ob_start();
}

?>


<page backtop="5%" backbottom="5%" backleft="5%" backright="5%">
<table style="width:100%"><tr><td><img src="../vue/images/crcf.png"/></td><td style="margin-left:50px"><div style="padding-left:10px;font-size:20px;font-weight:bold;margin-bottom:10px;">Centre Régional  de Recherche et Formation</div>
<div style="padding-left:40px;margin-bottom:10px;margin-bottom:10px;">Service des Maladies infectieuses et Tropicales</div>
<div style="padding-left:10px;font-size:15px;font-weight:bold;margin-bottom:10px;">Centre hospitalier National Universitaire de Fann</div>
<div style="padding-left:40px;margin-bottom:10px;margin-bottom:10px;">Tél:&nbsp;33 &nbsp;869 81 88 &nbsp; &nbsp; &nbsp; Fax:&nbsp;33 864 75 53 &nbsp;&nbsp;www.crcf.sn</div>
<div style="padding-left:10px;">**************************************************************************************</div>
</td></tr></table>
	<table style="width:100%">
	
<?php

$reponse=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,cv.cv_numero cv_numero,cv.cv_bilan bilan,cv.cv_service service,
cv.cv_prescripteur prescripteur,cv.cv_technique technique,cv.cv_unite unite,cv.cv_chargevirale chargevirale,cv.cv_conclusion conclusion,cv.cv_commentaire remarque,sv.sv_libelle service_libelle,ps.ps_nom prescripteur,th.th_libelle technique_libelle,
DAY(cv.cv_dateprelevement) AS jour_pre,MONTH(cv.cv_dateprelevement) AS mois_pre,YEAR(cv.cv_dateprelevement) AS annees_pre,
DAY(cv.cv_daterendue) AS jour_ren,MONTH(cv.cv_daterendue) AS mois_ren,YEAR(cv.cv_daterendue) AS annees_ren,pr_libelle libelle_projet
 FROM patient p 
 INNER JOIN chargevirale cv on p.pa_numero=cv.cv_dossier
 LEFT JOIN projet pr ON p.pr_numero=pr.pr_numero 
 LEFT JOIN service sv ON sv.sv_numero=cv.cv_service
 LEFT JOIN prescripteur ps ON ps.ps_numero=cv.cv_prescripteur
 LEFT JOIN  technique th ON th.th_numero=cv.cv_technique
 WHERE cv_numero=:cv_numero');
$reponse->execute(array('cv_numero'=>$_GET['page'])) or die(print_r($reponse->errorInfo()));
while ($donnees=$reponse->fetch())
{
 ?>	
 <tr>
		<td colspan="3" style="padding-left:150px;padding-bottom:20px;font-size:20px;font-weight:bold;">CHARGES VIRALES</td>
		
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Date prélévement:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['jour_pre'].'/'.$donnees['mois_pre'].'/'.$donnees['annees_pre'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Programme/Projet:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['libelle_projet'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Laboratoire:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['laboratoire'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Dossier:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['dossier'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Nom:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['nom'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Prénoms:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['prenom'];?></td>
	</tr>
	<tr>
<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Sexe:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['sexe'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Age:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['age'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Bilan:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['bilan'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Service:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['service_libelle'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Prescripteur:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['prescripteur'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Technique:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['technique_libelle'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Unités:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['unite'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'CV(cp/ml):'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['chargevirale'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Conclusion:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['conclusion'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Remarques:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['remarque'];?></td>
	</tr>
	<tr>
	<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Date rendue:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['jour_ren'].'/'.$donnees['mois_ren'].'/'.$donnees['annees_ren'];?></td>
	</tr>
	
	
<?php	

}
 $reponse->closeCursor();
?>	
	
	</table>


</page>

<?php

$content=ob_get_clean();

require ('html2pdf/html2pdf/html2pdf.class.php');

$pdf=new HTML2PDF('P','A4','fr','true','UTF-8');
$pdf->writeHTML($content);

$pdf->Output('liste.pdf');
?>

<?php
ob_start();
try 
{
$bdd=new PDO ('mysql:host=localhost;dbname=llaboratoire','root','vouzanou')  or die(print_r($bdd->errorInfo()));

}

catch (Exception $e)
{
	
	die ('Erreur:'.$e->getMessage());

}

?>

<page backtop="5%" backbottom="5%" backleft="5%" backright="5%">
<table style="width:100%"><tr><td><img src="../vue/images/crcf.png"/></td><td style="margin-left:50px"><div style="padding-left:10px;font-size:20px;font-weight:bold;margin-bottom:10px;">Centre Régional  de Recherche et Formation</div>
<div style="padding-left:40px;margin-bottom:10px;margin-bottom:10px;">Service des Maladies infectieuses et Tropicales</div>
<div style="padding-left:10px;font-size:15px;font-weight:bold;margin-bottom:10px;">Centre hospitalier National Universitaire de Fann</div>
<div style="padding-left:40px;margin-bottom:10px;margin-bottom:10px;">Tél:&nbsp;33 &nbsp;869 81 88 &nbsp; &nbsp; &nbsp; Fax:&nbsp;33 864 75 53 &nbsp;&nbsp;www.crcf.sn</div>
<div style="padding-left:10px;">**************************************************************************************</div>
</td></tr></table>
	<table>
	
	
	
<?php

$reponse=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,
sr.sr_numero sr_numero,sr.sr_service service,pr.pr_libelle libelle_projet,
sr.sr_prescripteur prescripteur,sr.sr_technique technique,sr.sr_conclusion conclusion,sv.sv_libelle service_libelle,sr.sr_hiv12 hiv12,sr.sr_bispot bispot,sr.sr_profil profil,
ps.ps_nom prescripteur,th.th_libelle technique_libelle,
DAY(sr.sr_dateprelevement) AS jour_pre,MONTH(sr.sr_dateprelevement) AS mois_pre,YEAR(sr.sr_dateprelevement) AS annees_pre,
DAY(sr.sr_daterendue) AS jour_ren,MONTH(sr.sr_daterendue) AS mois_ren,YEAR(sr.sr_daterendue) AS annees_ren
 FROM patient p 
 INNER JOIN serologie sr ON p.pa_numero=sr.sr_dossier
 LEFT JOIN projet pr ON p.pr_numero=pr.pr_numero 
 LEFT JOIN service sv ON sv.sv_numero=sr.sr_service
 LEFT JOIN prescripteur ps ON ps.ps_numero=sr.sr_prescripteur
 LEFT JOIN  technique th ON th.th_numero=sr.sr_technique
 WHERE sr_numero=:sr_numero');
$reponse->execute(array('sr_numero'=>$_GET['page'])) or die(print_r($reponse->errorInfo()));
while ($donnees=$reponse->fetch())
{
 ?>	
 <tr>
		<td colspan="3"><div  style="padding-left:150px;padding-bottom:20px;font-size:20px;font-weight:bold;">NUMERATION SEROLOGIE RETROVIRALE</div></td>
		
	</tr>
	<table>
	</table>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;">
		<?php echo 'Date prelevement:'  ?>
		</td>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;">
		<?php echo $donnees['jour_pre'].'/'.$donnees['mois_pre'].'/'.$donnees['annees_pre'];?>
		</td>
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
		<td colspan="3" style="padding-left:150px;padding-bottom:20px;font-size:15px;font-weight:bold;">RESULTATS</td>
		
	</tr>	
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Determine HIV 1/2:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['hiv12'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'ImmunoComb bispot:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['bispot'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Profil:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['profil'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Conclusion:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['conclusion'];?></td>
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
<page backtop="5%" backbottom="5%" backleft="5%" backright="5%">
<table style="width:100%"><tr><td><img src="../vue/images/crcf.png"/></td><td style="margin-left:50px"><div style="padding-left:10px;font-size:20px;font-weight:bold;margin-bottom:10px;">Centre Régional  de Recherche et Formation</div>
<div style="padding-left:40px;margin-bottom:10px;margin-bottom:10px;">Service des Maladies infectieuses et Tropicales</div>
<div style="padding-left:10px;font-size:15px;font-weight:bold;margin-bottom:10px;">Centre hospitalier National Universitaire de Fann</div>
<div style="padding-left:40px;margin-bottom:10px;margin-bottom:10px;">Tél:&nbsp;33 &nbsp;869 81 88 &nbsp; &nbsp; &nbsp; Fax:&nbsp;33 864 75 53 &nbsp;&nbsp;www.crcf.sn</div>
<div style="padding-left:10px;">**************************************************************************************</div>
</td></tr></table>
	<table style="width:100%">
	
	
	
<?php

$reponse=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,
sr.sr_numero sr_numero,sr.sr_service service,pr.pr_libelle libelle_projet,
sr.sr_prescripteur prescripteur,sr.sr_technique technique,sr.sr_conclusion conclusion,sv.sv_libelle service_libelle,sr.sr_hiv12 hiv12,sr.sr_bispot bispot,sr.sr_profil profil,sr.sr_aghbs determine,
sr.sr_vhc vhc,sr.sr_vhb vhb,sr.sr_conclusion_sr conclusion_ag,sr.sr_vhb vhb,sr.sr_vhc vhc,
ps.ps_nom prescripteur,th.th_libelle technique_libelle,
DAY(sr.sr_dateprelevement) AS jour_pre,MONTH(sr.sr_dateprelevement) AS mois_pre,YEAR(sr.sr_dateprelevement) AS annees_pre,
DAY(sr.sr_daterendue) AS jour_ren,MONTH(sr.sr_daterendue) AS mois_ren,YEAR(sr.sr_daterendue) AS annees_ren
 FROM patient p 
 INNER JOIN serologie sr ON p.pa_numero=sr.sr_dossier
 INNER JOIN projet pr ON p.pr_numero=pr.pr_numero 
 INNER JOIN service sv ON sv.sv_numero=sr.sr_service
 INNER JOIN prescripteur ps ON ps.ps_numero=sr.sr_prescripteur
 LEFT JOIN  technique th ON th.th_numero=sr.sr_technique
 WHERE sr_numero=:sr_numero');
$reponse->execute(array('sr_numero'=>$_GET['page'])) or die(print_r($reponse->errorInfo()));
while ($donnees=$reponse->fetch())
{
 ?>	
 
  <tr>
		<td colspan="3" style="padding-left:150px;padding-bottom:20px;font-size:20px;font-weight:bold;">RESULTATS SEROLOGIE HEPATHITE B ET C</td>
		
	</tr>
	
 
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Date prelevement:'  ?></td>
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
		<td colspan="3" style="padding-left:150px;padding-bottom:20px;font-size:15px;font-weight:bold;">RESULTATS</td>
		
	</tr>	
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Determine Aghbs:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['determine'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'VHC:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['vhc'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'VHB:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['vhb'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Conclusion:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['conclusion_ag'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:20px;padding-right:10px;font-weight:bold;"><?php echo 'Date rendue:'  ?></td>
		<td style="padding-bottom:20px;padding-right:10px;"><?php echo $donnees['jour_ren'].'/'.$donnees['mois_ren'].'/'.$donnees['annees_ren'];?></td>
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
ob_flush();
?>

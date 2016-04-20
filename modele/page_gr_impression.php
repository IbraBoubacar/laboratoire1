<?php
ob_start();
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

$reponse=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,gr.gr_numero gr_numero,gr.gr_bilan bilan,gr.gr_service service,
gr.gr_prescripteur prescripteur,gr.gr_technique technique,gr.gr_proteine,gr.gr_test,gr.gr_daterendue,gr.gr_glucose,gr.gr_leucocyte,gr.gr_hematie,sv.sv_libelle service_libelle,ps.ps_nom prescripteur,th.th_libelle technique_libelle,
DAY(gr.gr_dateprelevement) AS jour_pre,MONTH(gr.gr_dateprelevement) AS mois_pre,YEAR(gr.gr_dateprelevement) AS annees_pre,gr.gr_technique technique,
DAY(gr.gr_daterendue) AS jour_ren,MONTH(gr.gr_daterendue) AS mois_ren,YEAR(gr.gr_daterendue) AS annees_ren,pr_libelle libelle_projet
 FROM patient p 
 INNER JOIN grossesse gr on p.pa_numero=gr.gr_dossier
 LEFT JOIN projet pr ON p.pr_numero=pr.pr_numero 
 LEFT JOIN service sv ON sv.sv_numero=gr.gr_service
 LEFT JOIN prescripteur ps ON ps.ps_numero=gr.gr_prescripteur
 LEFT JOIN  technique th ON th.th_numero=gr.gr_technique
 WHERE gr_numero=:gr_numero');
$reponse->execute(array('gr_numero'=>$_GET['page'])) or die(print_r($reponse->errorInfo()));
while ($donnees=$reponse->fetch())
{
 ?>	
 <tr>
		<td colspan="3"><div  style="padding-left:150px;padding-bottom:20px;font-size:20px;font-weight:bold;">RESULTATS TEST DE GROSSESSE ET BANDELETTES</div>
		<div  style="padding-left:300px;padding-bottom:20px;font-size:20px;font-weight:bold;">URINAIRES</div></td>
		
	</tr>
	</table>
	<table>
 
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
	</table>
	<table>
	<tr>
		<td colspan="3"><div  style="padding-left:170px;padding-bottom:20px;font-size:20px;font-weight:bold;">EXAMENS DEMANDES</div></td>
		</tr>
		<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;">Bandelettes urinaires:</td>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;">Protéine:</td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['gr_proteine'];?></td>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;">[unités mg/dl]</td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"></td>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;">Glucose:</td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['gr_proteine'];?></td>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"></td>
	</tr>
	</table>
	<table>
	<tr><td colspan="2"><div  style="padding-left:170px;padding-bottom:20px;font-size:20px;font-weight:bold;">BANDELETTES URINAIRES URISTIX</div></td></tr>
	
	</table>
	<table>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Test de grossesse urinaire:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['gr_test'];?></td>
	</tr>
	
	<tr>
	<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;">Leucocyte:</td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['gr_leucocyte'];?></td>
		</tr>
		<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Hémathie:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['gr_hematie'];?></td>
	</tr>
	</table>
	<table>	
	
	<table>
	<tr><td colspan="2"><div  style="padding-left:170px;padding-bottom:20px;font-size:20px;font-weight:bold;">FORMAT Cassettes de PHARMA D13</div></td></tr>
	</table>
	<table>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Date de prélévement et de technique:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['jour_pre'].'/'.$donnees['mois_pre'].'/'.$donnees['annees_pre'];?></td>
	</tr>
	<tr>
		<td style="padding-bottom:10px;padding-right:10px;font-weight:bold;"><?php echo 'Date rendue:'  ?></td>
		<td style="padding-bottom:10px;padding-right:10px;"><?php echo $donnees['jour_ren'].'/'.$donnees['mois_ren'].'/'.$donnees['annees_ren'];?></td>
	</tr>
	
	
	</table>
	
	
	
	
	
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

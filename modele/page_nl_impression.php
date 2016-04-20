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
<div style="padding-left:40px;margin-bottom:10px;margin-bottom:10px;">Tél:&nbsp;33869 81 88 &nbsp; &nbsp; &nbsp; Fax:&nbsp;33 864 75 53 &nbsp;&nbsp;www.crcf.sn</div>
<div style="padding-left:10px;">**************************************************************************************</div>
</td></tr></table>

	<table style="width:100%;margin-top:50px;">
	<tr>
		<td style="padding-left:150px;padding-bottom:20px;font-weight:bold;font-size:20px;text-align:center">NUMERATION LYMPHOCYTAIRE CD3,CD4,CD8</td>
		
	</tr>
	</table>
	<table>

	
	
<?php

$reponse=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,
nl.nl_numero nl_numero,nl.nl_bilan bilan,nl.nl_service service,
nl.nl_prescripteur prescripteur,nl.nl_technique technique,nl.nl_unite unite,nl.nl_conclusion conclusion,nl.nl_remarque remarque,sv.sv_libelle service_libelle,
ps.ps_nom prescripteur,th.th_libelle technique_libelle,nl.nl_unite unite,nl.nl_norme norme,nl.nl_cd4 cd4,nl.nl_cd8 cd8,nl.nl_cd3 cd3,nl.nl_rapport rapport,
DAY(nl.nl_dateprelevement) AS jour_pre,MONTH(nl.nl_dateprelevement) AS mois_pre,YEAR(nl.nl_dateprelevement) AS annees_pre,
DAY(nl.nl_daterendue) AS jour_ren,MONTH(nl.nl_daterendue) AS mois_ren,YEAR(nl.nl_daterendue) AS annees_ren,pr_libelle libelle_projet
 FROM patient p 
 INNER JOIN numerationlcd3cd4cd8 nl on p.pa_numero=nl.nl_dossier
 LEFT JOIN projet pr ON p.pr_numero=pr.pr_numero 
 LEFT JOIN service sv ON sv.sv_numero=nl.nl_service
 LEFT JOIN prescripteur ps ON ps.ps_numero=nl.nl_prescripteur
 LEFT JOIN  technique th ON th.th_numero=nl.nl_technique
 WHERE nl_numero=:nl_numero');
$reponse->execute(array('nl_numero'=>$_GET['page'])) or die(print_r($reponse->errorInfo()));

while ($donnees=$reponse->fetch())
{
 ?>	

	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Date prélévement:'  ?></td>
		<td><?php echo $donnees['jour_pre'].'/'.$donnees['mois_pre'].'/'.$donnees['annees_pre'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Programme/Projet:'  ?></td>
		<td><?php echo $donnees['libelle_projet'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Laboratoire:'  ?></td>
		<td><?php echo $donnees['laboratoire'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;" ><?php echo 'Dossier:'  ?></td>
		<td><?php echo $donnees['dossier'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Nom:'  ?></td>
		<td><?php echo $donnees['nom'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Prénoms:'  ?></td>
		<td><?php echo $donnees['prenom'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Sexe:'  ?></td>
		<td><?php echo $donnees['sexe'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Age:'  ?></td>
		<td><?php echo $donnees['age'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Bilan:'  ?></td>
		<td><?php echo $donnees['bilan'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Service:'  ?></td>
		<td><?php echo $donnees['service_libelle'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Prescripteur:'  ?></td>
		<td><?php echo $donnees['prescripteur'];?></td>
	</tr>
	<tr>
		<td style="font-weight:bold;"><?php echo 'Technique:'  ?></td>
		<td><?php echo $donnees['technique_libelle'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Unités:'  ?></td>
		<td><?php echo $donnees['unite'];?></td>
	</tr>
	<tr>
		<td colspan="2" style="padding-left:150px;padding-bottom:20px;font-weight:bold;text-align:center;font-size:20px;">Résultats</td>
		
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Norme:' ?></td>
		<td><?php echo $donnees['norme'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'CD4/mm3:'  ?></td>
		<td><?php echo $donnees['cd4'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'cd8:'  ?></td>
		<td><?php echo $donnees['cd8'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'CD3/mm3:'  ?></td>
		<td><?php echo $donnees['cd3'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'CD4/cd8:'  ?></td>
		<td><?php echo $donnees['rapport'];?></td>
	</tr>
	
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Conclusion:'  ?></td>
		<td><?php echo $donnees['conclusion'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Remarques:'  ?></td>
		<td><?php echo $donnees['remarque'];?></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Date rendue:'  ?></td>
		<td><?php echo $donnees['jour_ren'].'/'.$donnees['mois_ren'].'/'.$donnees['annees_ren'];?></td>
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

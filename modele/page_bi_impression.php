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
<page backtop="5%" backbottom="5%" backleft="2%" backright="10%">
<table style="width:100%"><tr><td><img src="../vue/images/crcf.png" /></td><td style="margin-left:50px"><div style="padding-left:10px;font-size:20px;font-weight:bold;margin-bottom:10px;">Centre Régional  de Recherche et Formation</div>
<div style="padding-left:40px;margin-bottom:5px;">Service des Maladies infectieuses et Tropicales</div>
<div style="padding-left:10px;font-size:15px;font-weight:bold;margin-bottom:10px;">Centre hospitalier National Universitaire de Fann</div>
<div style="padding-left:40px;margin-bottom:10px;">Tél:&nbsp;33869 81 88 &nbsp; &nbsp; &nbsp; Fax:&nbsp;33 864 75 53 &nbsp;&nbsp;www.crcf.sn</div>
<div style="padding-left:10px;">**************************************************************************************</div>
</td></tr></table>
	<table style="border-collapse:collapse;margin-top:10px;">
<?php
	$reponse=$bdd->prepare('SELECT p.pa_dossier dossier,p.pa_numero numero,p.pr_numero projet,p.pa_laboratoire laboratoire,p.pa_nom nom,p.pa_prenom prenom,p.pa_sexe sexe,p.pa_age age,bi.bi_dossier dossier,
bi.bi_bilan bilan,bi.bi_service service,bi.bi_prescripteur prescripteur,bi.bi_PAL PAL,bi.bi_BID BID,bi.bi_B1T B1T,bi.bi_CHO CHO,bi.bi_Fe Fe,bi.bi_Gly Gly,bi.bi_HDL HDL,bi.bi_LDL LDL,bi.bi_PRO PRO,bi.bi_PHO PHO,
bi.bi_PRU PRU,bi.bi_Tri Tri,bi.bi_CO2 CO2,bi.bi_NO3 NO3,bi.bi_ACB ACB,bi.bi_AU AU,bi.bi_CRE CRE,
bi.bi_CREAT CREAT,bi.bi_FRY FRY,bi.bi_Lactate Lactate,bi.bi_URE URE,bi.bi_GOTASAT GOTASAT,bi.bi_GPTALAT GPTALAT,bi.bi_ANY ANY,bi.bi_CPK CPK,bi.bi_GGT GGT,bi.bi_LDH LDH,bi.bi_Lipase Lipase,
bi.bi_CA CA,bi.bi_CL CL,bi.bi_MG MG,bi.bi_K K,bi.bi_NA NA,bi.bi_technique technique,
sv.sv_libelle service_libelle,ps.ps_nom prescripteur,th.th_libelle technique_libelle,
DAY(bi.bi_dateprelevement) AS jour_pre,MONTH(bi.bi_dateprelevement) AS mois_pre,YEAR(bi.bi_dateprelevement) AS annees_pre,
DAY(bi.bi_daterendue) AS jour_ren,MONTH(bi.bi_daterendue) AS mois_ren,YEAR(bi.bi_daterendue) AS annees_ren,pr.pr_libelle libelle_projet
 FROM patient p 
 INNER JOIN biochimie bi on p.pa_numero=bi.bi_dossier
 LEFT JOIN projet pr ON p.pr_numero=pr.pr_numero 
 LEFT JOIN service sv ON sv.sv_numero=bi.bi_service
 LEFT JOIN prescripteur ps ON ps.ps_numero=bi.bi_prescripteur
 LEFT JOIN  technique th ON th.th_numero=bi.bi_technique
 WHERE bi_numero=:bi_numero');
$reponse->execute(array('bi_numero'=>$_GET['page'])) or die(print_r($reponse->errorInfo()));
while ($donnees=$reponse->fetch())
{
 ?>	
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Date prélévement:'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['jour_pre'].'/'.$donnees['mois_pre'].'/'.$donnees['annees_pre'];?></td>
		<td style="padding:5px 5px 5px 5px;border:1px solid black;margin-left:100px;">Test</td>
		<td style="padding:5px 5px 5px 5px;border:1px solid black;margin-left:100px;">Résultats</td>
		<td style="padding:5px 5px 5px 5px;border:1px solid black;border-right:1px solid black;">Normes</td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Programme/Projet:'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['libelle_projet'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">PAL:Phosphatase</td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['PAL'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">100-300 UI/L</td>
		
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Laboratoire:'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['laboratoire'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">BID:Bili Directe</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['BID'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">2mg/l</td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Dossier:'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['dossier'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">BIT:Bili indirecte</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['B1T'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"></td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;" ><?php echo 'Nom:'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['nom'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">CHO:Cholesterol</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['CHO'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">0.96-2.70 g/L</td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Prénoms:'  ?></td>
	 <td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['prenom'];?></td>
	 <td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">Fe:Fer</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['Fe'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">1,0-1,2 mg/L</td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Sexe:'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['sexe'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">Gly:Glycémie</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['Gly'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">0,74-1,10g/L</td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Age:'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['age'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">HDL:HDLchol</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['HDL'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">0,40-0,70g/L</td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Bilan:'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['bilan'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">LDL:Ldlchol</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['LDL'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">1,50 g/L</td>
	</tr>
	<tr>
		<td style="padding:5px 5px 5px 5px;font-weight:bold;"><?php echo 'Service:'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['service_libelle'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">PRO:Protéinémie</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['PRO'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">61-76g/l</td>
	</tr>
	<tr>
		<td style="font-weight:bold;padding:5px 5px 5px 5px;"><?php echo 'Prescripteur:'  ?></td>
		<td style="padding:5px 10px 5px 5px;border-right:1px solid black;"><?php echo $donnees['prescripteur'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">PHO:Phosphore</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['PHO'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">30-40 mg/L</td>
	</tr>
	<tr>
		<td style="font-weight:bold;padding:5px 5px 5px 5px;"><?php echo 'Technique'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['technique'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">PRU:Poteinune</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['PRU'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">154 mg/L</td>
	</tr>
	<tr>
		<td style="font-weight:bold;padding:5px 5px 5px 5px;"><?php echo 'Date rendue'  ?></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"><?php echo $donnees['jour_ren'].'/'.$donnees['mois_ren'].'/'.$donnees['annees_ren'];?></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">Tri:Triglyceride</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['Tri'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">0,4-1,65 g/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;padding:5px 5px 5px 5px;"></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">CO2:Bicarbonate</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['CO2'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">21-26mmol/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="padding:5px 5px 5px 5px;border-right:1px solid black;"></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">NO3:Amoniac</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['NO3'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">0,5 mg/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">ACB:Acide bilaire</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['ACB'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">1,50 g/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">AU:Acide Unique</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['AU'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">40-60 g/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">Créatinémie</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['CRE'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">6-16 mg/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">Créatinurie</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['CREAT'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">H:15-25mg/Kg/24</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">FRY:frustosamine</td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['FRY'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"></td>
	</tr>
	
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">LAC:lactate</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['Lactate'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"></td>
	</tr>
	
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">URE:Urée</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['URE'];?></td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;">0,1-0,5g/L</td>
	</tr>
	
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">GOT/ASAT</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['GOTASAT'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">H:7-40;F;5-30UI/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">GPT/ALAT</td>
<td style="padding:5px 5px 5px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['GPTALAT'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">H:7-50;F;2-40UI/Ll</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">Amy:Amylasémie</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['ANY'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">95 UI/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">CPK</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['CPK'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">H:0-195/F:0-170 UI</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">GGT</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['GGT'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">5-36 UI/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">LDH</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['LDH'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">250 u.lip/l</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">Lipase</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['Lipase'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">250 UI/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">Calcium(Ca2+)</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['CA'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">90-104 mg/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">Chlore</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['CL'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">3,5-3,9 g/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">Magnésium(Mg2+)</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['MG'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">17-0,21 g/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">Potassium(K +)</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;"><?php echo $donnees['K'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;">0,15-0,2 g/L</td>
	</tr>
	<tr>
		<td></td>
		<td style="border-right:1px solid black;"></td>
		<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;">Sodium(Na +)</td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;"><?php echo $donnees['NA'];?></td>
<td style="padding:2px 5px 2px 5px;border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;">3,15 -3,47 g/L</td>
	</tr>
<?php	

}
 $reponse->closeCursor();
?>	
	
	</table>
	
</page>
<page_footer>
</page_footer>



<?php

$content=ob_get_clean();
require ('html2pdf/html2pdf/html2pdf.class.php');
$pdf=new HTML2PDF('P','A4','fr','true','UTF-8');
$pdf->writeHTML($content);
$pdf->Output('liste.pdf');
ob_flush();
?>

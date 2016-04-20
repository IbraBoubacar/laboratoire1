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
 INNER JOIN projet pr ON p.pr_numero=pr.pr_numero 
 INNER JOIN service sv ON sv.sv_numero=bi.bi_service
 INNER JOIN prescripteur ps ON ps.ps_numero=bi.bi_prescripteur
 LEFT JOIN  technique th ON th.th_numero=bi.bi_technique
 WHERE bi_numero=:bi_numero');
$reponse->execute(array('bi_numero'=>$_GET['page'])) or die(print_r($reponse->errorInfo()));
while ($donnees=$reponse->fetch())
{
 ?>	
	<tr>
		<td style="margin-left:50px"><?php echo 'Date prélévement'  ?></td>
		<td><?php echo $donnees['jour_pre'].'/'.$donnees['mois_pre'].'/'.$donnees['annees_pre'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Programme/Projet'  ?></td>
		<td><?php echo $donnees['libelle_projet'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Laboratoire'  ?></td>
		<td><?php echo $donnees['laboratoire'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Dossier'  ?></td>
		<td><?php echo $donnees['dossier'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Nom'  ?></td>
		<td><?php echo $donnees['nom'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Prénoms'  ?></td>
		<td><?php echo $donnees['prenom'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Sexe'  ?></td>
		<td><?php echo $donnees['sexe'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Age'  ?></td>
		<td><?php echo $donnees['age'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Bilan'  ?></td>
		<td><?php echo $donnees['bilan'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Service'  ?></td>
		<td><?php echo $donnees['service_libelle'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Prescripteur'  ?></td>
		<td><?php echo $donnees['prescripteur'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Technique'  ?></td>
		<td><?php echo $donnees['technique_libelle'];?></td>
	</tr>
	<tr>
		<td style="margin-left:50px"><?php echo 'Date rendue'  ?></td>
		<td><?php echo $donnees['jour_ren'].'/'.$donnees['mois_ren'].'/'.$donnees['annees_ren'];?></td>
	</tr>
<tr><td>PAL:Phosphatase</td>
<td><?php echo $donnees['PAL'];?></td>
<td>100-300 UI/L</td>
</tr>
<tr><td>BID:Bili Directe</td>
<td><?php echo $donnees['BID'];?></td>
<td><2mg/l</td>
</tr>
<tr><td>BID:Bili Indiirecte</td>
<td><?php echo $donnees['B1T'];?></td>
<td><2mg/l</td>
</tr>
<tr><td>CHO:Cholesterol total</td>
<td><?php echo $donnees['CHO'];?></td>
<td><0.96-2.70 g/L</td>
</tr>
<tr><td>Fe:Fer</td>
<td><?php echo $donnees['Fe'];?></td>
<td><1,0-1,2 mg/L</td>
</tr>
<tr><td>Gly:Glycémie</td>
<td><?php echo $donnees['Gly'];?></td>
<td>0,74-1,10g/L</td>
</tr>
<tr><td>HDL:HDLchol</td>
<td><?php echo $donnees['HDL'];?></td>
<td>0,40-0,70g/L</td>
</tr>
<tr><td>LDL:Ldlchol</td>
<td><?php echo $donnees['LDL'];?></td>
<td><1,50 g/L</td>
</tr>
<tr><td>PRO:Protéinémie</td>
<td><?php echo $donnees['PRO'];?></td>
<td>61-76g/l</td>
</tr>
<tr><td>PHO:Phosphore</td>
<td><?php echo $donnees['PHO'];?></td>
<td>30-40 mg/L</td>
</tr>
<tr><td>PRU:Poteinune</td>
<td><?php echo $donnees['PRU'];?></td>
<td><154 mg/L</td>
</tr>
<tr><td>Tri:Triglycerides</td>
<td><?php echo $donnees['Tri'];?></td>
<td>0,4-1,65 g/L</td>
</tr>
<tr><td>CO2:Bicarbonate</td>
<td><?php echo $donnees['CO2'];?></td>
<td>21-26mmol/L</td>
</tr>
<tr><td>NO3:Amoniac</td>
<td><?php echo $donnees['NO3'];?></td>
<td><0,5 mg/L</td>
</tr>
<tr><td>ACB:Acide bilaire</td>
<td><?php echo $donnees['ACB'];?></td>
<td><1,50 g/L</td>
</tr>
<tr><td>AU:Acide Unique</td>
<td><?php echo $donnees['AU'];?></td>
<td>40-60 g/L</td>
</tr>
<tr><td>Créatinémie</td>
<td><?php echo $donnees['CRE'];?></td>
<td>6-16 mg/L</td>
</tr>
<tr><td>Créatinurie</td>
<td><?php echo $donnees['CREAT'];?></td>
<td>H:15-25 mg/Kg/24</td>
</tr>
<tr><td>FRY:frustosamine</td>
<td><?php echo $donnees['FRY'];?></td>
<td></td>
</tr>
<tr><td>LAC:lactate</td>
<td><?php echo $donnees['Lactate'];?></td>
<td></td>
</tr>
<tr><td>URE:Urée</td>
<td><?php echo $donnees['URE'];?></td>
<td>0,1-0,5g/L</td>
</tr>
<tr><td>GOT/ASAT</td>
<td><?php echo $donnees['GOTASAT'];?></td>
<td>H:7-40;F;5-30UI/L</td>
</tr>
<tr><td>GPT/ALAT</td>
<td><?php echo $donnees['GPTALAT'];?></td>
<td>H:7-50;F;2-40UI/Ll</td>
</tr>
<tr><td>Amy:Amylasémie</td>
<td><?php echo $donnees['ANY'];?></td>
<td><95 UI/L</td>
</tr>
<tr><td>CPK</td>
<td><?php echo $donnees['CPK'];?></td>
<td>H:0-195/F:0-170 UI</td>
</tr>
<tr><td>GGT</td>
<td><?php echo $donnees['CGT'];?></td>
<td>5-36 UI/L</td>
</tr>
<tr><td>LDH</td>
<td><?php echo $donnees['LDH'];?></td>
<td><250 u.lip/l</td>
</tr>
<tr><td>Lipase</td>
<td><?php echo $donnees['Lipase'];?></td>
<td><250 UI/L</td>
</tr>
<tr><td>Calcium (Ca 2+)</td>
<td><?php echo $donnees['CA'];?></td>
<td>90-104 mg/L</td>
</tr>
<tr><td>Chlore</td>
<td><?php echo $donnees['CL'];?></td>
<td>3,5-3,9 g/L</td>
</tr>
<tr><td>Magnésium(Mg 2+)</td>
<td><?php echo $donnees['MG'];?></td>
<td>17-0,21 g/L</td>
</tr>
<tr><td>Potassium(K+)</td>
<td><?php echo $donnees['K'];?></td>
<td>0,15-0,2 g/L</td>
</tr>
<tr><td>Sodium (Na+)</td>
<td><?php echo $donnees['NA'];?></td>
<td>3,15 -3,47 g/L</td>
</tr>
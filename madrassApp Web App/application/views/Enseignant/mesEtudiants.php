<pre>
<?php  	if ( isset($mesetudz) ) {
	print_r($mesetudz); }


if ( isset($nozDet) ) {
	?>

<table>
<tr><th>Filiere</th>
	<th>Annee</th>
	<th>Matiere</th>
	<th>Enseignant</th>
	<th>Nombre d'heure</th>
 </tr>
    
<?php foreach ($nozDet as $data): ?>
<tr><td><?= $data['nomFiliere'] ?></td>
	<td><?= $data['annee'] ?></td>
	
	<td><?= $data['nomMatiere'] ?></td>
	<td><?= $data['nomTeacher'] ?></td>
	<td><?= $data['nb_heures'] ?></td>
</tr>
<?php endforeach; ?>
    </table>
 

	<?php
}

 ?>



<?php  //	print_r($noznotes); 


if ( isset($nozFili) ) { ?>

<table>
<tr><th>Filiere</th>
	<th>Annee</th>
	<th>Matiere</th>
	<th>Nombre d'heure</th>
 </tr>
    
<?php foreach ($nozFili as $data): ?>
<tr><td><?= $data['annee'] ?></td>
	<td><?= $data['nomFiliere'] ?></td>
	<td><?= $data['nomMatiere'] ?></td>
	<td><?= $data['nb_heures'] ?></td>
</tr>
<?php endforeach; ?>
    </table>
 

	<?php
}

 ?>




<?php  if ( isset($myIntel) ) { 
	print_r($myIntel); 

	foreach ($myIntel as $data): ?>
<tr><td><?= $data['annee'] ?></td>
	<td><?= $data['idFiliere'] ?></td>

</tr>
<?php endforeach; 


}


 ?>





</pre>
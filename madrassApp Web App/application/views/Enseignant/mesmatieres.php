<pre>
<?php  //	print_r($nozFili); 
 //print_r($nozMatieres);

 ?>


<table>
<tr><th>Annee</th>
	<th>Filiere</th>
	
	<th>Matiere</th>
	<th>Nombre d'heure</th>
    
    

</tr>
    
<?php foreach ($nozMatieres as $data): ?>
<tr><td><?= $data['annee'] ?></td>
	<td><?= $data['nomFiliere'] ?></td>

 <td><?= $data['nomMatiere'] ?></td>
	<td><?= $data['nb_heures'] ?></td>     

</tr>
<?php endforeach; ?>
    

</table>
 

</pre>
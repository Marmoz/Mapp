<div class="container">


<h3><?= $noznotes[0]['nomStudent'] .' '. $noznotes[0]['prenomStudent'] ?></h3>

<table>
<tr>
	<th>AS</th>
    <th>Teacher</th>
    <th>Matiere</th>
    <th>Note S1</th>
    <th>Note S2</th>
    <th>Note Finale</th>
    



</tr>
<?php foreach ($noznotes as $manote): ?>
<tr>	
   <td><?= $manote['annee']-1 . '/' . $manote['annee']  ?></td> 
    <td><?= $manote['nomTeacher'] ?></td>

	<td><?= $manote['nomMatiere'] ?></td>
	<td><?= $manote['note_S1'] ?></td>
    <td><?= $manote['note_S2'] ?></td>
	<td><?= $manote['note_Finale'] ?></td>
	
	
    
 

</tr>
<?php endforeach; ?>
</table>

</div>
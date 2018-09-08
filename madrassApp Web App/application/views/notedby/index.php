
<div class="container">
 <h3>Liste des notes</h3>


<?php if(isset($successMessage)) {
    ?>
<div class="alert alert-success"><?= $successMessage ?></div>
   <?php }    ?>


<table>
<tr>
	<th>Student</th>
    <th>Teacher</th>
    <th>Matiere</th>
    <th>Note S1</th>
    <th>Note S2</th>
    <th>Note Finale</th>
    <th>AS</th>
    <th>Actions</th>
    <th>Actions</th>


</tr>
<?php foreach ($listnotes as $manote): ?>
<tr>	<td><?= $manote['nomStudent'] ?></td>
    	<td><?= $manote['nomTeacher'] ?></td>

	<td><?= $manote['nomMatiere'] ?></td>
	<td><?= $manote['note_S1'] ?></td>
    <td><?= $manote['note_S2'] ?></td>
	<td><?= $manote['note_Finale'] ?></td>
    <td><?= $manote['annee'] ?></td>
    <td>
        <a class="btn btn-danger" role="button" href="<?= base_url('Notedby/effacer') ?>/<?=$manote['idStudent'] ?>/<?=$manote['idTeacher'] ?>/<?=$manote['idMatiere'] ?>/<?=$manote['annee'] ?>"class="btn btn-warning">Supprimer la note</a><a class="btn btn-default" role="button" href="<?= base_url('Notedby/edit') ?>/<?=$manote['idStudent'] ?>/<?=$manote['idTeacher'] ?>/<?=$manote['idMatiere'] ?>/<?=$manote['annee'] ?>"class="btn btn-warning">Modifier la note</a>
    </td><td>
        <a href="<?=  base_url('Notedby/addnote') ?>/<?= $manote['idStudent'] ?>" class="btn btn-primary">Ajouter une note</a>
    </td>
           
            



</tr>
<?php endforeach; ?>
</table>

     

        <a class="btn btn-success" role="button" href="<?= base_url('notedby/addnote') ?>">Ajouter une note SOON</a>
</div>

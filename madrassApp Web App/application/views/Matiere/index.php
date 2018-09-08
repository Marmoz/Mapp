<div class="container">

<?php if(isset($successMessage)) { ?>
<div class="alert alert-success"><?= $successMessage ?></div>
   <?php } ?>
        

<h2>Liste des Matières</h2>
    
<table>
<tr>
	<th>Id matiere</th>
	<th>Nom Matiere</th>
    <th>Actions Admin</th>

</tr>
    
<?php foreach ($listmatieres as $lamatiere): ?>
<tr>
	<td><?= $lamatiere['idMatiere'] ?></td>
	<td><?= $lamatiere['nomMatiere'] ?></td>
    <td><a href="<?= base_url('matiere/delete') ?>/<?=$lamatiere['idMatiere'] ?>" class="btn btn-danger">Effacer une matière</a>
    <a href="<?= base_url('matiere/edit') ?>/<?=$lamatiere['idMatiere'] ?>" class="btn btn-default">Modifier une matière</a></td>
    


</tr>
<?php endforeach; ?>
    

</table>
    
    
            <a class="btn btn-success" role="button" href="<?= base_url('matiere/add') ?>">Ajouter une matiere</a>
            <a class="btn btn-primary" role="button" href="<?= base_url('comporte/index') ?>">Voir le détail</a>
            <a class="btn btn-primary" role="button" href="<?= base_url('comporte/add') ?>">Ajouter une matiere/filiere</a>

    
    </div>

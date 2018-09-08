<div class="container">

<?php if(isset($successMessage)) { ?>
<div class="alert alert-success"><?= $successMessage ?></div>
   <?php } ?>
        

<h2>Liste des Filières</h2>
    
<table>
<tr>
	<th>Id filiere</th>
	<th>Nom Filière</th>
    <th>Actions Admin</th>

</tr>
    
<?php foreach ($listfilieres as $lafiliere): ?>
<tr>
	<td><?= $lafiliere['idFiliere'] ?></td>
	<td><?= $lafiliere['nomFiliere'] ?></td>
    <td><a href="<?= base_url('filiere/delete') ?>/<?=$lafiliere['idFiliere'] ?>" class="btn btn-danger">Effacer une filiere</a>
    <a href="<?= base_url('filiere/edit') ?>/<?=$lafiliere['idFiliere'] ?>" class="btn btn-default">Modifier une filiere</a></td>
    


</tr>
<?php endforeach; ?>
    

</table>
    
    
            <a class="btn btn-success" role="button" href="<?= base_url('filiere/add') ?>">Ajouter une filiere</a>
            <a class="btn btn-primary" role="button" href="<?= base_url('comporte/index') ?>">Voir le détail</a>
            <a class="btn btn-primary" role="button" href="<?= base_url('comporte/add') ?>">Ajouter une matiere/filiere</a>


    
    </div>

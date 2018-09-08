<!--

<pre>
<?php  //print_r($fbm);
    
    ?>
</pre>
-->
<div class="container">

<table>
<tr>
	<th>Filiere</th>
    <th>Matiere</th>
    <th>Coefficient</th>
    <th>Actions</th>



</tr>
<?php foreach ($filieredetail as $entree): ?>
<tr>
	<td><?= $entree['nomFiliere'] ?></td>
	<td><?= $entree['nomMatiere'] ?></td>
	<td><?= $entree['coeff'] ?></td>
	<td><a href="<?= base_url('comporte/effacer') ?>/<?=$entree['idFiliere'] ?>/<?=$entree['idMatiere'] ?>" class="btn btn-danger">Supprimer lien</a>	<td><a href="<?= base_url('comporte/edit') ?>/<?=$entree['idFiliere'] ?>/<?=$entree['idMatiere'] ?>" class="btn btn-default">Modifier coeff</a>

</td>

</tr>
<?php endforeach; ?>
    
    
    
</table>     <a href="<?= base_url('Filiere/add') ?>" class="btn btn-success">Ajouter une filiere</a>
        <a class="btn btn-success" role="button" href="<?= base_url('comporte/add') ?>">Ajouter une matiere/filiere</a>
                <a class="btn btn-success" role="button" href="<?= base_url('matiere/add') ?>">Ajouter une matiere</a>
<br>
                <a class="btn btn-primary" href="<?= base_url('Filiere') ?>">Les Filieres</a>
              <a class="btn btn-primary" href="<?= base_url('Matiere') ?>">Les Matieres</a>

</div>

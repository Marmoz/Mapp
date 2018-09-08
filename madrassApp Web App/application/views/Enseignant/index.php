<div class="container">

<?php if(isset($successMessage)) { ?>
<div class="alert alert-success"><?= $successMessage ?></div>
   <?php } ?>
        

<h2>Liste des Enseignants</h2>
    
<table>
<tr>
	<th>Id Enseignant</th>
	<th>Nom</th>
    <?php
    if ($auth_role=='admin') { ?>
    
    <th>Actions Admin</th>


      
<?php    }
    ?>
    

</tr>
    
<?php foreach ($listenseignants as $lenseignant): ?>
<tr>
	<td><?= $lenseignant['idTeacher'] ?></td>
	<td><?= $lenseignant['nomTeacher'] ?></td>
    <?php
    if ($auth_role=='admin') { ?>

    <td><a href="<?= base_url('Enseignant/delete') ?>/<?=$lenseignant['idTeacher'] ?>" class="btn btn-danger">Effacer un Enseignant</a>
    <a href="<?= base_url('Enseignant/edit') ?>/<?=$lenseignant['idTeacher'] ?>" class="btn btn-default">Modifier un Enseignant</a></td>

    <td>
<?php if ( $lenseignant['user_id'] == 0) {
  ?>  
    <a href="<?= base_url('Examples/dakhlaTeacher') ?>/<?=$lenseignant['idTeacher'] ?>" class="btn btn-primary">Creer un Compte</a>

 <?php
}
    else {  ?>
<a href="<?= base_url('Enseignant/deleteCompte') ?>/<?=$lenseignant['idTeacher'] ?>" class="btn btn-danger">Effacer un Compte</a></td>
<?php
    }
?>


      
<?php    }
    ?>
</tr>
<?php endforeach; ?>
    

</table>
    
       <?php
    if ($auth_role=='admin') { ?>
            <a class="btn btn-success" role="button" href="<?= base_url('Enseignant/add') ?>">Ajouter un Enseignant</a>
<?php    }
    ?>
    
    </div>

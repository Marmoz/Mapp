<div class="container">

<?php if(isset($successMessage)) { ?>
<div class="alert alert-success"><?= $successMessage ?></div>
   <?php } ?>
        

<h2>Liste des Etudiants</h2>
    
<table>
<tr>
	<th>ID</th>
	<th>Prenom</th>
    <th>Nom</th>
    <th>email</th>
    <th>Actions Admin</th>
  


</tr>
    
<?php foreach ($listetudiants as $letudiant): ?>
<tr>
	<td><?= $letudiant['idStudent'] ?></td>
    <td><?= $letudiant['prenomStudent'] ?></td>
	<td><?= $letudiant['nomStudent'] ?></td>
    <td><?= $letudiant['emailStudent'] ?></td>
    <td>
    <a href="<?= base_url('Etudiant/edit') ?>/<?=$letudiant['idStudent'] ?>" class="btn btn-default">Modifier un étudiant</a>
    <a href="<?= base_url('Etudiant/delete') ?>/<?=$letudiant['idStudent'] ?>" class="btn btn-danger">Effacer un étudiant</a>


<?php if ( $letudiant['user_id'] == 0) {
  ?>  
    <a href="<?= base_url('Examples/dakhla') ?>/<?=$letudiant['idStudent'] ?>" class="btn btn-primary">Creer un Compte</a>

 <?php
}
    else {  ?>
<a href="<?= base_url('Etudiant/deleteCompte') ?>/<?=$letudiant['idStudent'] ?>" class="btn btn-danger">Effacer un Compte</a></td>
<?php
    }
?>
    
  <td>
    <a href="<?=  base_url('Notedby/fiche') ?>/<?=  $letudiant['idStudent'] ?>" class="btn btn-warning">Voir les notes</a>
    <a href="<?=  base_url('Notedby/addnote') ?>/<?= $letudiant['idStudent'] ?>" class="btn btn-info">Ajouter une note</a>
</td>




</tr>
<?php endforeach; ?>
    

</table>
    
    
            <a class="btn btn-success" role="button" href="<?= base_url('Etudiant/add') ?>">Ajouter un étudiant</a>
            <a class="btn btn-primary" role="button" href="<?= base_url('Inscrit/index') ?>">Voir les inscriptions</a>  
            <a class="btn btn-default" role="button" href="<?= base_url('notedby/index') ?>">Toutes les notes</a>


    
    </div>

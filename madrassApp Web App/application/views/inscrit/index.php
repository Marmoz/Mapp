<?php if(isset($successMessage)) {
    ?>
<div class="alert alert-success"><?= $successMessage ?></div>
   <?php }    ?>

<?php if(isset($errorMessage)) {
    ?>
<div class="alert alert-success"><?= $errorMessage ?></div>
   <?php }    ?>

<div class="container">
    
    <h2><a href="<?= base_url('Inscrit/index') ?>">Liste des inscriptions</a>
</h2>
<!--
  <a href="<?php // echo base_url('index.php/Inscrit/edit') ?>/<?php // echo$uneinsc['idStudent'] ?>" class="btn btn-default">Modifier une une inscription</a>

<pre>
<?php // print_r($etudiants);
    
    ?>
</pre>
-->

<table>
<tr>    <th>N° inscription</th>
	  <th>AS</th>
    <th>Nom</th>
    <th>Filière</th>

    <th>Actions Admin</th>

</tr>
<?php foreach ($inafil as $uneinsc): ?>
<tr>  <td><?= $uneinsc['numInscription'] ?></td>
  <td><?= $uneinsc['annee']-1 ."/" .$uneinsc['annee'] ?></td>

	<td><?= $uneinsc['prenomStudent'] . ' '. $uneinsc['nomStudent'] ?></td>
	<td><?= $uneinsc['nomFiliere'] ?></td>


    <td>
      <a href="<?= base_url('index.php/Inscrit/addins') ?>/<?=$uneinsc['idStudent'] ?>"class="btn btn-warning">Ajouter Inscription</a>
      <a href="<?= base_url('inscrit/edit') ?>/<?=$uneinsc['idStudent'] ?>/<?=$uneinsc['idFiliere'] ?>/<?=$uneinsc['annee'] ?>" class="btn btn-default">Modifier une Inscription</a>
      <a href="<?= base_url('inscrit/desinscrire') ?>/<?=$uneinsc['idStudent'] ?>/<?=$uneinsc['idFiliere'] ?>/<?=$uneinsc['annee'] ?>" class="btn btn-danger">Supprimer inscription</a>
      
</td>



</tr>
<?php endforeach; ?>
</table>

    </div>
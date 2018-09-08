<?php if(isset($successMessage)) {    ?>
<div class="alert alert-success"><?= $successMessage ?>
</div>   <?php  }    ?>
    
   <div class="container">
   
<?php 
    if (empty($noqat)) { echo '<h1>Fiche Notes</h1>' ;echo 'Toutes les notes ici'; }

    
    else { ?>
  
<h1>Bulletin de note : <?php echo ( $noqat[0]['prenomStudent'] .' '. $noqat[0]['nomStudent']);  ?>!</h1>
    
        <table>
<tr>
	<th>Matière</th>
    <th>Note Controle</th>
    <th>Note Exam</th>
    <th>Note S2</th>
    <th>Enseignant</th>

</tr>
<?php foreach ($noqat as $noqta): ?>
<tr>
	<td><?= $noqta['nomMatiere'] ?></td>
	<td><?= $noqta['note_S1'] ?></td>
    <td><?= $noqta['note_S2'] ?></td>
    <td><?= $noqta['note_Finale'] ?></td>
	<td><?= $noqta['nomTeacher'] ?></td>
</tr>
<?php endforeach; ?>

        </table>
              
  <?php  } ?>

    
    
    
    
<a class="btn btn-primary" role="button" href="<?= base_url('Notedby/addnote')?>/<?=$chkoun?>">Ajouter une note</a>

<a class="btn btn-primary" role="button" href="<?= base_url('Notedby/downPDF')?>/<?=$chkoun?>">TELECHARGER</a>

<?php file_put_contents('monbulletin.txt', var_export($noqat, TRUE));?>

</div>

<div class="container">
<h1>Modifier coeff d'une matiere à une filière</h1>

<form method="post" action="<?= base_url('comporte/editresponse') ?>/<?= $idFiliere ?>/<?= $idMatiere ?>">
   
<select name="Lafiliere">
  <option value="<?= $idFiliere ?>"><?= $idFiliere ?></option>
</select>
    
    
<select name="Lamatiere">
  <option value="<?= $idMatiere ?>"><?= $idMatiere ?></option>
</select>
    

<input type="text" name="coeff_mati" placeholder="Coefficient"/>
<input type="submit" value="Modifier" />

	</form>

<pre>
<?php  //print_r($lesfilieres);
    
    ?>
</pre>

</div>




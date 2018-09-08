<div class="container">
<h1>Ajouter une matiere à une filière</h1>

<form method="post" action="<?= base_url('comporte/addresponse') ?>/">
   
<select name="Lafiliere">
<?php foreach ($lesfilieres as $ft): ?>
  <option value="<?= $ft['idFiliere'] ?>"><?= $ft['nomFiliere'] ?></option>
  <?php endforeach; ?>
</select>
    
    
<select name="Lamatiere">
<?php foreach ($lesmatieres as $mt): ?>
  <option value="<?= $mt['idMatiere'] ?>"><?= $mt['nomMatiere'] ?></option>
  <?php endforeach; ?>
</select>
    

<input type="text" name="coeff_mati" placeholder="Coefficient"/>
<input type="submit" value="Ajouter à la filiere" />

	</form>



</div>




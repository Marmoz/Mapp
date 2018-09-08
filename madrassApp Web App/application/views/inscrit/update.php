<?php if(isset($errorMessage)) {
    ?>
<div class="alert alert-danger"><?= $errorMessage ?></div>
<?php  }   ?>

<pre>
<?php // print_r($monetudiant); 
//echo site_url('etudiant/editresponse'). '/' . $monetudiant[0]["idStudent"]; ?>

</pre>
<div class="container">
<h1>Modifier une inscription etudiant</h1>

<form method="post" action="<?= site_url('Inscrit/editre'). '/' .$monetudiant. '/' . $oldfiliere. '/' . $oldannee ?>">
   
    <!-- cf ANNEE variables dans boucle -->
    
<?php    
    
    ?>
   <h4>Inscription actuelle:  <?= $oldfiliere . ' pour l\'annee scolaire ' . $oldannee ?> </h4> 
<select name="Letudiant">  
  <option value="<?= $monetudiant ?>"><?= $monetudiant ?></option>  
</select>
 
<select name="Lafiliere">
 <?php foreach ($lesfilieres as $lafiliere): ?>
  <option value="<?= $lafiliere['idFiliere']?>"><?= $lafiliere['nomFiliere'] ?></option>
  <?php endforeach; ?>
</select>

<select name="AnneeInscription">
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
</select>
    
<input type="submit" value="Modifier inscription étudiant" />

</form>



</div>

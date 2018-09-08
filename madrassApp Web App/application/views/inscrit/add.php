<div class="container">



<h1>Ajouter une inscription etudiant</h1>

<pre>
<?php
// print_r($lesetudiants);

?>
</pre>

<form method="post" action="<?= site_url('Inscrit/addresponse') ?>">
   
    <!-- cf ANNEE variables dans boucle -->
    
<?php    
    
    ?>
<select name="Letudiant">
    
    
<?php if (isset($chkoun)){ ?>
  <option value="<?= $chkoun ?>"><?= $chkoun ?></option> 
    <?php
}
      else {foreach ($lesetudiants as $letudiant): ?>
  <option value="<?= $letudiant['idStudent']?>"><?= $letudiant['prenomStudent'] . ' ' . $letudiant['nomStudent'] ?></option>
  <?php endforeach; 
          
      } ?>
     
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
    
<input type="submit" value="Inscrire un étudiant" />

</form>


</div>
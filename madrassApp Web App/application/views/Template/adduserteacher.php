<div class="container">



<h1>Ajouter une compte Enseignant</h1>

<pre>
<?php
print_r($intelTeacher[0]['emailTeacher']);

?>
</pre>

<form method="post" action="<?= site_url('examples/creer_compteTeacher') ?>">
   
<input type="text" name="lepassword" placeholder="mot de passe" />
<input type="text" name="lemail"  value="<?= $intelTeacher[0]['emailTeacher']; ?>" />
    
<input type="submit" value="Ajouter une compte Enseignant" />

</form>


<p> Must be at least 8 characters long
   *   - Must be at less than 72 characters long
   *   - Must have at least one digit
   *   - Must have at least one lower case letter
   *   - Must have at least one upper case letter</p>


</div>
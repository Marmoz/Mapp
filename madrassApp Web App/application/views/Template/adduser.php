<div class="container">



<h1>Ajouter une compte etudiant</h1>

<pre>
<?php
print_r($intelStudent[0]['emailStudent']);

?>
</pre>

<form method="post" action="<?= site_url('examples/creer_compteStudent') ?>">
   
<input type="text" name="lepassword" placeholder="mot de passe" />
<input type="text" name="lemail"  value="<?= $intelStudent[0]['emailStudent']; ?>" />
    
<input type="submit" value="Ajouter une compte étudiant" />

</form>


<p> Must be at least 8 characters long
   *   - Must be at less than 72 characters long
   *   - Must have at least one digit
   *   - Must have at least one lower case letter
   *   - Must have at least one upper case letter</p>


</div>
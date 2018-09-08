<?php if(isset($errorMessage)) {
    ?>
<div class="alert alert-danger"><?= $errorMessage ?></div>
<?php  }   ?>

<pre>
<?php // print_r($monetudiant); 
//echo site_url('etudiant/editresponse'). '/' . $monetudiant[0]["idStudent"]; ?>

</pre>

<h1>Modifier une Filière</h1>

<form method="post" action="<?= site_url('Filiere/editresponse'). '/' . $mafiliere[0]["idFiliere"] ?>">

		
		<input type="text" name="filiere_nom" placeholder="<?= $mafiliere[0]["nomFiliere"] ?>" value="<?= $mafiliere[0]["nomFiliere"] ?>"  required/>
<div></div>
		<input type="submit" value="Modifier les informations" />

	</form>




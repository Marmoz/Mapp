<?php if(isset($errorMessage)) {
    ?>
<div class="alert alert-danger"><?= $errorMessage ?></div>
<?php  }   ?>

<pre>
<?php // print_r($monetudiant); 
//echo site_url('etudiant/editresponse'). '/' . $monetudiant[0]["idStudent"]; ?>

</pre>

<h1>Modifier une Matiere</h1>

<form method="post" action="<?= site_url('Matiere/editresponse'). '/' . $mamatiere[0]["idMatiere"] ?>">

		
		<input type="text" name="matiere_nom" placeholder="<?= $mamatiere[0]["nomMatiere"] ?>" value="<?= $mamatiere[0]["nomMatiere"] ?>"  required/>
<div></div>
		<input type="submit" value="Modifier les informations" />

	</form>




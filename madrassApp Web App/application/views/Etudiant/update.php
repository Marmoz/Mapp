<?php if(isset($errorMessage)) {
    ?>
<div class="alert alert-danger"><?= $errorMessage ?></div>
<?php  }   ?>

<pre>
<?php echo ($monmail); 
//echo site_url('etudiant/editresponse'). '/' . $monetudiant[0]["idStudent"]; ?>

</pre>

<h1>Modifier un etudiant</h1>

<form method="post" action="<?= site_url('etudiant/editresponse'). '/' . $monetudiant[0]["idStudent"] ?>">
		
		<input type="text" name="etudiant_nom" placeholder="Nom de l'etudiant" value="<?= $monetudiant[0]["nomStudent"] ?>"  required/>
        <input type="text" name="etudiant_prenom" placeholder="Prenom de l'etudiant" value="<?= $monetudiant[0]["prenomStudent"] ?>"  required/>
        <input type="text" name="etudiant_email" placeholder="e-mail de l'etudiant" value="<?= $monetudiant[0]["emailStudent"] ?>"  required/>
        <input type="text" name="etudiant_naissance" placeholder="Date de naissance" value="<?= $monetudiant[0]["naissanceStudent"] ?>"  required/>
     <div>
  </div>
		<input type="submit" value="Modifier les informations" />

	</form>




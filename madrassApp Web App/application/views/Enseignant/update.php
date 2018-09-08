<?php if(isset($errorMessage)) {
    ?>
<div class="alert alert-danger"><?= $errorMessage ?></div>
<?php  }   ?>

	


<h1>Modifier un Enseignant</h1>

<form method="post" action="<?= site_url('Enseignant/editresponse'). '/' . $monenseignant[0]["idTeacher"] ?>">
		
		<input type="text" name="enseignant_nom" placeholder="Nom de l'Enseignant" value="<?= $monenseignant[0]["nomTeacher"] ?>"  required/>
        <input type="text" name="enseignant_prenom" placeholder="Prenom de l'Enseignant" value="<?= $monenseignant[0]["prenomTeacher"] ?>"  required/>
        <input type="text" name="enseignant_email" placeholder="e-mail de l'Enseignant" value="<?= $monenseignant[0]["emailTeacher"] ?>"  required/>
        <input type="text" name="enseignant_naissance" placeholder="Date de naissance" value="<?= $monenseignant[0]["naissanceTeacher"] ?>"  required/>
     <div>
  </div>
		<input type="submit" value="Modifier les informations" />

	</form>




<h1>Ajouter un enseignant</h1>

<form method="post" action="<?= site_url('enseignant/addresponse') ?>">
		<input type="text" name="enseignant_prenom" placeholder="Prenom de l'enseignant" required/>
		<input type="text" name="enseignant_nom" placeholder="Nom de l'enseignant" required/>  
        <input type="text" name="enseignant_email" placeholder="e-mail de l'enseignant" required/>
        <input type="text" name="enseignant_naissance" placeholder="Date de naissance" />
     <div>
  </div>
		<input type="submit" value="Ajouter" />

	</form>


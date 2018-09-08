<h1>Ajouter un etudiant</h1>

<form method="post" action="<?= site_url('etudiant/addresponse') ?>">
		
		<input type="text" name="etudiant_nom" placeholder="Nom de l'etudiant" required/>
        <input type="text" name="etudiant_prenom" placeholder="Prenom de l'etudiant" required/>
        <input type="text" name="etudiant_email" placeholder="e-mail de l'etudiant" required/>
        <input type="text" name="etudiant_naissance" placeholder="Date de naissance" />
     <div>
  </div>
		<input type="submit" value="Ajouter" />

	</form>
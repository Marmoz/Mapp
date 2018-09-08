<h1>Ajouter une note à un etudiant</h1>
<form method="post" action="<?= base_url('Notedby/addnoteresponse') ?>/<?= $chkoun ?>">
   
    <!-- cf variables dans boucle -->
<select name="Letudiant">
    <?php if (isset($chkoun)){ ?>
  <option value="<?= $chkoun ?>"><?= $chkoun ?></option> 
<?php }?>
  </select> 

    <select name="Lannee">
 <?php foreach ($lesannees as $zeyear): ?>
  <option value="<?= $zeyear['annee'] ?>"><?= $zeyear['annee'] ?></option>
  <?php endforeach; ?>
</select>


<select name="Enseignant">
 <?php foreach ($lesenseignants as $enseignant): ?>
  <option value="<?= $enseignant['idTeacher']?>"><?= $enseignant['nomTeacher'] ?></option>
  <?php endforeach; ?>
</select>
    <select name="Matiere">
 <?php foreach ($lesmatieres as $matiere): ?>
  <option value="<?= $matiere['idMatiere']?>"><?= $matiere['nomMatiere'] ?></option>
  <?php endforeach; ?>
</select>
    		<input type="text" name="note_S1" placeholder="Note S1" />
    		<input type="text" name="note_S2" placeholder="Note S2" />
    		<input type="text" name="note_Finale" placeholder="Note Finale" />

		<input type="submit" value="Ajouter une note" />

	</form>

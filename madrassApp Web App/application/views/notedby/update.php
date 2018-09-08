<?php if(isset($errorMessage)) {
    ?>
<div class="alert alert-danger"><?= $errorMessage ?></div>
<?php  }   ?>

<pre>
<?php // print_r($monetudiant); 
//echo site_url('etudiant/editresponse'). '/' . $monetudiant[0]["idStudent"]; ?>

</pre>
<div class="container">


    
    <h1>Mofier une note à un etudiant</h1>

<form method="post" action="<?= base_url('Notedby/editresponse') ?>/<?= $idStudent ?>/<?= $idTeacher ?>/<?= $idMatiere ?>/<?= $annee ?>">
   
    <!-- cf variables dans boucle -->

    
    <select name="Letudiant">
        <option value="<?= $idStudent ?>"><?= $idStudent ?></option> 
</select>
        <select name="Lenseignant">
        <option value="<?= $idTeacher ?>"><?= $idTeacher ?></option> 
</select>
        <select name="Lamatiere">
        <option value="<?= $idMatiere ?>"><?= $idMatiere ?></option> 
</select>
 
    <input type="text" name="note_S1" placeholder="Note Controle" />
    		<input type="text" name="note_S2" placeholder="Note Exam" />
    		<input type="text" name="note_Finale" placeholder="Note S2" />

		<input type="submit" value="Modifier une note" />	

	</form>

    
    


</div>

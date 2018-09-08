
<div class="container">



<div class="container homeadmin">
	<p>
<?php
if (isset($auth_role) ) {
	if ( $auth_role == 'student' ) {
		 if (!empty($nozinfos)) {
//print_r($nozinfos); 
echo 'Bienvenue ' . $nozinfos[0]["prenomStudent"] . ' '. $nozinfos[0]["nomStudent"];}	
		}
}

?>
</p>
<a href="<?= base_url('etudiant/mynotes') ?>"><img src="<?= base_url('res/images/mesnotes.png')  ?>"></a>
<a href="<?= base_url('') ?>"><img src="<?= base_url('res/images/mesdocs.png')  ?>"></a>
<a href="<?= base_url('etudiant/myfiliere') ?>"><img src="<?= base_url('res/images/mafiliere.png')  ?>"></a>
<a href="<?= base_url('Enseignant') ?>"><img src="<?= base_url('res/images/mesenseignans.png')  ?>"></a>





</div>

</div>

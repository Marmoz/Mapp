
<div class="container">

<div class="container homeadmin">
	<p>
<?php
if (isset($auth_role) ) {
	if ( $auth_role == 'teacher' ) {
		 if (!empty($nozinfos)) {
//print_r($nozinfos); 
echo 'Bienvenue ' . $nozinfos[0]["prenomTeacher"] . ' '. $nozinfos[0]["nomTeacher"];}	
		}
}

?>
</p>
<a href="<?= base_url('Enseignant/mynotes') ?>"><img src="<?= base_url('res/images/mesnotes.png')  ?>"></a>
<a href="<?= base_url('Enseignant/mesEtudiants') ?>"><img src="<?= base_url('res/images/Mesedz.png')  ?>"></a>
<a href="<?= base_url('Enseignant/mesMatieres') ?>"><img src="<?= base_url('res/images/mescours.png')  ?>"></a>
<a href="<?= base_url('Enseignant') ?>"><img src="<?= base_url('res/images/mescos.png')  ?>"></a>





</div>

</div>












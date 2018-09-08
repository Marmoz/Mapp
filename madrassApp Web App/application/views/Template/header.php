<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title><?= $metaTitle ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('res/style.css') ?>" />

    <style type="text/css">
        
        </style>

  <?php
    // Add any javascripts
    if( isset( $javascripts ) )
    {
      foreach( $javascripts as $js )
      {
        echo '<script src="' . $js . '"></script>' . "\n";
      }
    }

    if( isset( $final_head ) )
    {
      echo $final_head;
    }
  ?>
</head>
<body>
    <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url('examples/home') ?>">MadrassApp</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?= base_url('examples'). '/home' ?>">Accueil</a></li>

  <?php

  if ( isset($auth_role) && $auth_role == 'admin') { ?>
              <li><a href="<?= base_url('Etudiant') ?>">Etudiant</a></li>
              <li><a href="<?= base_url('Enseignant') ?>">Enseignant</a></li>
              <li><a href="<?= base_url('Filiere') ?>">Filiere</a></li>
              <li><a href="<?= base_url('Matiere') ?>">Matiere</a></li>

           <?php } ?>


      <li><?php
      echo isset( $auth_user_id )
        ? logout_anchor('examples/logout', 'Logout')
          
        : login_anchor('examples', 'Login', 'id="login-link"' );
    ?>
</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container"> 




    
    
    
    




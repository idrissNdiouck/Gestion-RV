<?php
session_start();
?>
<meta name="viewport" content="width=device-width" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
 <link rel="stylesheet" href="stylesheets/foundation.css">
  <link rel="stylesheet" href="stylesheets/app.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<link href="bootstrap.min.css" rel="stylesheet">
<script src="javascripts/modernizr.foundation.js"></script>
<?php 
  include("header.php");
  include("library.php");
  noAccessIfLoggedIn();
?>
<div class="header">
<div class="wrap">
  <div class="Header-background"></div>
    <div class="Header-hero">
<div class="container">
<div class="row">
		<div class="twelve columns">
 	<h1>Bienvenue sur notre projet de gestion de rendez-vous Médical</h1>
    <p class="block-quote">ce projet a été réalisé par SunuGroup (Idrissa Ndiouck & Mame fatou Ngom) de la Classe C Dev Web Online</p>
    
    <p><?php include('slideshow.php');?></p>
    </div>
  </div>
  <div class="row">
		<div class="twelve columns">
  <?php 
    if(isset($_POST['lemail'])){
      $i = login($_POST['lemail'],$_POST['lpassword'],"users");
      if($i==1){
        echo '<script type="text/javascript"> window.location = "add_patient.php" </script>';
      }
    }else if(isset($_POST['remail'])){
      $i = register($_POST['remail'],$_POST['rpassword'],$_POST['rfullname'],"users");
      if($i==1){
        echo '<script type="text/javascript"> window.location = "add_patient.php"</script>';
      }
    }else{
      echo "<div class='alert alert-info'>
              <strong>Info!</strong> Il faut vous connecter avec vos identifiants ou s'inscrir pour pouvoir fixer un Rendez-Vous. Merci!</div>";
    }
    unset($_POST);
  ?>
    </div>
  </div>
<div class="row">
<div class="twelve columns">
  <div class="col col-xl-6 col-sm-6">
      <h2>Connexion</h2>
      <form action="index.php" method="POST">
        <div class="form-group">
          <label for="usr">Email:</label>
          <input type="email" class="form-control" name="lemail" required>
        </div>
        <div class="form-group">
          <label for="pwd">Mot de Passe:</label>
          <input type="password" class="form-control" name="lpassword" required>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Connectez-vous">
          <input type="reset" class="btn btn-danger">
        </div>
          
      </form>
  </div>
          
  <div class="col col-xl-6 col-sm-6" id="register1">
    <form method="post" action="index.php">
	    <h2>Inscription</h2>
	      <div class="form-group">
	        <label for="usr">Nom Complet:</label>
	        <input type="text" class="form-control" name="rfullname" required>
	      </div>
        
        <div class="form-group">
	        <label for="usr">Email:</label>
	        <input type="email" class="form-control" name="remail" required>
	      </div>
	          
        <div class="form-group">
	        <label for="pwd">Mot de Passe:</label>
	        <input type="password" class="form-control"  name="rpassword" required>
	      </div>

	      <div class="form-group">
	        <input type="submit" class="btn btn-primary">
	        <input type="reset" class="btn btn-danger"></button>
	      </div>
    </form>
    
  </div>
</div>
</div>
</div>
</div>
  </div>
  <?php include 'footer.php'; ?>




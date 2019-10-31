<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
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
  include("nav-bar.php");
?>
<div class="Header">
  <div class="Header-background"></div>
    <div class="Header-hero">
<div class="container">
 	<h1 align=center>Se connecter en tant que Membre du Service</h1>

    <?php
      if (isset($_POST['email'])){
        $type = $_POST['type'];
        $i = login($_POST['email'],$_POST['password'],$type);
        if ($i == 1){
          noAccessIfLoggedIn();
        }
      }
    ?>

  <div class="col col-xl-6" align="center">
      
      <form action="hms-staff.php" method="POST">
        <div class="form-group">
          <label for="usr">Nom d'utilisateur:</label>
          <input type="text" class="form-control" name="email" style="width: 500;" required>
        </div>
        <div class="form-group">
          <label for="pwd">Mot de Passe:</label>
          <input type="password" class="form-control" name="password" style="width: 500;" required>
        </div>
        <div class="form-group">
          <label for="pwd">Type de Compte:</label>
          <select required value=1 class ='form-control' name="type" style="width: 500;">
                <option value="admin" class="option">Admin</option>
                <option value="clerks" class="option">Sécrétaire</option>
                <option value="doctors" class="option">Médecin</option>
          </select>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Se connecter">
          <input type="reset" name="" class="btn btn-danger">
        </div>
          
      </form>
  </div>   
</div>
</div>


<?php 
include("footer.php"); ?>



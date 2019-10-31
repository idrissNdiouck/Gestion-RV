<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width" />
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/foundation.css">
  <link rel="stylesheet" href="stylesheets/app.css">
  <script src="javascripts/modernizr.foundation.js"></script>
  </head>
  <body>
  <div class="row">
		<div class="twelve columns">
        <div class="container" style="padding-top: 10px;">
        <nav class="navbar  navbar-static-top">
          <a class="navbar-brand">GESTION RV</a>
        </nav>
            <ul class="nav nav-pills">
            <li class="nav-item">
        <?php
                if (!isset($_SESSION['username'])) {
                    echo '<a class="" href="hms-staff.php">Se Connecter en tant que Membre </a>
                  </li>';
                }
        ?>
        </li>
              <li class="nav-item">
              <a class="" href="tel:+221784673070">Contacts</a>
              </li>
              <li class="nav-item">
                <a class="" href="tel:+221784673070">N° Urgence</a>
              </li>
              <?php
                if (isset($_SESSION['username'])) {
                    echo '<li class="nav-item" style="align-items: right;"> <a class="nav-link" href="logout.php">Déconnecter</a>
                  </li>';
                }
              ?>
            </ul>
        </nav>
        </div>
        </div>
	</div>
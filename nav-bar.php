<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<link href="bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<?php
  $beginning = '<div class="container">
  <nav class="navbar  navbar-default ">
  <div class="top nav">
      <a class="navbar-brand">Barre de Navigation </a>
    </div>
    <ul class="nav navbar-nav justified">';
  $frontLink = '<li class="nav-item"> <a class="" href="';
  $endLink = '</a></li>';

  if (isset($_SESSION['user-type'])) {
      echo $beginning;

      switch ($_SESSION['user-type']) {
      case 'doctor':

        echo $frontLink.'patient_info.php"> Informations sur le Patient '.$endLink;
        echo $frontLink.'note_secretaire.php"> Les Messages du sécrétaire '.$endLink;
        break;
      case 'clerk':
        echo $frontLink.'add_patient.php"> Ajouter un Patient '.$endLink;
        echo $frontLink.'all_appointments.php"> Tous les Rendez-Vous '.$endLink;
        break;
      default:
        // code...
        break;
    }
      echo '</ul> </nav></div>';
  }

?>

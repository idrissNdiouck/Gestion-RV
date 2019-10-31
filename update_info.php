<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
<link href="bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<?php
  include("header.php");
  include("library.php");
  noAccessIfNotLoggedIn();
  noAccessForNormal();
  noAccessForClerk();
  noAccessForAdmin();
  include("nav-bar.php");
?>
<div class="Header">
  <div class="Header-background"></div>
    <div class="Header-hero">
<div class="container">
<h2>Mise à jour des infos du patient </h2>
<p></p>
<table class="table table-striped">
<?php
  if(isset($_POST['upSugg'])){
      $i = update_appointment_info($_POST['appointment_no'], 'doctors_suggestion', $_POST['upSugg']);

      if($i==1){
        echo "<script type='text/javascript'>window.location = 'patient_info.php'</script>";
      }
  }

  if(isset($_GET['appointment_no'])){
    $appointment_no = $_GET['appointment_no'];
    $result = getAllPatientDetail($appointment_no);

    while($row = $result->fetch_array())
    {
      $link = "<tr><th>";
      $mid = "</th><td>";
      $endingTag = "</td></tr>";
      echo "<tr>";   // appointment_no, full_name, dob, weight, phone_no, address, blood_group, medical_condition
      echo "$link N° Rendez-vous $mid". $row['appointment_no'] . "$endingTag";
      echo "$link Nom Complet $mid" . $row['full_name'] . "$endingTag";
      echo "$link Age  $mid" . $row['dob'] . "$endingTag";
      echo "$link Poids $mid" . $row['weight'] . "$endingTag";
      echo "$link N° Tel $mid" . $row['phone_no'] . "$endingTag";
      echo "$link Adresse $mid" . $row['address'] . "$endingTag";
      echo "$link Conditions Médicale - $mid" . $row['medical_condition'] . "$endingTag";
      echo "$link  Médecin Suggéré - $mid" . "<form action='update_info.php' method='post'>
      <textarea class='form-group form-control' name='upSugg' style='resize: none;'></textarea>
      <input type='number' style='visibility: hidden; width; 1px;' name='appointment_no' value =". $appointment_no . ">
      <input type='submit' class='btn btn-primary' action='update_info.php'></form>" . "$endingTag";
      echo "</tr>";
    }
  }
?>
</table>
</div>
<?php include("footer.php");?>

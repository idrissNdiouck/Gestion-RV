<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<?php 
  include("header.php");
  include("library.php");

  noAccessForDoctor();
  noAccessForNormal();
  noAccessForAdmin();
  noAccessIfNotLoggedIn();

  include('nav-bar.php');
?>
<div class="Header">
  <div class="Header-background"></div>
    <div class="Header-hero">

<div class = 'container'>

<h2>Tous les Rendez-Vous</h2>
<p>Cliquer sur un champs pour voir les informations additionneles</p>
<div class="table-responsive-vertical shadow-z-1">
<table  id="table" class="table table-hover table-mc-light-blue">
  <thead class="thead-inverse">
				<tr>
				<th id="">N° Rendez-Vous</th>
				<th id="">Nom Complet du Patient</th>
				<th id="">Date Rendez-Vous</th>
				<th id="">Heure Rendez-Vous</th>
				<th id="">Condition médicale</th>
				<th id="">Le médecin dont il a Besoin</th>
				</tr>
				</thead>
<?php
	$result = getAllAppointments();


	while($row = $result->fetch_array())
	{
		$status = ' ';
		if(appointment_status((int) $row['appointment_no']) == 1){
			$status= "table-active";
		}else if (appointment_status((int) $row['appointment_no']) == 2){
			$status= "table-success";
		}

		$link = "<td ><a href= 'payment.php?appointment_no=" . $row['appointment_no'] . "'>";
		$endingTag = "</a></td>";
		echo "<tr class=\"" . $status . "\"> ";
		echo "$link". $row['appointment_no'] . "$endingTag";
		echo "$link" . $row['full_name'] . "$endingTag";
		echo "$link" . $row['date_rdv'] . "$endingTag";
		echo "$link" . $row['heure_rdv'] . "$endingTag";
		echo "$link" . $row['medical_condition'] . "$endingTag";
		echo "$link" . $row['speciality'] . "$endingTag";
		echo "</tr>";
	}
?>
</table>
</div>
</div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="./script.js"></script>
<?php include("footer.php"); ?>
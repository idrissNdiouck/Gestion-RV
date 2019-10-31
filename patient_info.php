<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<?php
  include 'header.php';
  include 'library.php';
  noAccessIfNotLoggedIn();
  noAccessForNormal();
  noAccessForClerk();
  noAccessForAdmin();

  include 'nav-bar.php';
?>
<div class="Header">
  <div class="Header-background"></div>
    <div class="Header-hero">
<div class="container">
<div id="demo">
<h2>Les Rendez-Vous à venir</h2>
<p>Cliquer sur un champs pour ajouter les infos additionnelles</p>
<div class="table-responsive-vertical shadow-z-1">
<table class='table table-striped text-center '>
  <thead class="thead-inverse">
                <tr>
				<th id="">N° de Rendez-Vous</th>
                <th id="">Nom Complet du Patient</th>
				<th id="">Condition Médicale</th>
				</tr>
                </thead>
<?php
    $result = getPatientsFor('Dentiste');

    while ($row = $result->fetch_array()) {
        $status = ' ';
        if (appointment_status((int) $row['appointment_no']) == 1) {
            $status = 'table-active';
        } elseif (appointment_status((int) $row['appointment_no']) == 2) {
            $status = 'table-success';
        }

        $link = "<td ><a href= 'update_info.php?appointment_no=".$row['appointment_no']."'>";
        $endingTag = '</a></td>';
        echo '<tr class="'.$status.'"> ';
        echo "$link".$row['appointment_no']."$endingTag";
        echo "$link".$row['full_name']."$endingTag";
        echo "$link".$row['medical_condition']."$endingTag";
        echo '</tr>';
    }
?>
</table>
</div>
</div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="./script.js"></script>
<?php include 'footer.php'; ?>

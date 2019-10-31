<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<?php
  include("header.php");
  include("library.php");
  noAccessForAdmin();
  noAccessIfNotLoggedIn();
  if($_SESSION["user-type"] != 'normal'){
    include("nav-bar.php");
  }
?>
<div class="Header">
  <div class="Header-background"></div>
    <div class="Header-hero">

<div class="container">
  <h2>Bienvenue , <?php echo $_SESSION["fullname"];?>!</h2>
      <div class='alert alert-info'>
              <strong>Infos!</strong> Seul les rendez-vous enregistrés aujourd'hui sont repertoriés <? echo date("d/m/y"); ?>. Les heures de rendez-vous sont entre 08:00 à 12:00 ou 15:00 à 17:00 si le rendez-vous a été enregistré.</div>
      <h3>Entrer les informations</h3>
      <?php
                  if(isset($_POST['apfullname'])){
                    $i = enter_patient_info($_POST['date_rdv'],$_POST['heure_rdv'],$_POST['apfullname'],$_POST['apAge'],$_POST['apweight'],$_POST['apphone_no'],$_POST['apaddress']);
                    appointment_booking($i, $_POST['apSpecialist'], $_POST['apCondition']);
                    unset($_POST['apfullname']); //unset all post variables
                    if (isset($_POST['apfullname'])){
                      echo '<script type="text/javascript">location.reload();</script>';
                    }

                  }
                ?>
            <form action="add_patient.php" method="POST">

            <div class="form-group" >
              <label for="usr">Nom Complet:</label>
              <input type="text" class="form-control" id="usr" name="apfullname" required>
            </div>

            <div class="form-group">
              <label for="pwd">Age: (en chiffre)</label>
              <input type="number" class="form-control" id="pwd" name="apAge" min="1" max="200" required>
            </div>
            <div class="form-group">
              <label for="pwd">Poids (en kg):</label>
              <input type="tel" class="form-control" id="pwd" name="apweight" min="1" max="300" required>
            </div>
            <div class="form-group">
              <label for="pwd">N° Téléphone:</label>
              <input type="tel" class="form-control" id="pwd" name="apphone_no" required>
            </div>
            <div class="form-group">
              <label for="pwd">Adresse:</label>
              <textarea class="form-control" id="pwd" name="apaddress" required></textarea>
            </div>
            <div class="form-group">
              <label for="date_Reservation">Date Rendez Vous</label>
              <input type="date" class="form-control" id="date_Reservation" name="date_rdv" required  >
            </div>
            <div class="form-group">
              <label for="timepicker">Heure de Visite</label>
              <input type="time" class="form-control" id="timepicker" name="heure_rdv" >
            </div>
            <div class="form-group">
              <label for="pwd">Le Médecin dont vous avez Besoin:</label>
              <select required value=1 name="apSpecialist">
                <option value="Radiologue" class="option">Radiologue</option>
                <option value="Chirurgien" class="option">Chirurgien</option>
                <option value="Anesthesiologue" class="option">Anesthesiologue</option>
                <option value="Cardiologue" class="option">Cardiologue</option>
                <option value="Dentiste" class="option">Dentiste</option>
                <option value="Dermatologue" class="option">Dermatologue</option>
                <option value="Endocrinologue" class="option">Endocrinologue</option>
              </select>
            </div>
        
            <div class="form-group">
              <label for="pwd">Condition médicale / Proposition de Visite:</label>
              <textarea class="form-control" id="pwd" name="apCondition" required></textarea>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary" >
              <input type="reset" name="" class="btn btn-danger">
            </div>
          </form>
</div>
<?php
  include("footer.php");
?>

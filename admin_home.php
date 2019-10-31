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

  noAccessForClerk();
  noAccessForDoctor();
  noAccessForNormal();

  noAccessIfNotLoggedIn();

?>
<div class="Header">
  <div class="Header-background"></div>
    <div class="Header-hero">
<div class="container">
 	<h1 align=center>Espace Admin</h1>
  
  <?php 
    if(isset($_POST['demail'])){
      $i = register($_POST['demail'],$_POST['dpassword'],$_POST['dfullname'],$_POST['dSpecialist'],"doctors");
    }
    if(isset($_POST['aemail'])){
      $i = register($_POST['aemail'],$_POST['apassword'],$_POST['afullname'],'non',"clerks");
    }
    if(isset($_POST['DrDelEmail'])){
      $i = delete("doctors",$_POST['DrDelEmail']);
    }
    if(isset($_POST['ClDelEmail'])){
      $i = delete("clerks",$_POST['ClDelEmail']);
    }
    
  ?>


<div class="col col-xl-6 col-sm-6" id="register1">
    <form method="post" action="admin_home.php">
      <h2>Enregistrer un Sécrétaire</h2>
        <div class="form-group">
          <label for="usr">Nom Complet:</label>
          <input type="text" class="form-control" name="afullname" required>
        </div>
        
        <div class="form-group">
          <label for="usr">Email:</label>
          <input type="email" class="form-control" name="aemail" required>
        </div>
            
        <div class="form-group">
          <label for="pwd">Mot de Passe:</label>
          <input type="password" class="form-control"  name="apassword" required>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Enregistrer">
          <input type="reset" name="" class="btn btn-danger"></button>
        </div>
    </form>
      <hr>
                  <form method="post" action="admin_home.php">

      <div class="form-group">
                <h2>Supprimer sécrétaire</h2>
            <select class='form-control' required value=1 name="ClDelEmail">
            <?php 
                $result = getListOfEmails('clerks');

                if(is_bool($result)){
                  echo "No clerks found in database";
                }else{
                  while($row = $result->fetch_array())
                  {
                    echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
                  }
                }

            ?>
            </select>
            </div>
            <div class="form-group">

            <input type="submit" class="btn btn-primary" style="padding: 10px;" value="Supprimer">
            </div>
          </form>
</div>

<div class="col col-xl-6 col-sm-6 " id="register1">
    <form method="post" action="admin_home.php">
      <h2>Enregistrer un Médecin</h2>
        <div class="form-group">
          <label for="usr">Nom Complet:</label>
          <input type="text" class="form-control" name="dfullname" required>
        </div>
        
        <div class="form-group">
          <label for="usr">Email:</label>
          <input type="email" class="form-control" name="demail" required>
        </div>
            
        <div class="form-group">
          <label for="pwd">Mot de Passe:</label>
          <input type="password" class="form-control"  name="dpassword" required>
        </div>

        <div class="form-group">
          <label for="pwd">Specialité:</label>
            <select class='form-control' required value=1 name="dSpecialist">
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
          <input type="submit" class="btn btn-primary" value="Enregistrer">
          <input type="reset" name="" class="btn btn-danger"></button>
        </div>
    </form>


        <hr>
                    <form method="post" action="admin_home.php">

        <div class="form-group">
                <h2>Supprimer Médecin</h2>
            <select class='form-control' required value=1 name="DrDelEmail">

            <?php 
                $result = getListOfEmails('doctors');

                if(is_bool($result)){
                  echo "Pas de Médecin trouvé dans la base de donnée";
                }else{
                  while($row = $result->fetch_array())
                  {
                    echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
                  }
                  echo '&emsp;';

                }

            ?>
            </select></div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Supprimer">
            </div>
          </form>
        </div>
    </form>
  </div>
</div>


</div>
<div class="col col-xl-6 col-sm-6 " id="register1">
</div>
<div class="col col-xl-6 col-sm-6 " id="register1">
</div>
<?php include("footer.php"); ?>



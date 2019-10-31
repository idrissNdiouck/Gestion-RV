    <div class="container footer">
      <hr>
      <footer>
        <p align="center">
        <?php
                if (!isset($_SESSION['username'])) {
                    echo '<a class="nav-link" href="hms-staff.php">Se Connecter en tant que Membre </a>
                  </li>';
                }
        ?>
        </p>
        <p align="center">
        <a href="index.php">GESTION RV</a> - <?php echo date('Y'); ?>
        </nav>
		</p>
      </footer>
    </div>
  </body>
</html>

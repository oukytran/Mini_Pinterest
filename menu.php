<?php
  session_start();
?>

    <nav>
      <ul id="menu">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="categorie.php">Catégorie</a></li>
        <?php
          if (isset($_SESSION["pseudo"])) {
            echo "<li><a href='ajoutImage.php'>Ajout Image</a></li>";
            echo "<li><a href='index.php'>Déconnexion</a></li>";
          }
          else {
            echo "<li><a href='inscription.php'>Inscription</a></li>";
            echo "<li><a href='connexion.php'>Connexion</a></li>";
            echo "<li><a href='ajoutImage.php'>Ajout Image</a></li>";
          }

        ?>

      </ul>
    </nav>

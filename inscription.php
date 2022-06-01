<?php
require_once 'connexionBD.php';
//require_once 'fonctions/utilisateur.php';

/* connexion à la base de données */
$link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
$_SESSION["link"] = $link;
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title> TRAN David </title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
	<div id="conteneur">
		<?php include_once 'header.php'; ?>
		
		<?php include_once 'menu.php'; ?>
		<main>

		<div id="contenu">
			<h2>Inscription</h2>
            <form action="fonctions/signup.php" method="post">
                <input type="text" name="name" placeholder ="Pseudo"> <br>
                <input type="password" name="pwd" placeholder ="Mot de passe"><br>
                <input type="password" name="pwdrepeat" placeholder ="Validez votre mdp"><br>
                <button type="submit" name="submit">Valider</button><br>
            </form>
         <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<p>Remplir tous les champs</p>";
                }
                else if ($_GET["error"] == "invalidPseudo") {
                    echo "<p>Pseudo non valide</p>";
                }
                else if ($_GET["error"] == "pseudoPris") {
                    echo "<p>Pseudo déjà existant</p>";
                }
                else if ($_GET["error"] == "pwdnonidentiques") {
                    echo "<p>Mots de passe non identiques</p>";
                }  
                else if ($_GET["error"] == "none") {
                    echo "<p>Vous vous bien êtes inscrit !</p>";
                }
            }
        ?>
				
		</div>
		
		</main>
		
		<br>
        <br>

		<?php include_once 'footer.php'; ?>
	</div>
		
	</body>

</html>
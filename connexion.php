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
			<h2>Connexion</h2>
            <form action="login.php" method="post">
                <input type="text" name="pseudo" placeholder ="Pseudo"> <br>
                <input type="password" name="mdp" placeholder ="Mot de passe"><br>
                <button type="submit" name="submit">Connexion</button><br>
            </form>
				
            <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<p>Remplir tous les champs</p>";
                }
                else if ($_GET["error"] == "wronglogin") {
                    echo "<p>Pseudo incorrect</p>";
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
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
		<?php include('header.php'); ?>
		
		<?php include('menu.php'); ?>
		<main>

		<div id="contenu">
			<h2>Accueil</h2>
				<p>	Ce site est un projet pour BDW1.</p>
				<p> Il permet d'afficher des images selon les catégories sélectionnées. </p>
				<p> Il permet aussi d'ajouter des images si vous possédez un compte </p>
		</div>
		
		</main>
		
		
		<?php include('footer.php'); ?>
	</div>
		
	</body>

</html>
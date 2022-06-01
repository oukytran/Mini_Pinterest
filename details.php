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

		<h1>Détail de l'image</h1>

            <img src="<?= . $photo["nomFich"]?>" alt="<?=$photo["description"]?>">
            
            <table class="table table-bordered">
                <tr>
                <td>Description</td>
                <td><?=$photo["description"]?></td>
                </tr>
                <tr>
                <td>Nom du fichier</td>
                <td><?=$photo["nomFich"]?></td>
                </tr>
                <tr>
                <td>Catégorie</td>
                <td><?=$categorie?></td>
                </tr>

            </table>
        </div>
		
		</main>
		
		
		<?php include('footer.php'); ?>
		
	</body>

</html>
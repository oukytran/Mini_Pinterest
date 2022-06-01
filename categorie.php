<?php
/////////Connexion à la BDD
include_once 'connexionBD.php';
/* fonction qui met à jour un champs <option> à 'selected' si la valeur passé en paramètre correspond */ 
$selected = function ($value) {
    echo (isset($_GET['valider']) && $_GET['categorie'] == $value) ? "selected" : '';
};

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Affichage </title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<style>
			td { border: 1px solid black; } 
		</style>
	</head>

	<body>
	<div id="conteneur">
		<?php include('header.php'); ?>
		
		<?php include('menu.php'); ?>
		
		<main>
		<div id="contenu">
			
			<h2>Categorie</h2>
			<form method="GET">
                    <p>Choisir la catégorie ? </p>
                    <select name="categorie">
                        <option value="tout" <?php $selected("tout") ?>>Toutes</option>
                        <option value="Animaux" <?php $selected("Animaux") ?>>Animaux</option>
                        <option value="Paysage" <?php $selected("Autres") ?>>Autres</option>
                    </select>
                    <input type="submit" value="Valider"/> </p>
            </form>

			<?php 

			$sql = "SELECT * FROM Photo ORDER BY photoId DESC";
			$res = mysqli_query($conn,$sql);

			if(mysqli_num_rows($res) > 0) {
				while ($photo = mysqli_fetch_assoc($res)) { echo "<img width=\"200px\" height=\"150px\" src= \"data/" . $photo['nomFich'] . " \"> ";?>
				
			<?php 

					}
				}
			?>
			
		</div>
		</main>
		<br>
		<br>
		<br>
		
		<?php include('footer.php'); ?>
	</div>	
	</body>



</html>


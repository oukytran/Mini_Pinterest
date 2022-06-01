<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Ajout </title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>



	<body>
	<div id="conteneur">
		<?php include('header.php'); ?>
		
		<?php include('menu.php'); ?>
		
		<main>
		<div id="contenu">
			<?php if (isset($_GET['error'])): ?>
				<p><?php echo $_GET['error']; ?></p>
			<?php endif ?>
			<h3>Envoi d'une image</h3>
			  <form enctype="multipart/form-data" action="upload.php" method="post">
				 <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
				 <input type="file" name="file" size=50 />
				 <input type="submit" name="submit" value="Envoyer" />
			  </form>
						  
			  
		</div>
		</main>
		<br>
		<br>
		
		
		<?php include('footer.php'); ?>
	</div>	
	</body>




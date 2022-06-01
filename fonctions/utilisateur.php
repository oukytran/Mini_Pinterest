<?php

/*Fonction pour se connecter à la base de données*/
function getConnection($dbHost, $dbUser, $dbPwd, $dbName)
{
	$dbHost = "localhost";
	$dbUser = "p1911682";
	$dbPwd = "confound";
	$dbName = "p1911682";
	
	$link = mysqli_connect($dbHost, $dbUser, $dbPwd, $dbName);
	if (!$link) {
		echo "Echec lors de la connexion a la base de donnees : (" . mysqli_connect_errno() . ") " . mysqli_connect_error();
	}
	return $link;
}
/*Cette fonction prend en entrée un pseudo à ajouter à la relation utilisateur et une connexion et 
retourne vrai si le pseudo est disponible (pas d'occurence dans les données existantes), faux sinon*/
function checkAvailability($pseudo, $link)
{
	$query = "SELECT pseudo FROM utilisateur WHERE pseudo = '". $pseudo ."';";
	$result = executeQuery($link, $query);
	return mysqli_num_rows($result) == 0;
}

/*Cette fonction prend en entrée un pseudo et un mot de passe et enregistre le nouvel utilisateur dans la relation utilisateur via la connexion*/
function register($pseudo, $hashPwd, $link)
{
	$query = "INSERT INTO utilisateur VALUES ('". $pseudo ."', '". $hashPwd ."', '". $color ."', 'disconnected');";
	executeUpdate($link, $query);
}
define('utilisateurs_db', "utilisateurs");
include_once 'bd.php';

/**
 * @brief Ajoute un utilisateur
 * 
 * @Param conn : Connexion à la DB
 * idU : Identifiant utilisateur
 * admin : Renseigne si l'utilisateur est admin ou non
 * passwd : Mot de passe
 */
function addUser($conn, $idU, $admin, $passwd){
	return addData($conn, utilisateurs_db, ["idU", $idU], ["admin", $admin], ["passwdHashed", md5($passwd)]);
}

/**
 * @brief Retourne les utilisateurs correspondant à la recherche
 * 
 * @Param conn : Connexion à la DB
 * idU : Identifiant utilisateur
 * admin : Renseigne si l'utilisateur est admin ou non
 * passwd : Mot de passe
 */
function getUsers($conn, $idU = ALL, $admin = ALL, $passwd = ALL){
	return getDatasLike($conn, utilisateurs_db, ["idU", $idU], ["admin", $admin], ["passwdHashed", $passwd]);
}

/**
 * @brief Met à jour les utilisateurs
 * 
 * @Param conn : Connexion à la DB
 * idU : Identifiant utilisateur
 * admin : Renseigne si l'utilisateur est admin ou non
 * passwd : Mot de passe
 */
function udpateUser($conn, $idU, $admin = NO_CHANGE, $passwd = NO_CHANGE ){
	return updateDatas($conn, utilisateurs_db, ["idU", $idU, NO_CHANGE], ["admin", ALL, $admin], ["passwdHashed", ALL, md5($passwd)]);
}
/**
 * @brief Vérifie si l'association Mot de passe / Identifiant est bon
 * 
 * @Param conn : Connexion à la DB
 * idU : Identifiant utilisateur
 * passwd : Mot de passe
 */
function isGoodLogin($conn, $idU, $passwd){
	$bddUserRow = getNextRowFrom(getUsers($conn, $idU));
	if($bddUserRow != END && $bddUserRow["passwdHashed"] == md5($passwd)) return true;

	else return false;
}

?>
<?php

if (isset($_POST["submit"])) {

    $username = $_POST["pseudo"];
    $pwd = $_POST["mdp"];

    require_once '../connexionBD.php';
    require_once 'fcts.php';

    if(champsVidesLog($name,$pwd) !== false) {
        header("Location: ../connexion.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $username, $pwd);
}
else {
    header("Location: ../connexion.php");
    exit();
    }
}
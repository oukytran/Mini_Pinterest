<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwdrepeat"];

    require_once '../connexionBD.php';
    require_once 'fcts.php';

    if(champsVides($name,$pwd,$pwd2) !== false) {
        header("Location: ../inscription.php?error=emptyinput");
        exit();
    }

    if(invalidPseudo($name) !== false) {
        header("Location: ../inscription.php?error=invalidPseudo");
        exit();
    }
    if(pseudoPris($conn,$name) !== false) {
        header("Location: ../inscription.php?error=pseudoPris");
        exit();
    }

    if(memePwd($pwd, $pwd2) !== false) {
        header("Location: ../inscription.php?error=pwdnonidentiques");
        exit();
    }

    createPseudo($conn, $name, $pwd);
    
} 
else {
    header("Location: ../inscription.php");
    exit();
}
<?php

function champsVides($name,$pwd,$pwd2) {
    $resultat;
    if (empty($name) || empty($pwd) || empty($pwd2)) {
        $resultat = true;

    }
    else {
        $resultat = false;
    }
    return $resultat;

}

function invalidPseudo($name) {
    $resultat;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        $resultat = true;

    }
    else {
        $resultat = false;
    }
    return $resultat;

}

function pseudoPris($conn,$name) {
    $sql = "SELECT * FROM Utilisateur WHERE pseudo = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../inscription.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;

    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function memePwd($pwd, $pwd2) {
    $resultat;
    if ($pwd !== $pwd2) {
        $resultat = true;

    }
    else {
        $resultat = false;
    }
    return $resultat;

}

function createPseudo($conn, $name, $pwd) {
    $sql = "INSERT INTO Utilisateur (Pseudo, mdp) VALUES (?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../inscription.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ss", $name, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../inscription.php?error=none");
    exit();
}

function champsVidesLog($name,$pwd) {
    $resultat;
    if (empty($name) || empty($pwd)) {
        $resultat = true;

    }
    else {
        $resultat = false;
    }
    return $resultat;
}

function loginUser($conn, $username, $pwd) {
    $pseudoExists = pseudoPris($conn, $name);

    if ($pseudoExists === false) {
        header("Location: ../connexion.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $pseudoExists["mdp"];
    $verifPwd = password_verify($pwd, $pwdHashed);

    if($verifPwd === false) {
        header("Location: ../connexion.php");
        exit();
    }
    else if ($verifPwd === true) {
        session_start();
        $_SESSION["pseudo"] = $pseudoExists["pseudo"];
        header("Location: ../index.php");
        exit();
    }
}

?>
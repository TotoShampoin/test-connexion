<?php
include "./functions/checker.php";
include "./functions/db_functions.php";

// Le champs mail/téléphone et le champ mot de passe sont le strict minimum obligatoire, d'après ce script
if( isset($_POST["login"]) && isset($_POST["login2"]) && isset($_POST["pass"]) ) {
    $login      = $_POST["login"];
    $login2     = $_POST["login2"];
    $pass       = $_POST["pass"];
    if( !checkLogin($login, $login2) ) {
        header("Location: /view/error.php?type=login_match");
    }
    $login_type = checkLoginType($login);
} else {
    header("Location: /view/error.php?type=log_pass_missing");
}

// Si le prénom, le nom de famille, le genre et la date de naissance ne sont pas fournis, ils ne seront pas dans la BDD
if( isset($_POST["first"] ) ) { $first  = $_POST["first"];  } else { $first  = null; }
if( isset($_POST["last"]  ) ) { $last   = $_POST["last"];   } else { $last   = null; }
if( isset($_POST["gender"]) ) { $gender = $_POST["gender"]; } else { $gender = null; }
if( isset($_POST["day"]) && isset($_POST["month"]) && isset($_POST["year"]) ) {
    $birth  = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
} else {
    $birth  = null;
}


if( $login_type == "invalid" ) {
    header("Location: /view/error.php?type=login_type");
}

// Si l'e-mail ou le numéro est disponible, on s'y inscrit
if ( loginAvailable($login, $login_type) ) {
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
    $log = signup( $login, $login_type, $hashed_password, $first, $last, $birth, $gender);
    $uid = $db->lastInsertId();
    if( $log == true ) {
        session_start();
        $_SESSION["user"] = $uid;
        header("Location: /view/connected");
    } else {
        var_dump($log);
    }
} else {
    header("Location: /view/error.php?type=login_exists");
}

?>
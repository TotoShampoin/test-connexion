<?php
include "./functions/checker.php";
include "./functions/db_functions.php";

// Le champs mail/téléphone et le champ mot de passe sont le strict minimum obligatoire
if( isset($_POST["login"]) && isset($_POST["pass"]) ) {
    $login      = $_POST["login"];
    $pass       = $_POST["pass"];
    $login_type = checkLoginType($login);
} else {
    header("Location: /view?error=log_pass_missing");
}

if( $login_type == "invalid" ) {
    header("Location: /view?error=login_type");
}

$log = login( $login, $login_type, $pass );
if( $log != false ) {
    session_start();
    $_SESSION["user"] = $log;
    header("Location: /connected");
} else {
    header("Location: /view?error=invalid");
}

?>
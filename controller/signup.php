<?php
include "./functions/checker.php";
include "./functions/db_functions.php";

// Le champs mail/téléphone et le champ mot de passe sont le strict minimum obligatoire
if( isset($_GET["login"]) && isset($_GET["pass"]) ) {
    $login      = $_GET["login"];
    $pass       = $_GET["pass"];
    $login_type = checkLoginType($login);
} else {
    header("Location: /view?error=log_pass_missing");
}

if( $login_type == "invalid" ) {
    header("Location: /view?error=login_type");
}

if ( loginAvailable($login, $login_type) ) {
    $log = signup($login, password_hash($pass, PASSWORD_BCRYPT), $login_type);
    $uid = $db->lastInsertId();
    if( $log == true ) {
        session_start();
        $_SESSION["user"] = $uid;
        header("Location: /view");
    } else {
        var_dump($log);
    }
} else {
    header("Location: /view?error=login_exists");
}

?>
<?php
// Pour qu'une requête ajax puisse obtenir les infos de l'utilisateur actuel
header("Content-Type: application/json");
include "./functions/db_functions.php";

session_start();

if( isset( $_SESSION["user"] ) ) {
    $infos = get_user( $_SESSION["user"] );
    echo json_encode($infos);
} else {
    echo "false";
}

?>
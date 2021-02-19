<?php
include ".secret/db.php";

// Vérifier que l'e-mail ou le numéro n'est pas déjà pris
function loginAvailable(string $login = "", $log_type) {
    $db = $GLOBALS["db"];
    $requete = "SELECT user.id FROM user WHERE user.$log_type = :login";
    $stmt=$db->prepare($requete);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    
    if($result == false) {
        return true;
    } else {
        return false;
    }
}

// Se connecter, avec un e-mail/numéro et un mot de passe, d'un point de vue BDD
function  login(
                string $login, string $login_type, 
                string $pass
                ) {
    $db = $GLOBALS["db"];
    $requete = "SELECT user.id, user.password FROM user WHERE user.$login_type = :login";
    $stmt=$db->prepare($requete);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    if( $result != false && password_verify( $pass , $result["password"]) ) {
        return $result["id"];
    } else {
        return false;
    }
}

// S'inscrire, d'un point de vue BDD
function signup(
                string $login, string $log_type, 
                string $hashed_password, 
                $first = null, $last = null, $birth = null, $gender = null
                ) {
    $db = $GLOBALS["db"];
    $requete = "INSERT INTO `user` 
                (`$log_type`, `password`, `name_first`, `name_last`, `birthday`, `gender`) 
        VALUES  (     :login,      :pass,       :first,       :last,     :birth,    :gend)";
    $stmt=$db->prepare($requete);
        $stmt->bindValue(":login",           $login, PDO::PARAM_STR);
        $stmt->bindValue(":pass" , $hashed_password, PDO::PARAM_STR);
        $stmt->bindValue(":first",           $first, PDO::PARAM_STR);
        $stmt->bindValue(":last" ,            $last, PDO::PARAM_STR);
        $stmt->bindValue(":birth",           $birth, PDO::PARAM_STR);
        $stmt->bindValue(":gend" ,          $gender, PDO::PARAM_STR);
    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return $e;
    }
}

// Quelles sont les infos de l'utilisateur avec cet ID?
function get_user( $id = null ) {
    $db = $GLOBALS["db"];
    $requete = "SELECT user.id, user.email, user.phone, user.name_first, user.name_last, user.birthday, user.gender FROM user WHERE user.id = :id";
    $stmt=$db->prepare($requete);
        $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

?>
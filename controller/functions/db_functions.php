<?php
include ".secret/db.php";

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

function login(string $login, string $hashed_password, string $login_type) {
    $db = $GLOBALS["db"];
    $requete = "SELECT user.password FROM user WHERE user.$login_type = :login";
    $stmt=$db->prepare($requete);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    if( $result != false && password_verify( $result["password"] , $hashed_password ) ) {
        return true;
    } else {
        return false;
    }
}

function signup(string $login, string $hashed_password, string $log_type) {
    $db = $GLOBALS["db"];
    $requete = "INSERT INTO `user` 
                (`$log_type`, `password`, `name_first`, `name_last`, `birthday`, `gender`) 
        VALUES  (     :login,      :pass,       :first,       :last,     :birth,    :gend)";
    $stmt=$db->prepare($requete);
        $stmt->bindValue(":login",  $login, PDO::PARAM_STR);
        $stmt->bindValue(":pass" ,   $pass, PDO::PARAM_STR);
        $stmt->bindValue(":first",  $first, PDO::PARAM_STR);
        $stmt->bindValue(":last" ,   $last, PDO::PARAM_STR);
        $stmt->bindValue(":birth",  $birth, PDO::PARAM_STR);
        $stmt->bindValue(":gend" , $gender, PDO::PARAM_STR);
    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return $e;
    }
}
?>
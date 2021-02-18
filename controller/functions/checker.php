<?php
function isMail(string $mail = "") {
    $filtered_mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
    if ( !filter_var($filtered_mail, FILTER_VALIDATE_EMAIL) === false ) {
        return true;
    } else {
        return false;
    }
};
function isPhone(string $phone = "") {
    if( preg_match('/^[0-9]/', $phone) ) {
        return true;
    } else {
        return false;
    }
}

// Vérifier si le login est un e-mail ou un numéro de téléphone
function checkLoginType(string $login = "") {
    if(isMail($login)) {
        return "email";
    } elseif(isPhone($login)) {
        return "phone";
    } else {
        return "invalid";
    }
}

?>
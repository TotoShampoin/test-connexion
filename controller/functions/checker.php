<?php
function isMail(string $mail = "") {
    $filtered_mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
    return ( !filter_var($filtered_mail, FILTER_VALIDATE_EMAIL) === false );
}
function isPhone(string $phone = "") {
    return ( preg_match('/^[0-9]/', $phone) );
}

function checkLogin(string $log1, string $log2) {
    return ($log1 == $log2);
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
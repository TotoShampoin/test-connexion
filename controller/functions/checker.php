<?php
// Vérifier si l'e-mail est valide
function isMail(string $mail = "") {
    $filtered_mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
    return ( !filter_var($filtered_mail, FILTER_VALIDATE_EMAIL) === false );
}
// Vérifier si le numéro de téléphone est valide
function isPhone(string $phone = "") {
    return ( preg_match('/^[0-9]/', $phone) );
}
// Vérifier si le login1 et le login2 correspondent
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
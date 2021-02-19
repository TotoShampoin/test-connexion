"use strict";

// Les deux champs login sont-ils identiques
function checkSignup() {
    const $login1 = $("#login1");
    const $login2 = $("#login2");

    
    if( $login1.val() == $login2.val()) {
        return true;
    } else {
        return false;
    }
}

// Le champ date est-il valide
function checkDate() {
    const   year  = $("#year").val().padStart(4,"0"),
            month = $("#month").val().padStart(2,"0"),
            day   = $("#day").val().padStart(2,"0");
    const birth = `${year}-${month}-${day}`;
    const isobirth = new Date(`${birth}T00:00:00+0000`);
    if( isobirth.toString() != "Invalid Date" ) {
        if( isobirth.toISOString().split('T')[0] == birth ) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Le mot de passe est-il assez fort
function checkPassword() {
    const $pass = $("#pass1").val();
    return /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-,.]).{8,}$/.test($pass);
}

// Si une des trois conditions au dessus est faux, on désactive le bouton Inscription
function checkAll() {
    let check = true;
    if( !checkDate() ){ check = false; }
    if( !checkSignup() ){ check = false; }
    if( !checkPassword() ){ check = false; }

    console.log(check)
    if( check ) {
        $(".signup-submit").removeAttr("disabled");
    } else {
        $(".signup-submit").attr("disabled", true);
    }
}

$(document).ready(function() {
    $(".signup input").keydown(checkAll);
    $(".signup input").change(checkAll);
    checkAll();
})
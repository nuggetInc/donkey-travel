<?php

function emptyInputSingup($Name, $Surname, $Email, $Telefoon, $Wachtwoord,) {
    $result;
    if (empty($Name) || empty($Surname) || empty($Email) || empty($Telefoon) || empty($Wachtwoord)) {
        $result; = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($Email,) {
    $result;
    if (!filter_var($Email, FILTER_VALIDAT_EMAIL)) {
        $result; = true;
    }
    else {
        $result = false;
    }
    return $result;    
}

function wwMatch($wachtwoord, $wwRepeat,) {
    $result;
    if ($wachtwoord !== $wwRepeat) {
        $result; = true;
    }
    else {
        $result = false;
    }
    return $result;    
}

function invalidTelefoon($Telefoon,) {
    $result;
    if() {

    }
    else {
        $result;
    }
    return $result;
}


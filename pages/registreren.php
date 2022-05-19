<?php


if(isset($_POST["submit"])) 
{

    $naam = $_POST["naam"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $telefoon = $_POST["telefoon"];
    $wachtwoord = $_POST["wachtwoord"];
    $wwRepeat = $_POST["wwRepeat"];
    
    require_once 'functies.php';

    if (emptyInputSingup($naam, $achternaam, $email, $telefoon, $wachtwoord,) !== false) {
        header("location: ". ROOT_DIR . "registreren");
        exit();
    }

    if (invalidEmail($email) !==false){
        header("location: ". ROOT_DIR . "registreren");
        exit();
    }

    if (invalidTelefoon($telefoon) !==false){
        header("location: ". ROOT_DIR . "registreren");
        exit();
    }

    if (wwMatch($wachtwoord, $wwRepeat) !==false){
        header("location: ". ROOT_DIR . "registreren");
        exit();
    }

    createUser($Naam, $Achternaam, $Email, $Telefoon, $Wachtwoord, );

}

?>

<form>
    <input type="text" name="naam" placeholder="Naam...">
    <input type="text" name="achternaam" placeholder="Achternaam...">
    <input type="text" name="telefoon" placeholder="Telefoon...">
    <input type="text" name="email" placeholder="Email...">
    <input type="password" name="wachtwoord" placeholder="Wachtwoord...">
    <input type="password" name="wwRepeat" placeholder="Herhaal Wachtwoord...">
    <br>
    <button type="submit" name="Signup_submit">Registreren</button>
</form>
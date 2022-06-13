<?php

if(isset($_POST['Signup_submit']) && $_POST['wachtwoord'] == $_POST['wwRepeat'])
{
    $password =  password_hash($_POST["wachtwoord"], PASSWORD_DEFAULT);
    customer::create($_POST['naam'], $_POST['email'], $_POST['telefoon'], $password);
    header('Location: '.ROOT_DIR.'inloggen');
    exit;
}

?>


<div class="center">
     <form method="POST">

         <h1 class="title">Registreren</h1>

         <label>Naam
             <input type="text" name="naam" placeholder="Naam...">
         </label>

         <label>Telefoonnummer
             <input type="text" name="telefoon" placeholder="Telefoon...">
         </label>

         <label>E-mail
             <input type="email" name="email" placeholder="Email...">
         </label>
         <label>Wachtwoord
             <input type="password" name="wachtwoord" placeholder="Wachtwoord...">
         </label>

         <label>Herhaal wachtwoord
             <input type="password" name="wwRepeat" placeholder="Herhaal Wachtwoord...">
         </label>

         <button class="buttonSize" type="submit" name="Signup_submit">Registreren</button>

     </form>
</div>

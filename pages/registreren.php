<?php

if(isset($_POST['Signup_submit']) && $_POST['password'] == $_POST['passwordRepeat'] && customer::getByEmail($_POST['email']) == NULL)
{
    $password =  password_hash($_POST["password"], PASSWORD_DEFAULT);
    customer::create($_POST['name'], $_POST['email'], $_POST['phone'], $password);
    header('Location: '.ROOT_DIR.'inloggen');
    exit;
}else if(isset($_POST['Signup_submit']) && $_POST['password'] == $_POST['passwordRepeat'] && customer::getByEmail($_POST['email']) != NULL)
{
   echo("er is iets fout gegaan, probeer het opnieuw");
}

?>


<div class="center">
     <form method="POST">

         <h1 class="title">Registreren</h1>

         <label>Naam
             <input type="text" name="name" placeholder="Naam...">
         </label>

         <label>Telefoonnummer
             <input type="text" name="phone" placeholder="Telefoon...">
         </label>

         <label>E-mail
             <input type="email" name="email" placeholder="Email...">
         </label>
         <label>Wachtwoord
             <input type="password" name="password" placeholder="Wachtwoord...">
         </label>

         <label>Herhaal wachtwoord
             <input type="password" name="passwordRepeat" placeholder="Herhaal Wachtwoord...">
         </label>

         <button class="buttonSize" type="submit" name="Signup_submit">Registreren</button>

     </form>
</div>

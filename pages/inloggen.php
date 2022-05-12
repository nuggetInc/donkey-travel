<?php

declare(strict_types=1);

// Only run logic if form is sumbitted
if (isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($customer = Customer::byEmail($email))
    {
        if (password_verify($password, $customer->getPassword()))
        {
            $_SESSION["user"] = $customer;

            // header("Location: " . ROOT_DIR);
            // exit;
        }
    }

    // Reaching here means the email or password is incorrect 

    $_SESSION["login-email"] = $email;
    $_SESSION["login-password"] = $password;

    // header("Location: " . ROOT_DIR);
    // exit;
}


echo password_hash($_SESSION["login-password"], PASSWORD_DEFAULT);

$email = htmlspecialchars($_SESSION["login-email"] ?? "");
$password = htmlspecialchars($_SESSION["login-password"] ?? "");

?>
<form method="POST">
    <h1>Mijn Donkey Travel inloggen</h1>

    <label>E-mailadres
        <input type="email" name="email" placeholder="E-mailadres" value="<?= $email ?>" onfocus="this.select()" required />
    </label>

    <label>Wachtwoord
        <input type="password" name="password" placeholder="Wachtwoord" value="<?= $password ?>" onfocus="this.select()" required />
    </label>

    <button type="submit" name="login">Inloggen</button>
</form>

<form action="<?= ROOT_DIR . "registreren" ?>">
    <h2>Nog geen account?</h2>
    <button type="submit">Maak er hier eentje aan!</button>
</form>

<?php

unset($_SESSION["login-email"]);
unset($_SESSION["login-password"]);

?>
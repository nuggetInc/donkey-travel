<?php

declare(strict_types=1);

// Only run logic if form is sumbitted
if (isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($customer = Customer::getByEmail($email))
    {
        if (password_verify($password, $customer->getPassword()))
        {
            $_SESSION["customerID"] = $customer->getID();

            header("Location: " . ROOT_DIR);
            exit;
        }
    }

    $_SESSION["error"] = "Het E-mailadres of het wachtwoord is incorrect";
    // Reaching here means the email or password is incorrect 

    $_SESSION["login-email"] = $email;
    $_SESSION["login-password"] = $password;

    header("Location: " . ROOT_DIR);
    exit;
}

$email = htmlspecialchars($_SESSION["login-email"] ?? "");
$password = htmlspecialchars($_SESSION["login-password"] ?? "");

?>
<form method="POST">
    <h1>Mijn Donkey Travel inloggen</h1>

    <?php if (isset($_SESSION["error"])) : ?>
        <p><?= $_SESSION["error"] ?></p>
    <?php endif ?>

    <label>E-mailadres
        <input type="email" name="email" placeholder="E-mailadres" value="<?= htmlspecialchars($email) ?>" onfocus="this.select()" required />
    </label>

    <label>Wachtwoord
        <input type="password" name="password" placeholder="Wachtwoord" onfocus="this.select()" required />
    </label>

    <button type="submit" name="login">Inloggen</button>
</form>

<h2>Nog geen account?</h2>
<a href="<?= ROOT_DIR . "registreren" ?>">Maak er hier eentje aan!</a>

<?php

unset($_SESSION["error"]);
unset($_SESSION["login-email"]);
unset($_SESSION["login-password"]);

?>
<?php

declare(strict_types=1);

// Only run logic if form is sumbitted
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($customer = Customer::getByEmail($email)) {
        if (password_verify($password, $customer->getPassword())) {
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
<header class="page-header"><span class="logo">Donkey<span class="green">Travel</span></span></header>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Inloggen</header>

        <?php if (isset($_SESSION["error"])) : ?>
            <p class="error"><?= $_SESSION["error"] ?></p>
        <?php endif ?>

        <label>
            <header>E-mailadres</header>
            <input type="email" name="email" placeholder="E-mailadres" value="<?= htmlspecialchars($email) ?>" onfocus="this.select()" required />
        </label>

        <label>
            <header>Wachtwoord</header>
            <input type="password" name="password" placeholder="Wachtwoord" onfocus="this.select()" required />
        </label>

        <input type="submit" name="login" value="Inloggen" />

        <footer>
            <span>Nog geen account?</span>
            <a class="link" href="<?= ROOT_DIR . "registreren" ?>">Maak er eentje aan!</a>
        </footer>
    </form>
</div>

<?php

unset($_SESSION["error"]);
unset($_SESSION["login-email"]);
unset($_SESSION["login-password"]);

?>
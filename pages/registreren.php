<?php

if (isset($_POST['register'])) {
    if (customer::getByEmail($_POST['email']) !== null) {
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["phonenumber"] = $_POST["phonenumber"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["error"] = "E-mailadres bestaat al.";

        header('Location: ' . ROOT_DIR . 'registreren');
        exit;
    }

    if ($_POST['password'] !== $_POST['passwordRepeat']) {
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["phonenumber"] = $_POST["phonenumber"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["error"] = "Wachtwoorden komen niet overheen.";

        header('Location: ' . ROOT_DIR . 'registreren');
        exit;
    }

    $password =  password_hash($_POST["password"], PASSWORD_DEFAULT);
    customer::create($_POST["name"], $_POST["email"], $_POST["phonenumber"], $password);

    header('Location: ' . ROOT_DIR . 'inloggen');
    exit;
}

$name = htmlspecialchars($_SESSION["name"] ?? "");
$phonenumber = htmlspecialchars($_SESSION["phonenumber"] ?? "");
$email = htmlspecialchars($_SESSION["email"] ?? "");

?>

<header class="page-header"><span class="logo">Donkey<span class="green">Travel</span></span></header>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Registreren</header>

        <?php if (isset($_SESSION["error"])) : ?>
            <p class="error"><?= $_SESSION["error"] ?></p>
        <?php endif ?>

        <label>
            <header>Naam</header>
            <input type="text" name="name" value="<?= $name ?>" placeholder="Naam">
        </label>

        <label>
            <header>E-mailadres</header>
            <input type="email" name="email" value="<?= $email ?>" placeholder="E-mailadres">
        </label>

        <label>
            <header>Telefoonnummer</header>
            <input type="tel" name="phonenumber" value="<?= $phonenumber ?>" placeholder="Telefoonnummer">
        </label>

        <label>
            <header>Wachtwoord</header>
            <input type="password" name="password" placeholder="Wachtwoord">
        </label>

        <label>
            <header>Herhaal wachtwoord</header>
            <input type="password" name="passwordRepeat" placeholder="Herhaal Wachtwoord">
        </label>

        <input type="submit" name="register" value="Registreren" />

        <footer><a class="link" title="Annuleer registratie" href="<?= ROOT_DIR ?>inloggen">Annuleren</a></footer>
    </form>
</div>
<?php

unset($_SESSION["name"]);
unset($_SESSION["phonenumber"]);
unset($_SESSION["email"]);
unset($_SESSION["error"]);

?>
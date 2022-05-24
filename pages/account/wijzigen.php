<?php

declare(strict_types=1);

$customer = Customer::get($_SESSION["customerID"]);

if (isset($_POST["edit"]))
{
    $customerID = $_SESSION["customerID"];
    $name = $_POST["name"];
    $email =  $_POST["email"];
    $phonenumber = $_POST["phonenumber"];

    if ($_POST["password"] === "")
        $password = $customer->getPassword();
    else
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $_SESSION["error"] = "Het E-mailadres ongeldig";

        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["phonenumber"] = $phonenumber;

        header("Location: " . ROOT_DIR . "account");
        exit;
    }

    if (!filter_var($phonenumber, FILTER_SANITIZE_NUMBER_INT))
    {
        $_SESSION["error"] = "Het telefoonnummer is ongeldig";

        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["phonenumber"] = $phonenumber;

        header("Location: " . ROOT_DIR . "account");
        exit;
    }

    Customer::update($customerID, $name, $email, $phonenumber, $password);

    mail($email, "Account veranderingen", "Je account op donkeytravel.nl is successvol aangepast.");

    header("Location: " . ROOT_DIR . "account");
    exit;
}

?>
<form method="POST">
    <h2>Account wijzigen</h2>

    <?php if (isset($_SESSION["error"])) : ?>
        <p><?= $_SESSION["error"] ?></p>
    <?php endif ?>

    <label>Naam:
        <input type="text" name="name" value="<?= htmlspecialchars($customer->getName()) ?>" onfocus="this.select()" required />
    </label>

    <label>E-mail adres:
        <input type="email" name="email" value="<?= htmlspecialchars($customer->getEmail()) ?>" onfocus="this.select()" required />
    </label>

    <label>Telefoon:
        <input type="tel" name="phonenumber" value="<?= htmlspecialchars($customer->getPhonenumber()) ?>" onfocus="this.select()" required />
    </label>

    <label>Wachtwoord:
        <input type="password" name="password" placeholder="Nieuw wachtwoord" />
    </label>

    <input type="submit" name="edit" value="Bewaren" />
</form>
<a href="<?= ROOT_DIR ?>account/verwijderen">Verwijderen</a>
<a href="<?= ROOT_DIR ?>">Annuleren</a>
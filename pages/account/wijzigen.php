<?php

declare(strict_types=1);

$customer = Customer::get($_SESSION["customerID"]);

if (isset($_POST["edit"]))
{
    if ($_POST["password"] === "")
        $password = $customer->getPassword();
    else
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    Customer::update(
        $_SESSION["customerID"],
        $_POST["name"],
        $_POST["email"],
        $_POST["phonenumber"],
        $password
    );

    mail($_POST["email"], "Account veranderingen", "Je account op donkeytravel.nl is successvol aangepast.");

    header("Location: " . ROOT_DIR . "account");
    exit;
}

?>
<h2>Account wijzigen</h2>
<form method="POST">
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
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

    header("Location: " . ROOT_DIR . "account");
    exit;
}

?>
<h2>Account wijzigen</h2>
<form method="POST">
    <label>Naam:
        <input type="text" name="name" value="<?= htmlspecialchars($customer->getName()) ?>" />
    </label>

    <label>E-mail adres:
        <input type="email" name="email" value="<?= htmlspecialchars($customer->getEmail()) ?>" />
    </label>

    <label>Telefoon:
        <input type="tel" name="phonenumber" value="<?= htmlspecialchars($customer->getPhonenumber()) ?>" />
    </label>

    <label>Wachtwoord:
        <input type="password" name="password" placeholder="Nieuw wachtwoord" />
    </label>

    <input type="submit" name="edit" value="Bewaren" />
</form>
<a href="<?= ROOT_DIR ?>">Annuleren</a>
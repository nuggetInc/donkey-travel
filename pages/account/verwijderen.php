<?php

declare(strict_types=1);

$customer = Customer::get($_SESSION["customerID"]);

if (isset($_POST["delete"]))
{
    Customer::delete($_SESSION["customerID"]);
    unset($_SESSION["customerID"]);

    header("Location: " . ROOT_DIR);
    exit;
}

?>
<h2>Account verwijderen</h2>
<form method="POST">
    <label>Naam:
        <input type="text" name="name" value="<?= htmlspecialchars($customer->getName()) ?>" disabled />
    </label>

    <label>E-mail adres:
        <input type="email" name="email" value="<?= htmlspecialchars($customer->getEmail()) ?>" disabled />
    </label>

    <label>Telefoon:
        <input type="tel" name="phonenumber" value="<?= htmlspecialchars($customer->getPhonenumber()) ?>" disabled />
    </label>

    <input type="submit" name="delete" value="Dit account Werkelijk verwijderen" />
</form>
<a href="<?= ROOT_DIR ?>account">Annuleren</a>
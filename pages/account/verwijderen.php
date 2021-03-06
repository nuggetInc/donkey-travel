<?php

declare(strict_types=1);

if (isset($_POST["delete"])) {
    Customer::delete($_SESSION["customerID"]);
    unset($_SESSION["customerID"]);

    header("Location: " . ROOT_DIR);
    exit;
}

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Account verwijderen</header>

        <label>
            <header>Naam:</header>
            <input type="text" name="name" value="<?= htmlspecialchars($customer->getName()) ?>" disabled />
        </label>

        <label>
            <header>E-mailadres:</header>
            <input type="email" name="email" value="<?= htmlspecialchars($customer->getEmail()) ?>" disabled />
        </label>

        <label>
            <header>Telefoon:</header>
            <input type="tel" name="phonenumber" value="<?= htmlspecialchars($customer->getPhonenumber()) ?>" disabled />
        </label>

        <input type="submit" name="delete" value="Definitief verwijderen" />

        <footer><a class="link" title="Annuleer Verwijdering" href="<?= ROOT_DIR ?>account/bekijken">Annuleren</a></footer>
    </form>
</div>
<?php

declare(strict_types=1);

$customer = Customer::get($_SESSION["customerID"]);

?>
<header class="page-header">
    <a class="logo" href="<?= ROOT_DIR ?>">Donkey<span class="green">Travel</span></a>
    <a class="info" href="<?= ROOT_DIR ?>account" title="Naam: <?= $customer->getName() ?>&#10;E-mailadres: <?= $customer->getEmail() ?>&#10;Telefoonnummer: <?= $customer->getPhonenumber() ?>"><?= $customer->getName() ?></a>
    <ul class="nav">
        <li><a class="link" title="Boekingen overzicht" href="<?= ROOT_DIR ?>boekingen" ?>Boekingen</a></li>
        <li><a class="link" title="Account overzicht" href="<?= ROOT_DIR ?>account" ?>Account</a></li>
        <li><a class="link" title="Uitloggen overzicht" href="<?= ROOT_DIR ?>uitloggen" ?>Uitloggen</a></li>
    </ul>
</header>
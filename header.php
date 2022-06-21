<?php

declare(strict_types=1);

$customer = Customer::get($_SESSION["customerID"]);

?>
<header class="page-header">
    <span class="logo">Donkey<span class="green">Travel</span></span>
    <span class="info" title="Naam: <?= $customer->getName() ?>&#10;E-mailadres: <?= $customer->getEmail() ?>&#10;Telefoonnummer: <?= $customer->getPhonenumber() ?>"><?= $customer->getName() ?></span>
    <ul class="nav">
        <li><a class="link" title="Boekingen overzicht" href="<?= ROOT_DIR ?>boekingen" ?>Boekingen</a></li>
        <li><a class="link" title="Account overzicht" href="<?= ROOT_DIR ?>account" ?>Account</a></li>
        <li><a class="link" title="Uitloggen overzicht" href="<?= ROOT_DIR ?>uitloggen" ?>Uitloggen</a></li>
    </ul>
</header>
<!-- <table>
    <tbody>
        <tr>
            <td>
                <h1>Mijn Donkey Travel</h1>
            </td>
            <td>Ingelogd als</td>
            <td>
                <?= $customer->getName() ?><br />
                <?= $customer->getEmail() ?><br />
                <?= $customer->getPhonenumber() ?>
            </td>
            <td>
                <a href="<?= ROOT_DIR ?>uitloggen">Uitloggen</a>
            </td>
        </tr>
    </tbody>
</table>
<ul>
    <li>
        <a href="<?= ROOT_DIR ?>boekingen">Boekingen</a>
    </li>
    <li>
        <a href="<?= ROOT_DIR ?>account">Account</a>
    </li>
</ul>
<hr> -->
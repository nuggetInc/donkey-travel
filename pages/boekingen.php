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
<?php

if (isset($_GET["id"])) {
    $reservation = Reservation::get((int)$_GET["id"]);

    if (
        !isset($reservation) ||
        $reservation->getCustomerID() !== $_SESSION["customerID"]
    ) {
        unset($reservation);
    }
}

switch ($path[1] ?? null) {
    case "overzicht":
    case "aanvragen":
        require("pages/boekingen/{$path[1]}.php");
        break;
    case "wijzigen":
    case "verwijderen":
        if (isset($reservation))
            require("pages/boekingen/{$path[1]}.php");
        else
            require("pages/boekingen/overzicht.php");
        break;
    default:
        if (isset($reservation))
            require("pages/boekingen/bekijken.php");
        else
            require("pages/boekingen/overzicht.php");
        break;
}

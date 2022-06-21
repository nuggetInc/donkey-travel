<?php

declare(strict_types=1);

if (isset($_GET["id"])) {
    $reservation = Reservation::get((int)$_GET["id"]);

    if (
        !isset($reservation) ||
        $reservation->getCustomerID() !== $_SESSION["customerID"]
    ) {
        unset($reservation);
    }
}

switch ($path[2] ?? null) {
    case "overzicht":
    case "aanvragen":
        require("pages/beheer/boekingen/{$path[2]}.php");
        break;
    case "wijzigen":
    case "verwijderen":
        if (isset($reservation))
            require("pages/beheer/boekingen/{$path[2]}.php");
        else
            require("pages/beheer/boekingen/overzicht.php");
        break;
    default:
        if (isset($reservation))
            require("pages/beheer/boekingen/bekijken.php");
        else
            require("pages/beheer/boekingen/overzicht.php");
        break;
}

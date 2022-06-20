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

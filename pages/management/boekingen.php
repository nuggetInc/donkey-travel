<?php

declare(strict_types=1);

if (isset($_GET["boeking"])) {
    $reservation = Reservation::get((int)$_GET["boeking"]);
}

switch ($path[2] ?? null) {
    case "overzicht":
    case "aanvragen":
        require("pages/management/boekingen/{$path[2]}.php");
        break;
    case "bekijken":
    case "wijzigen":
    case "verwijderen":
    case "pauzeplaatsen":
    case "overnachtingen":
        if (isset($reservation))
            require("pages/management/boekingen/{$path[2]}.php");
        else
            require("pages/management/boekingen/overzicht.php");
        break;
    default:
        if (isset($reservation))
            require("pages/management/boekingen/bekijken.php");
        else
            require("pages/management/boekingen/overzicht.php");
        break;
}

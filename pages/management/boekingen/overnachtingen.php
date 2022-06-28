<?php

declare(strict_types=1);

if (isset($_GET["overnachting"])) {
    $overnightStay = OvernightStay::get((int)$_GET["overnachting"]);
}

switch ($path[3] ?? null) {
    case "overzicht":
        require("pages/management/boekingen/overnachtingen/{$path[3]}.php");
        break;
    case "bekijken":
    case "wijzigen":
    case "verwijderen":
        if (isset($overnightStay))
            require("pages/management/boekingen/overnachtingen/{$path[3]}.php");
        else
            require("pages/management/boekingen/overnachtingen/overzicht.php");
        break;
    default:
        if (isset($overnightStay))
            require("pages/management/boekingen/overnachtingen/bekijken.php");
        else
            require("pages/management/boekingen/overnachtingen/overzicht.php");
        break;
}

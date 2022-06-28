<?php

declare(strict_types=1);

if (isset($_GET["pauzeplek"])) {
    $breakspot = Breakspot::get((int)$_GET["pauzeplek"]);
}

switch ($path[3] ?? null) {
    case "overzicht":
        require("pages/management/boekingen/pauzeplaatsen/{$path[3]}.php");
        break;
    case "bekijken":
    case "wijzigen":
    case "verwijderen":
        if (isset($breakspot))
            require("pages/management/boekingen/pauzeplaatsen/{$path[3]}.php");
        else
            require("pages/management/boekingen/pauzeplaatsen/overzicht.php");
        break;
    default:
        if (isset($breakspot))
            require("pages/management/boekingen/pauzeplaatsen/bekijken.php");
        else
            require("pages/management/boekingen/pauzeplaatsen/overzicht.php");
        break;
}

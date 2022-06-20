<?php

declare(strict_types=1);

switch ($path[2] ?? null) {
    case "overzicht":
    case "aanvragen":
    case "wijzigen":
    case "verwijderen":
        require("pages/beheer/boekingen/{$path[2]}.php");
        break;
    default:
        require("pages/beheer/boekingen/overzicht.php");
        break;
}

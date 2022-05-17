<?php

declare(strict_types=1);

switch ($path[1] ?? null)
{
    case "overzicht":
    case "aanvragen":
    case "wijzigen":
    case "verwijderen":
    case "activeren":
    case "route":
        require("pages/boekingen/{$path[1]}.php");
        break;
    default:
        require("pages/boekingen/overzicht.php");
        break;
}

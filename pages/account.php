<?php

declare(strict_types=1);

switch ($path[1] ?? null)
{
    case "wijzigen":
    case "verwijderen":
        require("pages/account/{$path[1]}.php");
        break;
    default:
        require("pages/account/wijzigen.php");
        break;
}

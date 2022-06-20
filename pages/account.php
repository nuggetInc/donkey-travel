<?php

declare(strict_types=1);

$customer = Customer::get($_SESSION["customerID"]);

switch ($path[1] ?? null) {
    case "bekijken":
    case "wijzigen":
    case "verwijderen":
        require("pages/account/{$path[1]}.php");
        break;
    default:
        require("pages/account/bekijken.php");
        break;
}

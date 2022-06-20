<?php

declare(strict_types=1);

switch ($path[1] ?? null) {
    case "boekingen":
        require("pages/beheer/{$path[1]}.php");
        break;
    default:
        require("pages/beheer/boekingen.php");
        break;
}

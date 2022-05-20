<?php

declare(strict_types=1);

require_once("classes/Customer.php");
require_once("classes/Reservation.php");
require_once("classes/Status.php");
require_once("classes/Trip.php");
session_start();

define("ROOT_DIR", substr($_SERVER["PHP_SELF"], 0, -strlen("index.php")));

/** Get PDO instance */
function getPDO(): PDO
{
    static $pdo = new PDO("mysql:host=localhost;dbname=donkey_travel", "root", "");

    return $pdo;
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?= ROOT_DIR ?>css/style.css">
    <title>Donkey Travel</title>
</head>

<body>
    <?php

    // Get the page and split on "/"
    $path = explode("/", trim(substr($_SERVER["REDIRECT_URL"], strlen(ROOT_DIR)), "/"));

    switch ($path[0])
    {
        case "inloggen":
        case "registreren":
        case "uitloggen":
            require("pages/{$path[0]}.php");
            break;
        case "boekingen":
        case "account":
            if (isset($_SESSION["customerID"]))
            {
                require("header.php");
                require("pages/{$path[0]}.php");
                break;
            }
        default:
            if (isset($_SESSION["customerID"]))
            {
                require("header.php");
                require("pages/boekingen.php");
            }
            else
            {
                require("pages/inloggen.php");
            }

            break;
    }

    ?>
</body>

</html>
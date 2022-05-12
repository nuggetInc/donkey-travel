<?php

declare(strict_types=1);

require_once("classes/Customer.php");
session_start();

const ROOT_DIR = "/donkey-travel/";

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
        case "registreren":
        case "uitloggen":
            require("pages/{$path[0]}.php");
            break;
        case "boekingen":
        case "account":
            if (isset($_SESSION["user"]))
            {
                require("header.php");
                require("pages/{$path[0]}.php");
                break;
            }
        default:
            if (isset($_SESSION["user"]))
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
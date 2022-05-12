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
    <title>Donkey Travel</title>
</head>

<body>
    <?php

    $page = trim(substr($_SERVER["REDIRECT_URL"], strlen(ROOT_DIR)), "/");
    $path = explode("/", $page);

    // This uses the path to get the page the user wants to be on
    if (empty($path[0]))
    {
        if (isset($_SESSION["user"]))
        {
            require("pages/boekingen.php");
        }
        else
        {
            require("pages/inloggen.php");
        }
    }
    else if (file_exists("pages/{$page}.php"))
    {
        // Open the page if it exists
        require("pages/{$path[0]}.php");
    }
    else
    {
        // Show 404 if page doesn't exist
        require("pages/404.php");
    }

    ?>
</body>

</html>
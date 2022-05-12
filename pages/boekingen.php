<?php

declare(strict_types=1);

if (!isset($_SESSION["user"]))
{
    header("Location: " . ROOT_DIR . "inloggen");
    exit;
}

?>
<header>
    <ul>
        <li><a href="<?= ROOT_DIR ?>boekingen/overzicht">overzicht</a></li>
        <li><a href="<?= ROOT_DIR ?>boekingen/aanvragen">aanvragen</a></li>
        <li><a href="<?= ROOT_DIR ?>boekingen/wijzigen">wijzigen</a></li>
        <li><a href="<?= ROOT_DIR ?>boekingen/verwijderen">verwijderen</a></li>
        <li><a href="<?= ROOT_DIR ?>boekingen/activeren">(de)activeren</a></li>
        <li><a href="<?= ROOT_DIR ?>boekingen/route">route</a></li>
    </ul>
</header>
<?php

// This uses the url to get the page the user wants to be on
if (empty($path[1]))
{
    require("pages/boekingen/overzicht.php");
}
else
{
    require("pages/{$page}.php");
}

?>
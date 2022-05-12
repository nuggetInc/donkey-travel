<?php

declare(strict_types=1);

$user = $_SESSION["user"];

?>
<table>
    <tbody>
        <tr>
            <td>
                <h1>Mijn Donkey Travel</h1>
            </td>
            <td>Ingelogd als</td>
            <td>
                <?= $user->getName() ?><br />
                <?= $user->getEmail() ?><br />
                <?= $user->getPhonenumber() ?>
            </td>
            <td><button>Uitloggen</button></td>
        </tr>
    </tbody>
</table>
<ul>
    <li><a href="<?= ROOT_DIR ?>boekingen">Boekingen</a></li>
    <li><a href="<?= ROOT_DIR ?>account">Account</a></li>
</ul>
<hr>
<?php

switch ($path[1] ?? null)
{
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

?>
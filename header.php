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
            <td>
                <a href="<?= ROOT_DIR ?>uitloggen">Uitloggen</button></form>
            </td>
        </tr>
    </tbody>
</table>
<ul>
    <li><a href="<?= ROOT_DIR ?>boekingen">Boekingen</a></li>
    <li><a href="<?= ROOT_DIR ?>account">Account</a></li>
</ul>
<hr>
<?php

declare(strict_types=1);

?>
<table>
    <tbody>
        <tr>
            <td>
                <h1>Mijn Donkey Travel</h1>
            </td>
            <td>Ingelogd als</td>
            <td>
                <?= $_SESSION["customer"]->getName() ?><br />
                <?= $_SESSION["customer"]->getEmail() ?><br />
                <?= $_SESSION["customer"]->getPhonenumber() ?>
            </td>
            <td>
                <form action="<?= ROOT_DIR ?>uitloggen">
                    <button type="submit">Uitloggen</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<ul>
    <li>
        <form action="<?= ROOT_DIR ?>boekingen">
            <button type="submit">Boekingen</button>
        </form>
    </li>
    <li>
        <form action="<?= ROOT_DIR ?>account">
            <button type="submit">Account</button>
        </form>
    </li>
</ul>
<hr>
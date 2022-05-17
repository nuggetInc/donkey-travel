<?php

declare(strict_types=1);

$customer = Customer::get($_SESSION["customerID"]);

?>
<table>
    <tbody>
        <tr>
            <td>
                <h1>Mijn Donkey Travel</h1>
            </td>
            <td>Ingelogd als</td>
            <td>
                <?= $customer->getName() ?><br />
                <?= $customer->getEmail() ?><br />
                <?= $customer->getPhonenumber() ?>
            </td>
            <td>
                <form action="<?= ROOT_DIR ?>uitloggen" method="POST">
                    <button type="submit">Uitloggen</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<ul>
    <li>
        <form action="<?= ROOT_DIR ?>boekingen" method="POST">
            <button type="submit">Boekingen</button>
        </form>
    </li>
    <li>
        <form action="<?= ROOT_DIR ?>account" method="POST">
            <button type="submit">Account</button>
        </form>
    </li>
</ul>
<hr>
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
                <a href="<?= ROOT_DIR ?>uitloggen">Uitloggen</a>
            </td>
        </tr>
    </tbody>
</table>
<ul>
    <li>
        <a href="<?= ROOT_DIR ?>boekingen">Boekingen</a>
    </li>
    <li>
        <a href="<?= ROOT_DIR ?>account">Account</a>
    </li>
</ul>
<hr>
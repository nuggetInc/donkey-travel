<?php

declare(strict_types=1);

$reservations = Reservation::byCustomerID($_SESSION["customerID"])

?>
<h2>Boekingen</h2>
<table>
    <thead>
        <tr>
            <th>Startdatum</th>
            <th>Einddatum</th>
            <th>PIN Code</th>
            <th>Tocht</th>
            <th>status</th>
            <th>
                <form action="<?= ROOT_DIR ?>boekingen/aanvragen" method="POST">
                    <button type="submit">+</button>
                </form>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $id => $reservation) : ?>
            <td><?= date("d-m-Y", $reservation->getStartDate()) ?></td>
            <td><?= date("d-m-Y", $reservation->getEndDate()) ?></td>
            <td><?= $reservation->getPincode() ?></td>
            <td><?= $reservation->getTrip()->getRoute() ?></td>
            <td><?= $reservation->getStatus()->getStatus() ?></td>
            <td>
                <form action="<?= ROOT_DIR ?>boekingen/wijzigen" method="GET">
                    <input type="hidden" name="id" value="<?= $id ?>" />
                    <button type="submit">...</button>
                </form>
                <form action="<?= ROOT_DIR ?>boekingen/verwijderen" method="GET">
                    <input type="hidden" name="id" value="<?= $id ?>" />
                    <button type="submit">X</button>
                </form>
            </td>
        <?php endforeach ?>
    </tbody>
</table>
<?php

declare(strict_types=1);

$reservations = Reservation::getByCustomerID($_SESSION["customerID"])

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
                <a href="<?= ROOT_DIR ?>boekingen/aanvragen">+</a>
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
                <a href="<?= ROOT_DIR ?>boekingen/wijzigen">...</a>
                <a href="<?= ROOT_DIR ?>boekingen/verwijderen">X</a>
            </td>
        <?php endforeach ?>
    </tbody>
</table>
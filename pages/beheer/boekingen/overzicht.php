<?php

declare(strict_types=1);

$reservations = Reservation::getAll();

?>
<h2>Boekingen</h2>
<table>
    <thead>
        <tr>
            <th>Startdatum</th>
            <th>Einddatum</th>
            <th>status</th>
            <th>PIN Code</th>
            <th>Klantnaam</th>
            <th>Tocht</th>
            <th>E-mail</th>
            <th>Telefoon</th>
            <th>
                <a href="<?= ROOT_DIR ?>beheer/boekingen/overzicht">G</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $id => $reservation) : ?>
            <?php

            $trip = $reservation->getTrip();
            $customer = $reservation->getCustomer();

            ?>
            <tr>
                <td><?= date("d-m-Y", $reservation->getStartDate()) ?></td>
                <td><?= date("d-m-Y", $reservation->getEndDate()) ?></td>
                <td><?= $reservation->getStatus()->getStatus() ?></td>
                <td>
                    <?php if ($reservation->getPincode() !== 0) : ?>
                        <a href="<?= ROOT_DIR ?>map?pincode=<?= $reservation->getPincode() ?>&route=<?= $trip->getRoute() ?>&VGT"><?= $reservation->getPincode() ?></a>
                    <?php endif ?>
                </td>
                <td><?= $customer->getName() ?></td>
                <td>
                    <a href="<?= ROOT_DIR ?>map?route=<?= $trip->getRoute() ?>&VGT"><?= $trip->getRoute() ?></a>
                </td>
                <td><?= $customer->getEmail() ?></td>
                <td><?= $customer->getPhonenumber() ?></td>
                <td>
                    <a href="<?= ROOT_DIR ?>boekingen/wijzigen?id=<?= $id ?>">...</a>
                    <a href="<?= ROOT_DIR ?>boekingen/verwijderen?id=<?= $id ?>">X</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
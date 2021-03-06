<?php

declare(strict_types=1);

$reservations = Reservation::getAll();

?>
<div class="page-wrapper">
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
                    <a class="link" href="<?= ROOT_DIR ?>management/boekingen/overzicht">G</a>
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
                            <a class="link" href="<?= ROOT_DIR ?>map?pincode=<?= $reservation->getPincode() ?>&route=<?= $trip->getRoute() ?>&VGT"><?= $reservation->getPincode() ?></a>
                        <?php endif ?>
                    </td>
                    <td><?= $customer->getName() ?></td>
                    <td>
                        <a class="link" href="<?= ROOT_DIR ?>map?route=<?= $trip->getRoute() ?>&VGT"><?= $trip->getRoute() ?></a>
                    </td>
                    <td><?= $customer->getEmail() ?></td>
                    <td><?= $customer->getPhonenumber() ?></td>
                    <td>
                        <a class="link" title="Pauzeplaatsen" href="<?= ROOT_DIR ?>management/boekingen/pauzeplaatsen?boeking=<?= $id ?>">p</a>
                        <a class="link" title="Overnachtingen" href="<?= ROOT_DIR ?>management/boekingen/overnachtingen?boeking=<?= $id ?>">o</a>
                        <a class="link" title="Boeking bekijken" href="<?= ROOT_DIR ?>management/boekingen/bekijken?boeking=<?= $id ?>">...</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
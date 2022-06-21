<?php

declare(strict_types=1);
$reservations = Reservation::getByCustomerID($_SESSION["customerID"]);

if (isset($_POST["request"])) {
    Reservation::updatePIN((int)$_POST["reservationID"], Reservation::generatePIN());

    header("Location: " . ROOT_DIR . "boekingen/");
    exit;
} else if (isset($_POST["delete"])) {
    $pincode = Reservation::get((int)$_POST["reservationID"])->getPincode();
    Tracker::removePincode($pincode);
    Reservation::updatePIN((int)$_POST["reservationID"], 0);

    header("Location: " . ROOT_DIR . "boekingen/");
    exit;
}

?>
<div class="page-wrapper">
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
                    <a class="link" title="Boeking aanvragen" href="<?= ROOT_DIR ?>boekingen/aanvragen">+</a>
                </th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $id => $reservation) : ?>
                <tr>
                    <td><?= date("d-m-Y", $reservation->getStartDate()) ?></td>
                    <td><?= date("d-m-Y", $reservation->getEndDate()) ?></td>
                    <td>
                        <?php if ($reservation->getStatus()->getStatus() == "Definitief" && $reservation->isActive()) : ?>
                            <form method="POST">
                                <input type="hidden" name="reservationID" value="<?= $id ?>">
                                <?php if ($reservation->getPincode() == 0) : ?>
                                    <input class="link" title="PIN code aanvragen" type="submit" name="request" value="PIN Code aanvragen">
                                <?php else : ?>
                                    <input class="link" title="PIN code verwijderen" type="submit" name="delete" value="<?= $reservation->getPincode() . " x" ?>">
                                <?php endif ?>
                            </form>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if ($reservation->getPincode() == 0) : ?>
                            <a class="link" title="Tocht bekijken" href="<?= ROOT_DIR ?>map?route=<?= $reservation->getTrip()->getRoute() ?>">
                                <?= $reservation->getTrip()->getRoute() ?>
                            </a>
                        <?php else : ?>
                            <a class="link" title="Tocht bekijken" href="<?= ROOT_DIR ?>map?pincode=<?= $reservation->getPincode() ?>&route=<?= $reservation->getTrip()->getRoute() ?>">
                                <?= $reservation->getTrip()->getRoute() ?>
                            </a>
                        <?php endif ?>
                    </td>
                    <td><?= $reservation->getStatus()->getStatus() ?></td>
                    <td>
                        <a class="link" title="Boeking bekijken" href="<?= ROOT_DIR ?>boekingen/bekijken?id=<?= $id ?>">...</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
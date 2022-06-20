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
            <tr>
                <td><?= date("d-m-Y", $reservation->getStartDate()) ?></td>
                <td><?= date("d-m-Y", $reservation->getEndDate()) ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="reservationID" value="<?= $id ?>">
                        <?php if ($reservation->getPincode() == 0) : ?>
                            <input type="submit" name="request" value="PIN Code aanvragen">
                        <?php else : ?>
                            <input type="submit" name="delete" value="<?= $reservation->getPincode() . " x" ?>">
                        <?php endif ?>
                    </form>
                </td>
                <td>
                    <?php if ($reservation->getPincode() == 0) : ?>
                        <a href="<?= ROOT_DIR ?>map?route=<?= $reservation->getTrip()->getRoute() ?>">
                            <?= $reservation->getTrip()->getRoute() ?>
                        </a>
                    <?php else : ?>
                        <a href="<?= ROOT_DIR ?>map?pincode=<?= $reservation->getPincode() ?>&route=<?= $reservation->getTrip()->getRoute() ?>">
                            <?= $reservation->getTrip()->getRoute() ?>
                        </a>
                    <?php endif ?>
                </td>
                <td><?= $reservation->getStatus()->getStatus() ?></td>
                <td>
                    <a href="<?= ROOT_DIR ?>boekingen/wijzigen?id=<?= $id ?>">...</a>
                    <a href="<?= ROOT_DIR ?>boekingen/verwijderen?id=<?= $id ?>">X</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
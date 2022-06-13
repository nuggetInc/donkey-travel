<?php

declare(strict_types=1);
$reservations = Reservation::getByCustomerID($_SESSION["customerID"]);
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
            <form method="POST">
                <td><?= date("d-m-Y", $reservation->getStartDate()) ?></td>
                <td><?= date("d-m-Y", $reservation->getEndDate()) ?></td>
                <td>
                    <?php
                    if ($reservation->getPincode() != 0)
                    {
                        if (isset($_POST['yes' . $id]))
                        {
                            $reservation->updatePIN($id, 0);
                            header("Location: " . ROOT_DIR . "boekingen/");
                        }

                        ?>
                        <form method="POST">
                            <button type="submit" value="true" name="yes<?= $id ?>"><?php echo($reservation->getPincode() . " x"); ?></button>

                        </form>
                        <?php
                    } else
                    {
                        if (isset($_POST['PINRequested' . $id]))
                        {
                            $reservation->updatePIN($id, $reservation->generatePIN());
                            header("Location: " . ROOT_DIR . "boekingen/");
                        }
                        ?>

                        <input type="hidden" value="true" name="PINRequested<?= $id ?>">
                        <input type="submit" value="PIN Code aanvragen">

                    <?php } ?>
                </td>
                <td><?= $reservation->getTrip()->getRoute() ?></td>
                <td><?= $reservation->getStatus()->getStatus() ?></td>
                <td>
                    <a href="<?= ROOT_DIR ?>boekingen/wijzigen?id=<?= $id ?>">...</a>
                    <a href="<?= ROOT_DIR ?>boekingen/verwijderen?id=<?= $id ?>">X</a>
                </td>
            </form>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
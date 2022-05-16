<?php

declare(strict_types=1);

if (isset($_POST["edit"]))
{
    $reservation = Reservation::get((int)$_GET["id"]);
    $reservation->update(
        strtotime($_POST["date"]),
        $reservation->getPincode(),
        Trip::get((int)$_POST["trip"]),
        $reservation->getCustomer(),
        $reservation->getStatus()
    );

    header("Location: " . ROOT_DIR . "boekingen");
    exit;
}

$reservation = Reservation::get((int)$_GET["id"]);
$trips = Trip::getAll();

?>
<h2>Boekingen wijzigen</h2>
<form method="POST">
    <label>Startdatum:
        <input type="date" name="date" value="<?= date("Y-m-d", $reservation->getStartDate()) ?>" />
    </label>

    <label>Tocht:
        <select name="trip">
            <?php foreach ($trips as $id => $trip) : ?>
                <option value="<?= $trip->getID() ?>"><?= $trip->getRoute() ?></option>
            <?php endforeach ?>
        </select>
    </label>

    <input type="submit" name="edit" value="Wijzigen" />
</form>
<form action="<?= ROOT_DIR ?>boekingen">
    <button type="submit">Annuleren</button>
</form>
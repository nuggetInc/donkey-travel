<?php

declare(strict_types=1);

if (isset($_POST["delete"]))
{
    Reservation::get((int)$_GET["id"])->delete();

    header("Location: " . ROOT_DIR . "boekingen");
    exit;
}

$reservation = Reservation::get((int)$_GET["id"]);
$trips = Trip::getAll();

?>
<h2>Boekingen verwijderen</h2>
<form method="POST">
    <label>Startdatum:
        <input type="date" value="<?= date("Y-m-d", $reservation->getStartDate()) ?>" disabled />
    </label>

    <label>Einddatum:
        <input type="date" value="<?= date("Y-m-d", $reservation->getEndDate()) ?>" disabled />
    </label>

    <label>Tocht:
        <select name="trip" disabled>
            <option><?= $reservation->getTrip()->getRoute() ?></option>
        </select>
    </label>

    <input type="submit" name="delete" value="Verwijderen" />
</form>
<form action="<?= ROOT_DIR ?>boekingen">
    <button type="submit">Annuleren</button>
</form>
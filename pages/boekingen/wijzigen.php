<?php

declare(strict_types=1);

if (!isset($_GET["id"]))
{
    header("Location: " . ROOT_DIR . "boekingen");
    exit;
}

$reservation = Reservation::get((int)$_GET["id"]);

if (!isset($reservation) || $reservation->getCustomerID() !== $_SESSION["customerID"])
{
    header("Location: " . ROOT_DIR . "boekingen");
    exit;
}

if (isset($_POST["edit"]))
{
    $reservation = Reservation::update(
        (int)$_GET["id"],
        strtotime($_POST["date"]),
        $reservation->getPincode(),
        $_POST["tripID"],
        $reservation->getCustomerID(),
        $reservation->getStatusID()
    );

    header("Location: " . ROOT_DIR . "boekingen");
    exit;
}

$trips = Trip::getAll();

?>
<h2>Boekingen wijzigen</h2>
<form method="POST">
    <label>Startdatum:
        <input type="date" name="date" value="<?= date("Y-m-d", $reservation->getStartDate()) ?>" />
    </label>

    <label>Tocht:
        <select name="tripID">
            <?php foreach ($trips as $id => $trip) : ?>
                <option value="<?= $id ?>"><?= htmlspecialchars($trip->getRoute()) ?></option>
            <?php endforeach ?>
        </select>
    </label>

    <input type="submit" name="edit" value="Wijzigen" />
</form>
<a href="<?= ROOT_DIR ?>boekingen">Annuleren</a>
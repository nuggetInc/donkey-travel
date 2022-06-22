<?php

declare(strict_types=1);

if (isset($_POST["delete"])) {
    Reservation::delete((int)$_GET["id"]);

    header("Location: " . ROOT_DIR . "management/boekingen");
    exit;
}

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Boeking verwijderen</header>

        <label>
            <header>Startdatum:</header>
            <input type="date" value="<?= date("Y-m-d", $reservation->getStartDate()) ?>" disabled />
        </label>

        <label>
            <header>Einddatum:</header>
            <input type="date" value="<?= date("Y-m-d", $reservation->getEndDate()) ?>" disabled />
        </label>

        <label>
            <header>Tocht:</header>
            <select name="trip" disabled>
                <option><?= htmlspecialchars($reservation->getTrip()->getRoute()) ?></option>
            </select>
        </label>

        <input type="submit" name="delete" value="Verwijderen" />

        <footer><a class="link" title="Annuleer Verwijdering" href="<?= ROOT_DIR ?>management/boekingen/bekijken?id=<?= $_GET["id"] ?>">Annuleren</a></footer>
    </form>
</div>
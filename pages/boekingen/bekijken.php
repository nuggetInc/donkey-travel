<?php

declare(strict_types=1);


?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Boeking bekijken</header>

        <label>
            <header>Startdatum:</header>
            <input type="date" value="<?= date("Y-m-d", $reservation->getStartDate()) ?>" disabled />
        </label>

        <label>
            <header>Tocht:</header>
            <select disabled>
                <option><?= htmlspecialchars($reservation->getTrip()->getRoute()) ?></option>
            </select>
        </label>

        <footer>
            <?php if (!$reservation->isDefinitive()) : ?>
                <a class="link" title="Wijzig deze boeking" href="<?= ROOT_DIR ?>boekingen/wijzigen?id=<?= $_GET["id"] ?>">Wijzigen</a>
                <a class="link" title="Verwijder deze boeking" href="<?= ROOT_DIR ?>boekingen/verwijderen?id=<?= $_GET["id"] ?>">Verwijderen</a>
            <?php endif ?>
            <a class="link" title="Ga terug naar overzicht" href="<?= ROOT_DIR ?>boekingen/overzicht">Terug</a>
        </footer>
    </form>
</div>
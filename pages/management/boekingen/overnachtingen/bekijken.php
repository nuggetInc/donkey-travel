<?php

declare(strict_types=1);

$inn = Inn::get($overnightStay->getInnID());

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Overnachtingsplaats bekijken</header>

        <label>
            <header>Herberg:</header>
            <input type="text" value="<?= htmlspecialchars($inn->getName()) ?>" disabled />
        </label>

        <label>
            <header>Adres:</header>
            <input type="text" value="<?= htmlspecialchars($inn->getAddress()) ?>" disabled />
        </label>

        <label>
            <header>Status:</header>
            <select disabled>
                <option><?= htmlspecialchars($overnightStay->getStatus()->getStatus()) ?></option>
            </select>
        </label>

        <footer>
            <a class="link" title="Wijzig deze boeking" href="<?= ROOT_DIR ?>management/boekingen/overnachtingen/wijzigen?boeking=<?= $_GET["boeking"] ?>&overnachting=<?= $_GET["overnachting"] ?>">Wijzigen</a>
            <a class="link" title="Verwijder deze boeking" href="<?= ROOT_DIR ?>management/boekingen/overnachtingen/verwijderen?boeking=<?= $_GET["boeking"] ?>&overnachting=<?= $_GET["overnachting"] ?>">Verwijderen</a>
            <a class="link" title="Ga terug naar overzicht" href="<?= ROOT_DIR ?>management/boekingen/overnachtingen/overzicht?boeking=<?= $_GET["boeking"] ?>">Terug</a>
        </footer>
    </form>
</div>
<?php

declare(strict_types=1);

if (isset($_POST["delete"])) {
    Inn::delete((int)$_GET["overnachting"]);

    header("Location: " . ROOT_DIR . "management/boekingen/overnachtingen?boeking=" . $_GET["boeking"]);
    exit;
}

$inn = Inn::get($overnightStay->getInnID());

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Overnachtingsplaats verwijderen</header>

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

        <input type="submit" name="delete" value="Verwijderen" />

        <footer><a class="link" title="Annuleer Verwijdering" href="<?= ROOT_DIR ?>management/boekingen/overnachtingen/bekijken?boeking=<?= $_GET["boeking"] ?>&overnachting=<?= $_GET["overnachting"] ?>">Annuleren</a></footer>
    </form>
</div>
<?php

declare(strict_types=1);

if (isset($_POST["delete"])) {
    Breakspot::delete((int)$_GET["pauzeplek"]);

    header("Location: " . ROOT_DIR . "management/boekingen/pauzeplaatsen?boeking=" . $_GET["boeking"]);
    exit;
}

$restaurant = Restaurant::get($breakspot->getRestaurantID());

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Pauzeplaats verwijderen</header>

        <label>
            <header>Restaurant:</header>
            <input type="text" value="<?= htmlspecialchars($restaurant->getName()) ?>" disabled />
        </label>

        <label>
            <header>Adres:</header>
            <input type="text" value="<?= htmlspecialchars($restaurant->getAddress()) ?>" disabled />
        </label>

        <label>
            <header>Status:</header>
            <select disabled>
                <option><?= htmlspecialchars($breakspot->getStatus()->getStatus()) ?></option>
            </select>
        </label>

        <input type="submit" name="delete" value="Verwijderen" />

        <footer><a class="link" title="Annuleer Verwijdering" href="<?= ROOT_DIR ?>management/boekingen/pauzeplaatsen/bekijken?boeking=<?= $_GET["boeking"] ?>&pauzeplek=<?= $_GET["pauzeplek"] ?>">Annuleren</a></footer>
    </form>
</div>
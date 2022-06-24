<?php

declare(strict_types=1);

$restaurant = Restaurant::get($breakspot->getRestaurantID());

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Pauzeplaats bekijken</header>

        <label>
            <header>Restaurant:</header>
            <input type="text" value="<?= $restaurant->getName() ?>" disabled />
        </label>

        <label>
            <header>Adres:</header>
            <input type="text" value="<?= $restaurant->getAddress() ?>" disabled />
        </label>

        <label>
            <header>Status:</header>
            <select disabled>
                <option><?= htmlspecialchars($breakspot->getStatus()->getStatus()) ?></option>
            </select>
        </label>

        <footer>
            <a class="link" title="Wijzig deze boeking" href="<?= ROOT_DIR ?>management/boekingen/pauzeplaatsen/wijzigen?boeking=<?= $_GET["boeking"] ?>&pauzeplek=<?= $_GET["pauzeplek"] ?>">Wijzigen</a>
            <a class="link" title="Verwijder deze boeking" href="<?= ROOT_DIR ?>management/boekingen/pauzeplaatsen/verwijderen?boeking=<?= $_GET["boeking"] ?>&pauzeplek=<?= $_GET["pauzeplek"] ?>">Verwijderen</a>
            <a class="link" title="Ga terug naar overzicht" href="<?= ROOT_DIR ?>management/boekingen/pauzeplaatsen/overzicht?boeking=<?= $_GET["boeking"] ?>">Terug</a>
        </footer>
    </form>
</div>
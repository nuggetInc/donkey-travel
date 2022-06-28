<?php

declare(strict_types=1);

if (isset($_POST["edit"])) {
    if (isset($_POST["restaurantID"]))
        Breakspot::update($breakspot->getID(), $reservation->getID(), (int)$_POST["restaurantID"], (int)$_POST["statusID"]);
    else
        Breakspot::update($breakspot->getID(), $reservation->getID(), $breakspot->getRestaurantID(), (int)$_POST["statusID"]);

    header("Location: " . ROOT_DIR . "management/boekingen/pauzeplaatsen?boeking=" . $_GET["boeking"]);
    exit;
}

$restaurant = Restaurant::get($breakspot->getRestaurantID());

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Pauzeplaats wijzigen</header>

        <?php if (isset($_SESSION["error"])) : ?>
            <p class="error"><?= $_SESSION["error"] ?></p>
        <?php endif ?>

        <?php

        $breakspots = Breakspot::getByReservation($reservation->getID());
        $restaurants = Restaurant::getAll();

        unset($breakspots[$breakspot->getID()]);

        foreach ($breakspots as $id => $temp)
            unset($restaurants[$temp->getRestaurantID()]);

        ?>
        <?php if (count($restaurants) > 0) : ?>
            <label>
                <header>Restaurant:</header>
                <select name="restaurantID">

                    <?php foreach ($restaurants as $id => $restaurant) : ?>
                        <?php if ($id === $breakspot->getRestaurantID()) : ?>
                            <option value="<?= $id ?>" selected><?= htmlspecialchars($restaurant->getName() . " - " . $restaurant->getAddress()) ?></option>
                        <?php else : ?>
                            <option value="<?= $id ?>"><?= htmlspecialchars($restaurant->getName() . " - " . $restaurant->getAddress()) ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </label>
        <?php endif ?>

        <label>
            <header>Status:</header>
            <select name="statusID">
                <?php foreach (Status::getAll() as $id => $status) : ?>
                    <?php if ($id === $breakspot->getStatusID()) : ?>
                        <option value="<?= $id ?>" selected><?= htmlspecialchars($status->getStatus()) ?></option>
                    <?php else : ?>
                        <option value="<?= $id ?>"><?= htmlspecialchars($status->getStatus()) ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </label>

        <input type="submit" name="edit" value="Wijzigen" />

        <footer><a class="link" title="Annuleer wijzigingen" href="<?= ROOT_DIR ?>management/boekingen/pauzeplaatsen/bekijken?boeking=<?= $_GET["boeking"] ?>&pauzeplek=<?= $_GET["pauzeplek"] ?>">Annuleren</a></footer>
    </form>
</div>
<?php

unset($_SESSION["error"]);
unset($_SESSION["statusID"]);

?>
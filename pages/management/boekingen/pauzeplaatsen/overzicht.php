<?php

declare(strict_types=1);

$breakspots = Breakspot::getByReservation($reservation->getID());
$restaurants = Restaurant::getAll();

if (isset($_POST["add"])) {
    Breakspot::create($reservation->getID(), (int)$_POST["restaurantID"], 3);

    header("Location: " . ROOT_DIR . "management/boekingen/pauzeplaatsen?boeking=" . $reservation->getID());
    exit;
}

foreach ($breakspots as $id => $breakspot)
    unset($restaurants[$breakspot->getRestaurantID()]);

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <label>
            <header>Startdatum:</header>
            <input type="date" value="<?= date("Y-m-d", $reservation->getStartDate()) ?>" disabled />
        </label>

        <label>
            <header>Status:</header>
            <select disabled>
                <option><?= htmlspecialchars($reservation->getStatus()->getStatus()) ?></option>
            </select>
        </label>

        <label>
            <header>PIN code:</header>
            <input type="text" value="<?= $reservation->getPincode() ?>" disabled />
        </label>

        <label>
            <header>Tocht:</header>
            <select disabled>
                <option><?= htmlspecialchars($reservation->getTrip()->getRoute()) ?></option>
            </select>
        </label>

        <label>
            <header>Klant:</header>
            <select disabled>
                <option><?= htmlspecialchars($reservation->getCustomer()->getName()) ?></option>
            </select>
        </label>
    </form>

    <?php if (count($breakspots) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Restaurant</th>
                    <th>Adres</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($breakspots as $id => $breakspot) : ?>
                    <?php

                    $restaurant = $breakspot->getRestaurant();

                    ?>
                    <tr>
                        <td><?= $restaurant->getName() ?></td>
                        <td><?= $restaurant->getAddress() ?></td>
                        <td><?= $breakspot->getStatus()->getStatus() ?></td>
                        <td><a class="link" title="Pauzeplek bekijken" href="<?= ROOT_DIR ?>management/boekingen/pauzeplaatsen/bekijken?boeking=<?= $_GET["boeking"] ?>&pauzeplek=<?= $id ?>">...</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>

    <?php if (count($restaurants) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Restaurant</th>
                    <th>Adres</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($restaurants as $id => $restaurant) : ?>
                    <tr>
                        <td><?= $restaurant->getName() ?></td>
                        <td><?= $restaurant->getAddress() ?></td>
                        <td>
                            <form action="?boeking=<?= $reservation->getID() ?>" method="POST">
                                <input type="hidden" name="restaurantID" value="<?= $id ?>">
                                <input class="link" title="Pauzeplek toevoegen" type="submit" name="add" value="+">
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>

    <a class="link" title="Ga terug naar boekingen" href="<?= ROOT_DIR ?>management/boekingen">Terug</a>
</div>
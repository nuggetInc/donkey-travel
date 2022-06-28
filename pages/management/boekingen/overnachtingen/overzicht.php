<?php

declare(strict_types=1);

$overnightStays = OvernightStay::getByReservation($reservation->getID());
$inns = Inn::getAll();

if (isset($_POST["add"]))
{
    OvernightStay::create($reservation->getID(), (int)$_POST["innID"], 3);

    header("Location: " . ROOT_DIR . "management/boekingen/overnachtingen?boeking=" . $reservation->getID());
    exit;
}

foreach ($overnightStays as $id => $overnightStay)
    unset($inns[$overnightStay->getInnID()]);

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

    <?php if (count($overnightStays) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Herberg</th>
                    <th>Adres</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($overnightStays as $id => $overnightStay) : ?>
                    <?php

                    $inn = $overnightStay->getInn();

                    ?>
                    <tr>
                        <td><?= $inn->getName() ?></td>
                        <td><?= $inn->getAddress() ?></td>
                        <td><?= $overnightStay->getStatus()->getStatus() ?></td>
                        <td><a class="link" title="Pauzeplek bekijken" href="<?= ROOT_DIR ?>management/boekingen/overnachtingen/bekijken?boeking=<?= $_GET["boeking"] ?>&overnachting=<?= $id ?>">...</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>

    <table>
        <thead>
            <tr>
                <th>Herberg</th>
                <th>Adres</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inns as $id => $inn) : ?>
                <tr>
                    <td><?= $inn->getName() ?></td>
                    <td><?= $inn->getAddress() ?></td>
                    <td>
                        <form action="?boeking=<?= $reservation->getID() ?>" method="POST">
                            <input type="hidden" name="innID" value="<?= $id ?>">
                            <input class="link" title="Overnachting toevoegen" type="submit" name="add" value="+">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a class="link" title="Ga terug naar boekingen" href="<?= ROOT_DIR ?>management/boekingen">Terug</a>
</div>
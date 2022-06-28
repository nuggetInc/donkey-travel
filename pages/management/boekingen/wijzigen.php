<?php

declare(strict_types=1);

if (isset($_POST["edit"])) {
    $id = (int)$_GET["boeking"];
    $date = strtotime($_POST["date"]);
    $pincode = $reservation->getPincode();
    $tripID = (int)$_POST["tripID"];
    $customerID = (int)$_POST["customerID"];
    $statusID = (int)$_POST["statusID"];

    $reservation = Reservation::update($id, $date, $pincode, $tripID, $customerID, $statusID);

    header("Location: " . ROOT_DIR . "management/boekingen");
    exit;
}

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Boeking wijzigen</header>

        <?php if (isset($_SESSION["error"])) : ?>
            <p class="error"><?= $_SESSION["error"] ?></p>
        <?php endif ?>

        <label>
            <header>Startdatum:</header>
            <input type="date" name="date" value="<?= date("Y-m-d", $reservation->getStartDate()) ?>" autofocus required />
        </label>

        <label>
            <header>Status:</header>
            <select name="statusID">
                <?php foreach (Status::getAll() as $id => $status) : ?>
                    <?php if ($id === $reservation->getStatusID()) : ?>
                        <option value="<?= $id ?>" selected><?= htmlspecialchars($status->getStatus()) ?></option>
                    <?php else : ?>
                        <option value="<?= $id ?>"><?= htmlspecialchars($status->getStatus()) ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </label>

        <label>
            <header>Tocht:</header>
            <select name="tripID">
                <?php foreach (Trip::getAll() as $id => $trip) : ?>
                    <?php if ($id === $reservation->getTripID()) : ?>
                        <option value="<?= $id ?>" selected><?= htmlspecialchars($trip->getRoute()) ?></option>
                    <?php else : ?>
                        <option value="<?= $id ?>"><?= htmlspecialchars($trip->getRoute()) ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </label>

        <label>
            <header>Klant:</header>
            <select name="customerID">
                <?php foreach (Customer::getAll() as $id => $customer) : ?>
                    <?php if ($id === $reservation->getCustomerID()) : ?>
                        <option value="<?= $id ?>" selected><?= htmlspecialchars($customer->getName()) ?></option>
                    <?php else : ?>
                        <option value="<?= $id ?>"><?= htmlspecialchars($customer->getName()) ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </label>

        <input type="submit" name="edit" value="Wijzigen" />

        <footer><a class="link" title="Annuleer wijzigingen" href="<?= ROOT_DIR ?>management/boekingen/bekijken?boeking=<?= $_GET["boeking"] ?>">Annuleren</a></footer>
    </form>
</div>
<?php

unset($_SESSION["error"]);

?>
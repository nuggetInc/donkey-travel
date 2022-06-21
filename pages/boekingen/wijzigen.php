<?php

declare(strict_types=1);

if (!isset($_GET["id"])) {
    header("Location: " . ROOT_DIR . "boekingen");
    exit;
}

$reservation = Reservation::get((int)$_GET["id"]);

if (!isset($reservation) || $reservation->getCustomerID() !== $_SESSION["customerID"]) {
    header("Location: " . ROOT_DIR . "boekingen");
    exit;
}

if (isset($_POST["edit"])) {
    $id = (int)$_GET["id"];
    $date = strtotime($_POST["date"]);
    $pincode = $reservation->getPincode();
    $tripID = (int)$_POST["tripID"];
    $customerID = $_SESSION["customerID"];
    $statusID = $reservation->getStatusID();

    if ($date <= strtotime("now")) {
        $_SESSION["error"] = "De datum moet na vandaag zijn";

        $_SESSION["date"] = $date;
        $_SESSION["tripID"] = $tripID;

        header("Location: " . ROOT_DIR . "boekingen/wijzigen?id={$id}");
        exit;
    }

    $reservation = Reservation::update($id, $date, $pincode, $tripID, $customerID, $statusID);

    header("Location: " . ROOT_DIR . "boekingen");
    exit;
}

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Boeking wijzigen</header>

        <?php if (isset($_SESSION["error"])) : ?>
            <p><?= $_SESSION["error"] ?></p>
        <?php endif ?>

        <label>
            <header>Startdatum:</header>
            <input type="date" name="date" value="<?= date("Y-m-d", $_SESSION["date"] ?? $reservation->getStartDate()) ?>" autofocus required />
        </label>

        <label>
            <header>Tocht:</header>
            <select name="tripID">
                <?php foreach (Trip::getAll() as $id => $trip) : ?>
                    <?php if ($id === ($_SESSION["tripID"] ?? $reservation->getTripID())) : ?>
                        <option value="<?= $id ?>" selected><?= htmlspecialchars($trip->getRoute()) ?></option>
                    <?php else : ?>
                        <option value="<?= $id ?>"><?= htmlspecialchars($trip->getRoute()) ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </label>

        <input type="submit" name="edit" value="Wijzigen" />

        <footer><a class="link" title="Annuleer wijzigingen" href="<?= ROOT_DIR ?>boekingen/bekijken?id=<?= $_GET["id"] ?>">Annuleren</a></footer>
    </form>
</div>
<?php

unset($_SESSION["error"]);
unset($_SESSION["date"]);
unset($_SESSION["tripID"]);

?>
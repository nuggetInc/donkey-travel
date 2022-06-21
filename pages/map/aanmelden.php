<?php

declare(strict_types=1);

// Only run logic if form is sumbitted
if (isset($_POST["login"])) {
    $pincode = $_POST["pincode"];

    if ($reservation = Reservation::getByPincode((int)$pincode)) {
        $date = strtotime(date("d-m-Y"));
        if ($reservation->getStartDate() < $date || $reservation->getEndDate() >= $date) {
            header("Location: " . ROOT_DIR . "map?pincode=$pincode&route=" . $reservation->getTrip()->getRoute());
            exit;
        }

        $_SESSION["error"] = "De reservering is niet actief";
    } else {
        $_SESSION["error"] = "De pincode is incorrect";
    }

    header("Location: " . ROOT_DIR . "map");
    exit;
}

$email = htmlspecialchars($_SESSION["login-email"] ?? "");
$password = htmlspecialchars($_SESSION["login-password"] ?? "");

?>
<form method="POST">
    <h1>Mijn Donkey Travel inloggen</h1>

    <?php if (isset($_SESSION["error"])) : ?>
        <p><?= $_SESSION["error"] ?></p>
    <?php endif ?>

    <label>Pincode
        <input type="number" name="pincode" placeholder="Pincode" autofocus required />
    </label>

    <button type="submit" name="login">Aanmelden</button>
</form>
<?php

unset($_SESSION["error"]);

?>
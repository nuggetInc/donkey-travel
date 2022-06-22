<?php

declare(strict_types=1);

// Only run logic if form is sumbitted
if (isset($_POST["login"])) {
    $pincode = $_POST["pincode"];

    if ($reservation = Reservation::getByPincode((int)$pincode)) {
        $date = strtotime(date("d-m-Y"));
        if ($reservation->isActive()) {
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
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Mijn Donkey Travel inloggen</header>

        <?php if (isset($_SESSION["error"])) : ?>
            <p class="error"><?= $_SESSION["error"] ?></p>
        <?php endif ?>

        <label>
            <header>Pincode</header>
            <input type="number" name="pincode" placeholder="Pincode" autofocus required />
        </label>

        <input type="submit" name="login" value="Aanmelden" />
    </form>
</div>
<?php

unset($_SESSION["error"]);

?>
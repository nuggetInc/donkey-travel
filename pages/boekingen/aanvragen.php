<?php

declare(strict_types=1);

if (isset($_POST["request"])) {
    if (strtotime(date("Y-m-d")) > strtotime($_POST["date"]) - 7 * 24 * 60 * 60) {
        $_SESSION["date"] = $_POST["date"];
        $_SESSION["tripID"] = $_POST["tripID"];

        $_SESSION["error"] = "De startdatum van een boeking moet minstens een week in de toekomst liggen.";

        header("Location: " . ROOT_DIR . "boekingen/aanvragen");
        exit;
    }

    Reservation::create(strtotime($_POST["date"]), 0, (int)$_POST["tripID"], $_SESSION["customerID"], 1);

    header("Location: " . ROOT_DIR . "boekingen");
    exit;
}

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Boeking aanvragen</header>

        <?php if (isset($_SESSION["error"])) : ?>
            <p class="error"><?= $_SESSION["error"] ?></p>
        <?php endif ?>

        <label>
            <header>Startdatum:</header>
            <input type="date" name="date" autofocus required>
        </label>

        <label>
            <header>Tocht:</header>
            <select name="tripID">
                <?php foreach (Trip::getAll() as $id => $trip) : ?>
                    <option value="<?= $id ?>"><?= htmlspecialchars($trip->getRoute()) ?></option>
                <?php endforeach ?>
            </select>
        </label>
        <input type="submit" name="request" value="Aanvragen">

        <footer><a class="link" title="Annuleer aanvraging" href="<?= ROOT_DIR ?>boekingen">Annuleren</a></footer>
    </form>
</div>
<?php

unset($_SESSION["date"]);
unset($_SESSION["tripID"]);
unset($_SESSION["error"]);

?>
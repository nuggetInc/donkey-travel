<?php

declare(strict_types=1);

if (isset($_POST["edit"])) {
    Breakspot::update($breakspot->getID(), $reservation->getID(), $breakspot->getRestaurantID(), (int)$_POST["statusID"]);

    header("Location: " . ROOT_DIR . "management/boekingen/pauzeplaatsen?boeking=" . $_GET["boeking"]);
    exit;
}

$inn = Inn::get($overnightStay->getInnID());

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Overnachtingsplaats wijzigen</header>

        <?php if (isset($_SESSION["error"])) : ?>
            <p class="error"><?= $_SESSION["error"] ?></p>
        <?php endif ?>

        <label>
            <header>Status:</header>
            <select name="statusID">
                <?php foreach (Status::getAll() as $id => $status) : ?>
                    <?php if ($id === $overnightStay->getStatusID()) : ?>
                        <option value="<?= $id ?>" selected><?= htmlspecialchars($status->getStatus()) ?></option>
                    <?php else : ?>
                        <option value="<?= $id ?>"><?= htmlspecialchars($status->getStatus()) ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </label>

        <input type="submit" name="edit" value="Wijzigen" />

        <footer><a class="link" title="Annuleer wijzigingen" href="<?= ROOT_DIR ?>management/boekingen/overnachtingen/bekijken?boeking=<?= $_GET["boeking"] ?>&overnachting=<?= $_GET["overnachting"] ?>">Annuleren</a></footer>
    </form>
</div>
<?php

unset($_SESSION["error"]);
unset($_SESSION["statusID"]);

?>
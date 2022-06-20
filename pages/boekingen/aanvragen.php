<?php

declare(strict_types=1);

$trips = Trip::getAll();

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Boeking aanvragen</header>
        <label>
            <header>Startdatum:</header>
            <input type="date" name="date">
        </label>
        <label>
            <header>Tocht:</header>
            <select name="tripID">
                <?php foreach ($trips as $id => $trip) : ?>
                    <option value="<?= $id ?>"><?= htmlspecialchars($trip->getRoute()) ?></option>
                <?php endforeach ?>
            </select>
        </label>
        <input type="submit" value="Aanvragen">
    </form>
</div>
<?php
if (isset($_POST['date']) && isset($_POST['tripID'])) {
    // statusID is een probleem voor later :upsidedown:
    // pincode hoort ook geen 0 te zijn, maar dat lossen we later ook wel op :upsidedown:
    Reservation::create(strtotime($_POST['date']), 0, (int)$_POST['tripID'], $_SESSION['customerID'], 0);
    header('Location: ' . ROOT_DIR . 'boekingen');
}
?>

<?php
$trips = Trip::getAll();
?>
<form method="POST">
    <label>Startdatum:</label>
    <input type="date" name="date">
    <label>Tocht:</label>
    <select name="tripID">
        <?php foreach ($trips as $id => $trip) : ?>
            <option value="<?= $id ?>"><?= htmlspecialchars($trip->getRoute()) ?></option>
        <?php endforeach ?>
    </select>
    <input type="submit" value="Aanvragen">
</form>
<?php
if (isset($_POST['date']) && isset($_POST['tripID'])) {
    // statusID is een probleem voor later :upsidedown:
    // pincode hoort ook geen 0 te zijn, maar dat lossen we later ook wel op :upsidedown:
    Reservation::create(strtotime($_POST['date']), 0, (int)$_POST['tripID'], $_SESSION['customerID'], 0);
    header('Location: '.ROOT_DIR.'boekingen');
}
?>
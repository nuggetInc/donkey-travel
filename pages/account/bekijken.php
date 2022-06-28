<?php

declare(strict_types=1);

?>
<div class="page-wrapper">
    <form class="form" method="POST">
        <header>Account wijzigen</header>

        <?php if (isset($_SESSION["error"])) : ?>
            <p class="error"><?= $_SESSION["error"] ?></p>
        <?php endif ?>

        <label>
            <header>Naam:</header>
            <input type="text" name="name" value="<?= htmlspecialchars($customer->getName()) ?>" disabled />
        </label>

        <label>
            <header>E-mailadres:</header>
            <input type="email" name="email" value="<?= htmlspecialchars($customer->getEmail()) ?>" disabled />
        </label>

        <label>
            <header>Telefoon:</header>
            <input type="tel" name="phonenumber" value="<?= htmlspecialchars($customer->getPhonenumber()) ?>" disabled />
        </label>

        <footer>
            <a class="link" title="Wijzig dit account" href="<?= ROOT_DIR ?>account/wijzigen">Wijzigen</a>
            <a class="link" title="Verwijder dit account" href="<?= ROOT_DIR ?>account/verwijderen">Verwijderen</a>
            <a class="link" title="Ga terug naar overzicht" href="<?= ROOT_DIR ?>boekingen/overzicht">Terug</a>
        </footer>
    </form>
</div>
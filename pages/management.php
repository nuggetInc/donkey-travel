<?php

declare(strict_types=1);

?>
<header class="page-header">
    <a class="logo" href="<?= ROOT_DIR ?>management">Donkey<span class="green">Manager</span></a>
    <ul class="nav">
        <li><a class="link" title="Beheer boekingen" href="<?= ROOT_DIR ?>management/boekingen">Uitloggen</a></li>
        <li><a class="link" title="Beheer gasten" href="<?= ROOT_DIR ?>management/beheer">Uitloggen</a></li>
    </ul>
</header>
<?php

switch ($path[1] ?? null) {
    case "boekingen":
        require("pages/management/{$path[1]}.php");
        break;
    default:
        require("pages/management/boekingen.php");
        break;
}

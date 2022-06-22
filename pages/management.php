<?php

declare(strict_types=1);

?>
<header class="page-header">
    <a class="logo" href="<?= ROOT_DIR ?>management">Donkey<span class="green">Manager</span></a>
    <ul class="nav">
        <li><a class="link" title="Beheer boekingen" href="<?= ROOT_DIR ?>management/boekingen">Boekingen</a></li>
        <li><a class="link" title="Beheer gasten" href="<?= ROOT_DIR ?>management/gasten">Gasten</a></li>
        <li><a class="link" title="Beheer herbergen" href="<?= ROOT_DIR ?>management/herbergen">Herbergen</a></li>
        <li><a class="link" title="Beheer restaurants" href="<?= ROOT_DIR ?>management/restaurants">Restaurants</a></li>
        <li><a class="link" title="Beheer tochten" href="<?= ROOT_DIR ?>management/tochten">Tochten</a></li>
        <li><a class="link" title="Beheer statussen" href="<?= ROOT_DIR ?>management/gasten">Statussen</a></li>
    </ul>
</header>
<?php

switch ($path[1] ?? null) {
    case "boekingen":
    case "gasten":
    case "herbergen":
    case "restaurants":
    case "tochten":
    case "gasten":
        require("pages/management/{$path[1]}.php");
        break;
    default:
        require("pages/management/boekingen.php");
        break;
}

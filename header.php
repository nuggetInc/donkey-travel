<?php

declare(strict_types=1);

$customer = Customer::get($_SESSION["customerID"]);

?>
<header class="page-header">
    <span class="logo">Donkey<span class="green">Travel</span></span>
    <ul class="nav">
        <li><a class="link" href="<?= ROOT_DIR ?>boekingen" ?>Boekingen</a></li>
        <li><a class="link" href="<?= ROOT_DIR ?>account" ?>Account</a></li>
    </ul>
</header>
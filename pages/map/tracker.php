<?php

$pincode = $_GET["pincode"] ?? 0;
$route = $_GET["route"] ?? null;
$viewguesttrackers = isset($_GET["VGT"]) ? "true" : "false";

if (isset($_GET["pincode"]) && !Reservation::getByPincode((int)$_GET["pincode"])->isActive()) {
     $pincode = 0;
}

?>
<link href="<?= PUBLIC_DIR ?>css/map.css" type="text/css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
<header class="page-header">
     <a class="logo" href="<?= ROOT_DIR ?>">Donkey<span class="green">Tracker</span></a>
     <div id="status">
          <span id="tijd"></span>
          <span id="messages"></span>
          <span id="action"></span>
          <span id="error"></span>
     </div>
     <ul class="nav">
          <li><a class="link" title="Uitloggen tracker" href="<?= ROOT_DIR ?>map">Uitloggen</a></li>
     </ul>
</header>
<div class="page-wrapper">
     <div id="map">
     </div>

     <script>
          var PUBLIC_DIR = "<?= PUBLIC_DIR ?>";
          var pincode = <?= $pincode ?>;
          var RouteName = "<?= $route ?>";
          var VGT = <?= $viewguesttrackers ?>;
     </script>
     <script type="application/javascript" src="<?= PUBLIC_DIR ?>js/locviewer.js" defer></script>
</div>
<?php

$pincode = $_GET["pincode"] ?? 0;
$route = $_GET["route"] ?? null;
$viewguesttrackers = isset($_GET["VGT"]) ? "true" : "false";

// if ($route) {
//      $content = '
//      <body onload="Init()">
//           <div id="map">
//           </div>
//          <div id="status">
//               <span id="tijd"></span>&nbsp;
//               <span id="messages"></span>&nbsp;
//               <span id="action"></span>&nbsp;
//               <span id="error"></span>
//          </div>
//      </body>';
// } else {
//      $content = '  
//      <body>
//           <header>
//                Donkey Travel Locatietracker
//           </header>

//           <section>
//                <article>
//                     <div id="map">
//                          <p>Routenaam is ongeldig, 
//                          </p>
//                     </div>
//                </article>
//           </section>
//           <footer>
//                <span>&nbsp;</span>
//           </footer>
//      </body>';
// }

?>
<link href="<?= PUBLIC_DIR ?>css/map.css" type="text/css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>

<div id="map">
</div>
<div id="status">
     <span id="tijd"></span>
     <span id="messages"></span>
     <span id="action"></span>
     <span id="error"></span>
</div>

<script>
     var PUBLIC_DIR = "<?= PUBLIC_DIR ?>";
     var pincode = <?= $pincode ?>;
     var RouteName = "<?= $route ?>";
     var VGT = <?= $viewguesttrackers ?>;
</script>

<script type="application/javascript" src="<?= PUBLIC_DIR ?>js/locviewer.js" defer></script>
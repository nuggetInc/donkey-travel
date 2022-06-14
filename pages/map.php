<?php

if (isset($_GET["pincode"]) || isset($_GET["route"]))
    require("map/tracker.php");
else
    require("map/aanmelden.php");

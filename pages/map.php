<?php

if (isset($_GET["pincode"]))
    require("map/tracker.php");
else
    require("map/aanmelden.php");

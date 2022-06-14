<?php

$posities = json_decode($_POST["posities"]);
$pincode = $_POST["pincode"];

$db = new PDO("mysql:host=localhost;dbname=donkey_travel", "root", "");

$params = array(":pincode" => $pincode);
$sth = $db->prepare("SELECT 1 FROM reservations WHERE pincode = :pincode;");
$sth->execute($params);

if ($sth->rowCount() < 1)
     return;

foreach ($posities as $position) {
     $params = array(
          ":latitude" => $position->latitude,
          ":longitude" => $position->longitude,
          ":pincode" => $pincode,
          ":time" => date('Ymd') . $position->Tijd,
     );
     $sth = $db->prepare("INSERT INTO trackers (latitude, longitude, pincode, time) VALUES (:latitude, :longitude, :pincode, :time);");
     $sth->execute($params);
}

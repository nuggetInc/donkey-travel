<?php
header('Content-Type: application/json');

if (isset($_POST["pincode"])) {
	$pincode = $_POST["pincode"];

	$db = new PDO("mysql:host=localhost;dbname=donkey_travel", "root", "");
	$params = array(":pincode" => (int)$pincode);
	$sth = $db->prepare("SELECT `latitude`, `longitude` FROM `trackers` WHERE `pincode` = :pincode ORDER BY time;");
	$sth->execute($params);

	$data = $sth->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($data);
}

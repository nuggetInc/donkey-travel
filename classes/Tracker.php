<?php

declare(strict_types=1);

class Tracker
{
    public static function removePincode(int $pincode)
    {
        $params = array(":pincode" => $pincode);
        $sth = getPDO()->prepare("DELETE FROM `trackers` WHERE `pincode` = :pincode;");
        $sth->execute($params);
    }
}

<?php

declare(strict_types=1);

/** An object representing a customer in the database */
class OvernightStay
{
    private int $id;
    private int $reservationID;
    private int $innID;
    private int $statusID;

    private function __construct(int $id, int $reservationID, int $innID, int $statusID)
    {
        $this->id = $id;
        $this->reservationID = $reservationID;
        $this->innID = $innID;
        $this->statusID = $statusID;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getReservationID(): int
    {
        return $this->reservationID;
    }

    public function getInnID(): int
    {
        return $this->innID;
    }

    public function getStatusID(): int
    {
        return $this->statusID;
    }

    public function getReservation(): Reservation
    {
        return Reservation::get($this->reservationID);
    }

    public function getInn(): Inn
    {
        return Inn::get($this->innID);
    }

    public function getStatus(): Status
    {
        return Status::get($this->statusID);
    }

    public static function get(int $id): ?OvernightStay
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("SELECT `id`, `reservation_id`, `inn_id`, `status_id` FROM `overnight_stay` WHERE `id` = :id LIMIT 1;");
        $sth->execute($params);

        if ($row = $sth->fetch())
            return new OvernightStay($id, $row["reservation_id"], $row["inn_id"], $row["status_id"]);

        return null;
    }

    public static function create(int $reservationID, int $innID, int $statusID)
    {
        $params = array(
            ":reservationID" => $reservationID,
            ":innID" => $innID,
            ":statusID" => $statusID
        );
        $sth = getPDO()->prepare("INSERT INTO `overnight_stay` (`reservation_id`, `inn_id`, `status_id`) VALUES (:reservationID, :innID, :statusID);");
        $sth->execute($params);
    }

    public static function update(int $id, int $reservationID, int $innID, int $statusID)
    {
        $params = array(
            ":id" => $id,
            ":reservationID" => $reservationID,
            ":innID" => $innID,
            ":statusID" => $statusID
        );
        $sth = getPDO()->prepare(
            "UPDATE `overnight_stay`
            SET `reservation_id` = :reservationID,
                `inn_id` = :innID,
                `status_id` = :statusID
            WHERE `id` = :id;"
        );
        $sth->execute($params);
    }

    public static function delete(int $id)
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("DELETE FROM `overnight_stay` WHERE `id` = :id");
        $sth->execute($params);
    }
}

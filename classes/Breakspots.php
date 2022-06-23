<?php

declare(strict_types=1);

/** An object representing a customer in the database */
class Breakspot
{
    private int $id;
    private int $reservationID;
    private int $restaurantID;
    private int $statusID;

    private function __construct(int $id, int $reservationID, int $restaurantID, int $statusID)
    {
        $this->id = $id;
        $this->reservationID = $reservationID;
        $this->restaurantID = $restaurantID;
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

    public function getRestaurantID(): int
    {
        return $this->restaurantID;
    }

    public function getStatusID(): int
    {
        return $this->statusID;
    }

    public function getReservation(): Reservation
    {
        return Reservation::get($this->reservationID);
    }

    public function getRestaurant(): Restaurant
    {
        return Restaurant::get($this->restaurantID);
    }

    public function getStatus(): Status
    {
        return Status::get($this->statusID);
    }

    public static function get(int $id): ?Breakspot
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("SELECT `id`, `reservation_id`, `restaurant_id`, `status_id` FROM `breakspots` WHERE `id` = :id LIMIT 1;");
        $sth->execute($params);

        if ($row = $sth->fetch())
            return new Breakspot($id, $row["reservation_id"], $row["restaurant_id"], $row["status_id"]);

        return null;
    }

    public static function create(int $reservationID, int $restaurantID, int $statusID)
    {
        $params = array(
            ":reservationID" => $reservationID,
            ":restaurantID" => $restaurantID,
            ":statusID" => $statusID
        );
        $sth = getPDO()->prepare("INSERT INTO `breakspots` (`reservation_id`, `restaurant_id`, `status_id`) VALUES (:reservationID, :restaurantID, :statusID);");
        $sth->execute($params);
    }

    public static function update(int $id, int $reservationID, int $restaurantID, int $statusID)
    {
        $params = array(
            ":id" => $id,
            ":reservationID" => $reservationID,
            ":restaurantID" => $restaurantID,
            ":statusID" => $statusID
        );
        $sth = getPDO()->prepare(
            "UPDATE `breakspots`
            SET `reservation_id` = :reservationID,
                `restaurant_id` = :restaurantID,
                `status_id` = :statusID
            WHERE `id` = :id;"
        );
        $sth->execute($params);
    }

    public static function delete(int $id)
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("DELETE FROM `breakspots` WHERE `id` = :id");
        $sth->execute($params);
    }
}

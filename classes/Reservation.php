<?php

declare(strict_types=1);

class Reservation
{
    private int $id;
    private int $startDate;
    private int $pincode;
    private int $tripID;
    private int $customerID;
    private int $statusID;

    private function __construct(int $id, int $startDate, int $pincode, int $tripID, int $customerID, int $statusID)
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->pincode = $pincode;
        $this->tripID = $tripID;
        $this->customerID = $customerID;
        $this->statusID = $statusID;
    }

    public function getStartDate(): int
    {
        return $this->startDate;
    }

    public function getEndDate(): int
    {
        // The 24 * 60 * 60 is there to convert days to seconds
        return $this->startDate + $this->trip->getDayCount() * 24 * 60 * 60;
    }

    public function getPincode(): int
    {
        return $this->pincode;
    }

    public function getTripID(): int
    {
        return $this->tripID;
    }

    public function getCustomerID(): int
    {
        return $this->customerID;
    }

    public function getStatusID(): int
    {
        return $this->statusID;
    }

    public function getTrip(): Trip
    {
        return Trip::get($this->tripID);
    }

    public function getCustomer(): Customer
    {
        return Customer::get($this->customer);
    }

    public function getStatus(): Status
    {
        return Status::get($this->status);
    }

    public function update(int $startDate, int $pincode, int $tripID, int $customerID, int $statusID)
    {
        $this->startDate = $startDate;
        $this->pincode = $pincode;
        $this->tripID = $tripID;
        $this->customerID = $customerID;
        $this->statusID = $statusID;

        $params = array(
            ":id" => $this->id,
            ":startDate" => date("Y-m-d", $startDate),
            ":pincode" => $pincode,
            ":tripID" => $tripID,
            ":customerID" => $customerID,
            ":statusID" => $statusID
        );
        $sth = getPDO()->prepare(
            "UPDATE `reservations`
            SET `start_date` = :startDate,
                `pincode` = :pincode,
                `trip_id` = :tripID,
                `customer_id` = :customerID,
                `status_id` = :statusID
            WHERE `id` = :id;"
        );
        $sth->execute($params);
    }

    public static function delete(int $id)
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("DELETE FROM `reservations` WHERE `id` = :id;");
        $sth->execute($params);
    }

    public static function get(int $id): ?Reservation
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("SELECT `start_date`, `pincode`, `trip_id`, `customer_id`, `status_id` FROM `reservations` WHERE `id` = :id LIMIT 1;");
        $sth->execute($params);

        if ($row = $sth->fetch())
            return new Reservation($id, strtotime($row["start_date"]), $row["pincode"], $row["trip_id"], $row["customer_id"], $row["status_id"]);

        return null;
    }

    /** Gets all the reservations from a customer
     * 
     * @return array all the reservations
     */
    public static function byCustomerID(int $customerID): array
    {
        $params = array(":customerID" => $customerID);
        $sth = getPDO()->prepare("SELECT `id`, `start_date`, `pincode`, `trip_id`, `status_id` FROM `reservations` WHERE `customer_id` = :customerID;");
        $sth->execute($params);

        $reservations = array();

        while ($row = $sth->fetch())
            $reservations[$row["id"]] = new Reservation($row["id"], strtotime($row["start_date"]), $row["pincode"], $row["trip_id"], $customerID, $row["status_id"]);

        return $reservations;
    }
}

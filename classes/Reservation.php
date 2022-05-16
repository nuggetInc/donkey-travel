<?php

declare(strict_types=1);

class Reservation
{
    private int $id;
    private int $startDate;
    private int $pincode;
    private Trip $trip;
    private Customer $customer;
    private Status $status;

    private function __construct(int $id, int $startDate, int $pincode, Trip $trip, Customer $customer, Status $status)
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->pincode = $pincode;
        $this->trip = $trip;
        $this->customer = $customer;
        $this->status = $status;
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

    public function getTrip(): Trip
    {
        return $this->trip;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function update(int $startDate, int $pincode, Trip $trip, Customer $customer, Status $status)
    {
        $this->startDate = $startDate;
        $this->pincode = $pincode;
        $this->trip = $trip;
        $this->customer = $customer;
        $this->status = $status;

        $params = array(
            ":id" => $this->id,
            ":startDate" => date("Y-m-d", $startDate),
            ":pincode" => $pincode,
            ":trip_id" => $trip->getID(),
            ":customer_id" => $customer->getID(),
            ":status_id" => $status->getID()
        );
        $sth = getPDO()->prepare(
            "UPDATE `reservations`
            SET `start_date` = :startDate,
                `pincode` = :pincode,
                `trip_id` = :trip_id,
                `customer_id` = :customer_id,
                `status_id` = :status_id
            WHERE `id` = :id;"
        );
        $sth->execute($params);
    }

    public function delete()
    {
        $params = array(":id" => $this->id);
        $sth = getPDO()->prepare("DELETE FROM `reservations` WHERE `id` = :id;");
        $sth->execute($params);
    }

    public static function get(int $id): ?Reservation
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("SELECT `start_date`, `pincode`, `trip_id`, `customer_id`, `status_id` FROM `reservations` WHERE `id` = :id LIMIT 1;");
        $sth->execute($params);

        if ($row = $sth->fetch())
            return new Reservation($id, strtotime($row["start_date"]), $row["pincode"], Trip::get($row["trip_id"]), Customer::get($row["customer_id"]), Status::get($row["status_id"]));

        return null;
    }

    /** Gets all the reservations from a customer
     * 
     * @return array all the reservations
     */
    public static function byCustomer(Customer $customer): array
    {
        $params = array(":customer_id" => $customer->getID());
        $sth = getPDO()->prepare("SELECT `id`, `start_date`, `pincode`, `trip_id`, `status_id` FROM `reservations` WHERE `customer_id` = :customer_id;");
        $sth->execute($params);

        $trips = Trip::getAll();
        $statuses = Status::getAll();

        $reservations = array();

        while ($row = $sth->fetch())
            $reservations[$row["id"]] = new Reservation($row["id"], strtotime($row["start_date"]), $row["pincode"], $trips[$row["trip_id"]], $customer, $statuses[$row["status_id"]]);

        return $reservations;
    }
}

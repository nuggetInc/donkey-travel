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

    public function getStatus(): Status
    {
        return $this->status;
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
        {
            $reservations[$row["id"]] = new Reservation($row["id"], strtotime($row["start_date"]), $row["pincode"], $trips[$row["trip_id"]], $customer, $statuses[$row["status_id"]]);
        }

        return $reservations;
    }
}

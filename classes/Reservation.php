<?php

class Reservation
{
    private string $startDate;
    private string $pincode;
    private int $tripID;
    private int $customerID;
    private int $statusID;

    private function __construct(string $startDate, string $pincode, int $tripID, int $customerID, int $statusID)
    {
        $this->startDate = $startDate;
        $this->pincode = $pincode;
        $this->tripID = $tripID;
        $this->customerID = $customerID;
        $this->statusID = $statusID;
    }

    public function addReservation()
    {
        $params = array(":startDate" => $this->startDate, ":pincode" => $this->pincode, ":tripID" => $this->tripID, ":customerID" => $this->customerID, ":statusID" => $this->statusID);
        $sth = getPDO()->prepare("INSERT INTO `reservations` (`start_date`, `pincode`, `trip_id`, `customer_id`, `status_id`) VALUES (:startDate, :pincode, :tripID, :customerID, :statusID)");
        $sth->execute($params);
    }
}
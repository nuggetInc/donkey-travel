<?php

declare(strict_types=1);

class Status
{
    private int $id;
    private int $statuscode;
    private string $status;
    private int $removeable;
    private int $assignPIN;

    private function __construct(int $id, int $statuscode, string $status, int $removeable, int $assignPIN)
    {
        $this->id = $id;
        $this->start_date = $statuscode;
        $this->status = $status;
        $this->removeable = $removeable;
        $this->assignPIN = $assignPIN;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public static function getAll(): array
    {
        $sth = getPDO()->prepare("SELECT `id`, `statuscode`, `status`, `removeable`, `assign_pin` FROM `statuses`;");
        $sth->execute();

        $statuses = array();

        while ($row = $sth->fetch())
            $statuses[$row["id"]] = new Status($row["id"], $row["statuscode"], $row["status"], $row["removeable"], $row["assign_pin"]);

        return $statuses;
    }
}

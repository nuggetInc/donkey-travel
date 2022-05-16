<?php

declare(strict_types=1);

class Trip
{
    private int $id;
    private string $description;
    private string $route;
    private int $dayCount;

    private function __construct(int $id, string $description, string $route, int $dayCount)
    {
        $this->id = $id;
        $this->description = $description;
        $this->route = $route;
        $this->dayCount = $dayCount;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getDayCount(): int
    {
        return $this->dayCount;
    }


    public static function getAll(): array
    {
        $sth = getPDO()->prepare("SELECT `id`, `description`, `route`, `day_count` FROM `trips`;");
        $sth->execute();

        $trips = array();

        while ($row = $sth->fetch())
            $trips[$row["id"]] = new Trip($row["id"], $row["description"], $row["route"], $row["day_count"]);

        return $trips;
    }
}

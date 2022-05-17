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

    public function GetID(): int
    {
        return $this->id;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getDayCount(): int
    {
        return $this->dayCount;
    }

    public static function get(int $id): ?Trip
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("SELECT `id`, `description`, `route`, `day_count` FROM `trips` WHERE `id` = :id LIMIT 1;");
        $sth->execute($params);

        if ($row = $sth->fetch())
            return new Trip($row["id"], $row["description"], $row["route"], $row["day_count"]);

        return null;
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

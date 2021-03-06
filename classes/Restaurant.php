<?php

declare(strict_types=1);

/** An object representing a customer in the database */
class Restaurant
{
    private int $id;
    private string $name;
    private string $address;
    private string $email;
    private string $phonenumber;
    private string $coordinates;

    private function __construct(int $id, string $name, string $address, string $email, string $phonenumber, string $coordinates)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->coordinates = $coordinates;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhonenumber(): string
    {
        return $this->phonenumber;
    }

    public function getCoordinates(): string
    {
        return $this->coordinates;
    }

    public static function get(int $id): ?Restaurant
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("SELECT `name`, `address`, `email`, `phonenumber`, `coordinates` FROM `restaurants` WHERE `id` = :id LIMIT 1;");
        $sth->execute($params);

        if ($row = $sth->fetch())
            return new Restaurant($id, $row["name"], $row["address"], $row["email"], $row["phonenumber"], $row["coordinates"]);

        return null;
    }

    public static function getAll(): array
    {
        $sth = getPDO()->prepare("SELECT `id`, `name`, `address`, `email`, `phonenumber`, `coordinates` FROM `restaurants`;");
        $sth->execute();

        $restaurant = array();

        while ($row = $sth->fetch())
            $restaurant[$row["id"]] = new Restaurant($row["id"], $row["name"], $row["address"], $row["email"], $row["phonenumber"], $row["coordinates"]);

        return $restaurant;
    }

    public static function create(string $name, string $address, string $email, string $phonenumber, string $coordinates)
    {
        $params = array(
            ":name" => $name,
            ":address" => $address,
            ":email" => $email,
            ":phonenumber" => $phonenumber,
            ":coordinates" => $coordinates
        );
        $sth = getPDO()->prepare("INSERT INTO `restaurants` (`name`, `address`, `email`, `phonenumber`, `coordinates`) VALUES (:name, :address, :email, :phonenumber, :coordinates);");
        $sth->execute($params);
    }

    public static function update(int $id, string $name, string $address, string $email, string $phonenumber, string $coordinates)
    {
        $params = array(
            ":id" => $id,
            ":name" => $name,
            ":address" => $address,
            ":email" => $email,
            ":phonenumber" => $phonenumber,
            ":coordinates" => $coordinates
        );
        $sth = getPDO()->prepare(
            "UPDATE `restaurants`
            SET `name` = :name,
                `address` = :address,
                `email` = :email,
                `phonenumber` = :phonenumber,
                `coordinates` = :coordinates
            WHERE `id` = :id;"
        );
        $sth->execute($params);
    }

    public static function delete(int $id)
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("DELETE FROM `restaurants` WHERE `id` = :id");
        $sth->execute($params);
    }
}

<?php

declare(strict_types=1);

/** An object representing a customer in the database */
class Customer
{
    private int $id;
    private string $name;
    private string $email;
    private string $phonenumber;
    private string $password;

    private function __construct(int $id, string $name, string $email, string $phonenumber, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->password = $password;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhonenumber(): string
    {
        return $this->phonenumber;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public static function get(int $id): ?Customer
    {
        $params = array(":id" => $id);
        $sth = getPDO()->prepare("SELECT `id`, `name`, `email`, `phonenumber`, `password` FROM `customers` WHERE `id` = :id LIMIT 1;");
        $sth->execute($params);

        if ($row = $sth->fetch())
            return new Customer($id, $row["name"], $row["email"], $row["phonenumber"], $row["password"]);

        return null;
    }

    public static function update(int $id, string $name, string $email, string $phonenumber, string $password)
    {
        $params = array(
            ":id" => $id,
            ":name" => $name,
            ":email" => $email,
            ":phonenumber" => $phonenumber,
            ":password" => $password
        );
        $sth = getPDO()->prepare(
            "UPDATE `customers`
            SET `name` = :name,
                `email` = :email,
                `phonenumber` = :phonenumber,
                `password` = :password
            WHERE `id` = :id;"
        );
        $sth->execute($params);
    }

    /** Get a customer by email
     * 
     * @param string $email The email of the customer to get
     * 
     * @return \Customer The customer or null if it can't be found
     */
    public static function byEmail(string $email): ?Customer
    {
        $params = array(":email" => $email);
        $sth = getPDO()->prepare("SELECT `id`, `name`, `phonenumber`, `password` FROM `customers` WHERE `email` = :email");
        $sth->execute($params);

        if ($row = $sth->fetch())
            return new Customer($row["id"], $row["name"], $email, $row["phonenumber"], $row["password"]);

        return null;
    }
}

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
            return new Customer((int)$row["id"], $row["name"], $email, $row["phonenumber"], $row["password"]);

        return null;
    }
}

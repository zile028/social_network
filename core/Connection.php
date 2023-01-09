<?php

class Connection
{
    public $db;

    public function __construct($config)
    {
        try {
            $this->db = new PDO("mysql:host=" . $config["host"] . ";dbname=" . $config["database"], $config["user"], $config["password"]);
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

}
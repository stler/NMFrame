<?php
namespace Application\Core\Db;

class Mysql {

    public function __construct($config) {
            try
            {
               return new \PDO("mysql:host=".$config['DB_HOST'].";dbname=".$config['DB_NAME'], $config['DB_USER'], $config['DB_PASSWORD']);
            }
            catch(PDOException $e)
            {
                die("Error: ".$e->getMessage());
            }

    }
}
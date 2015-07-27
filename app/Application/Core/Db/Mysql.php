<?php
namespace Application\Core\Db;

class Mysql {

    public function __construct($config) {
        //конфиг должен инитится не тут а в frontController

        if(file_exists($this->configDb)) {
            require_once($this->configDb);
            try
            {
                return = new \PDO("mysql:host=".$config['DB_HOST'].";dbname=".$config['DB_NAME'], $config['DB_USER'], $config['DB_PASSWORD']);
            }
            catch(PDOException $e)
            {
                die("Error: ".$e->getMessage());
            }
        } else {
            die("Файл конфигурации отсутствует");
        }
    }
}
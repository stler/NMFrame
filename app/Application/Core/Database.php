<?php
namespace Application\Core;

class Database {
    private static $instance;
    private $db;
    private $configDb = 'app/Application/Config/ConfigDb.php';
    private function __construct(){}

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function init() {
        $this->getOption();
    }

    private function getOption() {
        if(file_exists($this->configDb)) {
            require_once($this->configDb);
            try
            {
                $this->db = new \PDO("mysql:host=".$config['DB_HOST'].";dbname=".$config['DB_NAME'], $config['DB_USER'], $config['DB_PASSWORD']);
            }
            catch(PDOException $e)
            {
                die("Error: ".$e->getMessage());
            }
        } else {
            die("Файл конфигурации отсутствует");
        }
    }

    public function getDb() {
        return $this->db;
    }
}


?>
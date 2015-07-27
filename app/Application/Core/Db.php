<?php
namespace Application\Core;

class Db {
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

    private function connect($adapter, $config) {
        $adapterClass = 'Db/Connect/' $adapter;

        $this->_adapter = new $adapterClass($config);
    }

    public function getAdapter()
    {
        return $this->_adapter;
    }
}


?>
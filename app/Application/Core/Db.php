<?php
namespace Application\Core;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
class Db {
    private static $instance;
    private $_adapter;
    private function __construct(){}

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public  function connect($adapter, $config) {
        $paths = array("/user/Model/");
        $isDevMode = false;
        $dbParams = array(
            'driver'   => $adapter,
            'user'     => $config['DB_USER'],
            'password' => $config['DB_PASSWORD'],
            'dbname'   => $config['DB_NAME'],
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $this->_adapter =  EntityManager::create($dbParams, $config);
    }

    public function getAdapter()
    {
        return $this->_adapter;
    }
}


?>
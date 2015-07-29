<?php
namespace Application\Core\Config;
class Config {

    private $config = null;

    public  function __construct($configuration) {
        $classObject = 'Application\Core\Config\\'.$configuration['sys_format'].'Config';
        $this->config = new $classObject($configuration);
    }

    public function getConfig() {
        return $this->config;
    }
}

?>
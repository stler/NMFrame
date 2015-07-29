<?php
namespace Application\Core\Config;
class PhpConfig implements ConfigInterface {

    private $configDb = 'app/Application/Config/ConfigDb.php';
    private $conf = array();

    public  function __construct($configuration) {
        $this->conf = $configuration;
    }
    public function getParam($key) {
        return $this->conf[$key];
    }
}

?>
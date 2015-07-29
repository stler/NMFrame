<?php
namespace Application\Core\Config;
class XmlConfig implements ConfigInterface {

    private $configDb = 'app/Application/Config/ConfigDb.xml';
    private $conf = array();

    public  function __construct($configuration = null) {
        var_dump("Прочитал xml файл...");
        var_dump("Записал в переменную conf");
        die("Готово");
    }
    public function getParam($key) {
        return $this->conf[$key];
    }
}

?>
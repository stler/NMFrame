<?php
namespace Application\Core;
use Application\Core\Config\Config;
class FrontController {
    private $_config;
    private $path = 'app/Application/Config/ConfigDb.php';

    public function bootstrap() {
        if(file_exists($this->path)) {
            $configuration = require_once($this->path);
            if(isset($configuration['sys_format'])) {
                $temp = new Config($configuration);
                $this->_config = $temp->getConfig();
            } else {
                die("Системный формат не определен");
            }
        } else {
            die("Файл не найден");
        }
        return $this;
    }

    function handleRequest(){
        Db::getInstance()->connect($this->_config->getParam('adapter_db'),$this->_config->getParam('db'));
        $request = new Requesting();
        Routing::run($request);
    }
}

?>
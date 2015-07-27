<?php
namespace Application\Core;
class FrontController {
    protected $_config;


    public function bootstrap() {
        //configure
        return $this;
    }

    function handleRequest(){
        $db = Db::getInstance()->connect($this->_config['db']);
        $db->init();
        $request = Requesting::getInstance();
        Routing::run($request);
    }
}

?>
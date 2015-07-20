<?php
namespace Application\Core;
class FrontController {

    private function __construct(){}

    static function run() {
        $instance = new FrontController();
        $instance->handleRequest();
    }

    function handleRequest(){
        $request = Requesting::getInstance();
        Routing::run($request);
    }
}

?>
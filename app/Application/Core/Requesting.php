<?php
namespace Application\Core;
class Requesting {

    private $controller = 'index';
    private  $action = 'index';
    private  $type;
    private  $params = array();
    private static $instance;

    private function __construct() {
        $this->type = $_SERVER['REQUEST_METHOD'];
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $this->controller = !empty($uri[1]) ? $uri[1]:'index';
        $this->action = !empty($uri[2])? $uri[2]:'index';
        for($i = 3; $i<count($uri);$i++) {
            $this->params[] = $uri[$i];
        }
        foreach($_POST as $request => $value) {
            $this->params[$request] = $value;
        }

    }

    public static function getInstance() {
        if(!self::$instance){
            return self::$instance = new Requesting();
        } else {
            return self::$instance;
        }
    }
    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }

    public  function getMethod() {
        return $this->type;
    }
    public function getParam($key) {
        if(!empty($this->params[$key])){
            return $this->params[$key];
        } else {
            return null;
        }
    }

    public function getParams() {
        if(!empty($this->params)){
            return $this->params;
        } else {
            return null;
        }
    }
}


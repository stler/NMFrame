<?php
namespace Application\Core;
class Requesting extends \ArrayObject{

    private $param = array();

    public function __construct() {
        $this->param['type'] = $_SERVER['REQUEST_METHOD'];
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $this->param['controller'] = !empty($uri[1]) ? $uri[1]:'index';
        $this->param['action'] = !empty($uri[2])? $uri[2]:'index';
        $this->param['params'] = $_REQUEST;
    }

    public function append($value) {
        $this->param[] = $value;
    }
    function offsetSet($key, $value) {
        if ($key) {
            $this->param[$key] = $value;
        } else {
            $this->param[] = $value;
        }
    }
    function offsetGet($key) {
        if ( array_key_exists($key, $this->param) ) {
            return $this->param[$key];
        }
    }
    function offsetUnset($key) {
        if ( array_key_exists($key, $this->param) ) {
            unset($this->param[$key]);
        }
    }
    function offsetExists($offset) {
        return array_key_exists($offset, $this->param);
    }

    public function getController() {
        return $this->param['controller'];
    }

    public function getAction() {
        return $this->param['action'];
    }

    public  function getMethod() {
        return $this->param['type'];
    }
    public function getParam($key) {
        if(!empty($this->param['params'][$key])){
            return $this->param['params'][$key];
        } else {
            return null;
        }
    }

    public function getParams() {
        if(!empty($this->param['params'])){
            return $this->param['params'];
        } else {
            return null;
        }
    }
}


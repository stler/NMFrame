<?php
namespace Application\Core;
class Model {
    private $handle;
    public function __construct(){
        $this->handle = Database::getInstance()->getAdapter();
    }
    public function getHandle() {
        return $this->handle;
    }
}


?>
<?php
namespace Application\Core;
class Model {
    private $handle;
    public function __construct(){
        $this->handle = Database::getInstance()->getDb();
    }
    public function getHandle() {
        return $this->handle;
    }
}


?>
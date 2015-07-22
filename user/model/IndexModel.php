<?php
namespace Model;

use Application\Core\Model;

class IndexModel extends Model {

    public function createTable($name) {
        $handle = $this->getHandle();
        $rows = $handle->exec("CREATE TABLE `".$name ."`(
	id INT PRIMARY KEY AUTO_INCREMENT,
	fname VARCHAR(20) NOT NULL DEFAULT '',
	email VARCHAR(50) NOT NULL DEFAULT '')");
    }
}

?>
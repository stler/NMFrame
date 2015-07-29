<?php
use Model\Product;
class IndexController extends \Application\Core\Controller{

    public function indexAction() {
        $product = new Product();
        $product->setName('Hello');

        $this->model->persist($product);
        $this->model->flush();

        echo "Created Product with ID " . $product->getId() . "\n";

        var_dump($this->request->getParams());
    }
    public function blogAction() {
    }
}

?>
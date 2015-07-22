<?php
namespace Application\Core;
use Model\IndexModel;

class Controller {
    public $model;
    public $view;
    public $request;

    function __construct() {
        $this->request = \Application\Core\Requesting::getInstance();
        $this->model = new IndexModel();
        \Twig_Autoloader::register();
        $path = 'user/View/'. $this->request->getController().'/';
        $loader = new \Twig_Loader_Filesystem($path);
        $twig = new \Twig_Environment($loader);
        $fileName = $this->request->getAction().'.html';
        $this->view = $twig->loadTemplate($fileName);
    }
}

?>
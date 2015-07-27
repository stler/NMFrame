<?php
    require 'vendor/autoload.php';
    var $front = new \Application\Core\FrontController();

    $front->bootstrap()
        ->handleRequest();
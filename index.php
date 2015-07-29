<?php
    require 'vendor/autoload.php';
    $front = new \Application\Core\FrontController();
    $front->bootstrap()->handleRequest();

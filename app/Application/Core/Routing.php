<?php
namespace Application\Core;
class Routing {

    public static function run(Requesting $requesting) {
        $controller = $requesting->getController();
        $action = $requesting->getAction();
        //$params = $requesting->getParams();

        $first = mb_substr($controller,0,1);
        $last = mb_substr($controller,1);
        $first = mb_strtoupper($first);
        $last = mb_strtolower($last);

        $nameController = $first.$last."Controller";
        $action = $action."Action";
        $filePath = "user/Controller/".$nameController.".php";
        $className = $nameController;
        if(file_exists($filePath)) {
            require_once($filePath);
            $controller = new $nameController;
            if(class_exists($className)){
                if(method_exists( $controller,$action)){
                    call_user_func(array( $controller, $action));
                } else {
                    var_dump("Данного метода не существует");
                }
            } else {
                var_dump("Класс задан неверно");
            }
        } else {
            var_dump("Файла не существует");
        }
    }
}




?>
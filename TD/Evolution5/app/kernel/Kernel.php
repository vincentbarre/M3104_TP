<?php

class Kernel
{
    public static function autoload($class) {
        if(file_exists(ROOT."/app/kernel/$class.php"))
            require_once(ROOT."/app/kernel/$class.php");
        else if(file_exists(ROOT."/app/controller/$class.php"))
            require_once(ROOT."/app/controller/$class.php");
        else if(file_exists(ROOT."/app/model/$class.php"))
            require_once(ROOT."/app/model/$class.php");
    }

    public static function run() {

        // Autoload
        spl_autoload_register(array("Kernel", "autoload"));

        $route = Router::analyze ($_GET);

        $controller_name = $route["controller"] . "Controller";

        if (class_exists ($controller_name)) {

            $controller = new $controller_name ($route);

            $action = $route["action"];
            $methode = array($controller, $action);

            if (is_callable ($methode)) call_user_func ($methode);
        }
    }

}
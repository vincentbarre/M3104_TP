<?php

require_once ('../app/config/params.inc.php');

require_once ('../app/kernel/Router.php');
require_once ('../app/kernel/View.php');
require_once ('../app/kernel/Database.php');
require_once ('../app/kernel/Model.php');
require_once ('../app/kernel/Controller.php');
require_once ('../app/controller/ErrorController.php');
require_once ('../app/controller/IndexController.php');
require_once ('../app/controller/ItemController.php');
require_once ('../app/model/Item.php');

$route = Router::analyze ($_GET);

$controller_name = $route["controller"] . "Controller";

if (DEBUG) {
    echo "Contrôleur appelé : ".$controller_name."<br />";
}

if (class_exists ($controller_name)) {

    $controller = new $controller_name ($route);

    $action = $route["action"];
    $methode = array($controller, $action);
    if (DEBUG) {
        echo "Méthode du contrôleur appelée (indice 0 -> instance; indice 1 -> méthode) : ";
        var_dump ($methode);
    }
    if (is_callable ($methode)) call_user_func ($methode);

}


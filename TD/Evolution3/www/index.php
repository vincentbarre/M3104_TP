<?php

require_once ('../app/config/params.inc.php');

require_once ('../app/kernel/Router.php');
require_once ('../app/kernel/View.php');
require_once ('../app/kernel/Database.php');
require_once ('../app/kernel/Model.php');
require_once ('../app/model/Item.php');

$route = Router::analyze ($_GET);
$vue = new View($route);

switch ($route['controller']) {
    case "Item"  :
        $vue->setData(Item::getFromSlug($route['params']['slug']));
        break;
    case "Index" :
        $vue->setData(Item::getList());
        break;
    default      :
        $vue->setData(null);
}

$vue->display ();

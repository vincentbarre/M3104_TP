<?php

require_once ('../app/config/params.inc.php');

require_once ('../app/kernel/Router.php');
require_once ('../app/kernel/View.php');

$route = Router::analyze ($_GET);

$vue = new View($route);
$vue->display ();

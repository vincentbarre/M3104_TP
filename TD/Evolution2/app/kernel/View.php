<?php

class View
{
    protected $route;

    public function __construct($route)
    {
        $this->route = $route;

    }

    public function display()
    {
        $vue = "../app/view/".$this->route['controller']."/".$this->route['action'].".php";
        if (DEBUG) { echo "Sélection de la vue Controller/action : $vue"; }

        if (file_exists ($vue)) {
            include ($vue);
        }

    }

}
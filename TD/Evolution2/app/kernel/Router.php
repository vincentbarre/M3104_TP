<?php

class Router
{
    public static function analyze($params)
    {
        $result = array(
            "controller" => "Error",
            "action" => "error404",
            "params" => array()
        );

        if (count ($params) == 0) { // Appel sans paramètres (affichage de la liste complète)
            $result["controller"] = "Index";
            $result["action"] = "display";
        } elseif (isset($params["action"]) && isset($params["slug"])) {
            switch ($params["action"]) {
                case "display" :
                    $result["controller"] = "Item";
                    $result["action"] = $params['action'];
                    $result["params"]["slug"] = $params['slug'];
                    break;
            }
        } // sinon erreur 404 par défaut

        return $result;

    }

}
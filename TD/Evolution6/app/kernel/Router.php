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
                case "do_edit" :
                    if (isset($params['description'])) {
                        $result["params"]["description"] = $params['description'];
                    }
                    if (isset($params['expiration'])) {
                        $result["params"]["expiration"] = $params['expiration'];
                    }
                case "edit" :
                case "display" :
                    $result["controller"] = "Item";
                    $result["action"] = $params['action'];
                    $result["params"]["slug"] = $params['slug'];
                    break;
                default :
            }
        } // sinon erreur 404 par défaut

        if (DEBUG) {
            echo "Route : ";
            var_dump ($result);
        }

        return $result;

    }

}
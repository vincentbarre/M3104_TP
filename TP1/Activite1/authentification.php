<?php

/**
 * Permet de valider un couple (login,pass) auprès d'une source de référence
 * (version basée sur un fichier de configuration contenant les données de référence).
 *
 * @param string $login le login à vérifier.
 * @param string $password le mot de passe à vérifier.
 *
 * @return boolean selon que l'authentification est ok ou pas.
 *
 * @author Vincent Barré
 *
 * @version 1.0
 */
function authentification($login, $password)
{
    include ("config_auth.inc.php");
    if (!is_null ($login) && !is_null ($password)) {
        if ($login == $config_user && $password == $config_pass) {
            return true;
        } else {
            return false;
        }
    }
}

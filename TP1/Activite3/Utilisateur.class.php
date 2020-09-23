<?php

class Utilisateur
{

    protected $login = null;

    public function getAuth($login, $password)
    {
        include ("config_auth.inc.php");
        if (!is_null ($login) && !is_null ($password)) {
            if (in_array ([$login, $password], $config)) {
                $this->login = $login;
                return true;
            } else {
                $this->login = null;
                return false;
            }
        }
    }
}

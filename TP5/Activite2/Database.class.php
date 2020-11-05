<?php

class Database
{
    static protected $_instance = null;
    protected $_db;

    protected function __construct()
    {
        include_once ("params.inc.php");
        $this->_db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );
    }

    static public function getInstance()
    {
        if (is_null (self::$_instance))
            self::$_instance = new Database();
        return self::$_instance;
    }

    public function __call($method, array $arg)
    {
        // Si on appelle une méthode qui n'existe pas, on
        // delegue cet appel à l'objet PDO $this->_db
        return call_user_func_array (array($this->_db, $method), $arg);
    }


}




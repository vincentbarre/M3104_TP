<?php

class Utilisateur
{

    protected $login;

    /**
     * Permet de valider un couple (login,pass) auprès d'une base de données.
     *
     * @param string $login le login à vérifier.
     * @param string $password le mot de passe à vérifier.
     *
     * @return boolean selon que l'authentification est ok ou pas.
     */
    public function getAuth($login, $password)
    {
        include_once ('params.inc.php');
        if (!is_null ($login) && !is_null ($password)) {
            $db = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );

            $login = filter_var ($login, FILTER_SANITIZE_STRING);
            $pass = filter_var ($password, FILTER_SANITIZE_STRING);
            $sql = "SELECT * FROM TP2_Users WHERE login = :login AND pass = :pass";
            $stmt = $db->prepare ($sql);
            $stmt->bindValue ("login", $login);
            $stmt->bindValue ("pass", $pass);
            $stmt->execute ();
            if ($stmt->fetch ()) {
                $this->login = $login;
                return true;
            } else {
                $this->login = null;
                return false;
            }
        }

    }

    /**
     * Permet d'insérer un nouvel utilisateur dans la base de données.
     *
     * @param string $login le login à insérer.
     * @param string $password le mot de passe à insérer.
     * @param string $mail le mail à insérer.
     * @param string $tel le tel à insérer.
     *
     * @return boolean selon que l'insertion est ok ou pas.
     */
    public function createUser($login, $password, $mail, $tel)
    {

        include_once ('params.inc.php');

        $db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );

        $login = filter_var ($login, FILTER_SANITIZE_STRING);
        $pass = filter_var ($password, FILTER_SANITIZE_STRING);
        $mail = filter_var ($mail, FILTER_SANITIZE_STRING);
        $tel = filter_var ($tel, FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO TP2_Users VALUES ('$login', '$pass', '$mail', '$tel')";

        if ($db->exec ($sql)) {
            return true;
        } else {
            return false;
        }

    }
}

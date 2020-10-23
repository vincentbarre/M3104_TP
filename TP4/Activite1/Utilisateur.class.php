<?php

class Utilisateur
{
    protected $_db;

    public function __construct()
    {
        include_once ('params.inc.php');

        if (session_status () != PHP_SESSION_ACTIVE) {
            session_start ();
        }

        $this->_db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );
    }

    /**
     * Permet de déterminer si un utilisateur est authentifié ou non
     *   - soit en validant un couple (login,pass) auprès d'une base de données
     *   - soit parce que la variable de session 'login' est positionnée.
     *
     * @param string|null $login le login à vérifier.
     * @param string|null $password le mot de passe à vérifier.
     *
     * @return bool selon que l'authentification est ok ou pas.
     */
    public function getAuth($login = null, $password = null)
    {
        if (!is_null ($login) && !is_null ($password)) {
            $login = filter_var ($login, FILTER_SANITIZE_STRING);
            $pass = filter_var ($password, FILTER_SANITIZE_STRING);
            $sql = "SELECT * FROM TPPHP_Users WHERE login = :login AND pass = :pass";
            $stmt = $this->_db->prepare ($sql);
            $stmt->bindValue ("login", $login);
            $stmt->bindValue ("pass", $pass);
            $stmt->execute ();
            if ($stmt->fetch ()) {
                $_SESSION['login'] = $login;
                return true;
            } else {
                return false;
            }
        } elseif (session_status () == PHP_SESSION_ACTIVE && isset($_SESSION['login'])) {
            return true;
        } else {
            return false;
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
     * @return bool selon que l'insertion est ok ou pas.
     */
    public function createUser(string $login, $password, $mail, $tel)
    {
        $login = filter_var ($login, FILTER_SANITIZE_STRING);
        $pass = filter_var ($password, FILTER_SANITIZE_STRING);
        $mail = filter_var ($mail, FILTER_SANITIZE_STRING);
        $tel = filter_var ($tel, FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO TPPHP_Users VALUES ('$login', '$pass', '$mail', '$tel')";

        if ($this->_db->exec ($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Permet de modifier les données d'un utilisateur existant dans la base de données.
     * (l'utilisateur mis à jour est celui préalablement connecté).
     *
     * @param string $password le mot de passe à mettre à jour.
     * @param string $mail le mail à mettre à jour.
     * @param string $tel le tel à mettre à jour.
     *
     * @return bool selon que la mise à jour est ok ou pas.
     */
    public function updateUser($password, $mail, $tel)
    {
        if (isset($_SESSION['login'])) {

            $maj = "";
            $virgule = "";

            if (!is_null ($password)) {
                $pass = filter_var ($password, FILTER_SANITIZE_STRING);
                $maj .= $virgule . "pass='$pass'";
                $virgule = ", ";
            }
            if (!is_null ($mail)) {
                $mail = filter_var ($mail, FILTER_SANITIZE_STRING);
                $maj .= $virgule . "mail='$mail'";
                $virgule = ", ";
            }
            if (!is_null ($tel)) {
                $tel = filter_var ($tel, FILTER_SANITIZE_STRING);
                $maj .= $virgule . "tel='$tel'";
                // $virgule = ", ";
            }

            $sql = "UPDATE TPPHP_Users SET " . $maj . " WHERE login = '" . $_SESSION['login'] . "'";

            if ($this->_db->exec ($sql)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Permet de déconnecter un utilisateur authentifié par getAuth().
     *
     * @return bool selon que la déconnexion est ok ou pas.
     */
    public function deconnexion()
    {
        if (session_status () == PHP_SESSION_ACTIVE) {
            $_SESSION = array();
        }
        return true;
    }

    /**
     * Permet de déconnecter un utilisateur authentifié par getAuth().
     *
     * @return string|null le login de l'utilisateur connecté ou NULL si pas connecté.
     */
    public function getUser()
    {
        if ((session_status () == PHP_SESSION_ACTIVE) && isset($_SESSION['login'])) {
            return $_SESSION['login'];
        } else {
            return null;
        }
    }

}

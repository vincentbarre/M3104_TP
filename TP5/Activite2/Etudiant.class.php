<?php

include_once ("Utilisateur.class.php");

class Etudiant extends Utilisateur
{
    protected $cours = [];

    /**
     * Permet de valider un couple (login,pass) auprès d'une base de données.
     * Initialise également les informations spécifiques sur un étudiant.
     *
     * @param string|null $login le login à vérifier.
     * @param string|null $password le mot de passe à vérifier.
     *
     * @return boolean selon que l'authentification est ok ou pas.
     */
    public function getAuth($login = null, $password = null)
    {
        $ok = parent::getAuth ($login, $password);

        if ($ok) {
            $sql = "SELECT cours_desc FROM TPPHP_Cours WHERE login = :login";
            $stmt = $this->_db->prepare ($sql);
            $stmt->bindValue ("login", $login);
            $stmt->execute ();
            $this->cours = $stmt->fetchall (PDO::FETCH_COLUMN);
        }

        return $ok;
    }

    /**
     * Permet d'afficher les données connues sur l'utilisateur connecté.
     */
    public function getInfos()
    {
        echo "Utilisateur : ".$this->getUser()." <br />";
        foreach ($this->cours as $cours) {
            echo "Inscrit pour le cours : $cours <br />";
        }
    }

}
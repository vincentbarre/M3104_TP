<?php
/**
 * Permet de déterminer si un utilisateur est authentifié ou non
 * en utilisant la méthode getAuth() de la classe Utilisateur.
 *
 * @param string $login le login à vérifier.
 * @param string $password le mot de passe à vérifier.
 *
 * @return int code d'état HTTP à renvoyer au client.
 */
function authentification(string $login, string $password): int
{

    include_once ("Utilisateur.class.php");

    $login = filter_var ($login, FILTER_SANITIZE_STRING);
    $password = filter_var ($password, FILTER_SANITIZE_STRING);

    $user = new Utilisateur;

    if ($user->getAuth ($login, $password)) {
        return 200; // Code requête Ok en cas de succès
    } else {
        return 403; // Code "Forbidden" en cas de refus d'authentification
    }

}
<?php
include_once ("Utilisateur.class.php");

$codeRetourHTTP = 400; // Erreur "Bad request" par défaut
header ("Access-Control-Allow-Origin: *");

if (isset($_GET['u']) && isset($_GET['p'])) {
    $login = filter_var ($_GET['u'], FILTER_SANITIZE_STRING);
    $pass = filter_var ($_GET['p'], FILTER_SANITIZE_STRING);

    $user = new Utilisateur;

    if ($user->getAuth ($login, $pass)) {
        $codeRetourHTTP = 200; // Code requête Ok
    } else {
        $codeRetourHTTP = 403; // Code "Forbidden" en cas de refus d'authentification
    }
}

// On génère la réponse en JSON à partir des données de la session
http_response_code ($codeRetourHTTP);
if (isset($_SESSION['login'])) {
    header ('Content-Type: application/json');
    echo json_encode ($_SESSION['login']);
}
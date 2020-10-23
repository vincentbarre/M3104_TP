<?php

include_once ("authentification.php");

header ("Access-Control-Allow-Origin: *");

if (isset($_GET['u']) && isset($_GET['p'])) {
    $codeRetourHTTP = authentification ($_GET['u'], $_GET['p']);
} else {
    $codeRetourHTTP = 400;      // Erreur "Bad request"
}

// On génère la réponse en JSON à partir des données de la session
http_response_code ($codeRetourHTTP);
if ($codeRetourHTTP == 200 && isset($_SESSION['login'])) {
    header ('Content-Type: application/json');
    echo json_encode ($_SESSION['login']);
}
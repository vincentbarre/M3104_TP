<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <title>Todo list</title>
</head>

<body>

<header>
    <h1>INFO2 - PHP / Objets - Todo list</h1>
</header>

<?php

require_once ('../app/config/params.inc.php');
require_once ('../app/kernel/Router.php');

$route = Router::analyze ($_GET);

if (DEBUG) {
    echo "_GET : ";
    var_dump ($_GET);
    echo "Route : ";
    var_dump ($route);
}

function displayItem($params)
{

    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );

    $slug = filter_var ($params['slug'], FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM INFO2_Items WHERE slug = :param";
    $stmt = $db->prepare ($sql);
    $stmt->bindValue ("param", $slug);
    $stmt->execute ();

    echo "<h2>Todo</h2>";
    echo "<blockquote>";
    if ($item = $stmt->fetch ()) {
        echo "<p><b>" . $item["description"] . "</b></p>";
        echo "<p><em>A faire avant le " . $item["expiration"] . "</em></p>";
    } else {
        echo "<p>Fiche introuvable</p>";
    }
    echo "</blockquote>";

}

function displayIndex($params)
{

    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );

    $sql = "SELECT * FROM INFO2_Items";
    $stmt = $db->prepare ($sql);
    $stmt->execute ();

    echo "<h2>Liste des choses à faire</h2>";
    echo "<ul>";
    while ($item = $stmt->fetch ()) {
        echo "<li><a href='index.php?action=display&slug=" . $item["slug"] . "'>" . $item["description"] . "</a></li>";

    }
    echo "</ul>";

}

function displayError($params)
{

    echo "<p>Erreur !</p>";

}


switch ($route['controller']) {

    case "Item"  :
        displayItem ($route['params']);
        break;
    case "Index" :
        displayIndex ($route['params']);
        break;
    default      :
        displayError ($route['params']);

}

?>

<footer>
    <p>IUT de Laval (2020/21)</p>
</footer>
</body>

</html>

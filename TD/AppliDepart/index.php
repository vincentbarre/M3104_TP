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

require_once ('params.inc.php');

$db = new PDO(
    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
    DB_USER,
    DB_PASS
);

// Si une action est passée en paramètre
//   - s'il s'agit de 'display" et qu'un slug est passé : on affiche la fiche correspondant à ce slug
// Sinon, on doit afficher la liste de toutes les fiches disponibles
if (isset($_GET['action']) && ($_GET['action'] == 'display' && isset($_GET["slug"]))) {

        $slug = filter_var ($_GET["slug"], FILTER_SANITIZE_STRING);
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

} else {

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

?>

<footer>
    <p>IUT de Laval (2020/21)</p>
</footer>
</body>

</html>

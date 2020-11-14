<?php
$db = new PDO(
    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
    DB_USER,
    DB_PASS
);

$sql = "SELECT * FROM INFO2_Items";
$stmt = $db->prepare ($sql);
$stmt->execute ();
?>

<?php
include ('../app/view/header.php');
?>

<h2>Liste des choses à faire</h2>

<ul>

    <?php while ($item = $stmt->fetch ()) { ?>

        <li><a href='index.php?action=display&slug=<?php echo $item["slug"]; ?>'><?php echo $item["description"]; ?></a>
        </li>

    <?php } ?>

</ul>

<?php
include ('../app/view/footer.php');
?>
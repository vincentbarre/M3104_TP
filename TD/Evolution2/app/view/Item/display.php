<?php
$db = new PDO(
    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
    DB_USER,
    DB_PASS
);

$slug = filter_var ($this->route['params']['slug'], FILTER_SANITIZE_STRING);
$sql = "SELECT * FROM INFO2_Items WHERE slug = :param";
$stmt = $db->prepare ($sql);
$stmt->bindValue ("param", $slug);
$stmt->execute ();
?>

<?php
include ('../app/view/header.php');
?>

<h2>Todo</h2>
<blockquote>

    <?php if ($item = $stmt->fetch ()) { ?>

        <p><b><?php echo $item["description"]; ?></b></p>
        <p><em>A faire avant le <?php echo $item["expiration"]; ?></em></p>

    <?php } else { ?>

        <p>Fiche introuvable</p>

    <?php } ?>

</blockquote>

<?php
include ('../app/view/footer.php');
?>
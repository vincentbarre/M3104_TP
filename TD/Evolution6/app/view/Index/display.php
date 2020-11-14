<?php
include ('../app/view/header.php');
?>

<h2>Liste des choses à faire</h2>

<ul>

    <?php foreach ($this->data as $item) { ?>

        <li>
            <a href='index.php?action=display&slug=<?php echo $item["slug"]; ?>'><?php echo $item["description"]; ?></a>
        </li>

    <?php } ?>

</ul>

<?php
include ('../app/view/footer.php');
?>
<?php
include ('../app/view/header.php');
?>

<h2>Todo</h2>
<blockquote>

    <?php if (is_array ($this->data)) { ?>

        <p><b><?php echo $this->data["description"]; ?></b>
            <a href='index.php?action=edit&slug=<?php echo $this->data["slug"]; ?>'>(edit)</a></p>
        <p><em>A faire avant le <?php echo $this->data["expiration"]; ?></em></p>

    <?php } else { ?>

        <p>Fiche introuvable</p>

    <?php } ?>

</blockquote>

<?php
include ('../app/view/footer.php');
?>

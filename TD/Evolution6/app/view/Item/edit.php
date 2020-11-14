<?php
include ('../app/view/header.php');
?>

    <h2>Todo</h2>
    <blockquote>

        <?php if (is_array ($this->data)) { ?>

            <form id='editItem' action='index.php'>
                Description : <input type='text' name='description' id='description'
                                     value='<?php echo $this->data['description']; ?>'><br/>
                Date d'échéance : <input type='text' name='expiration' id='expiration'
                                         value='<?php echo $this->data['expiration']; ?>'><br/>
                <input type='hidden' name='slug' value='<?php echo $this->data['slug']; ?>'>
                <input type='hidden' name='action' value='do_edit'>
                <input type='submit' value='Modifier'>
            </form>

        <?php } else { ?>

            <p>Fiche introuvable</p>

        <?php } ?>
    </blockquote>

<?php
include ('../app/view/footer.php');
?>
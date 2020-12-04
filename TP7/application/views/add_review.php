<?php

echo form_open ('reviews/do_add');

?>

<div class="form-group">
	<label for="ID_title" class="text-left">Titre</label>
	<input name="title" required type="text" class="form-control" id="title" placeholder="Enter title here"
		   value="<?php echo set_value ('title'); ?>">
</div>

<div class="form-group">
	<label for="ID_grade" class="text-left">Note</label>
	<input name="grade" required type="text" class="form-control" id="grade" placeholder="Enter grade here"
		   value="<?php echo set_value ('grade'); ?>">
</div>

<div class="text-right">
	<button class="btn btn-primary">Ajouter</button>
</div>

</form>

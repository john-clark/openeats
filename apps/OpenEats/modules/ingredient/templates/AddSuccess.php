<?php use_helper('Validation') ?>
<h2>Add Ingredients</h2>
<br />
<?php echo form_error('add_ing')?>
<?php if (isset($msg)): echo "<p><b>$msg</p></b>"; endif;?>
 <?php echo form_tag('ingredient/update', 'name=add') ?>
<div>
  <label for="add_ing">Ingredient</label>
  <?php echo input_tag('add_ing', '')?>
</div>
<div>
  <?php echo submit_tag('Add Ingredient', array('id' => 'add_ing_submit'))?>
</div>
</form>
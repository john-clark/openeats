<?php use_helper('Validation')?>
<fieldset id="picture">
 <?php echo form_error('pic') ?>
 <label for="pic">Picture</label>
  <?php include_partial('recipe/pic', array('pic' => $pic, 'id' => '$recipe->getRecipeId()', ))?>
 </fieldset>
<?php use_helper('Object')?>
<h3>Add <?php echo $recipe->getRecipeNm()?></h3>
<small>You can select a grocery list you have already created and add this recipe to it or select "Create New List" to create a new grocery list with this recipe</small>
<?php echo form_tag('grocery/AddtoList')?>
  <?php echo input_hidden_tag('recipestripnm', $recipe->getRecipeStripNm())?>
  <?php echo label_for('grocery', 'List')?><br />
  <?php echo select_tag('grocery', objects_for_select($lists, 'getGroceryId', 'getGroceryNm', '', 'include_custom=Create New List'))?>
  <?php echo submit_tag('Add to Grocery List')?>
</form>
<?php use_helper('Object')?>
<h3>Add <?php echo $recipe->getRecipeNm()?></h3>
<small>You can select a menu you have already created and add this recipe to it or select "Create New Menu" to create a new menu with this recipe</small>
<?php echo form_tag('menu/AddtoMenu')?>
  <?php echo input_hidden_tag('recipestripnm', $recipe->getRecipeStripNm())?>
  <?php echo label_for('menu', 'Menu')?><br />
  <?php echo select_tag('menu', objects_for_select($menus, 'getMenuId', 'getMenuNm', '', 'include_custom=Create New Menu'))?>
  <?php echo submit_tag('Add to Menu')?>
</form>  
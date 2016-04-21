<div class="menu_items" id="menu_items_<?php echo $seq ?>">
<?php echo label_for("menu_item[$seq]", 'Recipe') ?> 
<?php echo select_tag("menu_item[$seq]", options_for_select($stored_recipes, $item->getRecipeId(), array('include_blank' => true)))?>
<?php echo label_for("course[$seq]", 'Course')?>
<?php echo select_tag("course[$seq]", options_for_select($courses, $item->getCourseId(), array('include_blank' => true)))?>
<?php echo label_for("menu_desc[$seq]", 'Description')?>
<?php echo textarea_tag("recipe_desc[$seq]", $item->getRecipeDesc(), 'size=40x2');?>
<?php echo link_to_function('[x]', "remove_item($seq)") ?>
</div>

<?php use_helper('Javascript') ?>

<?php slot('drop_down') ?>
  <?php include_partial('menu_items', array('stored_recipes' => $stored_recipes, 'courses' => $courses, 'seq' => $seq, 'item' => $item))?>
<?php end_slot() ?>


<?php echo javascript_tag(
   update_element_function('addItemRow', array(
    'content' => get_slot('drop_down'), 'position' => 'before'
  ))
    
) ?>
<?php include_partial('menu_item_observe', array('seq' => $seq))?>
<?php use_helper('Javascript') ?>

<?php slot('drop_down') ?>
  <?php include_partial('grocery/pantry_item', array('item' => $item, 'seq' => $seq))?>  
<?php end_slot() ?>


<?php echo javascript_tag(
   update_element_function('addItemRow', array(
    'content' => get_slot('drop_down'), 'position' => 'before'
  ))
    
) ?>

<?php include_partial('grocery/pantry_item_observe', array('seq' => $seq, 'item' => $item))?>
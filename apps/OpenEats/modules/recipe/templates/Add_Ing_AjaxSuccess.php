<?php use_helper('Javascript') ?>

<?php slot('drop_down') ?>
  <?php echo include_partial('ingredient/ingdrop', array('ingrlist' => $ingrlist, 'ingr' => $ingr))?>
<?php end_slot() ?>


<?php echo javascript_tag(
   update_element_function('addIngRow', array(
    'content' => get_slot('drop_down'), 'position' => 'before'
  ))
    
) ?>
<?php echo include_partial('ingredient/ingobserve', array('ingr' => $ingr))?>
  

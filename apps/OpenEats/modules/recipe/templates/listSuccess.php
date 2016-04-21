<?php slot('new_recipe_feed')?>
  <?php echo auto_discovery_link_tag('rss', 'feed/RecipeFeed') ?>
<?php end_slot()?>

<?php echo include_partial('recipe/list', array('recipes' => $recipes)); ?>

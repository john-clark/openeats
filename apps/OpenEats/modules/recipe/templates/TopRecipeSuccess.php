<?php slot('top_recipe_feed')?>
  <?php echo auto_discovery_link_tag('rss', 'feed/TopRecipeFeed') ?>
<?php end_slot()?>

<h2>Current Top 10 Recipes <?php echo link_to(image_tag('feed.gif'), 'feed/TopRecipeFeed', array('target'=>'_blank'))?></h2>
<br />
<?php echo include_partial('recipe/list', array('recipes' => $recipes));?>
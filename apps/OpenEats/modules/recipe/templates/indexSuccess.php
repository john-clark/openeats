<?php slot('new_recipe_feed')?>
  <?php echo auto_discovery_link_tag('rss', 'feed/RecipeFeed') ?>
<?php end_slot()?>

<h2>Latest Recipe <?php echo link_to(image_tag('feed.gif'), 'feed/RecipeFeed', array('target'=>'_blank'))?></h2>
<br />
<?php echo include_partial('recipe/list', array('recipes' => $newest))?>

<h2>Popular Keywords</h2>
<ul id="keyword_cloud">
  <?php foreach($keywords as $keyword => $count): ?>
  <li class="keyword_popularity_<?php echo $count ?>"> <?php echo link_to($keyword, '@keyword?keyword='.$keyword, 'rel=tag' )?></li>
  <?php endforeach; ?>
  <li><?php echo link_to('All', 'keyword/index') ?></li>
</ul>

<h2>Current Top five Recipes</h2>
<br />
<?php echo include_partial('recipe/list', array('recipes' => $toprecipes))?>
<?php echo link_to("More Top Recipes", '@top_recipes') ?>

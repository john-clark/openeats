<?php use_helper('Global') ?>

<h2>Navigation</h2>
<ul>
  <li><?php echo link_to('Home', '@homepage')?></li>
  <li><?php echo link_to_login('Add Recipe', 'recipe/edit')?></li>
  <li><?php echo link_to_login('Add Ingredient', 'ingredient/Add')?>
  <li><?php echo link_to('FAQ', 'frontpage/Faq') ?></li>
</ul>

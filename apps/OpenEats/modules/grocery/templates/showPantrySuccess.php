<?php use_helper('Object', 'User', 'Global')?>

<div id="recipe_menu">
	  <ul class="recipe_menu_list">
		<?php if($sf_user->isOwnerOfMasterList() || $sf_user->hasCredential('administrator')) : ?>
	 <li><?php echo image_tag('edit.png', array()) ?><?php echo link_to('Edit', 'grocery/pantry') ?></li>
	<?php endif; ?>
   <li><?php echo image_tag('menu.png', array('size' => '24x24'))?><?php echo link_to('Quick List', 'grocery/showQuick')?></li>
   <li><?php echo image_tag('menu.png', array('size' => '24x24'))?><?php echo link_to('Grocery List', 'grocery/index')?></li>
</ul>	
</div>
<br />
<h2><?php echo $sf_user->getLogin() ?>'s Pantry</h2>
<div class="grocery_list">
	<ul>
	<?php foreach($items as $item):?>
	  <li><?php echo $item->getGroceryItem()?></li>
	<?php endforeach?>
  </ul>
</div>	
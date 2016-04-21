<?php use_helper('Object', 'User', 'Global')?>

<div id="recipe_menu">
	  <ul class="recipe_menu_list">
		<?php if($sf_user->isOwnerOfMasterList() || $sf_user->hasCredential('administrator')) : ?>
	 <li><?php echo image_tag('edit.png', array()) ?><?php echo link_to('Edit', 'grocery/quick') ?></li>
	<?php endif; ?>
   <li><?php echo image_tag('menu.png', array('size' => '24x24'))?><?php echo link_to('Pantry', 'grocery/showPantry')?></li>
   <li><?php echo image_tag('menu.png', array('size' => '24x24'))?><?php echo link_to('Grocery List', 'grocery/index')?></li>
</ul>	
</div>
<br />
<h2><?php echo $sf_user->getLogin() ?>'s Quick List</h2>
<div class="grocery_list">
	<?php foreach ($aisle_list as $aisle):?>
		<?php if ($aisle && $aisle != "Other" ):?>
		  <h3><?php echo $aisle?></h3>
		  <ul>
		  <?php foreach($items as $item):?>
			<?php if ($item->getGroceryAisle() == $aisle):?>
				<li><?php echo $item->getQty()?> <?php echo $item->getMsrmt()?> <?php echo $item->getGroceryItem()?></li>
			<?php endif?>
		 <?php endforeach?>		
		</ul>	
		<?php else:?>
			<h3>Other</h3>
			  <ul style="border:0; padding-top:0;">
			  <?php foreach($items as $item):?>
				<?php if ($item->getGroceryAisle() == $aisle || !$item->getGroceryAisle()):?>
					<li><?php echo $item->getQty()?> <?php echo $item->getMsrmt()?>  <?php echo $item->getGroceryItem()?></li>
				<?php endif?>
			 <?php endforeach?>		
			</ul>
		<?php endif?>
   <?php endforeach?>			
 </div>
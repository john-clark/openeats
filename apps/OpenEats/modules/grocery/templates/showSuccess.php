<?php use_helper('Object', 'User', 'Global')?>
<div id="recipe_menu">
	  <ul class="recipe_menu_list">
		<li><?php echo image_tag('printer.png'); echo link_to('Print', '@print_list?grocery_strip_nm='. $list->getGroceryStripNm(), array('target' => '_blank', ))?></li>
	<?php if($sf_user->isOwnerOfGroceryList($list) || $sf_user->hasCredential('administrator')) : ?>
	 <li><?php echo image_tag('edit.png', array()) ?><?php echo link_to('Edit', '@edit_list?grocery_strip_nm='.$list->getGroceryStripNm()) ?></li>
	<li><?php echo image_tag('edit.png', array()) ?><?php echo link_to('Create', 'grocery/create') ?></li>
	<li><?php echo image_tag('menu.png', array('size' => '24x24'))?><?php echo link_to('Quick List', 'grocery/quick')?></li>
	<li><?php echo image_tag('menu.png', array('size' => '24x24'))?><?php echo link_to('Pantry', 'grocery/pantry')?></li>
	<?php endif; ?>
	<li><?php echo image_tag('mail.png', array()) ?><?php echo link_to_login('Email', 'grocery/sendList?grocery_strip_nm='.$list->getGroceryStripNm())?></li>
	<?php if($sf_user->isOwnerOfGroceryList($list)):?>
	 <li><?php echo image_tag('delete.png', array()) ?><?php echo link_to('Delete', 'grocery/delete?grocery_strip_nm='.$list->getGroceryStripNm(), array( 'confirm'  => 'Are you sure?')) ?></li>
	<?php endif; ?>
</ul>	
</div>
<br />
<h2>Grocery List <?php echo $list->getGroceryNm()?></h2>
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
					<li><?php echo $item->getQty()?> <?php echo $item->getMsrmt()?> <?php echo $item->getGroceryItem()?></li>
				<?php endif?>
			 <?php endforeach?>		
			</ul>
		<?php endif?>
    <?php endforeach?>			
  </div>	 

<?php use_helper('Global')?>

<div id="recipe_menu">
	  <ul class="recipe_menu_list">
  	   <li><?php echo image_tag('edit.png', array()) ?><?php echo link_to('Create', 'grocery/create') ?></li>
       <li><?php echo image_tag('menu.png', array('size' => '24x24'))?><?php echo link_to('Quick List', 'grocery/showQuick')?></li>
       <li><?php echo image_tag('menu.png', array('size' => '24x24'))?><?php echo link_to('Pantry', 'grocery/showPantry')?></li>
    </ul>	
</div>
<br />

<h2>Grocery List</h2>

<?php if (count($lists) == 0):?>
  You have not created any list yet. <?php echo link_to('Create', 'grocery/create')?>
<?php endif?>

<?php foreach($lists as $list):?>
   <h2 class="recipelist"><?php echo link_to($list->getGroceryNm(),   
       '@get_list?grocery_strip_nm='.$list->getGroceryStripNm().'&user='.$list->getUser())?></h2> <?php echo image_tag('delete.png', array('size' => '12x12')) ?><?php echo link_to('Delete', 'grocery/delete?grocery_strip_nm='.$list->getGroceryStripNm(), array( 'confirm'  => 'Are you sure?')) ?>
  <div class="submited">
	Created on <?php echo $list->getCreatedAt()?>
  </div>
   <ul style="border:0;">
    <?php $c = new Criteria()?>
  	<?php foreach($list->getGroceryItems($c->setLimit(5)) as $item):?>
		<li><?php echo $item->getQty()?> <?php echo $item->getMsrmt()?> <?php echo $item->getGroceryItem()?></li>
	<?php endforeach?>
   </ul>
  
<?php endforeach ?>  
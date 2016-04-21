<?php use_helper('Object', 'User', 'Global')?>
<?php if($menu->getMenuPrivate() == 1 && $menu->getUserId() != $sf_user->getSubscriberId()):?>
  <?php echo "Sorry this menu has been marked private by the owner"?>
<?php else:?>
<div id="recipe_menu">
	  <ul class="recipe_menu_list">
	<?php if($sf_user->isOwnerOfMenu($menu)): ?>
	 <li><?php echo image_tag('edit.png', array()) ?><?php echo link_to('Edit', '@edit_menu?menu_strip_nm='.$menu->getMenuStripNm()) ?></li>
	<?php endif; ?>
	<?php if($sf_user->isOwnerOfMenu($menu)):?>
	 <li><?php echo image_tag('delete.png', array()) ?><?php echo link_to('Delete', 'menu/delete?menu_strip_nm='.$menu->getMenuStripNm(), array( 'confirm'  => 'Are you sure?')) ?></li>
		<li><?php echo image_tag('cal.png', array('size' => '24x24'))?><?php echo link_to_login('Schedule', 'planner/AddMenu/?menustripnm='.$menu->getMenuStripNm())?></li>
	<?php endif; ?>	
   </ul>
</div>
<br />
<div class="show_menu">
	<h2><?php echo $menu->getMenuNm()?></h2>
    <?php foreach($course_list as $course):?>
	  <h3><?php echo $course ?></h3>
	  <?php foreach($items as $item):?>
	    <?php if($item->getCourse()->getCourseNm() == $course):?>
		  <p><span class="item_title"><?php echo link_to_recipe($item->getRecipe())?></span></p>
		   <div class="item_desc"><?php echo $item->getRecipeDesc()?></div>
	    <?php endif?>
	    <?php endforeach?>
	    <?php foreach($non_items as $non_item):?>
	      <?php if($non_item->getCourse()->getCourseNm() == $course):?>
		    <p><span class="item_title"><?php echo $non_item->getItemNm()?></span></p>
			   <div class="item_desc"><?php echo $non_item->getItemDesc()?></div>
		 <?php endif?>
		<?php endforeach?>	
	  <?php endforeach?>
     
</div>
   <?if ($menu->getUserId() == $sf_user->getSubscriberId()):?>		
      <?php echo checkbox_tag('private', 1, $menu->getMenuPrivate(), array('onclick'=> remote_function(array('with'=> "'private=' +      
                                                                       \$F('private')", 
                                                                       'url' => '@menu_mark_private?menu_id='.$menu->getMenuId()
                                                                         ))))?> Mark Private
  <?php endif;?>		
<?php endif?>
<?php use_helper('Global')?>
<?php if($user->getUserLogin() == $sf_user->getLogin()):?>
  <?php echo image_tag('edit.png')?><?php echo link_to('Create', 'menu/create')?>
<?php endif?>
<h2>Menu's</h2>

<?php if (count($menus) == 0 && $user->getUserLogin() == $sf_user->getLogin()):?>
  You have not created any menus yet. <?php echo link_to('Create', 'menu/create')?>
<?php endif?>

<?php foreach($menus as $menu):?>
  <?php if($menu->getMenuPrivate() == 1 && $menu->getUserId() != $sf_user->getSubscriberId()):?>
	  <?php continue; ?>
  <?php else:?>		
    <h2 class="recipelist"><?php echo link_to($menu->getMenuNm(),  
    '@get_menu?menu_strip_nm='.$menu->getMenuStripNm().'&user='.$menu->getUser())?></h2>
 <?php if ($menu->getUserId() == $sf_user->getSubscriberId()): echo image_tag('delete.png', array('size' => '12x12')); echo link_to('Delete', 'menu/delete?menu_strip_nm='.$menu->getMenuStripNm(), array( 'confirm'  => 'Are you sure?')); endif?>
    <div class="submited">
	  Created on <?php echo $menu->getCreatedAt()?>
    </div>
     <div class="recipe_body">
	  <?php echo $menu->getMenuDesc()?>
    </div>
  <?php endif?>
<?php endforeach?>		

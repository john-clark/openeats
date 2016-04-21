<?php if ($sf_user->hasAttribute('login', 'subscriber') && count($sf_user->getAttribute('recipe_history', array())) !=0): ?>
	<?php include_partial('recipe/recipe_history')?>
<?php endif?>	
<h2>Account</h2>
<?php if ($sf_user->hasAttribute('login', 'subscriber')): ?>
  <ul>
    <li>Welcome <?php echo link_to($sf_user->getAttribute('login', '', 'subscriber'), '@user_profile?login='.$sf_user->getAttribute('login', '', 'subscriber')) ?></li>
    <li><?php echo link_to('Meal Planner', '@planner?login='.$sf_user->getAttribute('login', '', 'subscriber'))?></li>
    <li><?php echo link_to('Menus', '@list_menu?user='.$sf_user->getAttribute('login', '', 'subscriber'))?></li>
    <li><?php echo link_to('Grocery List', 'grocery/index')?>
    <li><?php echo link_to('Sign out', 'user/logout') ?></li>
  </ul>
<?php else: ?>
  <ul>
  <li><?php echo link_to_function('Sign in', visual_effect('blind_down', 'loginbox', array(
	'duration' =>0.5,
	'afterFinish' => 'function() { Form.Element.focus(\'login\'); }'
	)));?></li>
  <li><?php echo link_to('Sign up', 'user/registration'); ?> </li></ul>
<?php endif ?>
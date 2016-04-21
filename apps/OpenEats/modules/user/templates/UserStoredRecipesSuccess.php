<?php use_helper('PagerNavigation')?>

<div id="users_recipes">
  <h2><?php echo $user?> Stored Recipes</h2>
  <br />
  <?php echo my_pager_navigation($pager, 'user/UserStoredRecipes?user='.$subscriber->getUserLogin(), 'users_recipes')?>
  <br />
  <?php echo include_partial('user/stored_recipes', array('recipes' => $pager->getResults()))?>
</div>


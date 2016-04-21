<?php use_helper('PagerNavigation')?>

<div id="users_recipes">
  <h2>Recipes by <?php echo $user?></h2>
  <br />
  <?php echo my_pager_navigation($pager, 'user/userRecipes?user='.$subscriber->getUserLogin(), 'users_recipes')?>
  <br />
  <?php echo include_partial('recipe/userRecipes', array('recipes' => $pager->getResults()))?>
</div>


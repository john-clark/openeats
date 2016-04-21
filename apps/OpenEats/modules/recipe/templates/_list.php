<?php use_helper('Text', 'User', 'Global') ?>

<?php if (count($recipes) == 0):?>
	No recipes where found but feel free to add some <?php echo link_to_login('Add Recipe','recipe/edit')?>
<?php endif?>	
<?php foreach($recipes as $recipe) : ?>
  <h2 class="recipelist"><?php echo link_to_recipe($recipe)?></h2> 
  <?php include_partial('recipe/rated', array('id' => $recipe->getRecipeId(), 'rate' => $recipe->getAverageRating())) ?> 
  
  <div class="submited">
  	Submitted by:<?php echo link_to_profile($recipe->getUser())?>
  </div>
  
  <div class="recipe_body">
    <?php echo truncate_text($recipe->getrecipeDesc(), 200 ) ?>
  </div>
<?php endforeach ?>


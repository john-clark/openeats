<h2>Reported Recipes</h2>
<?php use_helper('Text', 'User', 'Global') ?>

<?php if (count($recipes) == 0):?>
	<p>No recipes have been reported</p>
<?php endif?>	

<?php foreach($recipes as $recipe) : ?>
  <h2 id="recipelist"><?php echo link_to($recipe->getrecipeNm(), '@get_recipe?recipestripnm='.$recipe->getRecipeStripNm()) ?></h2> 
  <?php include_partial('recipe/rated', array('id' => $recipe->getRecipeId(), 'rate' => $recipe->getAverageRating())) ?> 
  
  <div class="submited">
  	Submitted by:<?php echo link_to_profile($recipe->getUser())?>
  </div>
  
  <div class="recipe_body">
    <?php echo truncate_text($recipe->getrecipeDesc(), 200 ) ?>
   <div class="options">
    <?php include_partial('admin/recipe_options', array('recipe' => $recipe))?>
   </div>
  </div>

<?php endforeach ?>



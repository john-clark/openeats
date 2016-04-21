<?php use_helper('Text', 'User', 'Global') ?>

<?php if (count($recipes) == 0):?>
	No recipes where found but feel free to add some <?php echo link_to_login('Add Recipe','recipe/edit')?>
<?php endif?>	

  <?php foreach($recipes as $recipe) : ?>
   <?php $pic = myRecipe::getPicture($recipe)?>
   <div id='user_recipe'>
	  <h3><?php echo link_to($recipe->getRecipeNm(),  '@get_recipe?recipestripnm='.$recipe->getRecipeStripNm())?></h3>
	  <p><?php echo $recipe->getRecipeDesc()?></p>
   	  <div id="user_recipe_pic">
		<?php echo link_to(image_tag($pic, array('size' => '100x100')), '@get_recipe?recipestripnm='.$recipe->getRecipeStripNm())?>
	 </div>
   </div>

  <?php endforeach ?>
	<br style="clear:both;">


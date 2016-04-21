<h2><?php echo "Recipes with the ingredient $ingrd"?></h2>
<ul>
	<?php foreach($recipes as $recipe):?>
	  <li><?php echo link_to($recipe->getRecipe(),'@get_recipe?recipestripnm='.$recipe->getRecipe()->getRecipeStripNm())?></li>
    <?php endforeach?>
</ul>
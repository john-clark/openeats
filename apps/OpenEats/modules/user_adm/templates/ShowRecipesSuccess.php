<h2><?php echo "Recipes created by " . $user->getUserLogin()?></h2>
<ul>
	<?php foreach($recipes as $recipe):?>
	  <li><?php echo link_to($recipe->getRecipeNm(),'@get_recipe?recipestripnm='.$recipe->getRecipeStripNm())?></li>
    <?php endforeach?>
</ul>


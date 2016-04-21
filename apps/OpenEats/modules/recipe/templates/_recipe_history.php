  <div id="recipe_history">
	 <h2>Recently Viewed:</h2>
	<ul>
		<?php foreach ($sf_user->getRecipeHistory() as $history_recipe): ?>
			<li><?php echo link_to($history_recipe->getRecipeNm(), '@get_recipe?recipestripnm='.$history_recipe->getRecipeStripNm())?></li>
		<?php endforeach?>
	 </ul>
</div>

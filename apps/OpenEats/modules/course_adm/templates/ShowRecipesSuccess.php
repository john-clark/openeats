<h3>Recipes with course <?php echo $course?></h3>
<?php if(count($recipes) == 0):?>
	<p>There are no recipes assigned to this course</p>
<?php endif?>	
<ul>
	<?php foreach($recipes as $recipe):?>
		<li><?php echo link_to($recipe->getRecipeNm(), '@get_recipe?recipestripnm='. $recipe->getRecipeStripNm())?></li>
	<?php endforeach?>	
</ul>
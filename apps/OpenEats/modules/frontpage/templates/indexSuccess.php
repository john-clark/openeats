
<?php echo include_partial('headline/headline', array('headline' => $sf_data->getRaw('headline')))?>

<br />
<h3>Newest Additions</h3>
<br />
<ul id="new_list">
  <?php foreach($recipes as $recipe):?>
  	<?php $pic = myRecipe::getPicture($recipe)?>
    <li>
	<?php echo link_to(image_tag($pic,array('size' => '110x110', 'class' => 'recipe_pic',      
	'style'=>'border:solid black 1px; padding:3px;', 'title' => $recipe->getRecipeNm(),)),    
    '@get_recipe?recipestripnm='.$recipe->getRecipeStripNm())?>
    <p><?php echo link_to($recipe->getRecipeNm(), '@get_recipe?recipestripnm='.$recipe->getRecipeStripNm())?></p>
  <?php endforeach;?>
</ul>

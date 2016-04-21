<h2><?php echo 'Recipes with keyword '."'".implode(' ', $keywords->getRawValue())?>'</h2>
<br />
<?php echo include_partial('recipe/list', array('recipes' => $recipes))?>

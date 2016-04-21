<?php use_helper('Validation')?>

<?php echo image_tag('cal.png', array('size' => '32x32', ))?> <h2 style="display:inline">Meal Planner</h2>
<div>
	<h4>Add <?php echo $recipe->getRecipeNm()?> to your meal planner</h4>
	<br />
	<?php echo form_tag('@planner_update')?>
	<?php input_hidden_tag('recipestripnm', $recipe->getRecipeStripNm())?>
	<?php echo form_error('date')?>
    <?php echo input_date_tag('date', '', 'rich=true') ?>
    <?php echo input_hidden_tag('recipestripnm', $recipe->getRecipeStripNm())?>
    <?php echo input_hidden_tag('login', $sf_user->getLogin())?>
    <?php echo submit_tag('Schedule')?>
</form>
</div>

<?php use_helper('Validation')?>

<?php echo image_tag('cal.png', array('size' => '32x32', ))?> <h2 style="display:inline">Meal Planner</h2>
<div>
	<h4>Add Menu <?php echo $menu->getMenuNm()?> to your meal planner</h4>
	<br />
	<?php echo form_tag('planner/Update')?>
	<?php input_hidden_tag('menustripnm', $menu->getMenuStripNm())?>
	<?php echo form_error('date')?>
    <?php echo input_date_tag('date', '', 'rich=true') ?>
    <?php echo input_hidden_tag('menustripnm', $menu->getMenuStripNm())?>
    <?php echo input_hidden_tag('login', $sf_user->getLogin())?>
    <?php echo submit_tag('Schedule')?>
</form>
</div>

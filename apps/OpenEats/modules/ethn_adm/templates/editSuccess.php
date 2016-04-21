<?php use_helper('Form', 'Object', 'Validation')?>

<?php echo form_tag('ethn_adm/update', array('name'=>'update', 'id'=>'update')) ?>
<?php echo object_input_hidden_tag($ethn, 'getEthnicityId')?>
<?php echo object_input_hidden_tag($ethn, 'getEthnicityNm')?>
<fieldset id="recipe_info">
	<?php echo form_error('ethn') ?>
	<label for="ethn">Ethnicity Name</label>
	<?php echo input_tag('ethn', $ethn->getEthnicityNm())?>
<fieldset>
	<?php echo submit_tag('Save')?> <?php echo link_to('Cancel', 'ethn_adm/list')?>
</form>

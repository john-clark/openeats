<?php use_helper('Form', 'Object', 'Validation')?>

<?php echo form_tag('ingrd_adm/update', array('name'=>'update', 'id'=>'update')) ?>
<?php echo object_input_hidden_tag($ingrd, 'getIngrdId')?>
<?php echo object_input_hidden_tag($ingrd, 'getIngrdNm')?>
<fieldset id="recipe_info">
	<?php echo form_error('ingrd') ?>
	<label for="ingrd">Ingredient Name</label>
	<?php echo input_tag('ingrd', $ingrd)?>
	
    <label for="user_nm">User Name</label>
    <?php echo select_tag('user_nm', options_for_select($users, $ingrd->getUserId(), 'include_blank=true'));?>
 <fieldset>
	<?php echo submit_tag('Save')?> <?php echo link_to('Cancel', 'ingrd_adm/list')?>
</form>

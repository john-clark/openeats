<?php use_helper('Form', 'Object', 'Validation')?>



<?php echo form_tag('user_adm/update', array('name'=>'update', 'id'=>'update')) ?>
<?php echo object_input_hidden_tag($user, 'getUserId')?>
<?php echo input_hidden_tag('user', $user->getUserLogin())?>
<fieldset id="recipe_info">
	<?php echo form_error('user_fname') ?>
	<label for="user_fn">First Name</label>
	  <?php echo object_input_tag($user, 'getUserFn')?>
	  <?php echo form_error('user_lname') ?>
	<label for="user_ln">Last Name</label>
	  <?php echo object_input_tag($user, 'getUserln')?>
	  <?php echo form_error('user_login') ?> 
	<label for="user_login">Login</label>
	  <?php echo object_input_tag($user, 'getUserLogin')?>
	 <?php echo form_error('user_email') ?>
	<label for="user_email">Email</label>
	  <?php echo object_input_tag($user, 'getUserEmail')?>
	<label for="user_about">About</label>
	  <?php echo object_textarea_tag($user, 'getUserAbout')?>
	  <?php echo form_error('pass') ?>
	<label for="password">Password</label>
	  <?php echo input_password_tag('pass')?>
 <fieldset>
	<?php echo submit_tag('Save')?> <?php echo link_to('Cancel', 'user_adm/list')?>
</form>

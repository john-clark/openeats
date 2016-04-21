<?php use_helper('Object', 'Validation', 'Text') ?>

<?php if ($subscriber->getUserId() == $sf_user->getSubscriberId()): ?>
<?php echo form_tag('user/update', array('id' => 'user_update' )) ?>
 <fieldset id="user_info">
  <label for="login">Login</label>
  <strong><?php echo $subscriber->getUserLogin() ?></strong>
  <?php echo form_error('user_email') ?>
   <label for="user_email">Email</label>
   <?php echo object_input_tag($subscriber, 'getUserEmail', array('tabindex' => '1')) ?>
   <?php echo form_error('pass1') ?>
   <label for="pass1">Password</label>
   <?php echo input_password_tag('pass1', '', array('tabindex' => '2')) ?>
   <?php echo form_error('pass2') ?>
   <label for="pass2">Confirm Password</label>
   <?php echo input_password_tag('pass2', '', array('tabindex' => '3')) ?>
   <label for="user_about">All About Me</label>
   <?php echo object_textarea_tag($subscriber, 'getUserAbout', array('tabindex' => '4', 'size' => '30x6', ))?>
   <br />
   <?php echo submit_tag('Update', array('id' => 'save', 'tabindex' => '5')) ?> 	  
 </fieldset>
 </form>
<?php endif?>
<?php use_helper('Validation')?>
<h2>Password Reset</h2>
<p>Enter your login name to recive your new password via email.</p>
<small><i>The email address you registared with will be used</i></small>
<?php echo form_tag('@user_reset_password') ?>
  <?php echo form_error('login') ?>
  <label for="login">Login:</label>
  <?php echo input_tag('login', $sf_params->get('login'), 'style=width:150px') ?><br />
  <?php echo submit_tag('Send') ?>
</form>
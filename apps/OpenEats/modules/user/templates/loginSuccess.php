<?php use_helper('Validation') ?>
<div id='login_forgot'>
  <?php echo form_tag('user/login', array('name' => 'login_form', 'id' => 'login_form')) ?>
     <fieldset id="loginfield">
       <legend>Login</legend>
       <?php echo form_error('login') ?>
       <label for="login">Login Name:</label>
       <?php echo input_tag('login', $sf_params->get('login'), array('tabindex' => '1')) ?>
       <label for="password">Password:</label>
      <?php echo input_password_tag('password', '' , array('tabindex' => '2')) ?>
       <p>Remember Me <?php echo checkbox_tag('remember_me', 'remember_me', false, array('tabindex' => '3')) ?></p>
       <?php echo input_hidden_tag('referer', $sf_request->getAttribute('referer')) ?>
       <?php echo submit_tag('Sign In', array('tabindex' => '4', 'id' => 'loginsubmit'))?>
     </fieldset> 
  </form>
  <?php echo form_tag('@user_reset_password', array('name' => 'forgot_form', 'id' => 'forgot_form')) ?>
    <fieldset id="forgotpassword">
      <legend>Forgot Password</legend>
      <?php echo form_error('login') ?>
      <label for="login">Login:</label>
     <?php echo input_tag('login', $sf_params->get('login'), array('tabindex' => '5')) ?>
     <?php echo submit_tag('Send', array('tabindex' => '6', 'id' => 'forgotsubmit')) ?>
   </fieldset>
 </form>
<br clear="all" />
</div>
<br clear="all" />
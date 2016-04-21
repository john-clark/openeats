<?php use_helper('Javascript')?>

<div id="loginbox" style="display: none">
  <h3>Sign In</h3>
 
  
 
  <?php echo form_tag('user/login', 'id=loginform') ?>
    Login: <?php echo input_tag('login') ?>
    Password: <?php echo input_password_tag('password') ?>
    Remember Me<?php echo checkbox_tag('remember_me', 'remember_me', false) ?>
    <?php echo input_hidden_tag('referer', $sf_params->get('referer') ? $sf_params->get('referer') : $sf_request->getUri()) ?>
    <?php echo submit_tag('login') ?> <?php echo link_to_function('cancel', visual_effect('blind_up', 'loginbox', array('duration' => 0.5))) ?>
    <p><?php echo link_to('Forgot your password?', '@user_reset_password') ?></p> 
  </form>
 </div>
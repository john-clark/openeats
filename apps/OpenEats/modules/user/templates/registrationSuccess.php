<?php use_helper('Validation') ?>
<h1 id="regh1">Quick Sign Up</h1>
<span id="reg">Registration is free and allows you to submit recipes, save recipes and much more</span>
<?php echo form_tag('user/add', array('name' => 'registration', 'id' => 'registration')) ?>

  <fieldset id="pt1">
    <legend><span>Step </span>1. <span>: Login Details</span></legend>
    <h3>Tell us your Name</h3>
    <div class="help">Your login name must be at least 5 characters long</div>
	<?php echo form_error('login')?>
    <label for="login">Login</label>
    <?php echo input_tag('login', '', array('tabindex' => '1'))?>
    <?php echo form_error('fname') ?>
 	<label for="fname">First Name</label>
    <?php echo input_tag('fname', '', array('tabindex' => '2')) ?>
    <?php echo form_error('lname') ?>
    <label for="lname">Last Name</label>
    <?php echo input_tag('lname', '', array('tabindex' => '3')) ?>
  </fieldset>
  <fieldset id="pt2">
    <legend><span>Step </span>2. <span>: Password</span></legend>
    <h3>Choose a password for your new account.</h3>
    <div class="help">Passwords must contain at least 6-30 characters in length</div>
    <?php echo form_error('password') ?>
    <label for="password">Password</label>
    <?php echo input_password_tag('password', '', array('tabindex' => '4')) ?>  
    <?php echo form_error('pass2') ?>
    <label for="pass2">Verify Password</label>
    <?php echo input_password_tag('pass2', '', array('tabindex' => '5')) ?>
  </fieldset>
  <fieldset id="pt3">
    <legend><span>Step </span>3. <span>: Email details</span></legend>
    <h3>Enter your email address.</h3>
    <div class="help">You must enter a valid email address to sign up</div>
    <?php echo form_error('email') ?>
    <label for="email">Email</label>
    <?php echo input_tag('email', '', array('tabindex' => '6')) ?>
  </fieldset>
  <fieldset id="pt4">
	<legend>Step 4  : Submit form</legend>
	<?php echo submit_tag('Finish Sign Up', array('id' => 'submitform', 'tabindex' => '7')) ?>
  </fieldset>
  <br clear="all" />
  </form>
<br clear="all" />
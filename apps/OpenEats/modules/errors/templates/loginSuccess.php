<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
?>


<div class="Alert Lock"> 
  <?php echo image_tag('/sf/sf_default/images/icons/lock48.png', array('alt' => 'credentials required', 'class' => 'AlertIcon', 'size' => '48x48')) ?>
  <div class="AlertMessage">
    <h1>Credentials Required</h1>
    <h5>This page is in a restricted area.</h5>
  </div>
</div>
<dl class="MessageInfo">
  <dt>You do not have the proper credentials to access this page</dt>
  <dd>Even though you are already logged in, this page requires special credentials that you currently don't have. </dd>

  <dt>How to access this page</dt>
  <dd>You must ask a site administrator to grant you some special credentials.</dd>
   <dd>Or create yourself and account</dd>

  <dt>What's next</dt>
  <dd>
    <ul class="IconList">
      <li class="LinkMessage"><a href="javascript:history.go(-1)">Back to previous page</a></li>
      <li class="LinkMessage"><?php echo link_to('Create an account', 'user/registration') ?></li>
	  <li class="LinkMessage"> <?php echo link_to('Sign In', 'user/login') ?></li>
    </ul>
  </dd>
</dl>
<br clear="all" />
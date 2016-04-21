<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
?>


<div class="Alert">
 	<?php echo image_tag('/sf/sf_default/images/icons/cancel48.png', array('alt' => 'Page Not Found', 'class' => 'AlertIcon', 'size' => '48x48', )) ?>
  <div class="AlertMessage">
	<h1>Opps! Page not found</h1>
	<h5>The server returned a 404 error</h5>
  </div>
</div>
<dl class="MessageInfo">
  <dt>Did you type the URL?</dt>
  <dd>You may have typed the address (URL) incorrectly. Check it to make sure you've got the exact right spelling, capitalization, etc.</dd>

  <dt>Did you follow a link from somewhere else at this site?</dt>
  <dd>If you reached this page from another part of this site, please email us at <?php echo mail_to(sfConfig::get('app_admin_email')) ?> so we can correct our mistake.</dd>
  <dt>Did you follow a link from another site?</dt>
  <dd>Links from other sites can sometimes be outdated or misspelled. Email us at <?php echo mail_to(sfConfig::get('app_admin_email')) ?> where you came from and we can try to contact the other site in order to fix the problem.</dd>
<dt>What's next</dt>
<dd>
  <ul class="IconList">
    <li class="LinkMessage"><a href="javascript:history.go(-1)">Back to previous page</a></li>
    <li class="LinkMessage"><?php echo link_to('Go to Homepage', '@homepage') ?></li>
  </ul>
 </dd>
</dl> 
<br clear="all" />
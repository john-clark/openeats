<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
?>

<div class="Alert Lock"> 
  <?php echo image_tag('/sf/sf_default/images/icons/disabled48.png', array('alt' => 'module disabled', 'class' => 'AlertIcon', 'size' => '48x48')) ?>
  <div class="AlertMessage">
    <h1>This module is Unavailable</h1>
    <h5>This module has been disabled by a site administrator.</h5>
  </div>
</div>
<dl class="MessageInfo">
  <dt>What's next</dt>
  <dd>
    <ul class="IconList">
      <li class="LinkMessage"><a href="javascript:history.go(-1)">Back to previous page</a></li>
      <li class="LinkMessage"><?php echo link_to('Go to Homepage', '@homepage')?></li>
    </ul>
  </dd>
</dl>
<br clear="all" />
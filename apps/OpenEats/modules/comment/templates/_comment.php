<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
?>

<?php echo use_helper('Date', 'Text')?>
  <dl class="comment">
	 <dt>
		<span class="nb_comment">#<?php echo $nb_comment ?></span>
    <strong><?php echo link_to( $comment->getUser(), '@user_profile?login='.$comment->getUser()->getUserLogin()) ?></strong>
    <small>Posted <?php  echo date('Y-m-d \a\t h:i', $comment->getCreatedAt('U'))?></small>
   </dt>
  <dd>  
   <div class="recipe_comment">
	   <?php echo $comment->getComment()?>
	 </div>
	</dd>
 </dl>
 <div style="clear: both"></div>
 <?php if($sf_user->hasCredential('administrator')): ?>
  <?php echo link_to('[delete this comment]', 'comment/delete?id='.$comment->getCommentId(), 'confirm=Are you sure you want to delete this comment?') ?>
<?php endif; ?>
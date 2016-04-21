<?php $i=0 ?>
<?php foreach($comments as $comment ): ++$i?>
  <?php include_partial('comment/comment', array('comment' => $comment, 'nb_comment' => $i, ))?>
<?php endforeach ?>
<div id="new_comment"> 
<?php if ($sf_user->isAuthenticated()): ?>
   <?php echo link_to_function('Add Comment', visual_effect('blind_down', 'add_comment',  
   array('duration' =>0.5)));?>
<?php else: ?>
  <?php echo "Please " . link_to('login', 'user/login') . " or " . link_to('create', 'user/registration' ) . " an account to add a comment"?>
<?php endif; ?>
<div id="add_comment" style="display:none">
	<?php echo form_remote_tag(array(
		'update' => 'new_comment', 
		'url' => 'comment/Add', 
		'complete' => visual_effect('SlideDown', 'new_comment', array('duration' =>1.5)), 
	 )) ?>
	<?php echo textarea_tag('comment_body', '', 'size=60x10')?>
  <?php echo object_input_hidden_tag($recipe, 'getRecipeId')?>
  <?php echo input_hidden_tag('nb_comment', $i + 1) ?>
  <div id="comment_submit"> 
   <?php echo submit_tag('Add Comment', array('id' => 'submit_comment', )) ?>
   <?php echo link_to_function('Cancel', visual_effect('blind_up', 'add_comment', array('duration' => '0.5', )))?>
  </div>
 </form>
 </div>
</div>
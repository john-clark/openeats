<?php $i = 0?>
<?php foreach($suggestions as $suggestion ): ++$i?>
    <?php include_partial('suggestion/suggestion', array('suggestion' => $suggestion, 'nb_suggestion' => $i, ))?>
<?php endforeach ?>
<div id="new_suggestion"> 
<?php if ($sf_user->isAuthenticated()): ?>
   <?php echo link_to_function('Add Suggestion', visual_effect('blind_down', 'add_suggestion',  
   array('duration' =>0.5)));?>
<?php else: ?>
  <?php echo "Please " . link_to('login', 'user/login') . " or " . link_to('create', 'user/registration' ) . " an account to add a comment"?>
<?php endif; ?>
 <div id="add_suggestion" style="display:none">
	<?php echo form_remote_tag(array(
		'update' => 'new_suggestion', 
		'url' => 'suggestion/Add', 
		'complete' => visual_effect('SlideDown', 'new_suggestion', array('duration' =>1.5)), 
	 )) ?>
	<?php echo textarea_tag('suggestion_body', '', 'size=60x10')?>
  <?php echo object_input_hidden_tag($recipe, 'getRecipeId')?>
  <?php echo input_hidden_tag('nb_suggestion', $i + 1) ?>
  <div id="comment_submit"> 
   <?php echo submit_tag('Add Suggestion', array('id' => 'submit_suggestion', )) ?>
    <?php echo link_to_function('Cancel', visual_effect('blind_up', 'new_suggestion', array('duration' => '0.5', )))?>
  </div>
 </form>
 </div>
</div>

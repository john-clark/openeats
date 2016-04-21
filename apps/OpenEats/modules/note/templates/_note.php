<?php if ($sf_user->isAuthenticated()): ?>
  <?php if(is_object($note)):?>
     <div id="recipe_note"> <?php echo $note->getRecipeNote()?></div>
     <?php echo input_in_place_editor_tag('recipe_note', 'note/Add?recipe_id='.$recipe_id, array( 'cols' => '40', 'rows' => '10'))?>
  <?php else:?>
      <div id="recipe_note"> <?php echo 'Click me to add a note'?></div>
	  <?php echo input_in_place_editor_tag('recipe_note', 'note/Add?recipe_id='.$recipe_id, array( 'cols' => '40', 'rows' => '10'))?>
  <?php endif?>
<?php else: ?>
  <?php echo "Please " . link_to('login', 'user/login') . " or " . link_to('create', 'user/registration' ) . " an account to add a comment"?>
<?php endif; ?>
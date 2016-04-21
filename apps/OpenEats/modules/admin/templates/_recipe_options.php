<?php if ($sf_user->hasCredential('administrator') || $sf_user->hasCredential('moderator')):?>
  [<strong><?php echo $recipe->getNbReport()?></strong> reports]
  <?php echo link_to('[Reset Recipe]', 'admin/ResetRecipeReport?recipestripnm='.$recipe->getRecipeStripNm())?>
  <?php if ($sf_user->hasCredential('administrator')):?>
    <?php echo link_to('[Delete Recipe]', 'admin/DeleteRecipe?recipestripnm='.$recipe->getRecipeStripNm(), array('confirm' =>'Are you  sure?'))?>
   <?php endif;?>
<?php endif;?>  
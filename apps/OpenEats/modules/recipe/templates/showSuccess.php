<?php use_helper('Global', 'Object', 'User', 'Markdown' ) ?>
<?php slot('new_recipe_feed')?>
  <?php echo auto_discovery_link_tag('rss', 'feed/RecipeFeed') ?>
<?php end_slot()?>

<div id="recipe_show">
  <div id="recipe_menu">
	  <ul class="recipe_menu_list">
		<li id="store_recipe"><?php echo image_tag('kfm.png', array()) ?><?php echo include_partial('recipe/store_user_recipes', array('recipe' => $recipe)) ?></li>
		 <li><?php echo image_tag('printer.png', array()) ?><?php echo link_to('Print', '@recipe_print?recipestripnm='.$recipe->getRecipeStripNm())?></li>
		<?php if($sf_user->isOwnerOf($recipe) || $sf_user->hasCredential('administrator')) : ?>
		 <li><?php echo image_tag('edit.png', array()) ?><?php echo link_to('Edit', '@recipe_edit?recipe_strip_nm='.$recipe->getRecipeStripNm()) ?></li>
		<?php endif; ?>
		<li><?php echo image_tag('mail.png', array()) ?><?php echo link_to_login('Email', 'user/EmailRecipe?recipestripnm='.$recipe->getRecipeStripNm())?></li>
		<li><?php echo image_tag('cal.png', array('size' => '24x24'))?><?php echo link_to_login('Schedule', 'planner/AddRecipe/?recipestripnm='.$recipe->getRecipeStripNm())?></li>
	   <li><?php echo image_tag('menu.png', array('size' => '24x24')); echo link_to_login('Add to Menu', '@add_menu?recipestripnm='.$recipe->getRecipeStripNm())?></li>
	 <li><?php echo image_tag('menu.png', array('size' => '24x24')); echo link_to_login('Add to List', '@add_list?recipestripnm='.$recipe->getRecipeStripNm())?></li>	
	  <?php if($sf_user->hasCredential('administrator')):?>
		<?php echo image_tag('delete', array('size' => '24x24')); echo link_to('Delete', 'admin/deleteRecipe?recipestripnm='.$recipe->getRecipeStripNm(), array('confirm' => 'Are you sure?'))?></li>
	  <?php endif;?>	
	</ul>

  </div>
 <div id="recipe_picture">
    <?php echo image_tag($pic, array('id' =>'recipe_pic'))?>
    <div id="raterecipe">
    <?php $id = $recipe->getRecipeId() ?>
	<?php if($sf_user->canRateFor($recipe)): ?>
  	<span id="rate_for_<?php echo $id ?>" style="white-space:nowrap;">
	  Rate this Recipe: <?php for($i = 1 ; $i <= 5 ; $i++): ?><div class="rate <?php if($i <= $recipe->getAverageRating()): ?>rated<?php endif; ?>"
	  id="rate_<?php echo $id ?>_<?php echo $i ?>"><?php echo link_to_remote(image_tag('spacer.gif', 'width=20px height=18px', 'alt=spacer'), array(
        'url'         => 'recipe/rateForRecipe?id='.$id.'&rate='.$i,
        'update'      => 'rate_for_'.$id,
        'loading'     => visual_effect('appear', 'indicator'),
        'complete'    => visual_effect('fade', 'indicator').visual_effect('highlight', 'rate_for_'.$id),
      ), array(
        'onMouseOver' => 'highlight_stars('.$id.', '.$i.', true);',
        'onMouseOut'  => 'highlight_stars('.$id.', '.$i.', false);',  
      )) ?></div><?php endfor; ?>
      <span id="indicator" style="display:none"> <?php echo image_tag('ajaxindicator.gif') ?></span>
    </span>
  <?php else: ?>
    <?php include_partial('rated', array('id' => $id, 'rate' => $recipe->getAverageRating())) ?>
  <?php endif; ?>
	</div>

  </div>
<div id="recipe_wrapper">
 

 
  <div id="recipe_nm">
	  <h2><?php echo $recipe->getRecipeNm()?></h2>
   </div>
  <div id="submited_by">
	submitted by:<?php echo link_to_profile($recipe->getUser()) ?>       		                           				         		
  </div>
  <div id="recipe_time">
	<b>Servings</b> <?php echo $recipe->getRecipeSrvgs()?>
	<b>Prep Time</b> <?php echo $recipe->getRecipePrepTm()?> minutes  
	<b>Cook Time</b> <?php echo $recipe->getRecipecookTm()?>
  </div>
   <?php if($last_planned):?>
	 <div class="last_planned">
		<?php echo $last_planned?>
     </div>				
  <?php endif?>
	
  <div id="recipe_desc">
	<?php echo $recipe->getrecipeDesc()?>
  </div>
  <div class="recipe_ing">
    <h3>Ingredients</h3>
      <?php foreach($ingrds_array as $ingrd ): ?> 
      <p>
      <?php echo $ingrd->getIngrdQty(). ' '?> 
      <?php echo $ingrd->getIngrdMsrmt(). ' '?> 
      <?php echo $ingrd->getIngrdPrep(). ' '?> 
      <?php echo $ingrd->getIngredient()->getIngrdNm()?>
      </p>
  <?php endforeach ?> 
</div>
<div class="recipe_directions">
 <h3>Directions</h3>
 <?php echo include_markdown_text($recipe->getRecipeDirections()) ?>
</div>
<div class="options" id="report_recipe_<?php echo $recipe->getRecipeId() ?>">
  <?php echo link_to_report_recipe($recipe, $sf_user) ?>
</div>

<?php echo link_to_function($recipe->getNbComment().' Comments', visual_effect('Fade', 'read_suggestion').visual_effect('Fade', 'note').visual_effect('SlideDown', 'read_comment', array('duration' =>0.5)));?>

<?php echo link_to_function($recipe->getNbSuggestion().' Suggestions<img
	      title="cssheader=[ttiph] cssbody=[ttipb] header=[Suggestions] fade=[on] delay=[200]
	      body=[Suggest how to improve the recipe!]"
	      src="/images/info.png" />', visual_effect('Fade', 'read_comment',array('duration' => 0.5)).visual_effect('Fade', 'note').visual_effect('Appear', 'read_suggestion', array('duration' =>1.5)));?>

<?php echo link_to_function('Notes<img title="cssheader=[ttiph] cssbody=[ttipb] header=[Notes] fade=[on] delay=[200]
			      body=[Your own personal notes for this recipe that only you can see]"
			      src="/images/info.png" />', visual_effect('Fade', 'read_suggestion').visual_effect('Fade', 'read_comment',array('duration' =>0.5)).visual_effect('SlideDown', 'note', array('duration' =>1.0)))?>	

<div id="read_comment" style="display:none">
  <h3>Comments on <?php echo $recipe->getRecipeNm()?></h3>
  <?php include_partial('recipe/comments', array('comments' => $comments, 'recipe' => $recipe)) ?>
</div>

<div id="read_suggestion" style="display:none">
  <h3>Suggestions on <?php echo $recipe->getRecipeNm()?></h3>
   <?php include_partial('recipe/suggestions', array('suggestions' => $suggestions, 'recipe' => $recipe))?>	
</div>
<div id="note" style="display:none">
  <h3>Notes you have made on  <?php echo $recipe->getRecipeNm()?></h3>	
  <?php include_partial('note/note', array('note' => $recipe_note, 'recipe_id' =>$recipe->getRecipeId()))?>
</div>
</div>
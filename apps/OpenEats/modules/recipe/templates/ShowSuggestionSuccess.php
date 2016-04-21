<?php use_helper('User', 'Object')?>

<div id="recipe_show">
  <div id="recipe_picture">
    <?php echo image_tag($pic, array('id' =>'recipe_pic'))?>
  </div>
  <div id="recipe_menu">
	 <ul class="recipe_menu_list">
		<li id="store_recipe"><?php echo include_partial('recipe/store_user_recipes', array('recipe' => $recipe)) ?></li>
		 <li><?php echo link_to('Print', '@recipe_print?recipestripnm='.$recipe->getRecipeStripNm())?></li>
		<?php if($sf_user->isOwnerOf($recipe) || $sf_user->hasCredential('administrator')) : ?>
		 <li><?php echo link_to('Edit', '@recipe_edit?recipe_strip_nm='.$recipe->getRecipeStripNm()) ?></li>
		<?php endif; ?>
	</ul>
  </div>
  <div id="recipe_nm">
	  <h2><?php echo link_to($recipe->getRecipeNm(), '@get_recipe?recipestripnm='.$recipe->getRecipeStripNm())?></h2>
  </div>
  <div id="submited_by">
	submitted by:<?php echo link_to_profile($recipe->getUser()) ?>       		                           				         		
  </div>
  <div id="recipe_time">
	<b>Servings</b> <?php echo $recipe->getRecipeSrvgs()?>
	<b>Prep Time</b> <?php echo $recipe->getRecipePrepTm()?> minutes  
	<b>Cook Time</b> <?php echo $recipe->getRecipecookTm()?>
  </div>
  <div id="raterecipe">
    <?php $id = $recipe->getRecipeId() ?>
	<?php if($sf_user->canRateFor($recipe)): ?>
  	<span id="rate_for_<?php echo $id ?>" style="white-space:nowrap;">
	  Rate this Recipe: <?php for($i = 1 ; $i <= 5 ; $i++): ?><div class="rate <?php if($i <= $recipe->getAverageRating()): ?>rated<?php endif; ?>"
	  id="rate_<?php echo $id ?>_<?php echo $i ?>"><?php echo link_to_remote(image_tag('spacer.gif', 'width=10 height=10', 'alt=spacer'), array(
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
	
  <div id="recipe_desc">
	<?php echo $recipe->getrecipeDesc()?>
  </div>
 <div class="recipe_ing">
    <h3>Ingredients</h3>
    <?php $ingrds_array = $recipe->getIngrds()?> 
    <?php foreach($ingrds_array as $key=>$ingrd  ): ?> 
      <?php $stat=RecipeIngrdPeer::getIngrdStat($key, $recipe->getRecipeId())?>
      <p>
      <?php echo $stat->getIngrdQty(). ' '?> 
      <?php echo $stat->getIngrdMsrmt(). ' '?> 
      <?php echo $stat->getIngrdPrep(). ' '?> 
      <?php echo " $ingrd "?>
      </p>
  <?php endforeach ?> 
</div>
<div class="recipe_directions">
 <h3>Directions</h3>
 <?php echo $recipe->getRecipeDirections() ?>
</div>
<?php $i = 0;?>
<?php if ($suggestions): ?>
  <br />
  <h3>Suggestions on <?php echo $recipe->getRecipeNm()?></h3>
  <?php foreach($suggestions as $suggestion ): ++$i?>
    <?php include_partial('suggestion/suggestion', array('suggestion' => $suggestion, 'nb_suggestion' => $i, ))?>
  <?php endforeach ?>
 <?php endif; ?>
</div>
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
  </div>
 </form>
</div>
</div>
		


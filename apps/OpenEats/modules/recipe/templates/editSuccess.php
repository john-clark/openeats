<?php use_helper('Object','Validation', 'Form','Javascript') ?>
<script type="text/javascript" src='<?php echo sfConfig::get('sf_base_url_dir')?>/sf/prototype/js/controls.js'></script>

<?php echo form_tag('recipe/update', array('name'=>'update', 'id'=>'update', 'multipart' => 'true')) ?>
<?php echo object_input_hidden_tag($recipe, 'getRecipeId') ?>

<fieldset id="recipe_info">
  <?php echo form_error('recipe_nm') ?>
  <label for="recipe_nm">Recipe Name</label>
   <div id="recipe_nm_check"></div>
    <?php echo object_input_tag($recipe, 'getrecipeNm', array (
     'size' => '30')) ?>
    <div id="check_recipe_nm">
      <?php echo submit_to_remote('check_recipe_nm', 'Check Recipe Name', array(
              'update' => 'recipe_nm_check',
              'url'    => '@check_recipe_nm',
              ));?>
    </div>            
  
  <div id="recipe_nm-H" class="field-hint-inactive"><span  class="required">*</span>Required- unique recipe name at least 5 characters</div>
  
 <?php echo form_error('recipe_desc') ?>
  <label for="recipe_desc">Description</label>
    <?php echo object_textarea_tag($recipe, 'getrecipeDesc', array (
                             'size' => '30x3')); ?>
 
 <div id="recipe_desc-H" class="field-hint-inactive"><span class="required">*</span>Required- Tell us about your recipe</div>
  <?php echo form_error('course_id') ?>	

 <?php if($sf_user->hasCredential('administrator') && $recipe->getRecipeId()):?>
   <label for="user_nm_admin">User Name</label>
      <?php echo select_tag('user_nm_admin', options_for_select($users, $recipe->getUserId()));?>
  <?php endif?>
 
  <label for="course">Course</label>
    <?php echo object_select_tag($recipe, 'getCourseId', 'include_blank=true')?>
  
  <?php echo form_error('ethnicity_id') ?>	
  <label for="ethnicity">Ethnicity</label>
    <?php echo object_select_tag($recipe, 'getEthnicityId', 'include_blank=true')?>
  
  <label for="base">Base:</label>
    <?php echo select_tag('base', options_for_select(sfConfig::get('mod_recipe_arraybase'),
                 $recipe->getBase(), 'include_blank=true'))?>
  
  <?php echo form_error('recipe_prep_tm') ?>
  <label for="recipe_prep_tm">Preparation Time:</label>
     <?php echo select_tag('recipe_prep_tm', options_for_select(sfConfig::get('mod_recipe_arraymin'), 
           $recipe->getRecipePrepTm()))?> minutes
  
 <?php echo form_error('recipe_cook_tm') ?>
 <label for="recipe_cook_tm_hr">Cook Time:</label>
     <?php $time = $recipe->getRecipeCookTime(); $cook_time_hour = $time[0]; $cook_time_min = $time[1]; ?>
           hour <?php echo select_tag('recipe_cook_tm_hr', options_for_select(sfConfig::get('mod_recipe_arrayhr'), $cook_time_hour)) ?> 
     <?php  echo select_tag('recipe_cook_tm_mn', options_for_select(sfConfig::get('mod_recipe_arraymin'),$cook_time_min)) ?> minutes

 <?php echo form_error('recipe_srvgs') ?>
 <label for="recipe_srvgs">Servings</label>
    <?php echo object_input_tag($recipe, 'getRecipeSrvgs', array (
                    'size' => '7')) ?>
  <div id="recipe_srvgs-H" class="field-hint-inactive"><span class="required">*</span>Required- How many will this feed?</div>
</fieldset>
<br />

<?php echo javascript_tag("
	var last_ingrd_seq = $last_ingrd_seq;
	var ingrd_changed = function(ingrd_seq) {
		if (ingrd_seq == last_ingrd_seq) {
			" .
			remote_function(array(
				'url' => '@add_ing',
				'update' => 'addIngRow',
				'position' => 'before',
				'script' => true,
				'with' => '\'ingrd_seq=\' + (++last_ingrd_seq)'
			)) . ";
		}
	};
      var remove_ingrd = function(ingrd_seq) {
        new Effect.DropOut('ingredient_' + ingrd_seq,
            {
              afterFinish:
                  function() {
                    Form.Element.clear('ingrs_' + ingrd_seq);
                  }
            });
        ingrd_changed(ingrd_seq);
      };
	var preps = " . $sf_data->getRaw('preplist_jsarray') . ";
	var msrmts = " . $sf_data->getRaw('msrmtlist_jsarray') . ";
	var ingrds = " . $sf_data->getRaw('ingrlist_jsarray') . ";
  ");?>

<fieldset id="recipe_ingredients">
	<h3>Ingredients</h3>
  <div id="ing_indicator" style="display: none">&nbsp</div>
  <?php foreach($ingrs as $ingr): ?>
   	<?php echo include_partial('ingredient/ingdrop', array('ingrlist' => $ingrlist, 'ingr' => $ingr))?>
	<?php echo include_partial('ingredient/ingobserve', array('ingr' => $ingr))?>
  <?php endforeach ?>
 <div id="addIngRow"></div>
  </fieldset>

 <fieldset id="directions">
   <?php echo form_error('recipe_directions') ?>	
   <label for="recipe_directions">Directions</label>
      <?php echo object_textarea_tag($recipe, 'getRecipeDirections', array (
                      'size' => '65x10')) ?>
 
<div id="recipe_directions-H" class="field-hint-inactive"><span class="required">*</span>Required- Tell us how to cook your recipe</div>
<p><?php echo link_to('Markdown ', '../markdown.html', array('popup' => array('popupWindow',      
                   'width=500,height=750,left=320,top=0')))?>Formatting allowed</p>
 <fieldset id="picture">
   <?php echo form_error('pic') ?>
   <label for="pic">Picture</label>
    <?php include_partial('recipe/pic', array('pic' => $pic, 'id' => $recipe->getRecipeId(), ))?>
 </fieldset>
 
<label for="keyword">Keywords</label>
  <?php echo input_tag('keyword', '')?>
  <div id="keyword-H" class="field-hint-inactive">Optional- Add descriptive words seperated by a comma (such as <kbd>party,holiday,crockpot</kbd>)
 </div>
   <?php echo input_hidden_tag("user_id", $sf_user->getSubscriberId())?>
  <?php echo object_input_hidden_tag($recipe, 'getRecipeStripNm')?>
</fieldset>
<br />
 <input type="button" name="commit" value="Add Recipe" id="save_recipe" onclick="this.form.submit()" />
 <?php if ($recipe->getRecipeId()): ?>
   <?php echo link_to('cancel', '@get_recipe?recipestripnm='.$recipe->getRecipeStripNm()) ?>
 <?php else: ?>
   <?php echo link_to('cancel', 'recipe/list') ?>
 <?php endif ?>  
</form>    
  
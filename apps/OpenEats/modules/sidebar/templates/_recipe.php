<?php use_helper('Global') ?>

<?php echo include_partial('user/loginlinks') ?>

<?php echo include_partial('sidebar/nav')?>

<h2><?php echo link_to('Recipe Keywords', 'keyword/index') ?></h2>
<ul id="recipe_keywords">
  <?php include_partial('keyword/recipe_keywords', array('recipe' => $recipe, 'keywords' => $recipe->getKeywords())) ?> 
</ul>
<?php if($sf_user->isAuthenticated()): ?>
 	<div>Add Keyword:<div id="indicator" style="display: none"></div>
    <?php echo form_remote_tag(array(
      'url'    => '@keyword_add',
      'update' => 'recipe_keywords',
      'loading'  => "Element.show('indicator'); \$('keyword').value = ''",
      'complete' => "Element.hide('indicator');".visual_effect('highlight', 'recipe_keywords'),
    )) ?>
      <?php echo input_hidden_tag('recipe_id', $recipe->getRecipeId()) ?>
      <?php echo input_auto_complete_tag('keyword', '', '@keyword_autocomplete', array('autocomplete'=>'off'), 'use_style=true') ?>
      <p><small><b>Separate keywords by commas</b> </small></p>
      <?php echo submit_tag('Add Keyword') ?>
    </form>
  </div>
<?php endif ?>
<br />
<h2>Search</h2>
<?php echo form_tag('@search_recipe', 'method=get') ?>
 <?php echo input_tag('search_query') ?>
 <?php echo submit_tag('Search')?>
</form>
<?php include_partial('sidebar/admin') ?>
<?php include_partial('sidebar/moderator') ?>
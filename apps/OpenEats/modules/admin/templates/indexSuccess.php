<h1>Admin Panel</h1>
<?php if ($sf_user->hasCredential('administrator')): ?>
<div class="admin_panel">
	<h3><?php echo link_to('Recipe Admin', 'recipe_adm/list')?></h3>
	<p>The Recipe Administrator allows you to list, edit and delete all recipes on your site</p>
	<div class="admin_panel_pic">
		<?php echo image_tag('RecipeBox_icon.gif', array('size' => '64x64', 'title' => 'Recipe Admin'))?>
	</div>	
 </div>	
<div class="admin_panel">
	<h3><?php echo link_to('Ingredient Admin', 'ingrd_adm/list')?></h3>
	<p>The Ingredient Administrator allows you to list, edit and delete all ingredients on your site</p>
	<div class="admin_panel_pic">
		<?php echo image_tag('apple', array('size' => '64x64', 'title' => 'Ingredient Admin'))?>
	</div>	
 </div>
 <div class="admin_panel">
	<h3><?php echo link_to('Course Admin', 'course_adm/list')?></h3>
	<p>The Course Administrator allows you to list, edit, add and delete all courses on your site</p>
	<div class="admin_panel_pic">
		<?php echo image_tag('courses.gif', array('size' => '64x64', 'title' => 'Course Admin'))?>
	</div>	
 </div>
 <div class="admin_panel">
	<h3><?php echo link_to('Ethnicity Admin', 'ethn_adm/list')?></h3>
	<p>The Ethnicity Administrator allows you to list, edit, add and delete all ethnicity on your site</p>
	<div class="admin_panel_pic">
		<?php echo image_tag('ethn.png', array('size' => '64x64', 'title' => 'Ethnicity Admin'))?>
	</div>	
 </div>
 <div class="admin_panel">
	<h3><?php echo link_to('User Admin', 'user_adm/list')?></h3>
	<p>The User Administrator allows you to list, edit and delete all registered users on your site</p>
	<div class="admin_panel_pic">
		<?php echo image_tag('edit_user.png', array('size' => '64x64', 'title' => 'User Admin'))?>
	</div>	
 </div>
<?php endif?>
 <div class="admin_panel">
	<h3><?php echo link_to('Reported Recipes', 'admin/ReportedRecipes')?></h3>
	<p>Reported Recipes allows you to see if any user has flagged a recipe for deletion you can then review the recipe and decided if you want to delete it or unflag it</p>
	<div class="admin_panel_pic">
		<?php echo image_tag('reported.png', array('size' => '64x64', 'title' => 'Reported Recipe'))?>
	</div>	
 </div>
 <div class="admin_panel">
	<h3><?php echo link_to('Rebuild Search', 'admin/BuildIndex')?></h3>
	<p>Rebuild Search allows you to rebuild the search engine index. This is used to fix any search engine issues, and is also a good idea to perform after an upgrade</p>
	<div class="admin_panel_pic">
		<?php echo image_tag('rebuild_search', array('size' => '64x64', 'title' => 'Rebuild Search'))?>
	</div>	
 </div>
 <div class="admin_panel">
	<h3><?php echo link_to('Clear Cache', 'admin/ClearCache')?></h3>
	<p>Clear Cache is used if you are having issues with your site.  The first thing you should try is this.  Also this is used after an upgrade</p>
	<div class="admin_panel_pic">
		<?php echo image_tag('cache_clear.png', array('size' => '64x64', 'title' => 'Clear Cache'))?>
	</div>	
 </div>
<br style="clear:both;">
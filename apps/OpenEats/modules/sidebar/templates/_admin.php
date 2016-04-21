<?php if ($sf_user->hasCredential('administrator')): ?>
  <h2>Admin Panel</h2>
    <ul>
	   <li><?php echo link_to('Recipe Admin', 'recipe_adm')?></li>
	   <li><?php echo link_to('User Admin', 'user_adm')?></li>
	   <li><?php echo link_to('Ingredient Admin' , 'ingrd_adm')?></li>
	   <li><?php echo link_to('Course Admin' , 'course_adm')?></li>
       <li><?php echo link_to('Ethnicity Admin' , 'ethn_adm')?></li>
	   <li><?php echo link_to('Reported Recipes', 'admin/ReportedRecipes') ?> (<?php echo RecipePeer::getReportCount() ?>)</li>
       <li><?php echo link_to('Rebuild Search Index', 'admin/BuildIndex')?></li>
       <li><?php echo link_To('Clear Cache', 'admin/ClearCache')?></li>
	</ul>
<?php endif?>	
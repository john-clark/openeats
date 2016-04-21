<?php if ($sf_user->hasCredential('moderator')): ?>
  <h2>Moderator</h2>
  <ul>
    <li><?php echo link_to('Reported Recipes', 'admin/ReportedRecipes') ?> (<?php echo RecipePeer::getReportCount() ?>)</li>
	<li><?php echo link_to('Rebuild Search Index', 'admin/BuildIndex')?></li>
	<li><?php echo link_To('Clear Cache', 'admin/ClearCache')?></li> 
   </ul> 
 <?php endif ?>
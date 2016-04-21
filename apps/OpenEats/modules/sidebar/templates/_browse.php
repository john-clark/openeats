<?php echo include_partial('user/loginlinks') ?>
<?php echo include_partial('sidebar/nav') ?>
<h2>Browse Recipes</h2>
<ul>
	<li><?php echo link_to('By Name', '@browse_name')?></li>
	<li><?php echo link_to('By Rating', '@browse_rate')?></li>
</ul>	
<h2>Browse By Course</h2>
<ul>
  <li><?php echo link_to('All', 'recipe/list') ?></li>
  <?php foreach($courses as $course): ?>
  <li><?php echo link_to($course->getCourseNm(),'@browse_course?course='.$course->getCourseNm())?></li>
  <?php endforeach ?>  
</ul>

<h2>Browse By Base</h2>
<ul>
  <?php foreach(sfConfig::get('mod_recipe_arraybase') as $base):?>
		<li><?php echo link_to($base, '@browse_base?base='.$base)?></li>
   <?php endforeach ?>
</ul>

<h2>Browse By Ethnicity</h2>
<ul>
  <?php foreach($ethnicities as $ethnicity):?>
    <li><?php echo link_to($ethnicity->getEthnicityNm(), '@browse_ethnicity?ethnicity='.$ethnicity->getEthnicityNm())?></li>
  <?php endforeach?>  
</ul>
<?php include_partial('sidebar/moderator') ?>
<?php include_partial('sidebar/admin') ?>   
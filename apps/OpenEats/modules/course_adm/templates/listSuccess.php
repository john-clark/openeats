<?php use_helper('PagerNavigation')?>

<div id="admin_course">
	<h2>Course Admin</h2>
	<div class="results">
  	  <?php echo $pager->getNbResults() ?> results found.<br />
	  Displaying results <?php echo $pager->getFirstIndice() ?> to  <?php echo $pager->getLastIndice() ?>.
	</div>
	<br />
	<p>Sort by: <?php echo link_to('Course Name', 'course_adm/list?sort='.'COURSE_NM')?> - <?php echo link_to('ID', 'course_adm/list?sort='.'COURSE_ID' )?></p>
	<br />
	<p><?php echo link_to('Create New Course', 'course_adm/edit')?></p>
  <table class="admin">
    <thead>
	  <tr>	
	    <th>ID</th>
	    <th>Course Name</th>
	    <th>Recipes w/course</th>
	    <th>Action</th>
	 </tr>
   </thead>
   <tbody>
	<?php foreach($pager->getResults() as $course):?>
		<tr>
			<td><?php echo $course->getCourseId()?></td>
			<td><?php echo $course->getCourseNm()?></td>
			<td><?php echo link_to($course->countRecipes(), 'course_adm/ShowRecipes?course_nm='.$course)?></td>
			<td><?php echo link_to(image_tag('edit_icon', array('title' => 'edit')), 'course_adm/edit?course_nm='.$course) . ' '?><?php echo link_to(image_tag('delete_icon', array('title' => 'delete')), 'course_adm/delete?course_id='.$course->getCourseId(), array('confirm' => 'Are you Sure?'))?></td>
		</tr>
	<?php endforeach?>
   </tbody>
 </table>
  <?php echo pager_navigation($pager, 'course_adm/list')?>
</div>			

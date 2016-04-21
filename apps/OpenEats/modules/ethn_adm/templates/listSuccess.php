<?php use_helper('PagerNavigation')?>

<div id="admin_ethn">
	<h2>Ethnicity Admin</h2>
	<div class="results">
  	  <?php echo $pager->getNbResults() ?> results found.<br />
	  Displaying results <?php echo $pager->getFirstIndice() ?> to  <?php echo $pager->getLastIndice() ?>.
	</div>
	<br />
	<p>Sort by: <?php echo link_to('Ethnicity Name', 'ethn_adm/list?sort='.'ETHNICITY_NM')?> - <?php echo link_to('ID', 'ethn_adm/list?sort='.'ETHNICITY_ID' )?></p>
	<br />
	<p><?php echo link_to('Create New Ethnicity', 'ethn_adm/edit')?></p>
  <table class="admin">
    <thead>
	  <tr>	
	    <th>ID</th>
	    <th>Ethnicity Name</th>
	    <th>Recipes w/ethnicity</th>
	    <th>Action</th>
	 </tr>
   </thead>
   <tbody>
	<?php foreach($pager->getResults() as $ethn):?>
		<tr>
			<td><?php echo $ethn->getEthnicityId()?></td>
			<td><?php echo $ethn->getEthnicityNm()?></td>
			<td><?php echo link_to($ethn->countRecipes(), 'ethn_adm/ShowRecipes?ethn_nm='.$ethn)?></td>
			<td><?php echo link_to(image_tag('edit_icon', array('title' => 'edit')), 'ethn_adm/edit?ethn_nm='.$ethn) . ' '?><?php echo link_to(image_tag('delete_icon', array('title' => 'delete')), 'ethn_adm/delete?ethn_id='.$ethn->getEthnicityId(), array('confirm' => 'Are you Sure?'))?></td>
		</tr>
	<?php endforeach?>
   </tbody>
 </table>
  <?php echo pager_navigation($pager, 'course_adm/list')?>
</div>			

<?php use_helper('PagerNavigation')?>

<div id="admin_ingrd">
	<h2>Ingredient Admin</h2>
	<div class="results">
  	  <?php echo $pager->getNbResults() ?> results found.<br />
	  Displaying results <?php echo $pager->getFirstIndice() ?> to  <?php echo $pager->getLastIndice() ?>.
	</div>
	<br />
	<p>Sort by: <?php echo link_to('Ingredient Name', 'ingrd_adm/list?sort='.'INGRD_NM')?> - <?php echo link_to('ID', 'ingrd_adm/list?sort='.'INGRD_ID' )?></p>
	<table class="admin">
		<thead>
		  <tr>	
		    <th>ID</th>
		    <th>Ingredient Name</th>
		    <th>User Name</th>
		    <th>Recipes w/Ingrd</th>
		    <th>Action</th>
		   </tr>
		 </thead>
		<tbody>
	<?php foreach($pager->getResults() as $ingrd):?>
		<tr>
			<td><?php echo $ingrd->getIngrdId()?></td>
		    <td><?php echo $ingrd?></td>
		    <td><?php echo $ingrd->getUser()?></td>
		    <td><?php echo link_to($ingrd->getCountRecipe(), 'ingrd_adm/ShowRecipes?ingrd_nm='.$ingrd)?></td>
		    <td><?php echo link_to(image_tag('edit_icon', array('title' => 'edit')), 'ingrd_adm/edit?ingrd_nm='.$ingrd) . ' '; echo link_to(image_tag('delete_icon', array('title' => 'delete')), 'ingrd_adm/delete?id='.$ingrd->getIngrdId(), array('confirm' => "Are you sure? Make sure no recipes are using this"))?></td>
		</tr>
    <?endforeach?>
   </tbody>
   </table>
<?php echo pager_navigation($pager, 'ingrd_adm/list')?>

</div>
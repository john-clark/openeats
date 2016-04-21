<?php use_helper('PagerNavigation', 'Date', 'User')?>


<div class="recipe_adm">
	<h2>Recipe Admin</h2>
	<div class="results">
  	  <?php echo $pager->getNbResults() ?> results found.<br />
	  Displaying results <?php echo $pager->getFirstIndice() ?> to  <?php echo $pager->getLastIndice() ?>.
	</div>
	 <br />
	 <p>Sort By: <?php echo link_to('Recipe Name', 'recipe_adm/list?sort='.'RECIPE_NM')?> - <?php echo link_to('ID', 'recipe_adm/list?sort='.'RECIPE_ID')?> - <?php echo link_to('Created By', 'recipe_adm/list?sort='.'USER_ID')?> - <?php echo link_to('Rating', 'recipe_adm/list?sort='.'AVERAGE_RATING')?> - <?php echo link_to('Created Date', 'recipe_adm/list?sort='.'CREATED_AT')?>
	<table class="admin">
		<thead>
			<tr>
				<th>ID</th>
				<th>Recipe Name</th>
				<th>Created By</th>
				<th>Rating</th>
				<th>Created</th>
				<th>Updated</th>
				<th>Report Count</th>
				<th>Comment Count</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($pager->getResults() as $recipe):?>
				<tr>
					<td><?php echo $recipe->getRecipeId()?></td>
					<td><?php echo link_to($recipe->getRecipeNm(), '@get_recipe?recipestripnm='. $recipe->getRecipeStripNm())?></td>
					<td><?php echo $recipe->getUser()?></td>
					<td><?php echo $recipe->getAverageRating()?></td>
					<td><?php echo format_date($recipe->getCreatedAt(), 'M/d/yy')?></td>
					<td><?php echo format_date($recipe->getUpdatedAt(), 'M/d/yy')?></td>
					<td><?php echo $recipe->getNbReport()?></td>
					<td><?php echo $recipe->getNbComment()?></td>
					<td><?php echo link_to(image_tag('edit_icon', array('title' => 'edit')), '@recipe_edit?recipe_strip_nm='.$recipe->getRecipeStripNm()) . ' '; echo link_to(image_tag('delete_icon', array('title' => 'delete')), 'recipe_adm/delete?recipestripnm='.$recipe->getRecipeStripNm(), array('confrim' => 'Are you sure?'))?> </td>
				</tr>
				<?php endforeach?>
			</tbody>
		</table>
		<?php echo pager_navigation($pager, 'recipe_adm/list')?>
	</div>									
								
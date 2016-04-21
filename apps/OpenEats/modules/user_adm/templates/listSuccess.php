<?php use_helper('PagerNavigation', 'Date', 'User')?>

<div class="user_adm">
	<h2>User Admin</h2>
	<div class="results">
  	  <?php echo $pager->getNbResults() ?> results found.<br />
	  Displaying results <?php echo $pager->getFirstIndice() ?> to  <?php echo $pager->getLastIndice() ?>.
	</div>
	<br />
	<div class="notice">
		Notice: Recipes owned by users you are deleting will be automatically changed to be owned by the first admin found.
	</div>
	<br/>	
	<p>Sort By: <?php echo link_to('Login', 'user_adm/list?sort='.'USER_LOGIN')?> - <?php echo link_to('ID','user_adm/list?sort='.'USER_ID')?> - <?php echo link_to('Auth Level', 'user_adm/list?sort='.'AUTH_LVL_ID')?> - <?php echo link_to('Created', 'user_adm/list?sort='.'CREATED_AT')?> - <?php echo link_to('Last Login', 'user_adm/list?sort='.'USER_LASTLOGIN')?></p>
	<table class="admin">
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Login</th>
				<th>Email</th>
				<th>Auth</th>
				<th>Recipe Count</th>
				<th>Created</th>
				<th>Last Login</th>
				<th>IP</th>
				<th>Action</th>
			<tr>
        </thead>
       <tbody>
	     <?php foreach($pager->getResults() as $user):?>
		    <tr>
			  <td><?php echo $user->getUserId()?></td>
			  <td><?php echo $user->getUserFn()?></td>
			  <td><?php echo $user->getUserLn()?></td>
			  <td><?php echo link_to_profile($user)?></td>
			  <td><?php echo $user->getUserEmail()?></td>
			  <td><?php echo $user->getAuthLvl()?></td>
			  <td><?php echo link_to($user->getCountRecipes(), 'user_adm/ShowRecipes?user='.$user->getUserLogin())?></td>
			  <td><?php echo format_date($user->getCreatedAt(), 'M/d/yy')?></td>
			  <td><?php echo format_date($user->getUserLastLogin(), 'M/d/yy')?></td>
			  <td><?php echo $user->getUserIp()?></td>
			  <td><?php echo link_to(image_tag('edit_icon', array('title' => 'Edit')), 'user_adm/edit?user='.$user->getUserLogin()) . ' ';                  
			    echo link_to(image_tag('delete_icon', array('title' => 'delete')), 'user_adm/delete?user_id='.$user->getUserId(), array('confirm' => 'Are you sure?'))?></td>
			</tr>
		<?php endforeach?>	   
	  </tbody>
	</table>
    <?php echo pager_navigation($pager, 'user_adm/list')?>
</div>	
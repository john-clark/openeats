<?php use_helper('Javascript', 'User', 'Global')?>


<h2 style="border:none;"><?php echo $subscriber->getUserLogin()."'s" ?> Profile</h2>

<div class="user_tabs">
  <ul class="user_menu">
	<li><?php echo link_to_profile($subscriber)?></li>
 	<li><?php echo link_to_remote('Recipes', array(
	     'url' => 'user/userRecipes?user='.$subscriber->getUserLogin(),
	     'update' => 'user_page'))?></li>
	 <li><?php echo link_to_remote('Meal Planner', array('url' =>  '@planner?login='.$subscriber->getUserLogin(), 'update' => 'user_page', 'method' => 'get'))?></li>
     <li><?php echo link_to_remote('Menus', array(
		     'url' => '@list_menu?user='.$subscriber->getUserLogin(),
		     'update' => 'user_page' ))?></li> 
	<?php if ($subscriber->getUserId() == $sf_user->getSubscriberId()): ?>
		 
		<li><?php echo link_to_remote('Grocery Lists', array(
			'url' => 'grocery/list',
	    	'update' => 'user_page'))?></li>
   	     <li><?php echo link_to_remote('Recipe Box', array(
		     'url' => 'user/UserStoredRecipes?user='.$subscriber->getUserLogin(),
		     'update' => 'user_page'))?></li>
	     <li><?php echo link_to_remote('Settings', array(
	         'url' => 'user/edit',
	         'update' => 'user_page'))?></li>
    <?php endif?>
 </ul>	
</div>

<div id="user_page">	
  <?php if($subscriber->getUserAbout()):?>
    <label>All About Me!</label>
      <div id="user_about">
        <?php echo $subscriber->getUserAbout()?>
	  </div>
  <?php endif?>

  <h2>Recent Activity</h2>
   <h3>Comments</h3>
    <?php if(count($recent_comments) != 0):?>
	   <?php foreach ($recent_comments as $recent_comment):?>
		 <dl class="comment">
			<dt>Commented on <?php echo link_to_recipe($recent_comment->getRecipe())?></dt>
		  <dd><?php echo $recent_comment->getComment()?></dd>
		</dl>
		<?php endforeach?>
	 <?php else: echo "Hasn't commented on any recipes yet"?>	
	 <?php endif?>
	<h3>Ratings</h3>
	 <?php if(count($recent_ratings)!=0):?>
		<?php foreach($recent_ratings as $recent_rating):?>	
			<div class="recent_rating">
				Rated <?php echo link_to_recipe($recent_rating->getRecipe())?> 
				<?php $count = 0?>
				<?php while ($count < $recent_rating->getRate()):?>
					<?php echo image_tag('star.png')?>
					<?php $count += 1?>
				<?php endwhile?>	
			</div>
		<?php endforeach?>
    <?php else: echo "Hasn't rated any recipes yet"?>		
	<?php endif?>			
   <br />
  <h2>Contributed Keywords</h2>
    <ul id="user_keywords">
      <?php foreach($keywords as $keyword): ?>
        <li><?php echo link_to($keyword, '@keyword?keyword='.$keyword, 'rel=tag')?></li>
      <?php endforeach;?>
   </ul>
</div>	
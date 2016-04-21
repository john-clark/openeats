<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2000/REC-xhtml1-200000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php ini_set('memory_limit', '64M')?>
<?php echo include_http_metas() ?>
<?php echo include_metas() ?>

<?php echo include_title() ?>


<link rel="shortcut icon" href="/favicon.ico" />

<?php if (has_slot('top_recipe_feed')):?>
  <?php include_slot('top_recipe_feed')?>
<?php elseif (has_slot('new_recipe_feed')):?>
  <?php include_slot('new_recipe_feed')?>
<?php else:?>
  <?php echo auto_discovery_link_tag('rss', 'feed/HeadlineFeed') ?>
<?php endif;?>
</head>
<?php use_helper('Global') ?>
<body>
<?php include_component('user','LoginDropDown');?>


<div id="wrapper">
<div id="innerwrapper">
	<div id="header" >
		<?php echo form_tag('@search_recipe', 'method=get') ?>
	
		<?php echo input_tag('search_query') ?>
		<?php echo submit_tag('Search', array('id' => 'search'))?>
		<?php echo link_to('Detail Search','@advance_search_recipe') ?>
		</form>
		<?php echo link_to(image_tag('oelogo.png'),'@homepage')?>
		<h2>Forking Anticipated....</h2>
		<ul id="nav">				
			<li><?php echo link_to('<em>R</em>ecipes','recipe/', array('class' =>'active1'))?></li>
			<li><?php echo link_to_login('<em>A</em>dd Recipe', 'recipe/edit')?></li>
			<li><?php echo link_to_login('<em>A</em>dd Ingredients', 'ingredient/Add')?></li>
			<li><?php echo link_to('<em>A</em>bout', 'frontpage/about')?></li>
			<li><?php echo link_to('<em>P</em>roject Page', 'https://sourceforge.net/projects/openeats', array('target'=>'_blank'))?></li>
			<?php if($sf_user->hasCredential('administrator') || $sf_user->hasCredential('moderator')):?>
				<li><?php echo link_to('<em>A</em>dmin', 'admin')?></li>
			<?php endif?>	
	   </ul>
	
	</div>
	<div id="sidebarright">
		<?php include_component_slot('sidebar') ?>
	</div>


<div id="content">
	<?php if ($sf_flash->has('notice')): ?>
	  <div class="flash_notice"><?php echo $sf_flash->get('notice') ?></div>
	<?php endif; ?>
	<?php if ($sf_flash->has('error')): ?>
	  <div class="flash_error"><?php echo $sf_flash->get('error') ?></div>
	<?php endif; ?>
	
   <?php echo $sf_data->getRaw('content') ?>
</div>    
<div class="footer">
	<p><?php echo link_to('Contact', 'https://sourceforge.net/sendmessage.php?touser=482910', array('target'=>'_blank')) ?> | <?php echo link_to('Get Involved', 'http://openeats/index.php/user/registration',array('target'=>'_blank'))?> | <?php echo link_to('Disclaimer','frontpage/disclaimer')?><br />
			&copy; Copyright 2008-2009 OpenEats Version <?php echo sfConfig::get('app_version') ?></p>
		</div>
</div>
</div>
</body>
</html>

<?php use_helper('Object')?>
<?php if ($sf_user->hasCredential('administrator')):?>
	<?php echo link_to('edit ', 'frontpage/update?headline_id='.$headline->getHeadlineId())?>
<?php endif;?>
<h2 style="display:inline"><?php echo $headline->getHeadlineTitle()?></h2>
<?php echo $sf_data->getRaw('headline')->getHeadlineBody(); ?>

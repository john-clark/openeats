<?php use_helper('Date') ?>

<?php if($sf_user->hasCredential('administrator')):?>
  <div id="recipe_menu">
    <ul class="recipe_menu_list">
      <li><?php echo image_tag('edit.png'); echo link_to('Edit',  '@edit_headline?headlinestriptitle='.$headline->getHeadlineStripTitle())?>
	  <li><?php echo image_tag('delete.png'); echo link_to('Delete', 'headline/delete?headline_id='. $headline->getHeadlineId(), array(        
		     'confirm'  => 'Are you sure?')) ?>
    </ul>
  </div>
<?php endif;?>

<div class="headlineblock">
  <h2><?php echo $headline->getHeadlineTitle();?></h2>
  <div id="date">
   <?php echo format_date($headline->getCreatedAt(),'dddd,dd MMM yyyy') ?> 
 </div>
  <?php echo $sf_data->getRaw('headline')->getHeadlineIntro();?>
  <?php echo $sf_data->getRaw('headline')->getHeadlineBody(); ?>
 </div>



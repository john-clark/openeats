<?php use_helper('Text', 'Global')?>

<?php if($sf_user->hasCredential('administrator')):?>
  <div id="recipe_menu">
    <ul class="recipe_menu_list">
      <li><?php echo image_tag('edit.png'); echo link_to('Create', 'headline/create')?>
    </ul>
  </div>
<?php endif;?>

<h2>Headlines <?php echo link_to(image_tag('feed.gif'), 'feed/HeadlineFeed', array('target'=>'_blank'))?>
<?php //echo link_to_feed('headlines', '@feed_headlines');?></h2>
<br />
<?php foreach ($sf_data->getRaw('headlines') as $headline): ?>
  <div class="headlinelist">
    <h2><?php echo link_to($headline->getHeadlineTitle(), '@get_headline?headlinestriptitle='.$headline->getHeadlineStripTitle()) ?></h2>
    <?php echo $headline->getHeadlineIntro()?>
    <span id="readmore">
      <?php echo link_to("Read More", '@get_headline?headlinestriptitle='.$headline->getHeadlineStripTitle(),'id="readlink"') ?>
    </span> 
 </div>
 <br />
<?php endforeach; ?>

<?php echo include_partial('user/loginlinks') ?>
<h2><?php echo link_to('Headlines', 'headline/list')?></h2>
<ul>
  <?php foreach ($headlines as $headline) : ?>
	  <li><?php echo link_to($headline->getHeadlineTitle(), '@get_headline?headlinestriptitle='.$headline->getHeadlineStripTitle())?></li>
  <?php endforeach ?>
  <li><?php echo link_to('Read More...', 'headline/list')?></li>
 </ul>	
 
<h2>Search</h2>
<?php echo form_tag('@search_recipe', 'method=get') ?>
 <?php echo input_tag('search_query') ?>
 <?php echo submit_tag('Search')?>
</form>

<?php include_partial('sidebar/admin')?>

<?php include_partial('sidebar/moderator') ?>
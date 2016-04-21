<?php use_helper('User', 'Text', 'Global') ?>
<div id="search-info"><?php if($query) {echo $searchinfo;} ?></div>

 <?php foreach($hits as $hit): ?>
   <div class="search_result">
     <h2 class="recipelist"><?php echo link_to_recipe_search($hit)?></h2>
     <?php include_partial('recipe/rated', array('id' => $hit->recipe_id, 'rate' => $hit->rate))?> 
     <div class="submited">
  	  Submitted by:<?php echo link_to_profile(UserPeer::getUserFromLogin($hit->submited))?>
    </div>
    <div class="recipe_body">
    <?php echo truncate_text($hit->recipe_desc, 200 ) ?>
   </div>
  </div>
   <?php endforeach ?>  
     
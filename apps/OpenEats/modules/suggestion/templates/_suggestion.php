<?php echo use_helper('Date', 'Text','Javascript', 'User') ?>
  <dl class="comment">
	 <dt>
		<span class="nb_comment">#<?php echo $nb_suggestion ?></span>
    <strong><?php echo link_to( $suggestion->getUser(), '@user_profile?login='.$suggestion->getUser()->getUserLogin()) ?></strong>
    <small>Posted <?php  echo date('Y-m-d \a\t h:i', $suggestion->getCreatedAt('U'))?></small>
   </dt>
  <dd>  
   <div class="recipe_comment">
	   <?php echo $suggestion->getsuggestion()?>
	    <div class="suggest" id=<?php echo 'rate_suggest_'.$suggestion->getSuggestionId()?>>
		 Do you recommend this suggestion?
	     <?php echo link_to_user_suggest($sf_user, $suggestion->getSuggestionId(), 'yes') ?>
	     <?php echo link_to_user_suggest($sf_user, $suggestion->getSuggestionId(), 'no') ?>
	    </div>
  </div>
  </dd>
 </dl>
  <div style="clear: both"></div>
 <?php if($sf_user->hasCredential('administrator')): ?>
  <?php echo link_to('[delete this suggestion]', 'suggestion/delete?id='.$suggestion->getSuggestionId(), 'confirm=Are you sure you want to delete this suggestion?') ?>
<?php endif; ?>

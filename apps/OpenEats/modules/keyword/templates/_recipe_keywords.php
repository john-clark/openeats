<?php use_helper('Javascript') ?>

<?php if ($sf_user->isAuthenticated()): ?>
	<?php $sf_user_keywords = $sf_user->getSubscriber()->getKeywordsFor($recipe) ?>
	
	  <?php foreach($keywords as $keyword): ?>
        <li>
        <?php if (isset($sf_user_keywords[$keyword]) || $sf_user->hasCredential('administrator') || $sf_user->hasCredential('moderator') ): ?>
        <?php echo link_to($keyword, '@keyword?keyword='.$keyword, 'rel=tag') ?>
        &nbsp;<?php echo link_to_remote('[x]', array(
          'url'      => '@keyword_remove?recipestripnm='.$recipe->getRecipeStripNm().'&keyword='.$keyword,
          'update'   => 'recipe_keywords',
          'loading'  => "Element.show('indicator')",
          'complete' => "Element.hide('indicator');".visual_effect('highlight', 'recipe_keywords'),
        )) ?>
     <?php else: ?>
        <?php echo link_to($keyword, '@keyword?keyword='.$keyword, 'rel=tag') ?>
    <?php endif ?>
    </li>
  <?php endforeach ?>
  
  <?php else: ?>
<?php foreach($keywords as $keyword): ?>
  <li><?php echo link_to($keyword, '@keyword?keyword='.$keyword, 'rel=tag') ?></li>
<?php endforeach ?>
<?php endif ?>

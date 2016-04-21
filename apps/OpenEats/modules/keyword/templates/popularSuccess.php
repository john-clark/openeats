<h2>Popular Keywords</h2>
 
<ul id="keyword_cloud">
  <?php foreach($keywords as $keyword => $count): ?>
  <li class="keyword_popularity_<?php echo $count ?>"> <?php echo link_to($keyword, '@keyword?keyword='.$keyword, 'rel=tag' )?></li>
  <?php endforeach; ?>
</ul>
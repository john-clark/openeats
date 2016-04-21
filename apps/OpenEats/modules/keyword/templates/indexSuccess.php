<h2>List of Keywords</h2>

<ul>
<?php foreach($keywords as $keyword => $count):?>
	<li><?php echo link_to($keyword, '@keyword?keyword='.$keyword, 'rel=tag')?>(<?php echo $count?>)</li>
<?php endforeach ?>
</ul>
	
	
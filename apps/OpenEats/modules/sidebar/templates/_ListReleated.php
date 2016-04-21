<?php if ($associated_keywords->getRawValue()): ?>
  <h2>Related Keywords</h2>

   <ul>
   <?php foreach($associated_keywords as $key => $count):?>
      <li><?php echo link_to('+'.$key, '@keyword?keyword='.implode(' ', $keywords->getRawValue()).' '. $key)?>(<?php echo $count?>)</li>
   <?php endforeach ?>
   </ul>
  <?php endif; ?>
<?php echo include_partial('sidebar/default'); ?>
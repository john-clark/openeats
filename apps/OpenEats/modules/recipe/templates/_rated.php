<?php for($i = 1 ; $i <= 5 ; $i++): ?><div class="rate <?php if($i <= $rate): ?>rated<?php endif; ?>" id="rate_<?php echo $id ?>_<?php echo $i ?>"><?php echo image_tag('spacer.gif', 'width=20px height=18px', 'alt=spacer')?></div><?php endfor; ?>

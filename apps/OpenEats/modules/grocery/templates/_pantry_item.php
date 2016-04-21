<div id="grocery_items_<?php echo $seq ?>">
	
	<?php echo label_for("list_item[$seq]", 'Item')?>
	  <?php echo input_tag("list_item[$seq]", $item->getGroceryItem(), array())?>
	<div id="list_item_<?php echo $seq; ?>_auto_complete" class="autocompleting"></div>
	<?php echo link_to_function('[x]', "remove_item($seq)") ?>
</div>	

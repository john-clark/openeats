<div id="grocery_items_<?php echo $seq ?>">
	<?php echo label_for('qty[$seq]', 'Qty')?>
	  <?php echo input_tag("qty[$seq]", $item->getQty(), array('size' => '8', ));?>
	<?php echo label_for("msrmt[$seq]", 'Mrsmt'); ?>
	 <?php echo input_tag("msrmt[$seq]", $item->getMsrmt(), array())?>
	<div id="msrmt_<?php echo $seq; ?>_auto_complete" class="autocompleting"></div>
	<?php echo label_for("list_item[$seq]", 'Item')?>
	  <?php echo input_tag("list_item[$seq]", $item->getGroceryItem(), array())?>
	<div id="list_item_<?php echo $seq; ?>_auto_complete" class="autocompleting"></div>
	<?php echo label_for("item_aisle[$seq]", 'Aisle')?>
	  <?php echo select_tag("item_aisle[$seq]", options_for_select($aisles, $item->getAisleId(), 'include_blank=true'))?>
	<?php echo link_to_function('[x]', "remove_item($seq)") ?>
</div>	
	
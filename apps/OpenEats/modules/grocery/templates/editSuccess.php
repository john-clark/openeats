<?php use_helper('Object', 'Validation', 'Form', 'Javascript') ?>
<script type="text/javascript" src='<?php echo sfConfig::get('sf_base_url_dir')?>/sf/prototype/js/controls.js'></script>

<?php echo form_tag('grocery/update', array('id' => 'update', 'name' => 'update'))?>
<?php echo object_input_hidden_tag($list, 'getGroceryId')?>
<?php echo input_hidden_tag('grocery_strip_nm', $list->getGroceryStripNm())?>
<?if( !$list->getGroceryId() && $countList > 7):?>
  <div class="form_error">
   <p>You currently have <?php echo $countList?> grocery list, there is a limit of 10.  Please delete any unused grocery lists</p>
  </div>
  <?php echo input_hidden_tag('count', $countList)?>
<?php endif?>
<?php echo form_error('count')?>
<fieldset id="recipe_info">
  <?php echo form_error('grocery_nm')?>
  <label for="grocery_nm">Grocery List Title</label>
     <?php echo object_input_tag($list, 'getGroceryNm')?>
  </fieldset>

<?php echo javascript_tag("
	var last_seq = $last_seq;
	var item_changed = function(seq) {
		if (seq == last_seq) {
			" .
			remote_function(array(
				'url' => '@add_grocery_item',
				'update' => 'addItemRow',
				'position' => 'before',
				'script' => true,
				'with' => '\'seq=\' + (++last_seq)'
			)) . ";
		}
	};
      var remove_item = function(seq) {
        new Effect.DropOut('grocery_items_' + seq,
            {
              afterFinish:
                  function() {
                    Form.Element.clear('list_item_' + seq);
                  }
            });
        item_changed(seq);
      };
      	var ingrds = " . $sf_data->getRaw('ingrlist_jsarray') . ";
        var msrmts = " . $sf_data->getRaw('msrmtlist_jsarray') . ";
  ");?>
   
<fieldset id="list_items">	
  <h2>Select Grocery Items</h2>
  <?php $i = 0 ?>
  <?php foreach($items as $item):?>
	<?php include_partial('grocery/grocery_item', array('aisles' => $aisles, 'item' => $item, 'seq' => $i))?>
	<?php include_partial('grocery/grocery_item_observe', array('seq' => $i, 'item' => $item))?>
    <?php $i++?>
  <?php endforeach?>	
  <div id="addItemRow"></div>
</fieldset>
<div>
 <p><?php echo checkbox_tag('master', 1, false)?>
 <?php echo label_for('master', 'Add Items from Quick List')?></p>
</div>
<br />
<p><?php echo submit_tag('Create Grocery List')?></p>

</form>
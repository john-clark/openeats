<?php use_helper('Object','Form', 'Javascript') ?>
<script type="text/javascript" src='<?php echo sfConfig::get('sf_base_url_dir')?>/sf/prototype/js/controls.js'></script>
<?php echo form_tag('grocery/pantry', array('name' => 'pantry', 'id' => 'pantry'))?>

<h2><?php echo $sf_user->getLogin() ?>'s General Store</h2>

The Pantry allows you to store a list of items you commonly have in your home.  Items in your Pantry will not automatically be added to your grocery list when you select a recipe to add to your grocery list.

<?php echo javascript_tag("
	var last_seq = $last_seq;
	var item_changed = function(seq) {
		if (seq == last_seq) {
			" .
			remote_function(array(
				'url' => '@add_pantry_item',
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
  ");?>
   
<fieldset id="list_items">	
  <h2>Pantry Items</h2>
  <?php $i = 0 ?>
  <?php foreach($exclude_items as $item):?>
	<?php include_partial('grocery/pantry_item', array('item' => $item, 'seq' => $i))?>
	<?php include_partial('grocery/pantry_item_observe', array('seq' => $i, 'item' => $item))?>
    <?php $i++?>
  <?php endforeach?>	
  <div id="addItemRow"></div>
</fieldset>
<?php echo submit_tag('Create Pantry')?>

</form>

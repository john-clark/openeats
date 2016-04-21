<?php use_helper('Object','Form', 'Javascript') ?>
<script type="text/javascript" src='<?php echo sfConfig::get('sf_base_url_dir')?>/sf/prototype/js/controls.js'></script>
<?php echo form_tag('grocery/quick', array('name' => 'quick', 'id' => 'update'))?>

<h2><?php echo $sf_user->getLogin() ?>'s Quick List</h2>

The Quick List allows you to add things you commonly get at a grocery store.  When you create a new grocery list you can automatically have the items on your Quick List added to the new grocery list.
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
        var msrmts = " . $sf_data->getRaw('msrmtlist_jsarray') . ";
      	var ingrds = " . $sf_data->getRaw('ingrlist_jsarray') . ";
  ");?>
   
<fieldset id="list_items", style="padding-top:20px;">	
  <h1>Select Quick List Items</h1>
   <br />
  <?php $i = 0 ?>
  <?php foreach($master_items as $item):?>
	<?php include_partial('grocery/grocery_item', array('aisles' => $aisles, 'item' => $item, 'seq' => $i))?>
	<?php include_partial('grocery/grocery_item_observe', array('seq' => $i, 'item' => $item))?>
    <?php $i++?>
  <?php endforeach?>	
  <div id="addItemRow"></div>
</fieldset>

<?php echo submit_tag('Create Quick List')?>

</form>

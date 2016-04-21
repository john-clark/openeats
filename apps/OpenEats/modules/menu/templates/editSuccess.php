<?php use_helper('Object', 'Validation', 'Form', 'Javascript') ?>
<?php echo form_tag('menu/update', array('id' => 'update', 'name' => 'update'))?>
<?php echo object_input_hidden_tag($menu, 'getMenuId')?>
<?php echo input_hidden_tag('menu_strip_nm', $menu->getMenuStripNm())?>

<fieldset id="recipe_info">
  <?php echo form_error('menu_nm')?>
  <label for="menu_nm">Menu Title</label>
     <?php echo object_input_tag($menu, 'getMenuNm')?>
  <label for="menu_desc">Menu Description</label>
    <?php echo object_textarea_tag($menu, 'getMenuDesc')?>
 </fieldset>

 <?php echo javascript_tag("
	var last_seq = $last_seq;
	var item_changed = function(seq) {
		if (seq == last_seq) {
			" .
			remote_function(array(
				'url' => '@add_item',
				'update' => 'addItemRow',
				'position' => 'before',
				'script' => true,
				'with' => '\'seq=\' + (++last_seq)'
			)) . ";
		}
	};
      var remove_item = function(seq) {
        new Effect.DropOut('menu_items_' + seq,
            {
              afterFinish:
                  function() {
                    Form.Element.clear('menu_item_' + seq);
                  }
            });
        item_changed(seq);
      };

  ");?>
 
    <fieldset id="menu_items">	
  <h2>Select Menu Items</h2>
    <small>You can select menu items from your saved recipes or if you find another recipe on the site click the "add to menu" button</small>
    <br />
     <?php if(count($stored_recipes) == 0):?>
        <p><b>You currently do not have any stored recipes</b></p>
     <?php else:?>
       <?php $i = 0 ?>
       <?php foreach($items as $item):?>
         <?php include_partial('menu_items', array('stored_recipes' => $stored_recipes, 'courses' => $courses, 'seq' => $i, 'item' => $item))?>
         <?php include_partial('menu_item_observe', array('seq' => $i, 'item' => $item))?>
         <?php $i++ ?>
      <?php endforeach ?>        
     <?php endif;?>
    <div id="addItemRow"></div>
     <br />
    <h2>Add Non-Recipe Items</h2>
      <div class="non_recipe_items">
	   	
	  <br />
	<?php foreach($non_items as $non_item): ?> 
	<label for="item_nm">Item Name</label>
	    <?php echo input_tag('item_nm[]', $non_item->getItemNm())?>
   	 <?php echo label_for("item_course[]", 'Course')?>
		<?php echo select_tag("item_course[]", options_for_select($courses, $non_item->getCourseId(), array('include_blank' => true)))?>  
   	 <label for="item_desc">Item Description</label>
	  <?php echo input_tag('item_desc[]', $non_item->getItemDesc())?>
	<br />
	<?php endforeach?>
</fieldset>
<?php echo checkbox_tag('private', 1, $menu->getMenuPrivate(), false)?>Mark Private
<br />
<?php echo submit_tag('Create Menu')?>
</form>
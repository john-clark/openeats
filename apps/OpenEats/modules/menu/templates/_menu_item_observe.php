<?php use_helper('Javascript')?> 
<?php echo javascript_tag("
    (function() {
      var observer_callback = function(element, value)
      {
        item_changed($seq);
      };
     
      new Form.Element.EventObserver('menu_item_$seq', observer_callback);
      new Form.Element.EventObserver('course_$seq', observer_callback);
    })();
")?>

<?php echo observe_field("menu_item_$seq", array(
	'update' => "recipe_desc_$seq",
	'with' => "'id=' + $('menu_item_$seq').value",
	'url' => 'menu/UpdateDesc'
	))?>
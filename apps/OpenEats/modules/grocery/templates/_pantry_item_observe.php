
<?php echo javascript_tag("
    (function() {
      var observer_callback = function(element, value)
      {
        item_changed($seq);
      };
    
      var autocompleter_callback = function(element, selectedElement)
      {
        item_changed($seq);
      }; 
      
      new Form.Element.EventObserver('list_item_$seq', observer_callback);
     
     
      new Autocompleter.Local('list_item_$seq', 'list_item_${seq}_auto_complete', ingrds,
          {
            afterUpdateElement: autocompleter_callback,
            choices: 5, 
            frequency: 0.1
          });
    })();
")?>
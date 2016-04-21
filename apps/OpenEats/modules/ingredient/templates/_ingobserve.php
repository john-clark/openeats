 <?php $ingrd_seq = $ingr->getIngrdSeq(); ?>
 
<?php echo javascript_tag("
    (function() {
      var observer_callback = function(element, value)
      {
        ingrd_changed($ingrd_seq);
      };
      var autocompleter_callback = function(element, selectedElement)
      {
        ingrd_changed($ingrd_seq);
      };
      new Form.Element.EventObserver('quantity_$ingrd_seq', observer_callback);
      new Form.Element.EventObserver('msrmt_$ingrd_seq', observer_callback);
      new Form.Element.EventObserver('prep_$ingrd_seq', observer_callback);
      new Form.Element.EventObserver('ingrs_$ingrd_seq', observer_callback);
      new Autocompleter.Local('msrmt_$ingrd_seq', 'msrmt_${ingrd_seq}_auto_complete', msrmts,
          {
            afterUpdateElement: autocompleter_callback,
            choices: 5,
            frequency: 0.1
          });
      new Autocompleter.Local('prep_$ingrd_seq', 'prep_${ingrd_seq}_auto_complete', preps,
          {
            afterUpdateElement: autocompleter_callback,
            choices: 5,
            frequency: 0.1
          });
      new Autocompleter.Local('ingrs_$ingrd_seq', 'ingrs_${ingrd_seq}_auto_complete', ingrds,
          {
            afterUpdateElement: autocompleter_callback,
            choices: 5,
            frequency: 0.1
          });
     })();
")?>
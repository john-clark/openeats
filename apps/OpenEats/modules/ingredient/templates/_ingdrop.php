<?php $ingrd_seq = $ingr->getIngrdSeq(); ?>

<div id="ingredient_<?php echo $ingrd_seq; ?>">
  <?php echo label_for("quantity[$ingrd_seq]", 'Qty'); ?>
  <?php echo input_tag("quantity[$ingrd_seq]", $ingr->getIngrdQty(), array('size' => 2))?>
  <?php echo label_for("msrmt[$ingrd_seq]", 'Mrsmt'); ?>
  <?php echo input_tag("msrmt[$ingrd_seq]", $ingr->getIngrdMsrmt(), array('size=5'))?>
  <div id="msrmt_<?php echo $ingrd_seq; ?>_auto_complete" class="autocompleting"></div>

  <?php echo label_for("ingrs[$ingrd_seq]", 'Ingredient')?>
  <?php echo input_tag("ingrs[$ingrd_seq]",
      ($ingr->getIngredient() ? $ingr->getIngredient()->getIngrdNm() : ''), array()); ?>
  <div id="ingrs_<?php echo $ingrd_seq; ?>_auto_complete" class="autocompleting"></div>
  <?php echo label_for("prep[$ingrd_seq]", 'Prep<img
      title="cssheader=[ttiph] cssbody=[ttipb] header=[Prep] fade=[on] delay=[200]
      body=[Substitutions or preparation steps, e.g. <kbd>fresh or frozen</kbd>, <kbd>crushed</kbd>, <kbd>grated</kbd>]"
      src="/images/info.png" />'); ?>
  <?php echo input_tag("prep[$ingrd_seq]", $ingr->getIngrdPrep(), array('size=7'))?>
  <div id="prep_<?php echo $ingrd_seq; ?>_auto_complete" class="autocompleting"></div>
  <?php echo link_to_function('[x]', "remove_ingrd($ingrd_seq)"); ?>
</div>

<?php use_helper('Object') ?>

<?php echo form_tag('frontpage/update') ?>

<?php echo object_input_hidden_tag($headline, 'getHeadlineId') ?>
<?php echo object_input_hidden_tag($headline, 'getHeadlineStripTitle') ?>
<?php echo object_input_hidden_tag($headline, 'getHeadlineType') ?>
<br />
<div id="headlinetitle"><p><b>Title: </b><br /><?php echo object_input_tag($headline, 'getHeadlineTitle', array('size'=>25, )) ?></p></div><br />
<div id="headlinebody"><p><b>Body: </b></p><?php echo object_textarea_tag($sf_data->getRaw('headline'), 'getHeadlineBody', 'cols=80 rows=35 rich=fck')?></div>
<div id="headline_submit"><br /><?php echo submit_tag('save') ?><?php echo link_to('cancel', '@get_headline?headlinestriptitle='.$headline->getHeadlineStripTitle())?></div>
</form>
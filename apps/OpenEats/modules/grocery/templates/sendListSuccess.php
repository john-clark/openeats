<?php echo use_helper('Object') ?>
<h3>Email your grocery list <?php echo $list->getGroceryNm()?></h3>
<?php echo form_tag('grocery/sendList', array('id' => 'mail_list')) ?>
<label for="email">E-Mail</label>
<?php echo input_tag('email') ?>

</br>
<?php echo submit_tag('Send List', array('id'=>'submit')) ?>
<?php echo object_input_hidden_tag($list, 'getGroceryStripNm')?>
<?php echo object_input_hidden_tag($list, 'getGroceryNm')?>
</form>
<?php echo use_helper('Object') ?>
<h3>Email a friend <?php echo $recipe->getRecipeNm()?></h3>
<?php echo form_tag('user/EmailRecipe', array('id' => 'mail_recipe')) ?>
<label for="email">Friends E-Mail</label>
<?php echo input_tag('email') ?>
<label for="message">Enter a Message to be sent with the recipe</label>
<?php echo textarea_tag('message', 'I saw this recipe for '. $recipe->getRecipeNm() . ' on OpenEats and I thought you may like it.',
            array('size'=> '40x5'))?>
<br />
<?php echo submit_tag('Send Recipe', array('id'=>'submit')) ?>
<?php echo object_input_hidden_tag($recipe, 'getRecipeStripNm')?>
<?php echo object_input_hidden_tag($recipe, 'getRecipeDesc')?>
<?php echo object_input_hidden_tag($recipe, 'getRecipeNm')?>
</form>            
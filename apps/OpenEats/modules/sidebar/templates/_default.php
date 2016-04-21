<?php echo include_partial('user/loginlinks') ?>

<?php echo include_partial('sidebar/nav') ?>

<?php include_partial('sidebar/admin')?>

<?php include_partial('sidebar/moderator') ?>

<h2>Search</h2>
<?php echo form_tag('@search_recipe', 'method=get') ?>
 <?php echo input_tag('search_query') ?>
 <?php echo submit_tag('Search')?>
</form>
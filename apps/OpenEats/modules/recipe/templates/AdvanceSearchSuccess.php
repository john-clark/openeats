<h1>Advance Search</h1>
<br />
<?php echo form_tag('@advance_search_recipe', "method=post id=advance_search") ?>

<div id="search_ing">
  <label for="search_with_ing">With Ingredients</label>
  <?php echo input_tag("search_with_ing") ?>
  <label for="search_without_ing">Without Ingredients</label>
  <?php echo input_tag("search_without_ing") ?>
</div>  
 <div id="search_keywords">
  <label for="search_keywords">Search by Keywords</label>
  <?php echo input_tag("search_keywords") ?>
  <label for="search_title">Search by Title</label>
  <?php echo input_tag("search_title") ?>
</div>
<div id="search_submited">
  <label for="search_submited">Submited by</label>
  <?php echo input_tag("search_submited") ?>
</div>
<?php echo submit_tag("Search", array("id" => "submit")) ?>
</form>   
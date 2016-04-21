<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2000/REC-xhtml1-200000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php echo include_http_metas() ?>
<?php echo include_metas() ?>

<?php echo include_title() ?>
<?php use_helper('Markdown')?>
</head>
<body>
<div class="recipe_print">
<div class="print_image"><?php echo image_tag('openeats_logo_bw_small.png') ?></div><br />
  <h2><?php echo $recipe->getRecipeNm() ?></h2> 
  <div class="submitedby">Submited By: <?php echo $recipe->getUser()->getUserLogin(); ?></div>
<p><b>Recipe Details</p></b>
<p><b>Base</b> <?php echo $recipe->getBase()?></p>
<p><b>Prep Time</b> <?php echo $recipe->getRecipePrepTm()?> minutes</p>
<p><b>Cook Time</b> <?php echo $recipe->getRecipeCookTm()?></p>
<p><b>Servings</b> <?php echo $recipe->getRecipeSrvgs()?></p>
<br />
<h3>Ingredients</h3>
<?php foreach($ingrds_array as $ingrd ): ?> 
  <p>
  <?php echo $ingrd->getIngrdQty(). ' '?> 
  <?php echo $ingrd->getIngrdMsrmt(). ' '?> 
  <?php echo $ingrd->getIngrdPrep(). ' '?> 
  <?php echo $ingrd->getIngredient()->getIngrdNm()?>
  </p>
<?php endforeach ?>
 <br />
<?php echo include_markdown_text($recipe->getRecipeDirections()) ?>
<br />
<p><b>Notes:</b></p>
<p><?php echo $recipe_note;?>
<div class="print_image"><br /><?php echo image_tag('openeats_logo_bw_small.png') ?></div>
</div>
</body>
</html>
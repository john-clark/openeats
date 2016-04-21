<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2000/REC-xhtml1-200000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php echo include_http_metas() ?>
<?php echo include_metas() ?>

<?php echo include_title() ?>

</head>
<body>
	<?php use_helper('Object', 'User', 'Global')?>

	<h2>Grocery List <?php echo $list->getGroceryNm()?></h2>
	   <div class="grocery_list">
		<?php foreach ($aisle_list as $aisle):?>
			<?php if ($aisle && $aisle != "Other" ):?>
			  <h3><?php echo $aisle?></h3>
			  <ul>
			  <?php foreach($items as $item):?>
				<?php if ($item->getGroceryAisle() == $aisle):?>
					<li><?php echo $item->getQty()?> <?php echo $item->getMsrmt()?> <?php echo $item->getGroceryItem()?></li>
				<?php endif?>
			 <?php endforeach?>		
			</ul>	
			<?php else:?>
				<h3>Other</h3>
				  <ul style="border:0; padding-top:0;">
				  <?php foreach($items as $item):?>
					<?php if ($item->getGroceryAisle() == $aisle || !$item->getGroceryAisle()):?>
						<li><?php echo $item->getQty()?> <?php echo $item->getMsrmt()?> <?php echo $item->getGroceryItem()?></li>
					<?php endif?>
				 <?php endforeach?>		
				</ul>
			<?php endif?>
	    <?php endforeach?>			
	  </div>
</body>	
</html>
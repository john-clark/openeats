<div style="width:600px; border:1px solid #EBE8D6; padding-top: 15px;padding-left: 10px;margin-top:15px;background-color:#FCFCF4;">
  <img src="http://www.openeats.org/images/oelogo.png"/>
  <p>You have been sent a shopping list from <a href=http://openeats.com>OpenEats</a></p>
</div>
<br />
<h2 style="color:#79B933;">Grocery List <?php echo $list->getGroceryNm()?></h2>
   <div class="grocery_list">
	<?php foreach ($aisle_list as $aisle):?>
		<?php if ($aisle && $aisle != "Other" ):?>
		  <h3 style="color:#F48005;"><?php echo $aisle?></h3>
		  <ul style="list-style-type: none;">
		  <?php foreach($items as $item):?>
			<?php if ($item->getGroceryAisle() == $aisle):?>
				<li><input type="checkbox"> <?php echo $item->getQty()?> <?php echo $item->getMsrmt()?> <?php echo $item->getGroceryItem()?></li>
			<?php endif?>
		 <?php endforeach?>		
		</ul>	
		<?php else:?>
			<h3 style="color:#F48005;">Other</h3>
			  <ul style="border:0; padding-top:0; list-style-type: none;">
			  <?php foreach($items as $item):?>
				<?php if ($item->getGroceryAisle() == $aisle || !$item->getGroceryAisle()):?>
					<li><input type="checkbox"> <?php echo $item->getQty()?> <?php echo $item->getMsrmt()?> <?php echo $item->getGroceryItem()?></li>
				<?php endif?>
			 <?php endforeach?>		
			</ul>
		<?php endif?>
    <?php endforeach?>			
  </div>	 

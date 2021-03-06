<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for representing a row from the 'grocerylist' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Grocerylist extends BaseGrocerylist
{
	public function setGroceryNm($v)
	  {
	   	parent::setGroceryNm($v);
	    $this->setGroceryStripNm(myRecipeTitle::stripText($v));
	  }
	
}

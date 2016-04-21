<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for representing a row from the 'grocery_aisle' table.
 *
 * 
 *
 * @package lib.model
 */ 
class GroceryAisle extends BaseGroceryAisle
{
  public function __toString()
   {
    	return $this->getAisle();
   }
}

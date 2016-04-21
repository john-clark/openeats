<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for performing query and update operations on the 'grocery_aisle' table.
 *
 * 
 *
 * @package lib.model
 */ 
class GroceryAislePeer extends BaseGroceryAislePeer
{
	static function getAisleArray()
	{
			$aisles = self::doSelect(new Criteria());
			$a_array = array();
			foreach ($aisles as $aisle)
			{
				$a_array[$aisle->getAisleId()] = $aisle->getAisle();
			}
	    return $a_array;
	}
		
	
}

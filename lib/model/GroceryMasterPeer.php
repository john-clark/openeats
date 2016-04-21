<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for performing query and update operations on the 'grocery_master' table.
 *
 * 
 *
 * @package lib.model
 */ 
class GroceryMasterPeer extends BaseGroceryMasterPeer
{
	static function getByUser($id)
	{
		$c = new Criteria();
		$c->add(self::USER_ID, $id);
		return self::doSelect($c);
	}
}

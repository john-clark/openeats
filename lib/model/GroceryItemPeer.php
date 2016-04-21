<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for performing query and update operations on the 'grocery_item' table.
 *
 * 
 *
 * @package lib.model
 */ 
class GroceryItemPeer extends BaseGroceryItemPeer
{
	static function retrieveByGrocery($id)
	{
		$c = new Criteria();
		$c->add(self::GROCERY_ID, $id);
		return self::doSelect($c);
	}
	
	static function getByItem($listId, $groceryItem)
	{
		$c = new Criteria();
		$c->add(self::GROCERY_ID, $listId);
		$c->add(self::GROCERY_ITEM, $groceryItem);
		return self::doSelectOne($c);
	}
	
	static function checkExistsRemove($items)
	{
	 if ($items)
		{
			foreach($items as $item)
			{
				$item->delete();
			}
		}
	}
}

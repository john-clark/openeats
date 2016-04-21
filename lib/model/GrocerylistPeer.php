<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for performing query and update operations on the 'grocerylist' table.
 *
 * 
 *
 * @package lib.model
 */ 
class GrocerylistPeer extends BaseGrocerylistPeer
{
	static function getList($list, $userId)
	{
		$c = new Criteria();
		$c->add(self::GROCERY_STRIP_NM, $list);
		$c->add(self::USER_ID, $userId);
		return self::doSelectOne($c);
	}
	
	static function getUserList($userId)
	{
		$c = new Criteria();
		$c->add(self::USER_ID, $userId);
        $c->addDescendingOrderByColumn(self::CREATED_AT);
        return self::doSelect($c);
	}
	
	static function getListByUser($list, $userId)
	{
		$c = new Criteria();
		$c->add(self::GROCERY_STRIP_NM, $list);
		$c->add(self::USER_ID, $userId);
		return self::doSelectOne($c);
	}
	
	static function getListCount($userId)
	{
		$c = new Criteria();
		$c->add(self::USER_ID, $userId);
		return self::doCount($c);
	}
}

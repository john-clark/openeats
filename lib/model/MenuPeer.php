<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for performing query and update operations on the 'menu' table.
 *
 * 
 *
 * @package lib.model
 */ 
class MenuPeer extends BaseMenuPeer
{
	static function getMenu($menu, $userId)
	{
		$c = new Criteria();
		$c->add(self::MENU_STRIP_NM, $menu);
		$c->add(self::USER_ID, $userId);
		return self::doSelectOne($c);
	}
	
	static function getUserMenu($userId)
	{
		$c = new Criteria();
		$c->add(self::USER_ID, $userId);
		$c->addDescendingOrderByColumn(self::CREATED_AT);
		return self::doSelect($c);
	}
}

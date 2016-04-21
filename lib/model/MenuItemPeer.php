<?php

/**
 * Subclass for performing query and update operations on the 'menu_item' table.
 *
 * 
 *
 * @package lib.model
 */ 
class MenuItemPeer extends BaseMenuItemPeer
{
	static function retrieveByMenu($id)
   {
     $c = new Criteria();
     $c->add(self::MENU_ID, $id);
     return self::doSelect($c);
   }
}

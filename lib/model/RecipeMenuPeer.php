<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for performing query and update operations on the 'recipe_menu' table.
 *
 * 
 *
 * @package lib.model
 */ 
class RecipeMenuPeer extends BaseRecipeMenuPeer
{
   static function retrieveByMenu($id)
   {
     $c = new Criteria();
     $c->add(self::MENU_ID, $id);
     return self::doSelect($c);
   }
}

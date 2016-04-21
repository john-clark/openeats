<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for representing a row from the 'menu' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Menu extends BaseMenu
{
  public function setMenuNm($v)
  {
   	parent::setMenuNm($v);
    $this->setMenuStripNm(myRecipeTitle::stripText($v));
  }
  
  public function getMenuRecipes()
  {
    return $this->getRecipeMenusJoinRecipe();
  }
}

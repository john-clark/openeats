<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'lib/model/om/BaseStoredRecipe.php';


/**
 * Skeleton subclass for representing a row from the 'stored_recipe' table.
 *
 *
 * @package model
 */	
class StoredRecipe extends BaseStoredRecipe {
  
  /**
   * Get the recipe object of a stored recipe
   *
   * @param $id of the recipe
   * @return recipe object
   */
	
	public function getStoredRecipeFor()
	{
		return RecipePeer::retrieveByPK($this->getRecipeId());
	}

}

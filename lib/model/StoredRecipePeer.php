<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

  // include base peer class
  require_once 'lib/model/om/BaseStoredRecipePeer.php';
  
  // include object class
  include_once 'lib/model/StoredRecipe.php';


/**
 * Skeleton subclass for performing query and update operations on the 'stored_recipe' table.
 *
 *
 * @package model
 */	
class StoredRecipePeer extends BaseStoredRecipePeer {

  public static function getRecipeNmByUser($userId)
  {
    $c = new Criteria();
    $c->add(self::USER_ID, $userId);
    $c->addJoin(self::RECIPE_ID, RecipePeer::RECIPE_ID);
    $recipes = RecipePeer::doSelect($c);
    
     if($recipes)
     {
	    $recipe_nm = array();
	    foreach($recipes as $recipe)
	    {
		   $recipe_nm[$recipe->getRecipeId()] = $recipe->getRecipeNm();
	    }
	    return $recipe_nm;
     } else
     {
	   return false;
     }	
  }

}

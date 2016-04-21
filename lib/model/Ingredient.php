<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'lib/model/om/BaseIngredient.php';


/**
 * Skeleton subclass for representing a row from the 'ingredient' table.
 *
 * 
 *
 * @package model
 */	
class Ingredient extends BaseIngredient {

  public function __toString()
  {
	 return $this->getIngrdNm();
  }
  
  public function getCountRecipe()
  {
     $c = new Criteria();
     $c->add(IngredientPeer::INGRD_ID, $this->getIngrdId());
     $c->addjoin(IngredientPeer::INGRD_ID, RecipeIngrdPeer::INGRD_ID);
     $c->addjoin(RecipeIngrdPeer::RECIPE_ID, RecipePeer::RECIPE_ID);
     return RecipePeer::doCount($c);
  }  
    
    
} 

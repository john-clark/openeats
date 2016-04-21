<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

  // include base peer class
  require_once 'lib/model/om/BaseIngredientPeer.php';
  
  // include object class
  include_once 'lib/model/Ingredient.php';


/**
 * Skeleton subclass for performing query and update operations on the 'ingredient' table.
 *
 *
 * @package model
 */	
class IngredientPeer extends BaseIngredientPeer {
/**
     * Add ingredients for logged in users
     *
     * @param int new value $n_newIng
     * @param  $userId id of user
     * @return unknown
     */
    
	 public static function addIngredientFor($n_newIng, $userId)
    {
     	  		 	
	 	$c = new Ingredient;
	 	$c->setIngrdNm($n_newIng);
	 	$c->setUserId($userId);
	 	$c->save();	 	
	 	return true;	 	
	 }
	
	public static function getIngByName($name)
	{
		$c = new Criteria();
		$c->add(IngredientPeer::INGRD_NM, $name);
		$ingr = IngredientPeer::doSelectOne($c);
		return $ingr;
	}
	 

	/**
	 * Get the value of [ingrd_nm] column for ingredient drop down.
	 *  
	 * @return array
	 */	
   public static function getInglist() 
   {
   	 $c = new Criteria();
	 $c->addAscendingOrderByColumn(IngredientPeer::INGRD_NM);
	 $select = IngredientPeer::doSelect($c);
     $ing_array = Array();
     foreach ($select as $ing) 
     {
    	$k = $ing->getIngrdId();
    	$v = $ing->getIngrdNm();
    	$ing_array[$k] = $v;
     }
    	return $ing_array;
    }	 

} 

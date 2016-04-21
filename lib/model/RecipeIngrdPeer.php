<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

  // include base peer class
  require_once 'lib/model/om/BaseRecipeIngrdPeer.php';
  
  // include object class
  include_once 'lib/model/RecipeIngrd.php';


/**
 * Skeleton subclass for performing query and update operations on the 'recipe_ingrd' table.
 *
  *
 * @package model
 */	
class RecipeIngrdPeer extends BaseRecipeIngrdPeer {

   public static function retrieveByRecipe($recipe_id, $con = null)
   {
      if ($con === null) {
	    $con = Propel::getConnection(self::DATABASE_NAME);
	}
	$criteria = new Criteria(RecipeIngrdPeer::DATABASE_NAME);
	$criteria->add(RecipeIngrdPeer::RECIPE_ID, $recipe_id);
	$v = RecipeIngrdPeer::doSelect($criteria, $con);
    return $v;		
   }
   
   public static function getPreplist($con = null)
   {
      if ($con === null) 
      {
        $con = Propel::getConnection(self::DATABASE_NAME);
      }
      $c = new Criteria();
      $c->addSelectColumn(RecipeIngrdPeer::INGRD_PREP);
      $c->addAscendingOrderByColumn(RecipeIngrdPeer::INGRD_PREP);
      $c->setDistinct();
      $rs = RecipeIngrdPeer::doSelectRS($c, $con);
      $preplist = array();
      while($rs->next()) {
        $preplist[] = $rs->getString(1);
      }
     return $preplist;
   }
 
   public static function getMsrmtlist($con = null)
   {
      if ($con === null) 
      {
        $con = Propel::getConnection(self::DATABASE_NAME);
      }
      $c = new Criteria();
      $c->addSelectColumn(RecipeIngrdPeer::INGRD_MSRMT);
      $c->addAscendingOrderByColumn(RecipeIngrdPeer::INGRD_MSRMT);
      $c->setDistinct();
      $rs = RecipeIngrdPeer::doSelectRS($c, $con);
      $preplist = array();
      while($rs->next()) {
        $preplist[] = $rs->getString(1);
      }
     return $preplist;
   }
}
<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

  // include base peer class
  require_once 'lib/model/om/BaseUserPeer.php';
  
  // include object class
  include_once 'lib/model/User.php';


/**
 * Skeleton subclass for performing query and update operations on the 'user' table.
 *
 *
 * @package model
 */	
class UserPeer extends BaseUserPeer {
 
	/**
	 * Get the logged in user
	 *
	 * @param unknown_type $login
	 * @return unknown
	 */
	public static function getUserFromLogin($login)
   {
 	  $c = new Criteria();
 	  $c->add(self::USER_LOGIN, $login);
 	  return self::doSelectOne($c);
 	
   }

   /**
    * Get the keywords a user has set
    *
    * @param  $user_id users primary id
    * @return users keywords
    */
   
   public static function getKeywordsForUser($user_id)
   {
   	$c = new Criteria;
   	$c->add(RecipeKeywordPeer::USER_ID, $user_id);
   	$c->addGroupByColumn(RecipeKeywordPeer::NORMALIZED_KEYWORD);
    $c->setDistinct();
    $c->addAscendingOrderByColumn(RecipeKeywordPeer::NORMALIZED_KEYWORD);
    $keywords = array();
    foreach (RecipeKeywordPeer::doSelect($c) as $keyword)
    {
    $keywords[] = $keyword->getNormalizedKeyword();
    }
 
  	return $keywords;
   
   }
  
} 

<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

  // include base peer class
  require_once 'lib/model/om/BaseRecipePeer.php';
  
  // include object class
  include_once 'lib/model/Recipe.php';


/**
 * Skeleton subclass for performing query and update operations on the 'recipe' table.
 *
 *
 * @package model
 */	
class RecipePeer extends BaseRecipePeer {
	
	/**
	 * Get the recipe from the strip title passed in links
	 *
	 * @param $title striped titled passed in links
	 * @return recipe object
	 */
	
	public static function getRecipeFromStripTitle($title)
	{
		$c = new Criteria;
        $c->add(RecipePeer::RECIPE_STRIP_NM, $title);
        return RecipePeer::doSelectOne($c);
	}
	
	public static function getRecipeFromName($name)
	{
	  $c = new Criteria();
	  $c->add(RecipePeer::RECIPE_NM, $name);
	  return RecipePeer::doSelectOne($c);
	}
	
	/**
	 * Retrive recipes with a giving keyword
	 *
	 * @param $keyword value keyword for recipe
	 * @return recipe objects with the $keyword assigned
	 */
	
	public static  function getRecipesByKeyword($keyword)
	{
		$c = new Criteria;
		$c->add(RecipeKeywordPeer::NORMALIZED_KEYWORD, $keyword);
		$c->addJoin(RecipeKeywordPeer::RECIPE_ID, RecipePeer::RECIPE_ID, Criteria::LEFT_JOIN);
		return RecipePeer::doSelectJoinAll($c);
	}
	
 public static function getLatestRecipe($amt=10)
 {
 	$c= new Criteria();
 	$c->addDescendingOrderByColumn(RecipePeer::CREATED_AT);
 	$c->setLimit($amt);
 	return RecipePeer::doSelect($c);
 }
 
 public static function getTopRecipe($amt=10)
 {
 	$c= new Criteria();
 	$c->addDescendingOrderByColumn(RecipePeer::AVERAGE_RATING);
 	$c->setLimit($amt);
 	return RecipePeer::doSelect($c);
 }

 public static function BrowseByRate()
 {
   	$c = new Criteria();
    $c->addDescendingOrderByColumn(self::AVERAGE_RATING);
    return self::doSelect($c);
 }

 public static function BrowseByName()
 {
   $c = new Criteria();	
   $c->addAscendingOrderByColumn(self::RECIPE_NM);
   return self::doSelect($c);
 }
 
 public static function getRecipesByBase($base)
 {
 	$c = new Criteria();
 	$c->add(RecipePeer::BASE, $base);
 	$c->addDescendingOrderByColumn(RecipePeer::AVERAGE_RATING);
 	return RecipePeer::doSelect($c);
 }
 
 public static function getReportCount()
 {
 	$c = new Criteria();
 	$c->add(self::NB_REPORT, 0, CRITERIA::GREATER_THAN);
 	
 	return self::doCount($c);
 }
 
 public static function getReportedRecipes()
 {
 	$c = new Criteria();
 	$c->add(self::NB_REPORT, 0, Criteria::GREATER_THAN);
 	$c->addDescendingOrderByColumn(self::NB_COMMENT);
 	$recipes = self::doSelectJoinUser($c);
 	return $recipes;
 }
 
 public static function getListByDate()
 {
   $c = new Criteria();
   $c->addDescendingOrderByColumn(RecipePeer::CREATED_AT);
   return RecipePeer::doSelect($c);	
 }	
 
 public static function getRecipesByCourse($course)
 {
   $c = new Criteria();
   $c->add(CoursePeer::COURSE_NM, $course);
   return CoursePeer::doSelectOne($c);	
 }  
 
	
} 

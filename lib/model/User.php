<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'lib/model/om/BaseUser.php';


/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 *
 * @package model
 */	
class User extends BaseUser {
	

   public function __toString()
   {
    	return $this->getUserLogin();
   }

/**
 * Set the password and salt, md5 encrypt it
 *
 * @param int $password new value
 */

	public function setUserPswd($v)
	{
		//set salt based off a random number, user login name, and email address
		$salt = md5(rand(100000, 999999).$this->getUserLogin().$this->getUserEmail());
        //set the salt in the database
		$this->setPswdSalt($salt);
        //set the password sha1 with a salt
		parent::setUserPswd(sha1($salt.$v));
   }

  
   /**
    * Get all the keywords for a recipe displayedon the show recipe page
    *
    * @param $recipe object
    * @param $max number of keywords to return
    * @return keywords for recipe
    */
   public function getKeywordsFor($recipe, $max = 10)
   {
    $keywords = array();

    $con = Propel::getConnection();
    $query = '
      SELECT %s AS keyword, %s AS raw_keyword, COUNT(%s) AS count
      FROM %s
      WHERE %s = ? AND %s = ?
      GROUP BY %s
      ORDER BY count DESC
    ';

    $query = sprintf($query,
      RecipeKeywordPeer::NORMALIZED_KEYWORD,
      RecipeKeywordPeer::NORMALIZED_KEYWORD,
      RecipeKeywordPeer::NORMALIZED_KEYWORD,
      RecipeKeywordPeer::TABLE_NAME,
      RecipeKeywordPeer::RECIPE_ID,
      RecipeKeywordPeer::USER_ID,
      RecipeKeywordPeer::NORMALIZED_KEYWORD
    );

    $stmt = $con->prepareStatement($query);
    $stmt->setInt(1, $recipe->getRecipeId());
    $stmt->setInt(2, $this->getUserId());
    $stmt->setLimit($max);
    $rs = $stmt->executeQuery();
    while ($rs->next())
    {
      $keywords[$rs->getString('keyword')] = $rs->getString('raw_keyword');
    }

    return $keywords;
  }

  /**
   * Remove your keywords from a recipe
   *
   * @param int $recipe object
   * @param $keyword normalized keyword
   */
  
  public function removeKeyword($recipe, $keyword)
  {
   //check to see if the ADMIN asked to remove the keyword and if it was remove that keyword for all users from the recipe
    if ($this->getIsAdministrator($this->getAuthLvlId()))
    {
       $c = new Criteria();
       $c->add(RecipeKeywordPeer::RECIPE_ID, $recipe->getRecipeId());
       $c->add(RecipeKeywordPeer::NORMALIZED_KEYWORD, $keyword);
       RecipeKeywordPeer::doDelete($c);
    }  
    else
    {
    
   //retrive the keyword do delete by user id recipe id and normalized keyword
  	$c = new Criteria();
    $c->add(RecipeKeywordPeer::RECIPE_ID, $recipe->getRecipeId());
    $c->add(RecipeKeywordPeer::USER_ID, $this->getUserId());
    $c->add(RecipeKeywordPeer::NORMALIZED_KEYWORD, $keyword);
    RecipeKeywordPeer::doDelete($c);
  }
 } 
  /**
   * Check to see if the user is an adminstrator for various task
   *
   * @param $authlvl authlvl of the user logged in
   * @return true or false
   */
  
  public function getIsAdministrator($authlvl)
  {
  	$lvl = AuthLvlPeer::retrieveByPK($authlvl);
  	if ($lvl->getAuthLvlNm() == "administrator")
  	{
  		return true;
  	}
  	else
  	{
  		return false;
  	}
  }

   public function getIsModerator($authlvl)
  {
  	$lvl = AuthLvlPeer::retrieveByPK($authlvl);
  	if ($lvl->getAuthLvlNm() == "moderator")
  	{
  		return true;
  	}
  	else
  	{
  		return false;
  	}
  }
  
  public function getRecipesLimit($amt)
  {
     $c = new Criteria();
     $c->add(RecipePeer::USER_ID, $this->getUserId());
     $c->addDescendingOrderByColumn(RecipePeer::CREATED_AT);
 	 $c->setLimit($amt);
     return RecipePeer::doSelect($c);     	
  }

  public function getStoredRecipesLimit($amt)
  {
	$c = new Criteria();
	$c->add(StoredRecipePeer::USER_ID, $this->getUserId());
	//$c->addJoin(StoredRecipePeer::RECIPE_ID, RecipePeer::RECIPE_ID);
	$c->setLimit($amt);
	return StoredRecipePeer::doSelect($c);
  }

  public function getRecentCommentsLimit($amt)
  {
    $c = new Criteria();
    $c->add(RecipeCommentPeer::USER_ID, $this->getUserId());
    $c->addDescendingOrderByColumn(RecipeCommentPeer::CREATED_AT);
    $c->setLimit($amt);
    return RecipeCommentPeer::doSelect($c);	
  }

  public function getRecentRatingsLimit($amt)
  {
    $c = new Criteria();
    $c->add(RatePeer::USER_ID, $this->getUserId());
   	$c->addDescendingOrderByColumn(RatePeer::CREATED_AT);
    $c->setLimit($amt);
    return RatePeer::doSelect($c);
  }

 public function getCountRecipes()
 {
   $c = new Criteria();
   $c->add(UserPeer::USER_ID, $this->getUserId());
   $c->addjoin(UserPeer::USER_ID, RecipePeer::USER_ID);
   return RecipePeer::doCount($c);	
 }
} 

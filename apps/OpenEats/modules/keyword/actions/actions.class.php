<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * keyword actions.
 *
 * @package    openeats
 * @subpackage keyword
 * @author     Quenten Griffith
 */

class keywordActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  	$this->keywords = RecipeKeywordPeer::getKeywordsWithCount();
  }
  
  /**
   * Get the recipes associated to a keyword passed in a link
   *
   */
  public function executeShow()
  {
  $this->keywords = explode(' ', $this->getRequestParameter('keyword'));
    foreach ($this->keywords as $keyword):
      $this->recipes = RecipePeer::getRecipesByKeyword($keyword);
    endforeach;  
	$this->associated_keywords=RecipeKeywordPeer::getAssiocatedKeywords($this->recipes, $this->keywords);
	$this->getRequest()->setAttribute('associated_keywords', $this->associated_keywords);
	$this->getRequest()->setAttribute('keywords', $this->keywords);
	$this->getResponse()->setTitle('OpenEats Keywords '. implode(' ', $this->keywords));
  }
  
 /**
  * Keyword autocomplete, check the database of keywords for auto completion
  *
  */ 
  public function executeAutocomplete()
 {
  $this->keywords = RecipeKeywordPeer::getAutoComlete($this->getRequestParameter('keyword'));  
 }
 
 /**
  * Add a new keyword to a recipe
  *
  */
 public function executeAdd()
 {
  //check that the recipe having a keyword added to is a true recipe
  $this->recipe = RecipePeer::retrieveByPk($this->getRequestParameter('recipe_id'));
  $this->forward404Unless($this->recipe);
  
  /*get the user id of the user adding the keyword and pass the keyword and user id 
  to the addKeywordForuser aciton*/
  $userId = $this->getUser()->getSubscriberId();
  $keyword = $this->getRequestParameter('keyword');
  $this->recipe->addKeywordsForUser($keyword, $userId);
 
  $this->keywords = $this->recipe->getKeywords();
  mySearchIndex::ReIndex($this->recipe->getRecipeId());
 }
 
 /**
  * Remove a keyword from a recipe
  */
 public function executeRemove()
 {
    
    $this->recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
    $this->forward404Unless($this->recipe);

    // remove keyword for this user and recipe
    $user = $this->getUser()->getSubscriber();
    $keyword  = $this->getRequestParameter('keyword');

    $user->removeKeyword($this->recipe, $keyword);

    $this->keywords = $this->recipe->getKeywords();
    mySearchIndex::ReIndex($this->recipe->getRecipeId());
      
  }

  public function executePopular()
  {
  	 $this->keywords = RecipeKeywordPeer::getPopularKeywords();
  }
}
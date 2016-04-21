<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'lib/model/om/BaseRecipe.php';


/**
 * Skeleton subclass for representing a row from the 'recipe' table.
 *
 *
 * @package model
 */	
class Recipe extends BaseRecipe {
		
   
    /**
	 * Set the value of [ingrd_id] column and [recipe_id] column for recipe_ingrd.
	 *  
	 * @return void
	 */	 
  public function getIngrds($c = null)
   {
       if($c === null)
       {
	       $c = new Criteria();
        }
        elseif($c instanceof Criteria)
        {
	       $c = clone $c;
	     }
	    $c->addAscendingOrderByColumn(RecipeIngrdPeer::INGRD_SEQ);
        return $this->getRecipeIngrdsJoinIngredient($c);
   } 
 
  public function setIngr($ingr, $recipe_id, $quantity, $msrmt, $prep) 
   {
    	$exists = RecipeIngrdPeer::retrieveByRecipe($this->getRecipeId());    	
    	if ($exists) {
    		foreach($exists as $remove) {
    			$remove->delete();
    		}
    	}

    	/*Take the key of the ing array and set the msrmt, qty, and prep for each
    	ingredient based on the key of the ing array*/    	
      $ingrd_seq = 0;
    	foreach($ingr as $ingk=>$ing) {
    		if ($ing) :
    		$ingrRecipe = new RecipeIngrd();
    	    $ingrRecipe->setIngrdSeq($ingrd_seq++);
    	    $ingrRecipe->setRecipeId($recipe_id);
    	    $ingrRecipe->setIngrdId($ing);
    	    $ingrRecipe->setIngrdMsrmt($msrmt[$ingk]);
    	    $ingrRecipe->setIngrdQty($quantity[$ingk]);
    	    $ingrRecipe->setIngrdPrep(myIng::normalize($prep[$ingk]));
    	    $ingrRecipe->save();
    	    endif;
    	}
    }
  
    
 /**
  * Overide the setRecipeNam function to set the normalized recipe name
  *
  * @param int new value $v
  */
  public function setRecipeNm($v)
  {
   	parent::setRecipeNm($v);
    $this->setRecipeStripNm(myRecipeTitle::stripText($v));
  } 
  
  /**
   * Get keywords for recipe object
   *
   * @return array of keywords for recipe object
   */
  
  public function getKeywords()
  {
  	$c = new Criteria;
  	$c->add(RecipeKeywordPeer::RECIPE_ID, $this->getRecipeId());
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

  /**
   * Add keywords set by a user on a recipe object
   *
   * @param int new value $keyword
   * @param $userId ID of user
   */
  
   public function addKeywordsForUser($keyword, $userId)
 {
  
  // add keywords
    
    if(!empty($keyword))
    {
    	$keywords = myKeyword::splitPhrase($keyword);
		
		foreach($keywords as $keyword):
		$recipeKeyword = new RecipeKeyword();
        $recipeKeyword->setRecipeId($this->getRecipeId());
        $recipeKeyword->setUserId($userId);
        $recipeKeyword->setKeyword($keyword);
    
        try 
        {
    	  $recipeKeyword->save();
        }
        catch (PropelException $e)
        {
         // duplicate keyword for this user and recipe
        }
		endforeach;
    }
    
  
 }

 /**
  * Overide the getRecipeCooktime to sperate the minutes and hours of a recipes time to be displayed later to set the
  * indivdual time elements in edit recipe
  *
  * @return array of hours and minutes for time
  */
 
public function __toString()
{
	 return $this->getRecipeNm();
}

 public function getRecipeCookTime()
 {
 	$time = $this->getRecipeCookTm();
 	if(!$time): $time = "0:00"; endif;
 	$time = explode(':', $time);
 	return $time;
 }

 public function deleteReport()
 {
 	$reports = $this->getRecipeReports();
 	foreach ($reports as $report)
 	{
 		$report->delete();
 	}
 	$this->setNbReport(0);
 }
 
 public function deleteRecipe($moderator)
 {
 	$this->delete();

	 $log = 'moderator "%s" deleted recipe "%s"';
     $log = sprintf($log, $moderator->getUserLogin(), $this->getRecipeNm());
     sfContext::getInstance()->getLogger()->err($log);
  }
  public function getRecipeSuggestions($criteria = null, $con = null )
  {
   $criteria = new criteria();
   $criteria->addDescendingOrderByColumn(RecipeSuggestionPeer::NB_RATE);

   return parent::getRecipeSuggestions($criteria, $con);
  }
 

} 

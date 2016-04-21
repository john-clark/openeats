<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * suggestion actions.
 *
 * @package    openeats
 * @subpackage suggestion
 * @author     Quenten Griffith
*/

class suggestionActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeAdd()
  {
    if($this->getRequestParameter('suggestion_body'))
    {
	  $suggestion = new RecipeSuggestion();
	  $suggestion->setRecipeId($this->getRequestParameter('recipe_id'));
	  $suggestion->setUserId($this->getUser()->getSubscriberId());
	  $suggestion->setSuggestion($this->getRequestParameter('suggestion_body'));
	  $suggestion->save();
	
   	 $this->suggestion = $suggestion;
	 $this->nb_suggestion = $this->getRequestParameter('nb_suggestion'); 
    }
   	else
	{
	  return sfView::NONE;
	}
  }
  public function executeDelete()
  {
     $suggestion = RecipeSuggestionPeer::retrieveByPk($this->getRequestParameter('id'));
     $this->forward404Unless($suggestion);
     $recipe = $suggestion->getRecipe();
     $suggestion->delete();
    
    $nb_suggestion = $recipe->getNbSuggestion() - 1;
    $recipe->setNbSuggestion($nb_suggestion);
    $recipe->save();

    $this->redirect('recipe/show?recipestripnm='.$recipe->getRecipeStripNm());
     	
  }
 
}

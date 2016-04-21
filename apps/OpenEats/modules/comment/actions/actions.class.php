<?php

/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * comment actions.
 * Currently only used to add comments to recipes but may be extended at some point
 * @package    openeats
 * @subpackage comment
 * @author     Quenten Griffith
 * 
 */
class commentActions extends sfActions
{

  public function executeAdd()
  {
    if($this->getRequestParameter('comment_body'))
		{
			$comment = new RecipeComment();
			$comment->setRecipeId($this->getRequestParameter('recipe_id'));
			$comment->setUserId($this->getUser()->getSubscriberId());
			$comment->setComment($this->getRequestParameter('comment_body'));
			$comment->save();
			
			$this->comment = $comment;
			$this->nb_comment = $this->getRequestParameter('nb_comment');
		}
		else
		{
			return sfView::NONE;
		}
		
  }
  
  public function executeDelete()
  {
  
    $comment = RecipeCommentPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($comment);

    $recipe = $comment->getRecipe();

    $comment->delete();
    
    $nb_comment = $recipe->getNbComment() - 1;
    $recipe->setNbComment($nb_comment);
    $recipe->save();

    $this->redirect('recipe/show?recipestripnm='.$recipe->getRecipeStripNm());
  }

}

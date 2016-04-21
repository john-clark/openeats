<?php

/**
 * recipe_adm actions.
 *
 * @package    openeats
 * @subpackage recipe_adm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class recipe_admActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('recipe_adm', 'list');
  }

  public function executeList()
  {
    $c = new Criteria();
    if($this->getRequestParameter('sort')):
      $c->addAscendingOrderByColumn(RecipePeer::$this->getRequestParameter('sort'));
    else:
      $c->addAscendingOrderByColumn(RecipePeer::RECIPE_NM);
   endif;
    
    $pager = new sfPropelPager('Recipe', 10);
    $pager->setCriteria($c);
    $pager->setPage($this->getRequestParameter('page', 1));
    $pager->init();
    $this->pager = $pager;	
  }

  public function executeDelete()
  {
  	$recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
  	$this->forward404Unless($recipe);
  	$recipe->deleteRecipe($this->getUser()->getSubscriber());
  	mySearchIndex::deleteIndexDocument($recipe->getRecipeId());
    $this->setFlash('notice', "Recipe Deleted!");
  	$this->redirect('recipe_adm/list');
  } 
}

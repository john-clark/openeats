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
 * @subpackage admin
 * @author     Quenten Griffith
 * 
 */
class adminActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    
  }

  public function executeClearCache()
  {
    sfToolkit::ClearDirectory(sfConfig::get('sf_root_dir'). '/cache/');
    $this->setFlash('notice', "Cache Cleared!");
    $this->redirect('admin/index');	
  }

  public function executeReportedRecipes()
  {
  	$this->recipes = RecipePeer::getReportedRecipes();
  }

  public function executeResetRecipeReport()
  {
  	$recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
  	$this->forward404Unless($recipe);
  	$recipe->deleteReport();
  	$recipe->save();
  	$this->redirect($this->getRequest()->getReferer());

  }

  public function executeDeleteRecipe()
  {
  	$recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
  	$this->forward404Unless($recipe);
  	$recipe->deleteRecipe($this->getUser()->getSubscriber());
  	mySearchIndex::deleteIndexDocument($recipe->getRecipeId());
    $this->setFlash('notice', "Recipe Deleted!");
  	$this->redirect('recipe/list');
  }

  public function executeBuildIndex()
  {
  	mySearchIndex::BuildIndex();
    $this->setFlash('notice', "Index Re-created!");
    $this->redirect('admin/index');
  }   
 
}

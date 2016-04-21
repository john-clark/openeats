<?php

/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * ingrd_adm actions.
 *
 * @package    openeats
 * @subpackage ingrd_adm
 * @author     Quenten Griffith
 */
class ingrd_admActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('ingrd_adm', 'list');
  }
 
  public function executeList()
  {
    $c = new Criteria();
    if($this->getRequestParameter('sort')):
      $c->addAscendingOrderByColumn(IngredientPeer::$this->getRequestParameter('sort'));
    else:
      $c->addAscendingOrderByColumn(IngredientPeer::INGRD_NM);
   endif;
    $pager = new sfPropelPager('Ingredient', 20);
    $pager->setCriteria($c);
    $pager->setPage($this->getRequestParameter('page', 1));
    $pager->init();
    $this->pager = $pager;
  }

  public function executeEdit()
  {
	 $this->ingrd = IngredientPeer::getIngByName($this->getRequestParameter('ingrd_nm'));
	 $this->forward404Unless($this->ingrd);
	 $users = UserPeer::doSelect(new Criteria());
	 $this->users = array();
	 foreach($users as $user)
	{
		$this->users[$user->getUserId()]=$user->getUserLogin();
	}
  }

  public function executeUpdate()
  {
	
	  $ingrd = $this->getRequestParameter('ingrd'); 
     # check to see if you are trying to save a ingredient with the same name as another
     $exists = IngredientPeer::getIngByName($ingrd);
     if($exists):
       if($exists->getIngrdId() != $this->getRequestParameter('ingrd_id'))
       {
	      $this->setFlash('error', "Ingredient Name $ingrd in use can't save");
	      $this->redirect('ingrd_adm');
	      exit;
       }
     endif;
   
  	$n_ingrd = myIng::normalize($ingrd);
    //$user = UserPeer::getUserFromLogin($this->getRequestParameter('user'));
    $user = $this->getRequestParameter('user_nm');
    $new_ingrd = IngredientPeer::retrieveByPk($this->getRequestParameter('ingrd_id'));	
    if($user):
      $new_ingrd->setUserId($user);
    endif;
    $new_ingrd->setIngrdNm($n_ingrd);
    $new_ingrd->save();    
   
    //set the message that the ingredient was added
    $this->setFlash('notice', "Ingredient Updated!");
    $this->redirect('ingrd_adm'); 
  }

  public function executeDelete()
  {
    $ingrd = IngredientPeer::retrieveByPk($this->getRequestParameter('id'));
    $ingrd->delete();
    $this->setFlash('notice', "Ingredient Removed");
    $this->redirect('ingrd_adm'); 	
  }

  public function handleErrorUpdate()
  {  
  	$this->forward('ingrd_adm', 'edit');
  }

  public function executeShowRecipes()
  {
    $this->ingrd = IngredientPeer::getIngByName($this->getRequestParameter('ingrd_nm'));
    $this->recipes = $this->ingrd->getRecipeIngrdsJoinRecipe();	
  }

}

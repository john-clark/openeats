<?php

/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * user_adm actions.
 *
 * @package    openeats
 * @subpackage user_adm
 * @author     Quenten Griffith
 */
class user_admActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('user_adm', 'list');
  }

  public function executeList()
  {
    $c = new Criteria();
    if($this->getRequestParameter('sort')):
      $c->addAscendingOrderByColumn(UserPeer::$this->getRequestParameter('sort'));
    else:
       $c->addAscendingOrderByColumn(UserPeer::USER_LOGIN);
   endif;
   
    $pager = new sfPropelPager('User', 10);
    $pager->setCriteria($c);
    $pager->setPage($this->getRequestParameter('page', 1));
    $pager->init();
    $this->pager = $pager;
   }

  public function executeEdit()
  {
    $this->user = UserPeer::getUserFromLogin($this->getRequestParameter('user'));
    $this->forward404Unless($this->user);
  }

  public function executeUpdate()
  {
    $user = UserPeer::getUserFromLogin($this->getRequestParameter('user'));
    $this->forward404Unless($user);
    $user->setUserFn($this->getRequestParameter('user_fn'));
    $user->setUserLn($this->getRequestParameter('userln'));
    $user->setUserLogin($this->getRequestParameter('user_login'));
    $user->setUserEmail($this->getRequestParameter('user_email'));
    $user->setUserAbout($this->getRequestParameter('user_about'));
    if($this->getRequestParameter('pass')):
  	  $user->setUserPswd($this->getRequestParameter('pass'));
    endif;
    $user->save();
    $this->setFlash('notice', "User Updated!");
    $this->redirect('user_adm/list');
  }

  public function executeDelete()
  {
    $user = UserPeer::retrieveByPk($this->getRequestParameter('user_id'));
    
    #get all the users recipes and change the owner to the first admin we find
    $c = new Criteria();
    $c->add(AuthLvlPeer::AUTH_LVL_NM, 'administrator');
    $c->addjoin(AuthLvlPeer::AUTH_LVL_ID, UserPeer::AUTH_LVL_ID);
    $c->setlimit(1);
    $admin = UserPeer::doSelectOne($c);
   foreach($user->getRecipes() as $recipe):
      $recipe->setUserId($admin->getUserId());
      $recipe->save();
    endforeach;

    #get allthe users ingredients and change the owner to null
    foreach($user->getIngredients() as $ing):
      $ing->setUserId();
      $ing->save();
    endforeach;
    $user->delete();
    $this->setFlash('notice', "User Deleted!");
    $this->redirect('user_adm/list');	
  }

  public function handleErrorUpdate()
  {  
  	$this->forward('user_adm', 'edit');
  }
  public function executeShowRecipes()
  {
    $this->user = UserPeer::getUserFromLogin($this->getRequestParameter('user'));
    $this->recipes = $this->user->getRecipes();	
  }
}

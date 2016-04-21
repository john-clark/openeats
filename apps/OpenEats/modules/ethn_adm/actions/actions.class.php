<?php

/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * ethnticity actions.
 * Currently only used to add comments to recipes but may be extended at some point
 * @package    openeats
 * @subpackage ethn_admin
 * @author     Quenten Griffith
 * 
 */
class ethn_admActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('ethn_adm', 'list');
  }

  public function executeList()
  {
    $c = new Criteria();
    if($this->getRequestParameter('sort')):
      $c->addAscendingOrderByColumn(EthnicityPeer::$this->getRequestParameter('sort'));
    else:
      $c->addAscendingOrderByColumn(EthnicityPeer::ETHNICITY_NM);
   endif;
    $pager = new sfPropelPager('Ethnicity', 10);
    $pager->setCriteria($c);
    $pager->setPage($this->getRequestParameter('page', 1));
    $pager->init();
    $this->pager = $pager;	
  }

  public function executeEdit()
  {
    if($this->getRequestParameter('ethn_nm'))
    {
      $this->ethn = EthnicityPeer::getEthnByName($this->getRequestParameter('ethn_nm'));
    }
	else
	{
	  $this->ethn = new Ethnicity();
	}  
    $this->forward404Unless($this->ethn);
  }

  public function executeUpdate()
  {
    $ethn_nm = $this->getRequestParameter('ethn');
    # check to see if you are trying to save a ethn with the same name as another
     $exists = EthnicityPeer::getEthnByName($ethn_nm);
     if($exists):
       if($exists->getEthnicityId() != $this->getRequestParameter('ethnicity_id'))
       {
	      $this->setFlash('error', "Ethnicity Name $ethn_nm in use can't save");
	      $this->redirect('ethn_adm');
	      exit;
       }
     endif;

    if($this->getRequestParameter('ethnicity_id'))
    {
      //get the orignal name of the ethn prior to the chagne so that the object will upate the old ethn with the new name
      $ethn = EthnicityPeer::retrieveByPk($this->getRequestParameter('ethnicity_id'));
    }
    else
    {
	  $ethn = new Ethnicity();
    }
    $ethn->setEthnicityNm($ethn_nm);
    $ethn->save();
    $this->setFlash('notice', "Ethnicity Updated!");
    $this->redirect('ethn_adm');	
  }

  public function executeDelete()
  {
	$ethn = EthnicityPeer::retrieveByPk($this->getRequestParameter('ethn_id'));
	$this->forward404Unless($ethn);
	//don't delete the ethn if a recipe has it in use
	$count = $ethn->countRecipes();
	if($count > 0)
	{
		$this->setFlash('error', "Can't remove Ethnicity because $count recipes are using the Ethnicity");
		$this->redirect('ethn_adm');
	}
	else
	{
		$ethn->delete();
		$this->setFlash('notice', 'Ethnicity removed!');
		$this->redirect('ethn_adm');
	}
  }

  public function executeShowRecipes()
  {
    $this->ethn = EthnicityPeer::getEthnByName($this->getRequestParameter('ethn_nm'));
    $this->forward404Unless($this->ethn);
    $this->recipes = $this->ethn->getRecipes();
  }
  public function handleErrorUpdate()
  {  
  	$this->forward('ethn_adm', 'edit');
  }
  
}

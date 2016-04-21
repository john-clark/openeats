<?php

/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class sidebarComponents extends sfComponents
{
  public function executeDefault()
  {
  }

  public function executeRecipe()
  {
    $this->recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
  }

  public function executeFrontpage()
  {
  	$c = new Criteria();
    $c->add(HeadlinePeer::HEADLINE_TYPE, 'headline');
	$c->addDescendingOrderByColumn(HeadlinePeer::CREATED_AT);
	$c->setLimit('5');
	$this->headlines = HeadlinePeer::doSelect($c);
  }
  
  public function executeBrowse()
  {
  $this->courses = CoursePeer::doSelect(new Criteria());
  $this->ethnicities = EthnicityPeer::doSelect(new Criteria());
  }
  
  public function executeListReleated()
  {
   	$this->associated_keywords = $this->getRequest()->getAttribute('associated_keywords');
    $this->keywords = $this->getRequest()->getAttribute('keywords');
  }
}
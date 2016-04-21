<?php

/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * frontpage actions.
 *
 * @package    openeats
 * @subpackage frontpage
 * @author     Quenten Griffith
 */
class frontpageActions extends sfActions
{
  /**
   * Executes index action that displays the recipes and the text on the front page
   *
   */
  public function executeIndex()
  {
	  //get the front page text from the headline table 
	  $this->headline =  HeadlinePeer::getHeadlineFromType('frontpage');
      //get the six most recent recipes to show on the front page
      $this->recipes = RecipePeer::getLatestRecipe($amt=6);
   }
  
  /**
   * Executes update action to update the about page, FAQ, and the text on the front page
   *
   */
  public function executeUpdate()
  {
    $headline = HeadlinePeer::retrieveByPk($this->getRequestParameter('headline_id'));
    $type = $this->getRequestParameter('headline_type');
    
     if ($this->getRequest()->getMethod() != sfRequest::POST)
    {
      //display the form
      $this->headline = $headline;
      $this->forward404Unless($this->headline);
    } else
    {
	   //save the form
	   $this->forward404Unless($headline);
	   $headline->setHeadlineId($this->getRequestParameter('headline_id'));
       $headline->setHeadlineTitle($this->getRequestParameter('headline_title'));
       $headline->setHeadlineBody($this->getRequestParameter('headline_body'));
	   $headline->setHeadlineType($type);
	
	  $headline->save();

      return $this->redirect('frontpage/index');
    }	
  }
 
 /**
   * Executes about action to get the about text from the headline database
   *
  */
  public function executeAbout()
  {
    $this->headline =  HeadlinePeer::getHeadlineFromType('about');
  }
  /**
   * Executes Disclaimer action
   * 
   */
  public function executeDisclaimer()
  {
   $this->headline =  HeadlinePeer::getHeadlineFromType('disclaimer');
   $this->setTemplate('about');
  }

  /**
   * Executes FAQ action to get the FAQ text from the headline database
   * 
  */ 
  public function executeFaq()
  {
    $this->headline =  HeadlinePeer::getHeadlineFromType('faq');
   $this->setTemplate('about');
  }


}

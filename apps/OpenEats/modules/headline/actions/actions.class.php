<?php

/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * headline actions.
 *
 * @package    openeats
 * @subpackage headline
 * @author     Quenten Griffith
 */

class headlineActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('headline', 'list');
  }
/**
 * List action to list all the headlines ordered by [CREATED_AT]
*/
  public function executeList()
  {
   	$this->headlines = HeadlinePeer::getHeadline();
    $this->forward404Unless($this->headlines);
  }

  /**
   * Show action to retrieve the headline object based off of the strip title used in links
   *
   */
  public function executeShow()
  {
    $this->headline = HeadlinePeer::getHeadlineFromStripTitle($this->getRequestParameter('headlinestriptitle'));
    $this->forward404Unless($this->headline);
  }

  /**
   * Create action to create a new headline
   *
   */
  public function executeCreate()
  {
    $this->headline = new Headline();

    $this->setTemplate('edit');
  }

  /**
   * Edit action called by the edit link to retrieve a headline based off os strip title
   *
   */
  public function executeEdit()
  {
    $this->headline = HeadlinePeer::getHeadlineFromStripTitle($this->getRequestParameter('headlinestriptitle'));
    $this->forward404Unless($this->headline);
  }

  /**
   * Update Action used to save or edit recipes
   *
   * @return redirect to the show action of the recipe you just updated/created
   */
  
  public function executeUpdate()
  {
    if (!$this->getRequestParameter('headline_strip_title', 0))
    {
      $headline = new Headline();
    }
    else
    {
      $headline= HeadlinePeer::getHeadlineFromStripTitle($this->getRequestParameter('headline_strip_title'));
      $this->forward404Unless($headline);
    }

    $headline->setHeadlineId($this->getRequestParameter('headline_id'));
    $headline->setHeadlineTitle($this->getRequestParameter('headline_title'));
    $headline->setHeadlineIntro($this->getRequestParameter('headline_intro'));
	$headline->setHeadlineBody($this->getRequestParameter('headline_body'));
	$headline->setHeadlineType('headline');

    $headline->save();

    return $this->redirect('@get_headline?headlinestriptitle='.$headline->getHeadlineStripTitle());
  }

  /**
   * Delete a headline
   *
   * @return redirect to the list action
   */
  public function executeDelete()
  {
    $headline = HeadlinePeer::retrieveByPk($this->getRequestParameter('headline_id'));

    $this->forward404Unless($headline);

    $headline->delete();

    return $this->redirect('headline/list');
  }
}

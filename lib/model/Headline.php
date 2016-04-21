<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'lib/model/om/BaseHeadline.php';


/**
 * Skeleton subclass for representing a row from the 'headline' table.
 *
 *
 * @package model
 */	
class Headline extends BaseHeadline {
   
	/**
	 * Overide the setHeadlineTitle function to save a normalized title
	 *
	 * @param int $v new value
	 */
	
	public function setHeadlineTitle($v)
    {
      //Call the regular SetHeadleinTitle to save the title as the user typed it
      parent::setHeadlineTitle($v);
 
      //Call the stripText function to save a normalized title
      $this->setHeadlineStripTitle(myHeadlineTitle::stripText($v));
    }
  
} 

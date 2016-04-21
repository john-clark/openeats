<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * errors actions.
 * Custom Error module to replace the symfony errors
 * @package    openeats
 * @subpackage errors
 * @author     Quenten Griffith
 */
class errorsActions extends sfActions
{
  
  public function preExecute()
  {
	//set the errors css file for all the functions 
	$this->getResponse()->addStylesheet('/css/errors.css', 'last');
  }

  public function executeError404()
  {	
  }
  public function executeLogin()
  {
  }
  public function executeSecure()
 {
 }
 public function executeDisabled()
 {
 }
 public function executeUnavailable()
 {
 }	
 
}

<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * mail actions.
 *
 * @package    openeats
 * @subpackage mail
 * @author     Quenten Griffith
 */
class mailActions extends sfActions
{
  
  public function executeSendPassword() 
  {
  	$mail = new sfMail();
  	$mail->addAddress($this->getRequest()->getAttribute('email'));
  	$mail->setFrom('OpenEats <admin@openeats.org>');
  	$mail->setSubject('OpenEats Password');
  	
  	$mail->setPriority(1);
  	
  	$this->mail = $mail;
  	$this->login = $this->getRequest()->getAttribute('login');
  	$this->password = $this->getRequest()->getAttribute('password');
  	
  }
  public function executeSendRecipe()
  {
  	$mail = new sfMail();
  	$mail->setContentType('text/html');
    $mail->addAddress($this->getRequest()->getAttribute('email'));
  	$mail->setFrom($this->getUser()->getSubscriber()->getUserEmail());
  	$mail->setSubject('Recipe from OpenEats');
  	$mail->setPriority(1);
  	
  	$this->mail = $mail;
  	$this->message = $this->getRequest()->getAttribute('message');
  	$this->recipestripnm = $this->getRequest()->getAttribute('recipe_strip_nm');
	$this->recipedesc = $this->getRequest()->getAttribute('recipe_desc');
	$this->recipetitle = $this->getRequest()->getAttribute('recipe_nm');
  }
  public function executeSendList()
  {
     $mail = new sfMail();
     $mail->setContentType('text/html');
     $mail->addAddress($this->getRequest()->getAttribute('email'));
     $mail->setFrom($this->getUser()->getSubscriber()->getUserEmail());
     $mail->setSubject($this->getUser()->getSubscriber()->getUserFn(). ' '. $this->getUser()->getSubscriber()->getUserLn().' Grocery List from OpenEats');
    
     $this->mail = $mail;
     $this->list = GrocerylistPeer::getList($this->getRequest()->getAttribute('liststripnm'), $this->getUser()->getSubscriberId());
     $this->items =  $this->list->getGroceryItems();
     $this->_aisles();
  }
 private function _aisles()
  {

   //get all the item aisles remove dupes and sort them
	$aisle_list = array();
     foreach($this->items as $item)
     {
	   if($item->getGroceryAisle()):
    	   $aisle_list[] = $item->getGroceryAisle()->getAisle();
       else:
          $aisle_list[] = 'Other';
       endif;
     }	
      $this->aisle_list = array_unique($aisle_list);
      sort($this->aisle_list);  	
  }
}
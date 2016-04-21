<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Ingredient actions.
 *
 * @package    openeats
 * @subpackage Ingredient
 * @author     Quenten Griffith
 */
class ingredientActions extends sfActions
{
 
  public function executeAdd()
  {
  	//if an ingredient is added succesfully a message will be passed here to be displayed
    $this->msg = $this->getRequestParameter('msg');
  }
  
  public function executeUpdate()
  {
  	$this->newIng = $this->getRequestParameter('add_ing');
  	$n_newIng = myIng::normalize($this->newIng);
  	$userId = $this->getUser()->getSubscriberId();
  	IngredientPeer::addIngredientFor($n_newIng, $userId);
    //set the message that the ingredient was added
    $this->redirect('ingredient/Add?msg=Added '. $n_newIng);
  }
  
  public function handleErrorUpdate()
  {  
  	$this->forward('ingredient', 'Add');
  }
}

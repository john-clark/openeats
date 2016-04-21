<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * note actions.
 *
 * @package    openeats
 * @subpackage note
 * @author     Quenten Griffith
 */

class noteActions extends sfActions
{
  public function executeAdd()
  {
        //check to see the value isn't blank if it is put a default text in the value or the user will not be able to edit in
       // place with out an text to display
        if(strlen($this->getRequestParameter('value')) > 0)
        { 
          $this->note = $this->getRequestParameter('value');
        }
        else
        {
	       $this->note = "Click me to add a note";
	    } 
         $this->recipe_id = $this->getRequestParameter('recipe_id');
         
         if(UserRecipeNotePeer::retrieveByPk($this->getUser()->getSubscriberId(), $this->recipe_id))
         {
	        $this->recipe_note = UserRecipeNotePeer::retrieveByPk($this->getUser()->getSubscriberId(), $this->recipe_id);
	        
	     }
	     else
	     {
           $this->recipe_note = new UserRecipeNote();
	     } 
	     
	     $this->recipe_note->setUserId($this->getUser()->getSubscriberId());
	     $this->recipe_note->setRecipeId($this->recipe_id);
	     $this->recipe_note->setRecipeNote($this->note);
	     $this->recipe_note->save();
	    
	     //now check and see if the user has the recipe stored in their recipe_box if not add it
	     if(!StoredRecipePeer::retrieveByPK($this->getUser()->getSubscriberId(), $this->getRequestParameter('recipe_id')))
	    {
		   $stored = new StoredRecipe();
		   $stored->setUserId($this->getUser()->getSubscriberId());
		   $stored->setRecipeId($this->getRequestParameter('recipe_id'));
		   $stored->save();   
	    }	
     
  }
}

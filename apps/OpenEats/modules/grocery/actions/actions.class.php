<?php

/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * grocery actions.
 *
 * @package    openeats
 * @subpackage grocery
 * @author     Quenten Griffith
 */
class groceryActions extends sfActions
{
  /**
   * Executes index action that forwards you on to the grocery list action
   *
   */
  public function executeIndex()
  {
    $this->forward('grocery', 'list');
  }

  /**
   * Executes list action that displays all a users grocery list they have created
   *
   */
  public function executeList()
  {
    $this->lists = GrocerylistPeer::getUserList($this->getUser()->getSubscriberId());
    $this->getResponse()->setTitle($this->getUser()->getLogin(). ' Grocery List');
  }
  
  /**
   * Executes the show action that shows a users grocery list
   *
   */
  public function executeShow()
  {
     $this->list = GrocerylistPeer::getList($this->getRequestParameter('grocery_strip_nm'), $this->getUser()->getSubscriberId());
     $this->items = $this->list->getGroceryItems();
     $this->_aisles();
     $this->getResponse()->setTitle('Grocery List ' . $this->list->getGroceryNm());
  }
  
 /**
   * Executes the SendList that will use the mail module to send the grocery list via email
   *
   */
  public function executeSendList()
  {
     
  	if ($this->getRequest()->getMethod() != sfRequest::POST)
  	{
    	// display the form
        $this->list = GrocerylistPeer::getList($this->getRequestParameter('grocery_strip_nm'), $this->getUser()->getSubscriberId());
     	$this->items = $this->list->getGroceryItems();
        
       return sfView::SUCCESS;
    }
    //handle the form
    if ($this->getRequestParameter('email'))
    {
      $this->getRequest()->setAttribute('email', $this->getRequestParameter('email'));
      $this->getRequest()->setAttribute('listnm', $this->getRequestParameter('grocery_nm'));
      $this->getRequest()->setAttribute('liststripnm', $this->getRequestParameter('grocery_strip_nm'));
      $raw_email = $this->sendEmail('mail', 'sendList');
      return $this->forward('grocery', 'index');
  }
 }
  /**
   * Executes the private action _aisles to get all the aisles for items in a list and sort them and remove duplicate aisles
   *
   */
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
  
  public function executePrint()
  {
    sfConfig::set('sf_web_debug', false);
    $this->list = GrocerylistPeer::getList($this->getRequestParameter('grocery_strip_nm'), $this->getUser()->getSubscriberId());
    $this->items = $this->list->getGroceryItems();
    $this->_aisles();
  }

  public function executeCreate()
  {
     $this->list = new Grocerylist();
     $this->setTemplate('edit');
     $this->aisles = GroceryAislePeer::getAisleArray();
     $this->items = array();
     //check to see if a new grocery list is being requested to be made from adding a recipe to a list
     if($this->getRequestParameter('recipestripnm'))
     {
	   $passed_recipe =  RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
	   $ingrs = $passed_recipe->getIngrds(); 
	   foreach($ingrs as $ingr)
	    {
		  $new_item = new GroceryItem();
		  $new_item->setQty($ingr->getIngrdQty());
		  $new_item->setMsrmt($ingr->getIngrdMsrmt());
		  $new_item->setGroceryItem($ingr->getIngredient()->getIngrdNm());
		  $this->items[] = $new_item;
		  $this->last_seq = count($this->items);
	    }
	 }
	 else
	 {
	  $this->last_seq = 0;
     }
     $this->items[] = new GroceryItem();
     //$this->last_seq = 0;
     $this->msrmtlist_jsarray = self::get_jsarray(RecipeIngrdPeer::getMsrmtlist());
     $this->ingrlist_jsarray = self::get_jsarray(IngredientPeer::getInglist());
     $this->countList = GrocerylistPeer::getListCount( $this->getUser()->getSubscriberId());
     $this->getResponse()->setTitle('Create Grocery List');
  }
 
  public function executeEdit()
  {
    if (!$this->getRequestParameter('grocery_strip_nm'))
    {
      $this->list = new Grocerylist();
    } 
   else
   {
      $this->list = GrocerylistPeer::getListByUser($this->getRequestParameter('grocery_strip_nm'), $this->getUser()->getSubscriberId());
   }
     $this->forward404Unless($this->list);
     $this->countList = GrocerylistPeer::getListCount( $this->getUser()->getSubscriberId());
     $this->items = $this->list->getGroceryItems();
     $this->items[] = new GroceryItem();
     $this->aisles = GroceryAislePeer::getAisleArray();
     $this->last_seq = count($this->items)-1;
     $this->msrmtlist_jsarray = self::get_jsarray(RecipeIngrdPeer::getMsrmtlist());
     $this->ingrlist_jsarray = self::get_jsarray(IngredientPeer::getInglist());
     $this->getResponse()->setTitle('Create Grocery List');	
    }


  private static function get_jsarray($list)
  {    
    $escapedList = array_map('addslashes', $list);
    $quotedList = array_map( array('myIng', 'addquotes'), $escapedList);
    $list_jsarray = '[' . implode(',', $quotedList) . ']';
    return $list_jsarray;
  }
  
  public function executeUpdate()
  {
     if (!$this->getRequestParameter('grocery_id'))
    {
      $list = new Grocerylist();
    }
    else
    {
      $list = GrocerylistPeer::retrieveByPk($this->getRequestParameter('grocery_id'));
      $this->forward404Unless($list);
    }
    $list->setGroceryId($this->getRequestParameter('grocery_id'));
     
    if($list->getGroceryId())
    {
	   $list->setGroceryNm($this->getRequestParameter('grocery_nm'));
	}else
	{   
      //check to see if the name the user is submititng has been used by them already if it has add a unique number to it
      $c = new Criteria();
      $c->add(GrocerylistPeer::GROCERY_NM, $this->getRequestParameter('grocery_nm'));
      $c->add(GrocerylistPeer::USER_ID, $this->getUser()->getSubscriberId());
      $count = GrocerylistPeer::doCount($c);

      if($count > 0):
        $list->setGroceryNm($this->getRequestParameter('grocery_nm').'-'.$count);
      else:
       $list->setGroceryNm($this->getRequestParameter('grocery_nm'));
      endif;
   }
    $list->setUserId($this->getUser()->getSubscriberId());
    $list->save();

    $list_items = array();
    //remove any blaknks
    foreach($this->getRequestParameter('list_item') as $k => $v)
    {
	   if(strlen($v) == 0)
	     continue;
	   $list_items[$k] = $v;
    }

    $aisles = $this->getRequestParameter('item_aisle');
    $qtys = $this->getRequestParameter('qty');
    $msrmts = $this->getRequestParameter('msrmt');
    
   //remove any grocery items already assigned and then load what is being passed, this helps prevent dupes
     GroceryItemPeer::checkExistsRemove(GroceryItemPeer::retrieveByGrocery($list->getGroceryId()));  
     
    foreach($list_items as $k=>$v)
	   {
		  if($v):
	        $list_item = new GroceryItem();
	        $list_item->setGroceryId($list->getGroceryId());
	        $list_item->setQty($qtys[$k]);
	        $list_item->setMsrmt($msrmts[$k]);
	        $list_item->setGroceryItem($v);
	        if($aisles[$k]):; 
  	          $list_item->setAisleId($aisles[$k]);
            endif;
            $list_item->save();
	      endif;	
	   }
	//check to see if they want to include all their items from the master list
	if($this->getRequestParameter('master') == 1)
	{
		$master_items = GroceryMasterPeer::getByUser($this->getUser()->getSubscriberId());
		foreach($master_items as $mitem)
		{
			//make sure the item(s) are not there already before adding
			if(!GroceryItemPeer::getByItem($list->getGroceryId(), $mitem->getGroceryItem())):
  			  $list_item = new GroceryItem();
     		  $list_item->setGroceryId($list->getGroceryId());
              $list_item->setQty($mitem->getQty());
              $list_item->setGroceryItem($mitem->getGroceryItem());
              if($mitem->getAisleId()):
                $list_item->setAisleId($mitem->getAisleId());
              endif; 
              $list_item->save();
             endif;
		}
	}
    $this->redirect('@get_list?grocery_strip_nm='. $list->getGroceryStripNm().'&user='.$list->getUser());	
  }

  public function handleErrorUpdate()
  {
    $this->forward('grocery', 'edit');
  }

 public function executeAdd_Item_Ajax()
 {
   $this->aisles = GroceryAislePeer::getAisleArray();
   $this->seq = $this->getRequestParameter('seq');
   $this->item = new GroceryItem();
 }

 public function executeAdd_Pantry_Ajax()
{
	$this->seq = $this->getRequestParameter('seq');
	$this->item = new GroceryExclude();
}

 public function executeDelete()
 {
   $list = GrocerylistPeer::getList($this->getRequestParameter('grocery_strip_nm'), $this->getUser()->getSubscriberId());
   $list->delete();
   $this->forward('grocery', 'list');	
 }

 public function executeQuick()
 {
      if ($this->getRequest()->getMethod() != sfRequest::POST)
      {
       //display the form
       $this->master_items = GroceryMasterPeer::getByUser($this->getUser()->getSubscriberId());
       $this->master_items[] = new GroceryMaster();
       $this->aisles = GroceryAislePeer::getAisleArray();
       $this->last_seq = count($this->master_items)-1;
      
       $this->msrmtlist_jsarray = self::get_jsarray(RecipeIngrdPeer::getMsrmtlist());
       $this->ingrlist_jsarray = self::get_jsarray(IngredientPeer::getInglist());
     } 
     else 
     {
       //Handle the submison
       $list_items = array();
	   //remove any blaknks
	   foreach($this->getRequestParameter('list_item') as $k => $v)
	   {
	     if(strlen($v) == 0)
	       continue;
		   $list_items[$k] = $v;
	   }
	   $aisles = $this->getRequestParameter('item_aisle');
	   $qtys = $this->getRequestParameter('qty');
	   $msrmts = $this->getRequestParameter('msrmt');
	       
	   //remove any grocery items already assigned and then load what is being passed, this helps prevent dupes
	    GroceryItemPeer::checkExistsRemove(GroceryMasterPeer::getByUser($this->getUser()->getSubscriberId()));
	   	 
	   foreach($list_items as $k=>$v)
	   {
	     if($v):
	       $list_item = new GroceryMaster();
	       $list_item->setQty($qtys[$k]);
	       $list_item->setMsrmt($msrmts[$k]);
	       $list_item->setGroceryItem($v);
	       if($aisles[$k]):; 
	         $list_item->setAisleId($aisles[$k]);
	       endif;
	       $list_item->setUserId($this->getUser()->getSubscriberId());
	       $list_item->save();
	      endif;	
		 }
		  $this->redirect('grocery/showQuick');  
        }
   } 
   public function executeShowQuick()
   {
	 $this->items = GroceryMasterPeer::getByUser($this->getUser()->getSubscriberId());
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
      $this->getResponse()->setTitle($this->getUser()->getLogin(). ' Quick List');
   }

   public function executePantry()
 {
      if ($this->getRequest()->getMethod() != sfRequest::POST)
      {
       //display the form
       $this->exclude_items = GroceryExcludePeer::getByUser($this->getUser()->getSubscriberId());
       $this->exclude_items[] = new GroceryMaster();
       $this->last_seq = count($this->exclude_items)-1;
       $this->ingrlist_jsarray = self::get_jsarray(IngredientPeer::getInglist());
     } 
     else 
     {
       //Handle the submison
       $list_items = array();
	   //remove any blaknks
	   foreach($this->getRequestParameter('list_item') as $k => $v)
	   {
	     if(strlen($v) == 0)
	       continue;
		   $list_items[$k] = $v;
	   }
	 
	    //remove any grocery items already assigned and then load what is being passed, this helps prevent dupes
	   GroceryItemPeer::checkExistsRemove(GroceryExcludePeer::getByUser($this->getUser()->getSubscriberId()));

	   foreach($list_items as $k=>$v)
	   {
	     if($v):
	       $list_item = new GroceryExclude();
	       $list_item->setGroceryItem($v);
	       $list_item->setUserId($this->getUser()->getSubscriberId());
	       $list_item->save();
	      endif;	
		 }
		  $this->redirect('grocery/showPantry');  
        }
   }
 
   public function executeShowPantry()
   {
	 $this->items = GroceryExcludePeer::getByUser($this->getUser()->getSubscriberId());
     sort($this->items);
      $this->getResponse()->setTitle($this->getUser()->getLogin(). ' Pantry');
   }
   
   public function executeAddtoList()
   {
      //check to see if the form is being submited to proccess or called to display
		if ($this->getRequest()->getMethod() != sfRequest::POST)
	    {
		   	$this->recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
		    $recipeId = $this->recipe->getRecipeId();
		    if(!StoredRecipePeer::retrieveByPK($this->getUser()->getSubscriberId(), $recipeId))
			   {
			    $stored = new StoredRecipe();
			    $stored->setUserId($this->getUser()->getSubscriberId());
			    $stored->setRecipeId($recipeId);
			    $stored->save();   
			   }	

			   //get the userslist
			   $this->lists = GrocerylistPeer::getUserList($this->getUser()->getSubscriberId());
			 } else
			 //save the form
			 {
				 $list = GrocerylistPeer::retrieveByPk($this->getRequestParameter('grocery'));
				//get all the ingrs for that recipe
				$recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
				$ingrds_array = $recipe->getIngrds();
				//check and see if they want to create a new grocery list
				if(!$this->getRequestParameter('grocery'))
			    {
			      $this->redirect('grocery/create?recipestripnm='.$recipe->getRecipeStripNm());
			      exit;
			    }
				
				//check to see if the ingr is already on the list if it is add both qty amounts
			
				foreach($ingrds_array as $ingr)
				{
					if(!GroceryExcludePeer::getByItem($ingr->getIngredient()->getIngrdNm(), $this->getUser()->getSubscriberId()))
					{
					  if($exist = GroceryItemPeer::getByItem($list->getGroceryId(), $ingr->getIngredient()->getIngrdNm()))
					  {
						$qty = $exist->getQty() + $ingr->getIngrdQty();
						$exist->setQty($qty);
						$exist->save();
					  }
					  else
					  {
						 $list_item = new GroceryItem();
			     		 $list_item->setGroceryId($list->getGroceryId());
			             $list_item->setQty($ingr->getIngrdQty());
			             $list_item->setMsrmt($ingr->getIngrdMsrmt());
			             $list_item->setGroceryItem($ingr->getIngredient()->getIngrdNm());
			             $list_item->save();
					  }
					}
				}
				$this->redirect('@get_list?grocery_strip_nm='. $list->getGroceryStripNm().'&user='.$list->getUser());	
			 }		
   }
}

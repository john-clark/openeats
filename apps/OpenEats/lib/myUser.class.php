<?php

class myUser extends sfBasicSecurityUser
{
 
 /**
  * Sign in the user and set their credentails
  *
  * @param name of user  $user
  * @param check to see if the selected remember me $remember
  */
 public function signIn($user, $remember = false)
 {
  
  $this->setAttribute('subscriber_id', $user->getUserId(), 'subscriber');
  $this->setAuthenticated(true);
 
  $this->addCredential('subscriber');
  $this->setAttribute('login', $user->getUserLogin(), 'subscriber');
  
   if ($user->getIsModerator($user->getAuthLvlId()))
    {
      $this->addCredential('moderator');
    }
  
  if ($user->getIsAdministrator($user->getAuthLvlId()))
    {
      $this->addCredential('administrator');
    }
  //set the users IP and last login time
  $user_ip = $_SERVER['REMOTE_ADDR'];
  $user_logintime = $_SERVER['REQUEST_TIME'];
  $user->setUserIp($user_ip);
  $user->setUserLastLogin($user_logintime);
  $user->save();

  if ($remember)
  {
    // determine a random key
    if (!$user->getRememberKey())
    {
      $rememberKey = rand(100000, 999999);
 
      // save the key to the User table
      $user->setRememberKey($rememberKey);
      $user->save();
    }
 
    // save the key to the cookie
    $value = base64_encode(serialize(array($user->getRememberKey(), $user->getUserLogin())));
    sfContext::getInstance()->getResponse()->setCookie('OpenEats', $value, time()+60*60*24*15, '/');
  }
 }
 
 /**
  * Sigh the user out and remove their credentials
  *
  */
 public function signOut()
 {
  $this->getAttributeHolder()->removeNamespace('subscriber');
  $this->getAttributeHolder()->remove('recipe_history');
  $this->setAuthenticated(false);
  $this->clearCredentials();
  sfContext::getInstance()->getResponse()->setCookie('OpenEats', '', time() - 3600, '/');
 }

 /**
  * Get just the subscriber ID of the logged in user
  *
  * users subscrber id
  */
 public function getSubscriberId()
 {
  return $this->getAttribute('subscriber_id', '', 'subscriber');
 }
 
 /**
  * Get the user object based off their subcriber ID which is the primary key
  *
  * @return user object
  */
 public function getSubscriber()
 {
  return UserPeer::retrieveByPk($this->getSubscriberId());
 }
 
 /**
  * Get the users login name
  *
  * @return users login name
  */
 public function getLogin()
 {
  return $this->getAttribute('login', '', 'subscriber');
 }

/**
 * Check if a user can rate a recipe based on if they are logged in and have not already rated this recipe
 *
 * @param int recipe object $recipe
 * @return true or false based on if they can rate or not
 */
 public function canRateFor($recipe)
 {
 	// only authenticated users can rate recipes
    if(!$this->isAuthenticated())
    {
      return false;
    }
    
    //Users can only rate a recipe once
    
    $c = new Criteria();
    $c->add(RatePeer::USER_ID, $this->getSubscriberId()) ;
    $c->add(RatePeer::RECIPE_ID, $recipe->getRecipeId());
    $rate = RatePeer::doSelectOne($c);

    return ($rate) ? false : true;
  }
  /**
   * Check to see if a logged in user is the creator of a recipe 
   * used to see if they can edit the recipe or not
   *
   * @param int recipe object $recipe
   * @return return true if they are the owener and false if not
   */
  public function isOwnerof($recipe)
  {
    if ($recipe == null)
    {
    	return true;
    }
    
    $c = new Criteria();
    $c->add(RecipePeer::RECIPE_ID, $recipe->getRecipeId());
    $c->add(RecipePeer::USER_ID, $this->getSubscriberId());
    $exist = RecipePeer::doSelectOne($c);
    
    return ($exist) ? true : false;  
  }
  
  public function isOwnerofMenu($menu)
  {
    if ($menu == null)
    {
    	return true;
    }

    $c = new Criteria();
    $c->add(MenuPeer::MENU_ID, $menu->getMenuId());
    $c->add(MenuPeer::USER_ID, $this->getSubscriberId());
    $exist = MenuPeer::doSelectOne($c);

    return ($exist) ? true : false;  
  }

  public function isOwnerofGroceryList($list)
  {
    if($list == null)
    {
	  return true;
    }
    $c = new Criteria();
    $c->add(GrocerylistPeer::GROCERY_ID, $list->getGroceryId());
    $c->add(GrocerylistPeer::USER_ID, $this->getSubscriberId());
    $exist = GrocerylistPeer::doSelectOne($c);
	
	 return ($exist) ? true : false; 
  }
  
  public function isOwnerofMasterlist()
  {
    $c = new Criteria();
    $c->add(GrocerylistPeer::USER_ID, $this->getSubscriberId());
    $exist = GrocerylistPeer::doSelectOne($c);
    return ($exist) ? true : false; 
  }

  public function addRecipeToHistory($recipe)
  { 
	//take the current recipe a user is veiwing and add it to a list to be displayed as the last four viewed recipes
     $recipe_ids = $this->getAttribute('recipe_history', array());
     if (!in_array($recipe->getRecipeId(), $recipe_ids))
     {
	   array_unshift($recipe_ids, $recipe->getRecipeId());
	   $this->setAttribute('recipe_history', array_slice($recipe_ids, 0, 4));
     }	
  }

  public function getRecipeHistory()
  {
	//get the recipe object of each recipe in the users history to be used to be displayed as links
     $recipe_ids = $this->getAttribute('recipe_history', array());
     return RecipePeer::retrieveByPKs($recipe_ids);
  }
 
}
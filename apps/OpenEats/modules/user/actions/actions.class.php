<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * user actions.
 *
 * @package    openeats
 * @subpackage user
 * @author     Quenten Griffith
 */

class userActions extends sfActions
{

/**
   * Executes Login action
   *
   */
  public function executeLogin()
  {
  	 if ($this->getRequest()->getMethod() != sfRequest::POST)
  	   {
  	   	// display the form
        $this->getRequest()->getParameterHolder()->set('referer', $this->getRequest()->getReferer());
        return sfView::SUCCESS;
  	   }
  	 else
  	 {
  	 	// handle the form submission
        // redirect to last page
        return $this->redirect($this->getRequestParameter('referer', '@homepage'));
     }
}
  
  public function executeLogout()
  {
    //Remove the session var and redirect to the homepage
   $this->getUser()->signOut();
   $this->redirect('@homepage');
  }
  
  public function handleErrorLogin()
{
  return sfView::SUCCESS;
}
  
  public function executeShow()
 {
  if ($this->hasRequestParameter('login'))
  {
  	$this->subscriber = UserPeer::getUserFromLogin($this->getRequestParameter('login'));
    $this->getResponse()->setTitle('OpenEats Profile '. $this->getRequestParameter('login'));	
  }
  else
  {
  $this->subscriber = UserPeer::retrieveByPk($this->getRequestParameter('id', $this->getUser()->getSubscriberId()));
  $this->getResponse()->setTitle('OpenEats Profile ' . $this->getUser()->getLogin()); 
 }
  $this->forward404Unless($this->subscriber);
   
  $this->setShowVars();
 
}

 public function executeStoredRecipe()
 {
   $this->subscriber = UserPeer::getUserFromLogin($this->getRequestParameter('login'));
   $this->forward404Unless($this->subscriber);
   $this->getResponse()->setTitle('OpenEats Stored Recipes '. $this->getRequestParameter('login'));
   $stored_recipes = $this->subscriber->getStoredRecipes();
   $this->recipes = array();
   foreach($stored_recipes as $stored):
     $this->recipes[] = $stored->getStoredRecipeFor();
   endforeach;
   
 }


  public function executeRegistration()
  {
  	
  }

  /**
   * Registar a new user called if the form passes validation
   *
   */
  public function executeAdd() 
  {
  	$user = new User();
  	$user->setUserFn($this->getRequestParameter('fname'));
  	$user->setUserLn($this->getRequestParameter('lname'));
  	$user->setUserLogin($this->getRequestParameter('login'));
  	$user->setUserEmail($this->getRequestParameter('email'));
  	$user->setAuthLvlId('1');
  	$user->setUserPswd($this->getRequestParameter('password'));
  	$user->save();
  	
	$this->forward('user', 'login');
  }
  

  public function executeEdit()
  {
	  if ($this->hasRequestParameter('login'))
	  {
	  	$this->subscriber = UserPeer::getUserFromLogin($this->getRequestParameter('login'));
	    $this->getResponse()->setTitle('OpenEats Profile '. $this->getRequestParameter('login'));	
	  }
	  else
	  {
	    $this->subscriber = UserPeer::retrieveByPk($this->getRequestParameter('id', $this->getUser()->getSubscriberId()));
	    $this->getResponse()->setTitle('OpenEats Profile ' . $this->getUser()->getLogin()); 
	  }
	  $this->forward404Unless($this->subscriber);
  }

  /**
   * Update action allow a user to update their password/email
   *
   */
  public function executeUpdate()
  {
  	if ($this->getRequest()->getMethod() != sfRequest::POST)
  	 {
  	 	$this->forward404();
	 }
	$this->subscriber = $this->getUser()->getSubscriber();
	$this->forward404Unless($this->subscriber);
	
	//Update the users password
	
	if ($this->getRequestParameter('pass1')) 
	{
		$this->subscriber->setUserPswd($this->getRequestParameter('pass1'));
	}
	
	//Update the users email
	
	if ($this->getRequestParameter('user_email'))
	{
		$this->subscriber->SetUserEmail($this->getRequestParameter('user_email'));
	}
	
	if ($this->getRequestParameter('user_about'))
	{
		$this->subscriber->setUserAbout($this->getRequestParameter('user_about'));
	}
  	$this->subscriber->save();
  	$this->redirect('@user_profile?login='.$this->subscriber->getUserLogin());

  }
 
  public function handleErrorAdd()
  {
    $this->forward('user', 'registration');
  }
  
  public function handleErrorUpdate()
  {
    $this->subscriber = $this->getUser()->getSubscriber();
  	$this->forward404Unless($this->subscriber);
  	
    $this->setShowVars();
    
    $this->forward('user', 'show');  
 }

  /**
   * Private function to set variables for the show and handleErrorUpdate actions
   * for a users profile
   */
  private function setShowVars()
  {
  	$this->user_recipes = $this->subscriber->getRecipesLimit($amt=4);
    $this->total = count($this->subscriber->getRecipes());
    $this->stored_total = count($this->subscriber->getStoredRecipes());  
 	$this->stored_recipes = $this->subscriber->getStoredRecipesLimit(4);
	$this->keywords = UserPeer::getKeywordsForUser($this->subscriber->getUserId());
	$this->menus = MenuPeer::getUserMenu($this->getUser()->getSubscriberId());
    $this->lists = GrocerylistPeer::getUserList($this->getUser()->getSubscriberId());
    $this->recent_comments = $this->subscriber->getRecentCommentsLimit($amt=5);
    $this->recent_ratings = $this->subscriber->getRecentRatingsLimit($amt=5);
  }
  
  /**
   * Set a new random password and email it to the user
   *
   * @return unknown
   */
  public function executePasswordReset() 
  {
  	if ($this->getRequest()->getMethod() != sfRequest::POST)
  	{
    	// display the form
        return sfView::SUCCESS;
    }
    //handle the form submission
    $c = new Criteria();
    $c->add(UserPeer::USER_LOGIN, $this->getRequestParameter('login'));
    $user = UserPeer::doSelectOne($c);
    
    //if the user is a regisatred user
    if ($user)
    {
    	//set a new random password
    	$password = substr(md5(rand(100000, 999999)), 0, 6);
    	$user->setUserPswd($password);
    	
    	$this->getRequest()->setAttribute('password', $password);
        $this->getRequest()->setAttribute('login', $user->getUserLogin());
        $this->getRequest()->setAttribute('email', $user->getUserEmail());
        $this->email = $user->getUserEmail();
        $raw_email = $this->sendEmail('mail', 'sendPassword');
        $this->getContext()->getLogger()->debug($raw_email);
        
        $user->save();
        
        return 'MailSent';
        
    }
    else 
    {
    	$this->getRequest()->setError('login', 'There is no user registered with this login name');
    	return sfView::SUCCESS;
    }
  }
  
  public function handleErrorPasswordReset()
  {
  	return sfView::SUCCESS;
  }
  
  /**
   * Store a recipe in the [recipe_stored] table for a user
   *
   */
  public function executeStored() 
  {
  $this->recipe = RecipePeer::retrieveByPk($this->getRequestParameter('id'));
  $this->forward404Unless($this->recipe);
 
  $user = $this->getUser()->getSubscriberId();
 
  $store = new StoredRecipe();
  $store->setUserId($user);
  $store->setRecipeId($this->getRequestParameter('id'));
  $store->save();
  }

/**
   * Executes unstore action
   *to unstore stored recipes from a user
   */
  public function executeUnstore() 
  {
  
  $this->recipe = RecipePeer::retrieveByPk($this->getRequestParameter('id'));
  $this->forward404Unless($this->recipe);
 
  $user = $this->getUser()->getSubscriberId();
 
  $unstore = StoredRecipePeer::retrieveByPK($user, $this->getRequestParameter('id'));
  $unstore-> delete();
  $this->stored = FALSE;
  }

  public function executeReportRecipe()
  {
  	$this->recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
  	$this->forward404Unless($this->recipe);
  	
  	$report = new RecipeReport();
  	$report->setRecipeId($this->recipe->getRecipeId());
  	$report->setUserId($this->getUser()->getSubscriberId());
  	$report->save();
  	
  }
  
  public function executeEmailRecipe()
  {
  	if ($this->getRequest()->getMethod() != sfRequest::POST)
  	{
    	// display the form
        $this->recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
    	//$this->getRequest()->setAttribute('referer', $this->getRequest()->getReferer());
        return sfView::SUCCESS;
    
    }
 
    //handle the form
    if ($this->getRequestParameter('email'))
    {   
		$this->getRequest()->setAttribute('message', $this->getRequestParameter('message'));
		$this->getRequest()->setAttribute('email', $this->getRequestParameter('email'));
		$this->getRequest()->setAttribute('recipe_strip_nm', $this->getRequestParameter('recipe_strip_nm'));
        $this->getRequest()->setAttribute('recipe_desc', $this->getRequestParameter('recipe_desc'));
		$this->getRequest()->setAttribute('recipe_nm', $this->getRequestParameter('recipe_nm'));
		$raw_email = $this->sendEmail('mail', 'SendRecipe');
    	$this->logMessage($raw_email,'debug');
        return $this->forward('recipe', 'index');
       //return 'MailSent';
    }
  }
  
  public function executeRateSuggestion()
  {
     $id = $this->getRequestParameter('id');
     $ans = $this->getRequestParameter('ans');
     $this->id = $id;
     $rate = new RateSuggestion();
     $rate->setUserId($this->getUser()->getSubscriberId());
     $rate->setSuggestionId($id);
     $rate->setRate($ans);
     $rate->save();
  
    //increase or decrease the rate of the suggestion based on if they answered yes or no
	$c = new Criteria();
	$c->add(RecipeSuggestionPeer::SUGGESTION_ID, $id);
	$c->add(RecipeSuggestionPeer::USER_ID, $this->getUser()->getSubscriberId());
	$suggestion = RecipeSuggestionPeer::doSelectOne($c);    
    
    if ($ans == 'yes')
    {
	   $nbrate = $suggestion->getNbRate() + 1;
	   $suggestion->setNbRate($nbrate);
	   $suggestion->save();
	    
	} elseif ($ans == 'no')
	{
	    $nbrate = $suggestion->getNbRate();
		if ($nbrate > 0)
		{
			$nbrate = $nbrate - 1;
			$suggestion->setNbRate($nbrate);
			$suggestion->save();
		}
	}	
  }
 
 public function executeUserRecipes()
 {
    $subscriber = UserPeer::getUserFromLogin($this->getRequestParameter('user')); 
   //$this->recipes = $subscriber->getRecipes();
    $c = new Criteria();
    $c->add(RecipePeer::USER_ID, $subscriber->getUserId());
    $c->addDescendingOrderByColumn(RecipePeer::CREATED_AT);
    $pager = new sfPropelPager('Recipe', 4);
    $pager->setCriteria($c);
    $pager->setPage($this->getRequestParameter('page', 1));
    $pager->init();
    $this->pager = $pager;
    $this->subscriber = $subscriber;
    $this->user = $this->getRequestParameter('user');
  }
  
  public function executeUserStoredRecipes()
  {
      $subscriber = UserPeer::getUserFromLogin($this->getRequestParameter('user')); 
      $c = new Criteria();
      $c->add(StoredRecipePeer::USER_ID, $subscriber->getUserId());
      $c->addJoin(StoredRecipePeer::RECIPE_ID, RecipePeer::RECIPE_ID);
      $this->stored = RecipePeer::doSelect($c); 
      $pager = new sfPropelPager('Recipe', 4);
      $pager->setCriteria($c);
	  $pager->setPage($this->getRequestParameter('page', 1));
	  $pager->init();
	  $this->pager = $pager;
	  $this->subscriber = $subscriber;
	  $this->user = $this->getRequestParameter('user');	
   }

}
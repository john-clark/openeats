<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * planner actions.
 *
 * @package    openeats
 * @subpackage planner
 * @author     Quenten Griffith
 */

class plannerActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
	//check to see if the form is being submited to proccess or called to display
	if ($this->getRequest()->getMethod() != sfRequest::POST)
	{
		//set the current date to time since the Epoch 
		$this->date = date('U');	
	}
	elseif($this->getRequestParameter('prev'))
	{
		//get the date of the planner that is being displayed then minus one month from it to go to previous months
		$passed_date = $this->getRequestParameter('date');
		$this->date = mktime(0, 0, 0, date("m", $passed_date)-1, date("d", $passed_date),   date("Y", $passed_date));
	}
	else
	{
		//get the date of the planner that is being displayed then add ne month from it to go to future months
		$passed_date = $this->getRequestParameter('date');
		$this->date = mktime(0, 0, 0, date("m", $passed_date)+1, date("d", $passed_date),   date("Y", $passed_date));
	}
	//set a variable for month and year for $this->date
 	$this->month = date('F', $this->date);	   
    $this->year = date('Y', $this->date);

    //format date in m/d/y to pass to the sfEventCalendar class
   	$format_date = date('m/d/y', $this->date);
    
    //create an empty month calendar to add events too
    $this->cal = new sfEventCalendar('month', $format_date);
    
    #find out what users planner this is
    $this->subscriber = UserPeer::getUserFromLogin($this->getRequestParameter('login'));
     
     # check to see if the user has marked this private and set private to True if not set it to false
     if($this->subscriber->getPlannerPrivate() == 1 ):
       $this->private='true';
     else:
      $this->private = 'false';
     endif;
   
   //get all the recipes and add them to the calendar
   $events = PlannerPeer::getRecipePlannerForUser($this->subscriber->getUserId());
   foreach($events as $event)
   {
    $recipe = $event->getRecipe();  
    $this->cal->addEvent($event->getPlannerDate(), array('title' => $recipe->getRecipeNm(), 'url' =>       
      '@get_recipe?recipestripnm='.$recipe->getRecipeStripNm(), 'plannerid' => $event->getPlannerId()));
   }

    //get all the menus and add them tothe calendar
    $menus = PlannerPeer::getMenuPlannerForUser($this->subscriber->getUserId());
   foreach($menus as $menu)
   {
    $user_menu = $menu->getMenu();  
    $this->cal->addEvent($menu->getPlannerDate(), array('title' => $user_menu->getMenuNm() . '-Menu', 'url' =>       
      'menu/show?menu_strip_nm='.$user_menu->getMenuStripNm(), 'plannerid' => $menu->getPlannerId()));
   }
   //add the events to the calendar
   $this->cal = $this->cal->getEventCalendar();
   $this->getResponse()->setTitle($this->subscriber->getUserLogin(). '\'s'. ' Meal Planner');
 }
  
 public function executeAddRecipe()
 {
   $this->recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
 }

 public function executeAddMenu()
 {
   $this->menu = MenuPeer::getMenu($this->getRequestParameter('menustripnm'), $this->getUser()->getSubscriberId());
 }
  
  
  public function executeUpdate()
  {
       $recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
       $menu = MenuPeer::getMenu($this->getRequestParameter('menustripnm'), $this->getUser()->getSubscriberId());
       $this->subscriber = UserPeer::getUserFromLogin($this->getRequestParameter('login'));
	   $c = new Planner();
	   $c->setUserId($this->getUser()->getSubscriberId());
	   if($recipe):
	     $c->setRecipeId($recipe->getRecipeId());
	   endif;
	   if($menu):
	     $c->setMenuId($menu->getMenuId());
	   endif;
	   $c->setPlannerDate($this->getRequestParameter('date'));
	   $c->save();
	   $this->redirect('@planner?login='.$this->subscriber);
  }

  public function handleErrorUpdate()
  {
     $recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
     $this->forward('planner', 'AddRecipe');
  }
  public function executeRemove()
  {
     $planner = PlannerPeer::retrieveByPk($this->getRequestParameter('plannerid'));
     $planner->delete();
  }
  
  public function executeMarkPrivate()
  {
    $user = UserPeer::getUserFromLogin($this->getUser()->getLogin());
    echo $this->getRequestParameter('private');
    if($this->getRequestParameter('private') == 1):
      $user->setPlannerPrivate(1);
    else:
     $user->setPlannerPrivate(NULL);
    endif;
   $user->save();	
  }

}

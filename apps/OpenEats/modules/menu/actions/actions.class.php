<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * menu actions.
 *
 * @package    openeats
 * @subpackage menu
 * @author    Quenten Griffith
 */

class menuActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
	$this->forward('menu', 'list');
  }	 
  
  public function executeCreate()
  {
   $this->menu = new Menu();
   $this->setTemplate('edit');
   $this->stored_recipes = StoredRecipePeer::getRecipeNmByUser($this->getUser()->getSubscriberId());
   $this->courses = CoursePeer::getCourseNm();
   $this->items = array();
   if($this->getRequestParameter('recipestripnm'))
   {
     //$passed_recipe =  RecipePeer::retrieveByPk($this->getRequestParameter('recipeId'));
     $passed_recipe =  RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
     $new_item = new RecipeMenu();
     $new_item->setRecipeId($passed_recipe->getRecipeId());
     $new_item->setCourseId($passed_recipe->getCourseId());
     $this->items[] = $new_item;
     $this->last_seq = count($this->items);
   }
   else
   {
     $this->last_seq = 0;	
   }
   $this->items[] = new RecipeMenu();
   $this->non_items = array();
   $this->non_items[] = new MenuItem();
   $this->non_items[] = new MenuItem();
  }
  
  public function executeEdit()
  {
    
    if (!$this->getRequestParameter('menu_strip_nm'))
    {
      $this->menu = new Menu();
    } 
   else
   {
      $this->menu = MenuPeer::getMenu($this->getRequestParameter('menu_strip_nm'), $this->getUser()->getSubscriberId());
   }
    $this->forward404Unless($this->menu);
    $this->stored_recipes = StoredRecipePeer::getRecipeNmByUser($this->getUser()->getSubscriberId());
    $this->courses = CoursePeer::getCourseNm();
    $this->items = $this->menu->getMenuRecipes();
    $new_item = new RecipeMenu();
    $this->items[] = $new_item;
    $this->last_seq = count($this->items)-1;
    $this->non_items = $this->menu->getMenuItems();
   
  }

 public function executeAdd_Item_Ajax()
 {
   $this->stored_recipes = StoredRecipePeer::getRecipeNmByUser($this->getUser()->getSubscriberId());
   $this->courses = CoursePeer::getCourseNm();
   $this->seq = $this->getRequestParameter('seq');
   $this->item = new RecipeMenu();
 }
  
  public function executeList()
  {
    $this->user = UserPeer::getUserFromLogin($this->getRequestParameter('user'));
    $this->menus = MenuPeer::getUserMenu($this->user->getUserId());
    $this->getResponse()->setTitle('OpenEats::Menus');
  }

  public function executeShow()
  {
	 $this->user = UserPeer::getUserFromLogin($this->getRequestParameter('user'));
	 $this->menu = MenuPeer::getMenu($this->getRequestParameter('menu_strip_nm'), $this->user->getUserId());
     $this->forward404Unless($this->menu);
     $this->items = $this->menu->getMenuRecipes();
     $this->non_items = $this->menu->getMenuItems();
     //get the unique course list for all the menu items
     $course_list = array();
	 foreach($this->items as $item)
	 {
	  $course_list[]=$item->getCourse()->getCourseNm();
	 }
	foreach($this->non_items as $non_item)
	{
		$course_list[]=$non_item->getCourse()->getCourseNm();
	}
    $this->course_list = array_unique($course_list);
    
    //create a function to sort the course list in order as they normally would appear on a menu
    function order_course($a, $b)
	{
	 	$order[0] = "Beverage";
		$order[1] = "Appetizer and Snack";
		$order[2] = "Salad";
		$order[3] = "Entree";
		$order[4] = "Dessert";

	  foreach($order as $key => $value)
	    {
	      if($a==$value)
	        {
	          return 0;
	          break;
	        }

	      if($b==$value)
	        {
	          return 1;
	          break;
	        }
	    }
	}
	usort($this->course_list, "order_course");
	$this->getResponse()->setTitle($this->menu->getMenuNm());
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('menu_id'))
    {
      $menu = new Menu();
    }
    else
    {
      $menu = MenuPeer::retrieveByPk($this->getRequestParameter('menu_id'));
      $this->forward404Unless($menu);
    }

    $menu->setMenuId($this->getRequestParameter('menu_id'));
    
    if($menu->getMenuId()):
       $menu->setMenuNm($this->getRequestParameter('menu_nm'));
    else:
      //check to see if the name the user is submititng has been used by them already if it has add a unique number to it
      $c = new Criteria();
      $c->add(MenuPeer::MENU_NM, $this->getRequestParameter('menu_nm'));
      $c->add(MenuPeer::USER_ID, $this->getUser()->getSubscriberId());
      $count = MenuPeer::doCount($c);

      if($count > 0):
        $menu->setMenuNm($this->getRequestParameter('menu_nm').'-'.$count);  
      else:
        $menu->setMenuNm($this->getRequestParameter('menu_nm'));
      endif;
    endif;

    $menu->setUserId($this->getUser()->getSubscriberId());
    $menu->setMenuDesc($this->getRequestParameter('menu_desc'));
    if($this->getRequestParameter('private')):
      $menu->setMenuPrivate(1);
    else:
     $menu->setMenuPrivate(NULL);
    endif;
    $menu->save();
    $recipeIds = array();
    //remove any blaknks
    foreach($this->getRequestParameter('menu_item') as $k => $v)
    {
	   if(strlen($v) == 0)
	     continue;
	   $recipeIds[$k] = $v;
    }

    $courses = $this->getRequestParameter('course');
    $recipe_descs = $this->getRequestParameter('recipe_desc');
    $exists = RecipeMenuPeer::retrieveByMenu($menu->getMenuId());
    
    //remove any recipe items already assigned and then load what is being passed, this helps prevent dupes
    if($exists):
      foreach($exists as $remove):
        $remove->delete();
      endforeach;
    endif;     
    
    foreach($recipeIds as $k=>$v)
	   {
		   $recipe = RecipePeer::retrieveByPk($v);  
		  if($v):
	        $menu_item = new RecipeMenu();
	        $menu_item->setMenuId($menu->getMenuId());
	        $menu_item->setRecipeId($v);
            $menu_item->setRecipeDesc($recipe_descs[$k]);
	        //if for some reason the course was not set by the user, set the course to the course that is attached to the recipe
	        if($courses[$k]):
	          $menu_item->setCourseId($courses[$k]);
	        else:
	          $menu_item->setCourseId($recipe->getCourseId());
	        endif;
	        $menu_item->save();
	      endif;	
	   }
	
	//save non_recipe_items
  	$non_exists = MenuItemPeer::retrieveByMenu($menu->getMenuId());
  
    //remove all items from the existing menu being edited
   if($non_exists):
      foreach($non_exists as $remove):
        $remove->delete();
      endforeach;
    endif;
   
   //remove all blanks from the array of items
   $non_items = array_filter($this->getRequestParameter('item_nm'));
   
    //save the non recipe items to the database
    $item_courses = $this->getRequestParameter('item_course');
    $item_descs = $this->getRequestParameter('item_desc');
    foreach($non_items as $k => $v)
    {
    $non_item = new MenuItem();
    $non_item->setMenuId($menu->getMenuId());
    $non_item->setCourseId($item_courses[$k]);
    $non_item->setItemNm($v);
    $non_item->setItemDesc($item_descs[$k]);
    $non_item->save();
    }
    return $this->redirect('@get_menu?menu_strip_nm='.$menu->getMenuStripNm().'&user='.$menu->getUser());
  }

  public function handleErrorUpdate()
  {
    
    $this->forward('menu', 'edit');
  }

  public function executeDelete()
  {
    $menu = MenuPeer::getMenu($this->getRequestParameter('menu_strip_nm'), $this->getUser()->getSubscriberId());
    $menu->delete();
    return $this->redirect('menu/list?user='.$this->getUser()->getLogin());
  }
  
  public function executeAddtoMenu()
  {
     //check to see if the form is being submited to proccess or called to display
	if ($this->getRequest()->getMethod() != sfRequest::POST)
    {
       //$this->recipeId = $this->getRequestParameter('recipeId');
       //$this->recipe = RecipePeer::retrieveByPk($this->recipeId);
      $this->recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
      $this->recipeId = $this->recipe->getRecipeId();
      //check to see if it is stored if it isn't store it in their recipe box
       if(!StoredRecipePeer::retrieveByPK($this->getUser()->getSubscriberId(), $this->recipeId))
	   {
	    $stored = new StoredRecipe();
	    $stored->setUserId($this->getUser()->getSubscriberId());
	    $stored->setRecipeId($this->recipeId);
	    $stored->save();   
	   }	
	  
	   //get the users menus
	   $this->menus = MenuPeer::getUserMenu($this->getUser()->getSubscriberId());
	 } else
	 //save the form
	 {
	    //$recipeId = $this->getRequestParameter('recipeId');
	    //$recipe = RecipePeer::retrieveByPk($recipeId);
	   	 $recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
         $recipeId = $recipe->getRecipeId();
	    //check to see if they are creating a new menu if so redirect them on to create a new menu
	    if(!$this->getRequestParameter('menu'))
	    {
	      $this->redirect('menu/create?recipestripnm='.$recipe->getRecipeStripNm());
	      exit;
	    }
	    //check to see if the menu item is already there if it is do nothing
	    $exist = RecipeMenuPeer::retrieveByPk($this->getRequestParameter('menu'), $recipeId);
	    if(!$exist)
	    {
	      $menu_item = new RecipeMenu();
	      $menu_item->setMenuId($this->getRequestParameter('menu'));
	      $menu_item->setRecipeId($recipeId);
	      $menu_item->setCourseId($recipe->getCourseId());
	      $menu_item->setRecipeDesc($recipe->getRecipeDesc());
	      $menu_item->save();
	    }
	    $menu = MenuPeer::retrieveByPk($this->getRequestParameter('menu'));
        $this->redirect('menu/show?menu_strip_nm='.$menu->getMenuStripNm().'&user='.$this->getUser()->getSubscriber());    
	 }      
  }

  public function executeMarkPrivate()
  {
    
    $menu = MenuPeer::retrieveByPk($this->getRequestParameter('menu_id'));
  
    if($this->getRequestParameter('private') == 1):
      $menu->setMenuPrivate(1);
    else:
     $menu->setMenuPrivate(NULL);
    endif;
   $menu->save();	
  }

  public function executeUpdateDesc()
 {
	$this->recipe = RecipePeer::retrieveByPk($this->getRequestParameter('id'));
 }

}

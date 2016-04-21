<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * recipe actions.
 *
 * @package    openeats
 * @subpackage recipe
 * @author     Quenten Griffith
 */

class recipeActions extends sfActions
{
  public function executeIndex()
  {
    $this->newest = RecipePeer::getLatestRecipe($amt=1);
    $this->keywords = RecipeKeywordPeer::getPopularKeywords(30);
    $this->toprecipes = RecipePeer::getTopRecipe(5);
  }

  public function executeList()
  {
    $this->getResponse()->setTitle('OpenEats Recipes');
    $this->recipes = RecipePeer::getListByDate();
  }

  public function executeShow()
  {
    $this->recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
    $this->forward404Unless($this->recipe);
    //set the meta header info create a list of keywords and add them to the description meta
    $this->getResponse()->setTitle($this->recipe->getRecipeNm() . ' Recipe');
    $keywords = implode(" ", $this->recipe->getKeywords());
    $keywords = $this->recipe->getRecipeNm() . ' ' . 'Recipe '. $keywords;
    $this->getResponse()->addMeta('keywords', $keywords);
    $this->getResponse()->addMeta('description', $this->recipe->getRecipeDesc());
    $this->pic = myRecipe::getPicture($this->recipe);
  
    $this->ingrds_array = $this->recipe->getIngrds();
    $this->comments = $this->recipe->getRecipeComments();
    $this->suggestions = $this->recipe->getRecipeSuggestions();
    $this->recipe_note = UserRecipeNotePeer::retrieveByPk($this->getUser()->getSubscriberId(), $this->recipe->getRecipeId());
    $last_planned = PlannerPeer::getLastPlanned($this->getUser()->getSubscriberId(), $this->recipe->getRecipeId());
   if($last_planned)
   {
     $cur_date = date('m-d-y');
     $last_planned = date('m-d-y', strtotime($last_planned->getPlannerDate()));
     if($cur_date == $last_planned)
     {
	    $this->last_planned = "Planned for today";
     }
     elseif($cur_date > $last_planned)
     {
        $this->last_planned = "Last prepared on ". $last_planned;	
     }
     else
    {
	  $this->last_planned = "Planned to prepare on " . $last_planned;
    }
  } else
  {
    $this->last_planned = NULL;	
  }
   //store the recipe into the recipe history to be displayed in the nav bar
   $this->getUser()->addRecipeToHistory($this->recipe);
 }

  public function executePrint()
  {
    sfConfig::set('sf_web_debug', false);
    $this->recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter('recipestripnm'));
    $this->ingrds_array = $this->recipe->getIngrds();
    if(UserRecipeNotePeer::retrieveByPk($this->getUser()->getSubscriberId(), $this->recipe->getRecipeId())):
      $recipe_note = UserRecipeNotePeer::retrieveByPk($this->getUser()->getSubscriberId(), $this->recipe->getRecipeId());
      $this->recipe_note = $recipe_note->getRecipeNote();
    else:
     $this->recipe_note = '';
   endif;
  }

  public function executeEdit()
  {
    $this->recipe = $this->getRecipeOrCreate();
   	
    $this->ingrlist = IngredientPeer::getInglist();
    if ($this->recipe->getRecipePicture()):
    	$this->pic='/uploads/recipe_images/thumbnail/'.$this->recipe->getRecipePicture();
    else:
       $this->pic = FALSE;
    endif;
     $users = UserPeer::doSelect(new Criteria());
	 $this->users = array();
	 foreach($users as $user)
	{
		$this->users[$user->getUserId()]=$user->getUserLogin();
	}
	
    if ($this->hasRequestParameter('ingrs'))
    {
      $ingrs = $this->getRequestParameter('ingrs');
      $this->ingrs = array();
      foreach($ingrs as $ingr)
      {
        $recipeIngrd = new RecipeIngrd();
        $recipeIngrd->setIngrdSeq(count($this->ingrs));
        // None of the other fields need to be set because they will
        // be automatically retrieved from the request parameters.
        $this->ingrs[] = $recipeIngrd;
      }
    }
    else
    {
      $this->ingrs = $this->recipe->getIngrds();
      // Add one blank ingredient space at the end.
      $recipeIngrd = new RecipeIngrd();
      $recipeIngrd->setIngrdSeq(count($this->ingrs));
      $this->ingrs[] = $recipeIngrd;
    }
     
   	 $this->preplist_jsarray = self::get_jsarray(RecipeIngrdPeer::getPreplist());
     $this->msrmtlist_jsarray = self::get_jsarray(RecipeIngrdPeer::getMsrmtlist());
     $this->ingrlist_jsarray = self::get_jsarray(IngredientPeer::getInglist());
	 $this->last_ingrd_seq = count($this->ingrs) - 1;
	 $this->getResponse()->setTitle('OpenEats Recipe EDIT:: ' . $this->recipe->getRecipeNm());
  }


	
  private static function get_jsarray($list)
  {
     $escapedList = array_map('addslashes', $list);
    $quotedList = array_map( array('myIng', 'addquotes'), $escapedList);
    $list_jsarray = '[' . implode(',', $quotedList) . ']';
    return $list_jsarray;
  }
  
  public function executeUpdate ()
  {
  	$recipe = $this->getRecipeOrCreate();
    $recipe->setRecipeId($this->getRequestParameter('recipe_id'));
      
    if ($recipe->getRecipeId())
    {
    	$recipe_nm = $this->getRequestParameter('recipe_nm');
    } else
    {
      $exist = RecipePeer::getRecipeFromName($this->getRequestParameter('recipe_nm'));
      if ($exist)
      {
    	$user = $this->getUser()->getLogin();
    	$recipe_nm = $user."'s". " " . $this->getRequestParameter('recipe_nm');
    		
      } else
      {
        $recipe_nm = $this->getRequestParameter('recipe_nm');	
      }
     }

    $recipe->setrecipeNm($recipe_nm);
    $recipe->setrecipeDesc($this->getRequestParameter('recipe_desc'));
    $recipe->setRecipePrepTm($this->getRequestParameter('recipe_prep_tm'));
    $recipe->setRecipeCookTm($this->getRequestParameter('recipe_cook_tm_hr').':'.$this->getRequestParameter('recipe_cook_tm_mn'));
    $recipe->setRecipeSrvgs($this->getRequestParameter('recipe_srvgs'));
    $recipe->setRecipeDirections($this->getRequestParameter('recipe_directions'));
    
    $recipe_pic = $this->getRequest()->getFileName('pic');
    if(strlen($recipe_pic) > 0)
	 {
	    $recipe_pic=myRecipeTitle::NamePic($recipe_pic, $recipe_nm);
        $thumbnail = new sfThumbnail(150,150);
        $thumbnail->loadFile($this->getRequest()->getFilePath('pic'));
        $thumbnail->save(sfConfig::get('sf_upload_dir').'/recipe_images'.'/thumbnail/'.$recipe_pic);
    
        $this->getRequest()->moveFile('pic', sfConfig::get('sf_upload_dir') .'/recipe_images/'.$recipe_pic);
        $recipe->setRecipePicture($recipe_pic);
	  }
    
   //check to see if the admin is editing the recipe and may be changing the owner of the recipe
   if($this->getRequestParameter('user_nm_admin'))
   {
      $recipe->setUserId($this->getRequestParameter('user_nm_admin'));	
   }
   else
   {
     //check to see if this is an existing recipe if so set the user id the same as it currently is, if not set it as the person who is        
     //logged in
     $recipe->getUserId() ? $recipe->setUserId($recipe->getUserId()) :  $recipe->setUserId($this->getRequestParameter('user_id'));
   }
    
    $recipe->setBase($this->getRequestParameter('base'));
    $recipe->setEthnicityId($this->getRequestParameter('ethnicity_id'));
    $recipe->setCourseId($this->getRequestParameter('course_id')); 
    $recipe->save();
    
    $ingrIds = array();
    foreach($this->getRequestParameter('ingrs') as $ingrd_seq=>$ingr)
    {
	   $n_ingr = myIng::normalize($ingr);
	   if(strlen($n_ingr) == 0)
	     continue; //skip the rest of this loop
	    $ingr = IngredientPeer::getIngByName($n_ingr);
	    //if the ingredient isn't found create it
        if(!$ingr)
        {
	       $userId = $this->getUser()->getSubscriberId();
	       IngredientPeer::addIngredientFor($n_ingr, $userId);
	       $ingr = IngredientPeer::getIngByName($n_ingr);
        }
        $ingrIds[$ingrd_seq] = $ingr->getIngrdId();
    }
  $recipe->setIngr($ingrIds,$recipe->getPrimaryKey(),$this->getRequestParameter('quantity'),
   $this->getRequestParameter('msrmt'),$this->getRequestParameter('prep')
   );  
    $recipe->addKeywordsForUser($this->getRequestParameter('keyword'), $this->getRequestParameter('user_id'));
    mySearchIndex::ReIndex($recipe->getRecipeId());
    return $this->redirect('@get_recipe?recipestripnm='.$recipe->getRecipeStripNm());
          
   }
 
  public function handleErrorUpdate()
  {
    $this->count = $this->getRequestParameter('count');
    $this->data = $this->getRequest()->getParameterHolder()->getAll();
    $this->forward('recipe', 'edit');
  }

  private function getRecipeOrCreate ($recipestripnm = 'recipe_strip_nm')
  {
    if (!$this->getRequestParameter($recipestripnm, 0))
    {
      $recipe = new Recipe();
    }
    else
    {
     $recipe = RecipePeer::getRecipeFromStripTitle($this->getRequestParameter($recipestripnm));

      $this->forward404Unless($recipe instanceof Recipe);
    }

    return $recipe;
  }
  
  public function executeRemovePic()
  {
    $id= $this->getRequestParameter('id');
    $this->recipe = RecipePeer::retrieveByPk($id);
   //remove the picture 
   unlink(sfConfig::get('sf_upload_dir') .'/recipe_images/'.$this->recipe->getRecipePicture());
   //remove the thumbnail
   unlink(sfConfig::get('sf_upload_dir') .'/recipe_images/'.'/thumbnail/'.$this->recipe->getRecipePicture());
   //set the recipe_picture field to NULL
    $this->recipe->setRecipePicture(NULL);
    $this->recipe->save();
   //update the value of $pic to pass back to the template and rebuild the index 
    $this->pic = $this->recipe->getRecipePicture();
    mySearchIndex::ReIndex($this->recipe->getRecipeId());	
  }

  public function executeRateForRecipe()
  {
	  $this->id = $this->getRequestParameter('id');
      $recipe = RecipePeer::retrieveByPk($this->id);

	  if (!$recipe) 
      {
		  return sfView::NONE;
	  }
	  
	  $rate = new Rate();
      $rate->setUserId($this->getUser()->getSubscriberId());
      $rate->setRecipeId($recipe->getRecipeId());
      $rate->setRate($this->getRequestParameter('rate'));
      $rate->save();
      mySearchIndex::ReIndex($recipe->getRecipeId());
      $this->rate = $rate->getRecipe()->getAverageRating();
 
  }
  
  public function executeBrowseBase()
  {
  	$this->base = $this->getRequestParameter('base');
	$this->recipes = RecipePeer::getRecipesByBase($this->base);
	$this->getResponse()->setTitle('OpenEats Recipes with:: ' . $this->base);
  }
  
  public function executeBrowseCourse()
  {
   $this->course = $this->getRequestParameter('course');
   $recipe_course = CoursePeer::getCourseByName($this->course);
   $this->recipes = $recipe_course->getRecipes();	
   $this->getResponse()->setTitle('OpenEats Recipes with:: ' . $this->course);
  }
  
  public function executeBrowseEthnicity()
  {
  	$this->ethnicity = $this->getRequestParameter('ethnicity');
  	$recipe_ethn = EthnicityPeer::getEthnByName($this->ethnicity);
    $this->recipes = $recipe_ethn->getRecipes(); 
    $this->getResponse()->setTitle('OpenEats Recipes with:: ' . $this->ethnicity);
  }

  public function executeBrowseRate()
  {
    $this->recipes = RecipePeer::BrowseByRate();
    $this->getResponse()->setTitle('OpenEats Browse by Rating');
  }
  
  public function executeBrowseName()
  {
    $this->recipes = RecipePeer::BrowseByName();
    $this->getResponse()->setTitle('OpenEats Browse by Name');
  }
 
  public function handleErrorAddIng()
  {
  	 return sfView::SUCCESS;
  }

  /** hijack the getCredential part of the login to set a user to own their recipes
  * see http://www.symfony-project.org/snippets/snippet/18  for more info
  */
  public function getCredential()
  {
  	$this->recipe = $this->_retrivePost();
  	if ($this->getUser()->isOwnerOf($this->recipe)) 
  	{
  		$this->getUser()->addCredential('owner'); 		
  	}
  	else
  	{
  		$this->getUser()->removeCredential('owner');
  	}
  	return parent::getCredential();
  }
	 
  private function _retrivePost()
  {
  	$recipe = $this->getRequestParameter('recipe_strip_nm');
 	$exist = RecipePeer::getRecipeFromStripTitle($recipe);
  	
  	if ($exist)
  	{
  		return $exist;
  	}
  	else 
  	{
  		return null;
  	}
  }
  
  public function executeTopRecipe()
  {
  	$this->recipes = RecipePeer::getTopRecipe();
  }

  public function executeAdd_Ing_Ajax()
  {
   $this->ingrlist = IngredientPeer::getInglist();
   $recipeIngrd = new RecipeIngrd();
   $recipeIngrd->setIngrdSeq($this->getRequestParameter('ingrd_seq'));
   // None of the other fields need to be set because they will
   // be automatically retrieved from the request parameters.
   $this->ingr = $recipeIngrd;
  }
 
 public function executeCheckRecipeNm()
 {
 	$recipe_nm = $this->getRequestParameter('recipe_nm');
  	$recipe = RecipePeer::getRecipeFromName($recipe_nm);
 	
 	if ($recipe)
 	{
 		$this->setFlash('recipe_exist', 'yes');
 		return sfView::SUCCESS;
 	} else {
 		$this->setFlash('recipe_exist', 'no');
 		return sfView::SUCCESS;
 	}
  }
  
  public function executeSearch()
  {
  	$this->query = $this->getRequestParameter('search_query');
  	$this->forward404Unless($this->query);
  	
  	$this->getResponse()->setTitle('Search for \''. $this->query . '\'', true);
    $hits = mySearchIndex::SearchIndex($this->query); 
    $this->hits = $hits;
    $this->searchinfo = 'Search for \'' . $this->query . '\' resulted in ' . count($hits) . ' hits';
  }
  
  public function executeAdvanceSearch()
  {
    if ($this->getRequest()->getMethod() != sfRequest::POST)
    {
      // Display the form
      return sfView::SUCCESS;
    } else
    {
    	//Handle the submison
    	$boolean = FALSE;
    	$title = $this->getRequestParameter('search_title');
    	$keyword = $this->getRequestParameter('search_keywords');
    	$submited = $this->getRequestParameter('search_submited');
    	$with_ing = $this->getRequestParameter('search_with_ing');
    	$without_ing = $this->getRequestParameter('search_without_ing');

    	if($title)
    	{
    		$this->query = "title:".$title;
    	}
    	if($keyword)
    	{
    		if($this->query):
    		  $this->query = $this->query ." AND ". "keyword:".$keyword;
    		else:
             $this->query = "keyword:".$keyword;
           endif;    
    	}
        if($submited)
        {
        	if($this->query):
        	  $this->query = $this->query ." AND ". "submited:".$submited;
        	else:
             $this->query = "submited:".$submited;
            endif;   
        }
        if($with_ing)
        {
        	 $ings = explode(" ", $with_ing);
        	 if($this->query):
               foreach($ings as $ing)
               {
               	$this->query = $this->query . " AND ". "ingredient:".$ing;
               }
             else:
               foreach($ings as $ing)
               {
                 $boolean=TRUE;
               	 $this->query = $this->query ." ingredient:+".$ing;
               }  
             endif;   
        }
        if($without_ing)
        {
          $ings = explode(" ", $without_ing);
          if($this->query && $boolean):
            foreach($ings as $ing)
            {
             $this->query = $this->query . " ingredient:-".$ing;
            }
            elseif($this->query):
              foreach($ings as $ing)
               {
                 $this->query = $this->query . " AND NOT ". " ingredient:".$ing;
               }
            else:
              foreach($ings as $ing)
              {
              	$this->query = $this->query." ingredient:-".$ing;    
              }
            endif;   
        }
    	$this->getResponse()->setTitle('Search for \''. $this->query . '\'', true);
    
      // $hits = array();
       $hits = mySearchIndex::SearchIndex($this->query);
       $this->hits = $hits;
       $this->searchinfo = 'Search for \'' . $this->query . '\' resulted in ' . count($hits) . ' hits';
       $this->setTemplate("Search");
    }
 
  }

}

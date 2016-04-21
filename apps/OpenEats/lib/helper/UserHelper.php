<?php
 
use_helper('Javascript');
/*Function used to store a recipe, it checks to see if a recipe has already been stored
or if it can be stored.  Also makes sure you have logged in*/ 
function link_to_user_stored($user, $recipe)
{
  //check to see if the user has logged in
  if ($user->isAuthenticated())
  {
    //check to see if the user has the recipe stored already
  	$stored = StoredRecipePeer::retrieveByPk($user->getSubscriberId(), $recipe->getRecipeId());
    if ($stored)
    {
      // already stored
      return 'Stored!';
    }
    else
    {
      // recipe has not been stored so give them a link to store it and then call a function to store it in the database
      return link_to_remote('Store', array(
        'url'      => 'user/stored?id='.$recipe->getRecipeId(),
        'update'   => array('success' => 'store_recipe'),
        'loading'  => "Element.show('indicator')",
        'complete' => "Element.hide('indicator');".visual_effect('highlight', 'mark_'.$recipe->getRecipeId()),
      ));
    }
  }
  //if the user is not logged in display the login form
  else
  {
    return link_to_function('Store', visual_effect('blind_down', 'loginbox', array('duration' =>0.5)));
  }
}

//create a link to the recipes that are stored for a user to display on the profile page
function link_to_stored($stored)
{
  	$recipe = $stored->getStoredRecipeFor();
  	$recipe_nm = $recipe->getrecipeNm();
  	return link_to($recipe_nm, '@get_recipe?recipestripnm='.$recipe->getRecipeStripNm());
  	  	
}

//add a link next to each stored recipe that allows a user to unstore the recipe
function link_to_unstore($user, $stored)
{
	$recipe_id = $stored->getRecipeId();
	
	if ($user->isAuthenticated())
	{
		return link_to_remote('unstore', array(
		'url'=>'user/unstore?id='.$recipe_id,
	    'update'=> array('success' => 'block_'.$recipe_id),
	     ));
	}
}

/**
 * Create a link to a users profile
 *
 * @param users name $user
 * @return link to user profile
 */

function link_to_profile($user)
{
	$login = $user->getUserLogin();
	return link_to($login, '@user_profile?login='.$login);
}

function link_to_user_suggest($user, $id, $ans)
{
	//is the use logged in
	if ($user->isAuthenticated())
	{
	 //See if the user already voted for this suggestion
	 $rated = RateSuggestionPeer::retrieveByPk($user->getSubscriberId(), $id);
	 if (!$rated)
	 {
		//user has not suggested this recipe give them a link to suggest
		return link_to_remote($ans, array(
			'url' => 'user/rateSuggestion?id='.$id.'&ans='.$ans,
			'update' => array('success'=>'rate_suggest_'.$id)
			));	
	 } else 
	 {
		if ($ans == 'yes'):
		 echo "<span id='voted'>You voted " . $rated->getRate(). " for this suggestion</span>";
		endif;
	 }
   }	
}

?>
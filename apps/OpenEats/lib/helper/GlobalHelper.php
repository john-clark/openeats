<?php


/**
 * Return link to login if user is not logged in else link to the uri
 *
 * @param int link name $name
 * @param int routing rule $uri
 * @return link to routing rule if logged in, else return link to login
 */

function link_to_login($name, $uri = null)
{
	if ($uri && sfContext::getInstance()->getUser()->isAuthenticated())
    {
      return link_to($name, $uri);
    }
    else
    {
      return link_to_function($name, visual_effect('blind_down', 'loginbox', array(
	'duration' => 0.5,
    'afterFinish' => 'function() { Form.Element.focus(\'login\'); }'
	)));
    }
}


/**
 * Display link ro rss feed
 *
 * @param name of feed $name
 * @param int routing rule to feed $uri
 * @return link to feed
 */

function link_to_feed($name, $uri)
{
  return link_to(image_tag('feed.gif', array('alt' => $name, 'title' => $name)), $uri);
}

function link_to_report_recipe($recipe, $user)
{
	use_helper('Javascript');
	
	$text = '[Report to Administrator]';
	
	if ($user->isAuthenticated())
	{
		$has_reported_recipe = RecipeReportPeer::retrieveByPk($user->getSubscriberId(), $recipe->getRecipeId());
		if ($has_reported_recipe)
		{
			//user already reported this recipe
			return '[Reported]';
		}
		else
		{
			return link_to_remote($text, array(
			   'url' => '@report_recipe?recipestripnm='.$recipe->getRecipeStripNm(),
			   'update' => array('success' => 'report_recipe_'.$recipe->getRecipeId()),
			   'complete' => visual_effect('highlight', 'report_recipe_'.$recipe->getRecipeId()) 
			  ));
		}
	}
}
	
function link_to_recipe($recipe)
	{
	  	$pic = myRecipe::getPicture($recipe);
	    return  link_to($recipe->getrecipeNm(), '@get_recipe?recipestripnm='.$recipe->getRecipeStripNm(), array('title'=>"cssheader=[ttiph] cssbody=[ttipb] body=[<img src='$pic' />] offsety=[-120] offsetx=[120] fade=[on] delay=[200]"));
    }

function link_to_recipe_search($recipe)
{
	if ($recipe->pic):
	  $pic='/uploads/recipe_images/thumbnail/'.$recipe->pic;
	else:
	  $pic="/images/oerecipe.png";
	endif;
	return link_to($recipe->title, '@get_recipe?recipestripnm='.$recipe->recipestripnm, array('title'=>"cssheader=[ttiph] cssbody=[ttipb] body=[<img src='$pic' />] offsety=[-120] offsetx=[120] fade=[on] delay=[200]"));
}




?>
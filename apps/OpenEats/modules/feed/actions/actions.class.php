<?php

/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * feed actions.
 *
 * @package    openeats
 * @subpackage feed
 * @author     Quenten Griffith
 */
class feedActions extends sfActions
{
  
  /**
   * Create the rss feed for the 10 most recent headlines
   *
   */
  public function executeHeadlineFeed()
  {
    //get the 10 most recent headlines based off created_at date
  	$c = new Criteria();
	$c->addDescendingOrderByColumn(HeadlinePeer::CREATED_AT);
	$c->setLimit('10');
	$headlines = HeadlinePeer::doSelect($c);
	
	//set up the rss feed
    $feed = new sfAtom1Feed();
	$feed->setTitle('OpenEats Headlines');
	$feed->setLink('@homepage');
	$feed->setDescription('A list of news makers at the OpenEats recipe site');
	
	 //take the headline object and set the rss feed vars
	 foreach ($headlines as $headline)
  {
    $item = new sfFeedItem();
    $item->setTitle($headline->getHeadlineTitle());
    $item->setLink('@get_headline?headlinestriptitle='.$headline->getHeadlineStripTitle());
    $item->setPubdate($headline->getCreatedAt('U'));
    $item->setUniqueId($headline->getHeadlineStripTitle());
    $item->setDescription($headline->getHeadlineIntro());
 
    $feed->addItem($item);
  }
 	$this->feed = $feed;
  }
  public function executeRecipeFeed()
  {
	$feed = new sfAtom1Feed();
	$feed->setTitle('OpenEats New Recipes');
	$feed->setLink('recipe/');
	$feed->setDescription('A list of new recipes at the OpenEats recipe site');
	
	$newist = RecipePeer::getLatestRecipe($amt=10);
	foreach ($newist as $recipe)
	{
		$item = new sfFeedItem();
		$item->setTitle($recipe->getRecipeNm());
		$item->setLink('@get_recipe?recipestripnm='.$recipe->getRecipeStripNm());
		$item->setPubDate($recipe->getCreatedAt('U'));
		$item->setUniqueId($recipe->getRecipeStripNm());
		$item->setAuthorName($recipe->getUser());
		$item->setDescription($recipe->getRecipeDesc());
		$feed->addItem($item);
	}
	
   	$this->feed = $feed;
  }

  public function executeTopRecipeFeed()
  {
	$feed = new sfAtom1Feed();
	$feed->setTitle('OpenEats Top Recipes');
	$feed->setLink('recipe/');
	$feed->setDescription('Top Recipes at the OpenEats recipe site');
	
	$newist = RecipePeer::getTopRecipe($amt=10);
	foreach ($newist as $recipe)
	{
		$item = new sfFeedItem();
		$item->setTitle($recipe->getRecipeNm());
		$item->setLink('@get_recipe?recipestripnm='.$recipe->getRecipeStripNm());
		$item->setPubDate($recipe->getCreatedAt('U'));
		$item->setUniqueId($recipe->getRecipeStripNm());
		$item->setAuthorName($recipe->getUser());
		$item->setDescription($recipe->getRecipeDesc());
		$feed->addItem($item);
	}
	
   	$this->feed = $feed;
  }
}
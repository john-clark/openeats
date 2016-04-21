<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for representing a row from the 'recipe_suggestion' table.
 *
 * 
 *
 * @package lib.model
 */ 
class RecipeSuggestion extends BaseRecipeSuggestion
{
  	public function save($con=null)
	{
		$con = Propel::getConnection();
		try
		{
			$con->begin();
			$ret = parent::save($con);
			$this->updateRelatedRecipe($con);
			$con->commit();
			return $ret;
		}
		catch (Exception $e)
		{
			$con->rollback();
			throw $e;
		}
	}
	//update nb_suggestion in recipe table
	private function updateRelatedRecipe($con)
	{
		$recipe = $this->getRecipe();
		$c = new Criteria();
		$c->add(RecipeSuggestionPeer::RECIPE_ID, $recipe->getRecipeId());
		$recipe->setNbSuggestion(RecipeSuggestionPeer::doCount($c, $con));
		$recipe->save($con);
	}	
}

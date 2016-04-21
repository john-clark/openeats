<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for representing a row from the 'recipe_report' table.
 *
 * 
 *
 * @package lib.model
 */ 
class RecipeReport extends BaseRecipeReport
{
	public function save($con = null)
	{
		parent::save();
		
		$recipe = $this->getRecipe();
		$recipe->setNbReport($recipe->getNbReport() + 1);
		$recipe->save();
	}
}

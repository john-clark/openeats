<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'lib/model/om/BaseRecipeKeyword.php';


/**
 * Skeleton subclass for representing a row from the 'recipe_keyword' table.
 *
 *
 * @package model
 */	
class RecipeKeyword extends BaseRecipeKeyword {
	
	/**
	 * Overide the setKeyword function to save the keyword and to pass through 
	 * the normalzie function and save a normalized keyword
	 * @param int $v new value
	 */
	
	public function setKeyword($v)
	{
		//call the regular setKeyword to save the keyword
		parent::setKeyword($v);

		//save the keyword as normalzied
		$this->setNormalizedKeyword(myKeyword::normalize($v));
    }
}

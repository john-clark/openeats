<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * recipe class to do code repeated in the recipe action class.
 *
 * @package    openeats
 * @subpackage recipe
 * @author     Quenten Griffith
 */
class myRecipe
{
  public static function getPicture($recipe)
  {
   if ($recipe->getRecipePicture()):
  	return $pic='/uploads/recipe_images/thumbnail/'.$recipe->getRecipePicture();
   else:
	return $pic="/images/oerecipe.png";	
   endif;
  }
}
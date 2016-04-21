<?php
 //class to make sure the ingredient a user adds is what we want to be in the DB
class myIng
{
  
	/**
	 * Normalize the ingredients entered by a user
	 *
	 * @param int new ingredient $ing 
	 * @return normalized ingredient
	 */
  public static function normalize($ing)
  {
  	//Only letters and spaces are allowed
  	$n_ing = preg_replace('/[^a-zA-Z :space:]/', '', $ing);
  	//Capltize the first letter of the first word and lower case eveyrhting else
  	$n_ing = ucfirst(strtolower($n_ing));
  	trim($n_ing);
  	
  	return $n_ing;
  	  	
  }
  /**
  *This function is used to add quotes to ajax arrays for autocomplete
  */
   public static function addquotes($str)
   {
     return '\'' . $str . '\'';
   }
  
}
  
  
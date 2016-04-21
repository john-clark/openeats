<?php
 
class myRecipeTitle
{ 
	
  /**
   * Normalize the title of a new recipe
   *
   * @param int recipe title $text
   * @return normlaized recipe title
   */
  public static function stripText($text)
  {
    $text = strtolower($text);
 
    // strip all non word chars
    $text = preg_replace('/\W/', ' ', $text);
 
    // replace all white space sections with a dash
    $text = preg_replace('/\ +/', '_', $text);
 
    // trim dashes
    $text = preg_replace('/\-$/', '', $text);
    $text = preg_replace('/^\-/', '', $text);
 
    return $text;
  }
  
  public static function NamePic($file, $recipe_nm)
  {
  	//Normalize the Recipe Name
  	$recipe_nm = myRecipeTitle::stripText($recipe_nm);
  	$user = sfContext::getInstance()->getUser()->getLogin();
  	
  	//get the file extension
  	$ext = explode('.', $file);
  	$ext = array_pop($ext);
  	
  	//create the new file name off of the recipe name and user name and return it
  	
  	$file_nm = $recipe_nm."_".$user.".".$ext;
  	
  	return $file_nm;
  }
  
}
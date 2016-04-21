<?php
 
class myKeyword
{
  
	/**
	 * Take the keyword a user enters and santize it before saving to the database
	 *
	 * @param int $keyword new value
	 * @return normalized keyword
	 */
  
	public static function normalize($keyword)
  {
    $n_keyword = strtolower($keyword);
 
    // remove all unwanted chars
    $n_keyword = preg_replace('/[^a-zA-Z0-9\s]/', '', $n_keyword);
   
    // replace all white space sections with a dash
    $n_keyword = preg_replace('/\ +/', '-', $n_keyword);

    // trim dashes
    $n_keyword = preg_replace('/\-$/', '', $n_keyword);
    $n_keyword = preg_replace('/^\-/', '',$n_keyword);
    return trim($n_keyword);
  }

  public static function splitPhrase($keyword)
	{
	  $keywords = explode(',', $keyword);
	  $keywords = array_filter($keywords);
	  return $keywords;
	}
}

  ?>


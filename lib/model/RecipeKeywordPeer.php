<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

  // include base peer class
  require_once 'lib/model/om/BaseRecipeKeywordPeer.php';
  
  // include object class
  include_once 'lib/model/RecipeKeyword.php';


/**
 * Skeleton subclass for performing query and update operations on the 'recipe_keyword' table.
 *
 *
 * @package model
 */	
class RecipeKeywordPeer extends BaseRecipeKeywordPeer {

	public static function getPopularKeywords($amt=20)
	{
		$keywords = array();
		$con = Propel::getConnection();
		$query = '
			SELECT '.RecipeKeywordPeer::NORMALIZED_KEYWORD.' AS keyword,
			COUNT('.RecipeKeywordPeer::NORMALIZED_KEYWORD.') AS count
			FROM '.RecipeKeywordPeer::TABLE_NAME.'
			GROUP BY '.RecipeKeywordPeer::NORMALIZED_KEYWORD.'
			ORDER BY count DESC';
		$stmt = $con->prepareStatement($query);
		$stmt->setLimit($amt);
		$rs = $stmt->executeQuery();
		$max_popularity = 0;
		while ($rs->next())
		{
			if (!$max_popularity)
			{
				$max_popularity = $rs->getInt('count');
			}
			$keywords[$rs->getString('keyword')] = floor(($rs->getInt('count') / $max_popularity * 3)+ 1);
		}
		ksort($keywords);
		return $keywords;	
		
	}
	
	public static function getKeywordsWithCount($amt = 100)
	{
		$keywords = array();
		
		$con = Propel::getConnection();
		$query = '
			SELECT keyword.normalized_keyword as keyword,
	        COUNT(keyword.normalized_keyword) as count
			FROM '.RecipeKeywordPeer::TABLE_NAME.' AS keyword
            GROUP BY keyword.normalized_keyword
            ORDER BY count DESC';

		$stmt = $con->prepareStatement($query);
		$stmt->setLimit($amt);
		$rs = $stmt->executeQuery();
			while ($rs->next())
			{
				$keywords[$rs->getString('keyword')] = $rs->getInt('count');
			}
		ksort($keywords);
		return $keywords;
	}

	public static function getKeywordsByDate($amt=20)
	{
		$keywords = array();
		$con = Propel::getConnection();
		$query = '
			SELECT '.RecipeKeywordPeer::NORMALIZED_KEYWORD.' AS keyword,
            '.RecipeKeywordPeer::CREATED_AT.' AS created,
			COUNT('.RecipeKeywordPeer::NORMALIZED_KEYWORD.') AS count
			FROM '.RecipeKeywordPeer::TABLE_NAME.'
			GROUP BY '.RecipeKeywordPeer::NORMALIZED_KEYWORD.'
			ORDER BY created DESC';
		$stmt = $con->prepareStatement($query);
		$stmt->setLimit($amt);
		$rs = $stmt->executeQuery();
		$max_popularity = 0;
		while ($rs->next())
		{
			if (!$max_popularity)
			{
				$max_popularity = $rs->getInt('count');
			}
			$keywords[$rs->getString('keyword')] = floor(($rs->getInt('count') / $max_popularity * 3)+ 1);
		}
		//ksort($keywords);
		return $keywords;	
		
	}
	public static function getAssiocatedKeywords($recipes, $exclude_keywords, $amt=20)
	{
		$recipe_ids = array();
		foreach ($recipes as $recipe)
		{
			$recipe_ids[] = $recipe->getRecipeId();
		}
		$con = Propel::getConnection();
		$query = '
			SELECT '.RecipeKeywordPeer::NORMALIZED_KEYWORD.' AS keyword,
            COUNT('.RecipeKeywordPeer::NORMALIZED_KEYWORD.') as count
            FROM '.RecipeKeywordPeer::TABLE_NAME.'
            WHERE '.RecipeKeywordPeer::RECIPE_ID.' IN('.implode(' ,', $recipe_ids).')
            GROUP BY '.RecipeKeywordPeer::NORMALIZED_KEYWORD.'
            ORDER BY '.RecipeKeywordPeer::NORMALIZED_KEYWORD.' ASC';
		$stmt = $con->prepareStatement($query);
		$stmt->setLimit($amt);
		$rs = $stmt->executeQuery();
		
		$keywords = array();
		while ($rs->next())
		{
			$keyword = $rs->getString('keyword');
			if (array_search($keyword, $exclude_keywords) === false)
			{
				$keywords[$keyword] = $rs->getInt('count');
			}
		}
		return $keywords;
	}  
    
   public static function getAutoComlete($keyword)
   {
      $keywords = array();

	  $con = sfContext::getInstance()->getDatabaseConnection('propel');
	  $query = '
	    SELECT DISTINCT %s AS keyword
	    FROM %s
	    WHERE %s LIKE ?
	    ORDER BY %s
	  ';

	  $query = sprintf($query,
	    RecipeKeywordPeer::KEYWORD,
	    RecipeKeywordPeer::TABLE_NAME,
	    RecipeKeywordPeer::KEYWORD,
	    RecipeKeywordPeer::KEYWORD
	  );

	  $stmt = $con->prepareStatement($query);
	  $stmt->setString(1, $keyword.'%');
	  $stmt->setLimit(10);
	  $rs = $stmt->executeQuery();
	  while ($rs->next())
	  {
	    $keywords[] = $rs->getString('keyword');
	  }
	  return $keywords;	
   }
	
	
} 

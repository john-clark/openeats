<?php
class mySearchIndex
{
	public static function getIndexLocation()
	{
		$location = SF_ROOT_DIR.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'search_index';
		
		return $location;
	}
	/**
	 * checkIndex function  check to make sure the index exist if not create it
	 * A
	 * @return NULL
	 * @author Chad Parry
	 **/
	
	private static function checkIndex($location)
	{
		if (!file_exists($location.'/segements.gen')):
		  self::BuildIndex();
	    endif;	
	}
	
	public static function getIndexAnalyzer()
    {
      $index_analyzer = new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8Num();
	
      return $index_analyzer;
    }
	
	
	public static function BuildIndex()
	{
		$index = Zend_Search_Lucene::create(self::getIndexLocation());
		Zend_Search_Lucene_Analysis_Analyzer::setDefault(self::getIndexAnalyzer());
		$recipes = RecipePeer::doSelect(new Criteria());
		foreach($recipes as $recipe)
		{
			$doc = self::createIndexDocument($recipe);
			$index->addDocument($doc);
		}
	}
	
	public static function ReIndex($id)
	{
		self::checkIndex(self::getIndexLocation());
		$index = Zend_Search_Lucene::open(self::getIndexLocation());
		Zend_Search_Lucene_Analysis_Analyzer::setDefault(self::getIndexAnalyzer());
		$recipe = RecipePeer::retrieveByPK($id);
		
		//delete the recipe out of the index
		$term = new Zend_Search_Lucene_Index_Term($recipe->getRecipeId(), 'recipe_id');
		$query = new Zend_Search_Lucene_Search_Query_Term($term);
		$hits = array();
		$hits = $index->find($query);
		foreach ($hits as $hit)
		{
			$index->delete($hit->id);
		}
		
		//readd the chagned recipe to the index
		
		$doc = self::createIndexDocument($recipe);
		
		$index->addDocument($doc);
	}
	
	
	private static function createIndexDocument($recipe)
	{
		$doc = new Zend_Search_Lucene_Document();

		$doc->addField(Zend_Search_Lucene_Field::Keyword('recipe_id', $recipe->getRecipeId()));
	    $doc->addField(Zend_Search_Lucene_Field::UnIndexed('recipestripnm', $recipe->getRecipeStripNm()));
		$doc->addField(Zend_Search_Lucene_Field::Text('title', strtolower($recipe->getRecipeNm())));
		$doc->addField(Zend_Search_Lucene_Field::Keyword('submited', strtolower($recipe->getUser()->getUserLogin())));
		$doc->addField(Zend_Search_Lucene_Field::Unindexed('pic', $recipe->getRecipePicture()));
		$doc->addField(Zend_Search_Lucene_Field::UnIndexed('recipe_desc', $recipe->getRecipeDesc()));
		$doc->addField(Zend_Search_Lucene_Field::UnIndexed('rate', $recipe->getAverageRating()));
		$doc->addField(Zend_Search_Lucene_Field::Keyword('base', strtolower($recipe->getBase())));
		$doc->addField(Zend_Search_Lucene_Field::Keyword('course', strtolower($recipe->getCourse()->getCourseNm())));
		$doc->addField(Zend_Search_Lucene_Field::Keyword('ethnicity', strtolower($recipe->getEthnicity()->getEthnicityNm())));
		$keywords = $recipe->getKeywords();
		$keyword = implode(" ", $keywords);  
		$doc->addField(Zend_Search_Lucene_Field::Text('keyword', strtolower($keyword)));
		$ings = $recipe->getIngrds();
		foreach($ings as $ing):
		  $ing_array[] = $ing->getIngredient()->getIngrdNm();
		endforeach;
		$ing = implode(" ", $ing_array);
		$doc->addField(Zend_Search_Lucene_Field::Text('ingredient', strtolower($ing)));
				
		return $doc;		
	}
	
	public static function SearchIndex($query)
	{
	$search_index = self::getIndexLocation();
    Zend_Search_Lucene_Analysis_Analyzer::setDefault(self::getIndexAnalyzer());
    $query = strtolower($query);
    //$query = preg_replace('/[\*\?\!\&\%\(\)]/', '', $query);
    //$query = preg_replace('/\W/', ' ', $query);
    $hits = array();
    self::checkIndex(self::getIndexLocation());
    $index = Zend_Search_Lucene::open($search_index);
    $hits = $index->find($query);
    
    return $hits;
	}
	
	public static function deleteIndexDocument($id)
	{
		self::checkIndex(self::getIndexLocation());
		$index = Zend_Search_Lucene::open(self::getIndexLocation());
		Zend_Search_Lucene_Analysis_Analyzer::setDefault(self::getIndexAnalyzer());
		
		$term = new Zend_Search_Lucene_Index_Term($id, 'recipe_id');
		$query = new Zend_Search_Lucene_Search_Query_Term($term);
		$hits = array();
		$hits = $index->find($query);
		
		foreach ($hits as $hit)
		{
			$index->delete($hit->id);
		}
	}
         
		
}

<?php



class RecipeKeywordMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RecipeKeywordMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('recipe_keyword');
		$tMap->setPhpName('RecipeKeyword');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('RECIPE_ID', 'RecipeId', 'int' , CreoleTypes::INTEGER, 'recipe', 'RECIPE_ID', true, null);

		$tMap->addForeignPrimaryKey('USER_ID', 'UserId', 'int' , CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addColumn('KEYWORD', 'Keyword', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('NORMALIZED_KEYWORD', 'NormalizedKeyword', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
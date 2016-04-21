<?php



class RecipeSuggestionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RecipeSuggestionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('recipe_suggestion');
		$tMap->setPhpName('RecipeSuggestion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('SUGGESTION_ID', 'SuggestionId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('RECIPE_ID', 'RecipeId', 'int', CreoleTypes::INTEGER, 'recipe', 'RECIPE_ID', true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addColumn('SUGGESTION', 'Suggestion', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('NB_RATE', 'NbRate', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
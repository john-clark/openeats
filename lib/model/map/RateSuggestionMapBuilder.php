<?php



class RateSuggestionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RateSuggestionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rate_suggestion');
		$tMap->setPhpName('RateSuggestion');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('USER_ID', 'UserId', 'int' , CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addForeignPrimaryKey('SUGGESTION_ID', 'SuggestionId', 'int' , CreoleTypes::INTEGER, 'recipe_suggestion', 'SUGGESTION_ID', true, null);

		$tMap->addColumn('RATE', 'Rate', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
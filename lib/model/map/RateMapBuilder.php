<?php



class RateMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RateMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rate');
		$tMap->setPhpName('Rate');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('RATE_ID', 'RateId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addForeignKey('RECIPE_ID', 'RecipeId', 'int', CreoleTypes::INTEGER, 'recipe', 'RECIPE_ID', true, null);

		$tMap->addColumn('RATE', 'Rate', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
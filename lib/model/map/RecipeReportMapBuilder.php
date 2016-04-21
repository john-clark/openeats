<?php



class RecipeReportMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RecipeReportMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('recipe_report');
		$tMap->setPhpName('RecipeReport');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('USER_ID', 'UserId', 'int' , CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addForeignPrimaryKey('RECIPE_ID', 'RecipeId', 'int' , CreoleTypes::INTEGER, 'recipe', 'RECIPE_ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
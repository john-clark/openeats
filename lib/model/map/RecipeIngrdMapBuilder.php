<?php



class RecipeIngrdMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RecipeIngrdMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('recipe_ingrd');
		$tMap->setPhpName('RecipeIngrd');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('RECIPE_INGRD_ID', 'RecipeIngrdId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('RECIPE_ID', 'RecipeId', 'int', CreoleTypes::INTEGER, 'recipe', 'RECIPE_ID', true, null);

		$tMap->addForeignKey('INGRD_ID', 'IngrdId', 'int', CreoleTypes::INTEGER, 'ingredient', 'INGRD_ID', true, null);

		$tMap->addColumn('INGRD_SEQ', 'IngrdSeq', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('INGRD_PREP', 'IngrdPrep', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('INGRD_MSRMT', 'IngrdMsrmt', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('INGRD_QTY', 'IngrdQty', 'string', CreoleTypes::VARCHAR, true, 10);

	} 
} 
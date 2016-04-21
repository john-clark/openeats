<?php



class IngredientMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IngredientMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ingredient');
		$tMap->setPhpName('Ingredient');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('INGRD_ID', 'IngrdId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('INGRD_NM', 'IngrdNm', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'user', 'USER_ID', false, null);

	} 
} 
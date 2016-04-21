<?php



class GroceryAisleMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GroceryAisleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('grocery_aisle');
		$tMap->setPhpName('GroceryAisle');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('AISLE_ID', 'AisleId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('AISLE', 'Aisle', 'string', CreoleTypes::VARCHAR, true, 25);

	} 
} 
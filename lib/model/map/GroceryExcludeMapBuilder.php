<?php



class GroceryExcludeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GroceryExcludeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('grocery_exclude');
		$tMap->setPhpName('GroceryExclude');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('EXCLUDE_ID', 'ExcludeId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('GROCERY_ITEM', 'GroceryItem', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

	} 
} 
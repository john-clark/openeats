<?php



class GrocerylistMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GrocerylistMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('grocerylist');
		$tMap->setPhpName('Grocerylist');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('GROCERY_ID', 'GroceryId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('GROCERY_NM', 'GroceryNm', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('GROCERY_STRIP_NM', 'GroceryStripNm', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::DATE, false, null);

	} 
} 
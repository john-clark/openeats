<?php



class GroceryItemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GroceryItemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('grocery_item');
		$tMap->setPhpName('GroceryItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('GROCERY_ITEM_ID', 'GroceryItemId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('GROCERY_ID', 'GroceryId', 'int', CreoleTypes::INTEGER, 'grocerylist', 'GROCERY_ID', true, null);

		$tMap->addColumn('QTY', 'Qty', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MSRMT', 'Msrmt', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('GROCERY_ITEM', 'GroceryItem', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('AISLE_ID', 'AisleId', 'int', CreoleTypes::INTEGER, 'grocery_aisle', 'AISLE_ID', false, null);

	} 
} 
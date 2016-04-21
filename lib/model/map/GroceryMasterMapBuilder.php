<?php



class GroceryMasterMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GroceryMasterMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('grocery_master');
		$tMap->setPhpName('GroceryMaster');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('MASTER_ID', 'MasterId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('QTY', 'Qty', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MSRMT', 'Msrmt', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('GROCERY_ITEM', 'GroceryItem', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('AISLE_ID', 'AisleId', 'int', CreoleTypes::INTEGER, 'grocery_aisle', 'AISLE_ID', false, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

	} 
} 
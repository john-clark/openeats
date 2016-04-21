<?php



class MenuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MenuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('menu');
		$tMap->setPhpName('Menu');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('MENU_ID', 'MenuId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MENU_NM', 'MenuNm', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('MENU_STRIP_NM', 'MenuStripNm', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addColumn('MENU_DESC', 'MenuDesc', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MENU_PRIVATE', 'MenuPrivate', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::DATE, false, null);

	} 
} 
<?php



class MenuItemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MenuItemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('menu_item');
		$tMap->setPhpName('MenuItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ITEM_ID', 'ItemId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('MENU_ID', 'MenuId', 'int', CreoleTypes::INTEGER, 'menu', 'MENU_ID', true, null);

		$tMap->addForeignKey('COURSE_ID', 'CourseId', 'int', CreoleTypes::INTEGER, 'course', 'COURSE_ID', true, null);

		$tMap->addColumn('ITEM_NM', 'ItemNm', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ITEM_DESC', 'ItemDesc', 'string', CreoleTypes::VARCHAR, true, 2000);

	} 
} 
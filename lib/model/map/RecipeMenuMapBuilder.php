<?php



class RecipeMenuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RecipeMenuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('recipe_menu');
		$tMap->setPhpName('RecipeMenu');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('MENU_ID', 'MenuId', 'int' , CreoleTypes::INTEGER, 'menu', 'MENU_ID', true, null);

		$tMap->addForeignPrimaryKey('RECIPE_ID', 'RecipeId', 'int' , CreoleTypes::INTEGER, 'recipe', 'RECIPE_ID', true, null);

		$tMap->addForeignKey('COURSE_ID', 'CourseId', 'int', CreoleTypes::INTEGER, 'course', 'COURSE_ID', true, null);

		$tMap->addColumn('RECIPE_DESC', 'RecipeDesc', 'string', CreoleTypes::VARCHAR, false, 2000);

	} 
} 
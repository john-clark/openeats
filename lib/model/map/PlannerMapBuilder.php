<?php



class PlannerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PlannerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('planner');
		$tMap->setPhpName('Planner');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('PLANNER_ID', 'PlannerId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('RECIPE_ID', 'RecipeId', 'int', CreoleTypes::INTEGER, 'recipe', 'RECIPE_ID', false, null);

		$tMap->addForeignKey('MENU_ID', 'MenuId', 'int', CreoleTypes::INTEGER, 'menu', 'MENU_ID', false, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addColumn('PLANNER_DATE', 'PlannerDate', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
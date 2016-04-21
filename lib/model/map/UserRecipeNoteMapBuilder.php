<?php



class UserRecipeNoteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UserRecipeNoteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('user_recipe_note');
		$tMap->setPhpName('UserRecipeNote');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('USER_ID', 'UserId', 'int' , CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addForeignPrimaryKey('RECIPE_ID', 'RecipeId', 'int' , CreoleTypes::INTEGER, 'recipe', 'RECIPE_ID', true, null);

		$tMap->addColumn('RECIPE_NOTE', 'RecipeNote', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
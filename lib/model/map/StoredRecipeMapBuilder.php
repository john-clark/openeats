<?php



class StoredRecipeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.StoredRecipeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('stored_recipe');
		$tMap->setPhpName('StoredRecipe');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('USER_ID', 'UserId', 'int' , CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addForeignPrimaryKey('RECIPE_ID', 'RecipeId', 'int' , CreoleTypes::INTEGER, 'recipe', 'RECIPE_ID', true, null);

	} 
} 
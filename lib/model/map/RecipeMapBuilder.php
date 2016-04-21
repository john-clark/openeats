<?php



class RecipeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RecipeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('recipe');
		$tMap->setPhpName('Recipe');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('RECIPE_ID', 'RecipeId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('RECIPE_STRIP_NM', 'RecipeStripNm', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('RECIPE_NM', 'RecipeNm', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('RECIPE_DESC', 'RecipeDesc', 'string', CreoleTypes::VARCHAR, true, 2000);

		$tMap->addColumn('RECIPE_PREP_TM', 'RecipePrepTm', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('RECIPE_COOK_TM', 'RecipeCookTm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('RECIPE_SRVGS', 'RecipeSrvgs', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('RECIPE_SRVG_SZ', 'RecipeSrvgSz', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('RECIPE_DIRECTIONS', 'RecipeDirections', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('RECIPE_PICTURE', 'RecipePicture', 'string', CreoleTypes::VARCHAR, false, 400);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addForeignKey('COURSE_ID', 'CourseId', 'int', CreoleTypes::INTEGER, 'course', 'COURSE_ID', true, null);

		$tMap->addForeignKey('ETHNICITY_ID', 'EthnicityId', 'int', CreoleTypes::INTEGER, 'ethnicity', 'ETHNICITY_ID', true, null);

		$tMap->addColumn('BASE', 'Base', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('AVERAGE_RATING', 'AverageRating', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addColumn('NB_COMMENT', 'NbComment', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NB_REPORT', 'NbReport', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NB_SUGGESTION', 'NbSuggestion', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
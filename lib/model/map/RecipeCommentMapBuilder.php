<?php



class RecipeCommentMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RecipeCommentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('recipe_comment');
		$tMap->setPhpName('RecipeComment');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('COMMENT_ID', 'CommentId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'user', 'USER_ID', true, null);

		$tMap->addForeignKey('RECIPE_ID', 'RecipeId', 'int', CreoleTypes::INTEGER, 'recipe', 'RECIPE_ID', true, null);

		$tMap->addColumn('COMMENT', 'Comment', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
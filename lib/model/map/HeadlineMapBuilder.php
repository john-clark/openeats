<?php



class HeadlineMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.HeadlineMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('headline');
		$tMap->setPhpName('Headline');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('HEADLINE_ID', 'HeadlineId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('HEADLINE_TITLE', 'HeadlineTitle', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('HEADLINE_STRIP_TITLE', 'HeadlineStripTitle', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('HEADLINE_INTRO', 'HeadlineIntro', 'string', CreoleTypes::VARCHAR, true, 2000);

		$tMap->addColumn('HEADLINE_BODY', 'HeadlineBody', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('HEADLINE_TYPE', 'HeadlineType', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
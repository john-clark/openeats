<?php



class CourseMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CourseMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('course');
		$tMap->setPhpName('Course');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('COURSE_ID', 'CourseId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('COURSE_NM', 'CourseNm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('COURSE_DESC', 'CourseDesc', 'string', CreoleTypes::VARCHAR, false, 255);

	} 
} 
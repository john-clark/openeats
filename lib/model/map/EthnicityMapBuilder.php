<?php



class EthnicityMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EthnicityMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ethnicity');
		$tMap->setPhpName('Ethnicity');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ETHNICITY_ID', 'EthnicityId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ETHNICITY_NM', 'EthnicityNm', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('ETHNICITY_DESC', 'EthnicityDesc', 'string', CreoleTypes::VARCHAR, false, 255);

	} 
} 
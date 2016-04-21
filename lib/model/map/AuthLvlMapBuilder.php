<?php



class AuthLvlMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AuthLvlMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('auth_lvl');
		$tMap->setPhpName('AuthLvl');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('AUTH_LVL_ID', 'AuthLvlId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('AUTH_LVL_NM', 'AuthLvlNm', 'string', CreoleTypes::VARCHAR, false, 20);

	} 
} 
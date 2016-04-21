<?php



class UserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('user');
		$tMap->setPhpName('User');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('USER_FN', 'UserFn', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('USER_LN', 'UserLn', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('USER_ABOUT', 'UserAbout', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('USER_LOGIN', 'UserLogin', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('USER_PSWD', 'UserPswd', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('PSWD_SALT', 'PswdSalt', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('USER_EMAIL', 'UserEmail', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('AUTH_LVL_ID', 'AuthLvlId', 'int', CreoleTypes::INTEGER, 'auth_lvl', 'AUTH_LVL_ID', true, null);

		$tMap->addColumn('REMEMBER_KEY', 'RememberKey', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('USER_LASTLOGIN', 'UserLastlogin', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('USER_IP', 'UserIp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PLANNER_PRIVATE', 'PlannerPrivate', 'int', CreoleTypes::TINYINT, false, null);

	} 
} 
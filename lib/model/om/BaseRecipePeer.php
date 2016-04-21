<?php


abstract class BaseRecipePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'recipe';

	
	const CLASS_DEFAULT = 'lib.model.Recipe';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RECIPE_ID = 'recipe.RECIPE_ID';

	
	const RECIPE_STRIP_NM = 'recipe.RECIPE_STRIP_NM';

	
	const RECIPE_NM = 'recipe.RECIPE_NM';

	
	const RECIPE_DESC = 'recipe.RECIPE_DESC';

	
	const RECIPE_PREP_TM = 'recipe.RECIPE_PREP_TM';

	
	const RECIPE_COOK_TM = 'recipe.RECIPE_COOK_TM';

	
	const RECIPE_SRVGS = 'recipe.RECIPE_SRVGS';

	
	const RECIPE_SRVG_SZ = 'recipe.RECIPE_SRVG_SZ';

	
	const RECIPE_DIRECTIONS = 'recipe.RECIPE_DIRECTIONS';

	
	const RECIPE_PICTURE = 'recipe.RECIPE_PICTURE';

	
	const USER_ID = 'recipe.USER_ID';

	
	const COURSE_ID = 'recipe.COURSE_ID';

	
	const ETHNICITY_ID = 'recipe.ETHNICITY_ID';

	
	const BASE = 'recipe.BASE';

	
	const AVERAGE_RATING = 'recipe.AVERAGE_RATING';

	
	const NB_COMMENT = 'recipe.NB_COMMENT';

	
	const NB_REPORT = 'recipe.NB_REPORT';

	
	const NB_SUGGESTION = 'recipe.NB_SUGGESTION';

	
	const CREATED_AT = 'recipe.CREATED_AT';

	
	const UPDATED_AT = 'recipe.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('RecipeId', 'RecipeStripNm', 'RecipeNm', 'RecipeDesc', 'RecipePrepTm', 'RecipeCookTm', 'RecipeSrvgs', 'RecipeSrvgSz', 'RecipeDirections', 'RecipePicture', 'UserId', 'CourseId', 'EthnicityId', 'Base', 'AverageRating', 'NbComment', 'NbReport', 'NbSuggestion', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (RecipePeer::RECIPE_ID, RecipePeer::RECIPE_STRIP_NM, RecipePeer::RECIPE_NM, RecipePeer::RECIPE_DESC, RecipePeer::RECIPE_PREP_TM, RecipePeer::RECIPE_COOK_TM, RecipePeer::RECIPE_SRVGS, RecipePeer::RECIPE_SRVG_SZ, RecipePeer::RECIPE_DIRECTIONS, RecipePeer::RECIPE_PICTURE, RecipePeer::USER_ID, RecipePeer::COURSE_ID, RecipePeer::ETHNICITY_ID, RecipePeer::BASE, RecipePeer::AVERAGE_RATING, RecipePeer::NB_COMMENT, RecipePeer::NB_REPORT, RecipePeer::NB_SUGGESTION, RecipePeer::CREATED_AT, RecipePeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('RECIPE_ID', 'RECIPE_STRIP_NM', 'RECIPE_NM', 'RECIPE_DESC', 'RECIPE_PREP_TM', 'RECIPE_COOK_TM', 'RECIPE_SRVGS', 'RECIPE_SRVG_SZ', 'RECIPE_DIRECTIONS', 'RECIPE_PICTURE', 'USER_ID', 'COURSE_ID', 'ETHNICITY_ID', 'BASE', 'AVERAGE_RATING', 'NB_COMMENT', 'NB_REPORT', 'NB_SUGGESTION', 'CREATED_AT', 'UPDATED_AT', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('RecipeId' => 0, 'RecipeStripNm' => 1, 'RecipeNm' => 2, 'RecipeDesc' => 3, 'RecipePrepTm' => 4, 'RecipeCookTm' => 5, 'RecipeSrvgs' => 6, 'RecipeSrvgSz' => 7, 'RecipeDirections' => 8, 'RecipePicture' => 9, 'UserId' => 10, 'CourseId' => 11, 'EthnicityId' => 12, 'Base' => 13, 'AverageRating' => 14, 'NbComment' => 15, 'NbReport' => 16, 'NbSuggestion' => 17, 'CreatedAt' => 18, 'UpdatedAt' => 19, ),
		BasePeer::TYPE_COLNAME => array (RecipePeer::RECIPE_ID => 0, RecipePeer::RECIPE_STRIP_NM => 1, RecipePeer::RECIPE_NM => 2, RecipePeer::RECIPE_DESC => 3, RecipePeer::RECIPE_PREP_TM => 4, RecipePeer::RECIPE_COOK_TM => 5, RecipePeer::RECIPE_SRVGS => 6, RecipePeer::RECIPE_SRVG_SZ => 7, RecipePeer::RECIPE_DIRECTIONS => 8, RecipePeer::RECIPE_PICTURE => 9, RecipePeer::USER_ID => 10, RecipePeer::COURSE_ID => 11, RecipePeer::ETHNICITY_ID => 12, RecipePeer::BASE => 13, RecipePeer::AVERAGE_RATING => 14, RecipePeer::NB_COMMENT => 15, RecipePeer::NB_REPORT => 16, RecipePeer::NB_SUGGESTION => 17, RecipePeer::CREATED_AT => 18, RecipePeer::UPDATED_AT => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('RECIPE_ID' => 0, 'RECIPE_STRIP_NM' => 1, 'RECIPE_NM' => 2, 'RECIPE_DESC' => 3, 'RECIPE_PREP_TM' => 4, 'RECIPE_COOK_TM' => 5, 'RECIPE_SRVGS' => 6, 'RECIPE_SRVG_SZ' => 7, 'RECIPE_DIRECTIONS' => 8, 'RECIPE_PICTURE' => 9, 'USER_ID' => 10, 'COURSE_ID' => 11, 'ETHNICITY_ID' => 12, 'BASE' => 13, 'AVERAGE_RATING' => 14, 'NB_COMMENT' => 15, 'NB_REPORT' => 16, 'NB_SUGGESTION' => 17, 'CREATED_AT' => 18, 'UPDATED_AT' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RecipeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RecipeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RecipePeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(RecipePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RecipePeer::RECIPE_ID);

		$criteria->addSelectColumn(RecipePeer::RECIPE_STRIP_NM);

		$criteria->addSelectColumn(RecipePeer::RECIPE_NM);

		$criteria->addSelectColumn(RecipePeer::RECIPE_DESC);

		$criteria->addSelectColumn(RecipePeer::RECIPE_PREP_TM);

		$criteria->addSelectColumn(RecipePeer::RECIPE_COOK_TM);

		$criteria->addSelectColumn(RecipePeer::RECIPE_SRVGS);

		$criteria->addSelectColumn(RecipePeer::RECIPE_SRVG_SZ);

		$criteria->addSelectColumn(RecipePeer::RECIPE_DIRECTIONS);

		$criteria->addSelectColumn(RecipePeer::RECIPE_PICTURE);

		$criteria->addSelectColumn(RecipePeer::USER_ID);

		$criteria->addSelectColumn(RecipePeer::COURSE_ID);

		$criteria->addSelectColumn(RecipePeer::ETHNICITY_ID);

		$criteria->addSelectColumn(RecipePeer::BASE);

		$criteria->addSelectColumn(RecipePeer::AVERAGE_RATING);

		$criteria->addSelectColumn(RecipePeer::NB_COMMENT);

		$criteria->addSelectColumn(RecipePeer::NB_REPORT);

		$criteria->addSelectColumn(RecipePeer::NB_SUGGESTION);

		$criteria->addSelectColumn(RecipePeer::CREATED_AT);

		$criteria->addSelectColumn(RecipePeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(recipe.RECIPE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT recipe.RECIPE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RecipePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = RecipePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RecipePeer::populateObjects(RecipePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RecipePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RecipePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipePeer::USER_ID, UserPeer::USER_ID);

		$rs = RecipePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCourse(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipePeer::COURSE_ID, CoursePeer::COURSE_ID);

		$rs = RecipePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinEthnicity(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipePeer::ETHNICITY_ID, EthnicityPeer::ETHNICITY_ID);

		$rs = RecipePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinUser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipePeer::addSelectColumns($c);
		$startcol = (RecipePeer::NUM_COLUMNS - RecipePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UserPeer::addSelectColumns($c);

		$c->addJoin(RecipePeer::USER_ID, UserPeer::USER_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRecipe($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRecipes();
				$obj2->addRecipe($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCourse(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipePeer::addSelectColumns($c);
		$startcol = (RecipePeer::NUM_COLUMNS - RecipePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CoursePeer::addSelectColumns($c);

		$c->addJoin(RecipePeer::COURSE_ID, CoursePeer::COURSE_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CoursePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCourse(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRecipe($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRecipes();
				$obj2->addRecipe($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinEthnicity(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipePeer::addSelectColumns($c);
		$startcol = (RecipePeer::NUM_COLUMNS - RecipePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EthnicityPeer::addSelectColumns($c);

		$c->addJoin(RecipePeer::ETHNICITY_ID, EthnicityPeer::ETHNICITY_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EthnicityPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEthnicity(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRecipe($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRecipes();
				$obj2->addRecipe($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipePeer::USER_ID, UserPeer::USER_ID);

		$criteria->addJoin(RecipePeer::COURSE_ID, CoursePeer::COURSE_ID);

		$criteria->addJoin(RecipePeer::ETHNICITY_ID, EthnicityPeer::ETHNICITY_ID);

		$rs = RecipePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipePeer::addSelectColumns($c);
		$startcol2 = (RecipePeer::NUM_COLUMNS - RecipePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		CoursePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CoursePeer::NUM_COLUMNS;

		EthnicityPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EthnicityPeer::NUM_COLUMNS;

		$c->addJoin(RecipePeer::USER_ID, UserPeer::USER_ID);

		$c->addJoin(RecipePeer::COURSE_ID, CoursePeer::COURSE_ID);

		$c->addJoin(RecipePeer::ETHNICITY_ID, EthnicityPeer::ETHNICITY_ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRecipe($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipes();
				$obj2->addRecipe($obj1);
			}


					
			$omClass = CoursePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCourse(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRecipe($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initRecipes();
				$obj3->addRecipe($obj1);
			}


					
			$omClass = EthnicityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEthnicity(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRecipe($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initRecipes();
				$obj4->addRecipe($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipePeer::COURSE_ID, CoursePeer::COURSE_ID);

		$criteria->addJoin(RecipePeer::ETHNICITY_ID, EthnicityPeer::ETHNICITY_ID);

		$rs = RecipePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCourse(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipePeer::USER_ID, UserPeer::USER_ID);

		$criteria->addJoin(RecipePeer::ETHNICITY_ID, EthnicityPeer::ETHNICITY_ID);

		$rs = RecipePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptEthnicity(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipePeer::USER_ID, UserPeer::USER_ID);

		$criteria->addJoin(RecipePeer::COURSE_ID, CoursePeer::COURSE_ID);

		$rs = RecipePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptUser(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipePeer::addSelectColumns($c);
		$startcol2 = (RecipePeer::NUM_COLUMNS - RecipePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CoursePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CoursePeer::NUM_COLUMNS;

		EthnicityPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EthnicityPeer::NUM_COLUMNS;

		$c->addJoin(RecipePeer::COURSE_ID, CoursePeer::COURSE_ID);

		$c->addJoin(RecipePeer::ETHNICITY_ID, EthnicityPeer::ETHNICITY_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CoursePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCourse(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRecipe($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipes();
				$obj2->addRecipe($obj1);
			}

			$omClass = EthnicityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEthnicity(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRecipe($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initRecipes();
				$obj3->addRecipe($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCourse(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipePeer::addSelectColumns($c);
		$startcol2 = (RecipePeer::NUM_COLUMNS - RecipePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		EthnicityPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EthnicityPeer::NUM_COLUMNS;

		$c->addJoin(RecipePeer::USER_ID, UserPeer::USER_ID);

		$c->addJoin(RecipePeer::ETHNICITY_ID, EthnicityPeer::ETHNICITY_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRecipe($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipes();
				$obj2->addRecipe($obj1);
			}

			$omClass = EthnicityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEthnicity(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRecipe($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initRecipes();
				$obj3->addRecipe($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptEthnicity(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipePeer::addSelectColumns($c);
		$startcol2 = (RecipePeer::NUM_COLUMNS - RecipePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		CoursePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CoursePeer::NUM_COLUMNS;

		$c->addJoin(RecipePeer::USER_ID, UserPeer::USER_ID);

		$c->addJoin(RecipePeer::COURSE_ID, CoursePeer::COURSE_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRecipe($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipes();
				$obj2->addRecipe($obj1);
			}

			$omClass = CoursePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCourse(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRecipe($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initRecipes();
				$obj3->addRecipe($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return RecipePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RecipePeer::RECIPE_ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(RecipePeer::RECIPE_ID);
			$selectCriteria->add(RecipePeer::RECIPE_ID, $criteria->remove(RecipePeer::RECIPE_ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(RecipePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(RecipePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Recipe) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RecipePeer::RECIPE_ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Recipe $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RecipePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RecipePeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(RecipePeer::DATABASE_NAME, RecipePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RecipePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(RecipePeer::DATABASE_NAME);

		$criteria->add(RecipePeer::RECIPE_ID, $pk);


		$v = RecipePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(RecipePeer::RECIPE_ID, $pks, Criteria::IN);
			$objs = RecipePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRecipePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RecipeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RecipeMapBuilder');
}

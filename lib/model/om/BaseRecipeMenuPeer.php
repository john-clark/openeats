<?php


abstract class BaseRecipeMenuPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'recipe_menu';

	
	const CLASS_DEFAULT = 'lib.model.RecipeMenu';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MENU_ID = 'recipe_menu.MENU_ID';

	
	const RECIPE_ID = 'recipe_menu.RECIPE_ID';

	
	const COURSE_ID = 'recipe_menu.COURSE_ID';

	
	const RECIPE_DESC = 'recipe_menu.RECIPE_DESC';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('MenuId', 'RecipeId', 'CourseId', 'RecipeDesc', ),
		BasePeer::TYPE_COLNAME => array (RecipeMenuPeer::MENU_ID, RecipeMenuPeer::RECIPE_ID, RecipeMenuPeer::COURSE_ID, RecipeMenuPeer::RECIPE_DESC, ),
		BasePeer::TYPE_FIELDNAME => array ('MENU_ID', 'RECIPE_ID', 'COURSE_ID', 'RECIPE_DESC', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('MenuId' => 0, 'RecipeId' => 1, 'CourseId' => 2, 'RecipeDesc' => 3, ),
		BasePeer::TYPE_COLNAME => array (RecipeMenuPeer::MENU_ID => 0, RecipeMenuPeer::RECIPE_ID => 1, RecipeMenuPeer::COURSE_ID => 2, RecipeMenuPeer::RECIPE_DESC => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('MENU_ID' => 0, 'RECIPE_ID' => 1, 'COURSE_ID' => 2, 'RECIPE_DESC' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RecipeMenuMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RecipeMenuMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RecipeMenuPeer::getTableMap();
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
		return str_replace(RecipeMenuPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RecipeMenuPeer::MENU_ID);

		$criteria->addSelectColumn(RecipeMenuPeer::RECIPE_ID);

		$criteria->addSelectColumn(RecipeMenuPeer::COURSE_ID);

		$criteria->addSelectColumn(RecipeMenuPeer::RECIPE_DESC);

	}

	const COUNT = 'COUNT(recipe_menu.MENU_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT recipe_menu.MENU_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RecipeMenuPeer::doSelectRS($criteria, $con);
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
		$objects = RecipeMenuPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RecipeMenuPeer::populateObjects(RecipeMenuPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RecipeMenuPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RecipeMenuPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinMenu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeMenuPeer::MENU_ID, MenuPeer::MENU_ID);

		$rs = RecipeMenuPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinRecipe(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeMenuPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$rs = RecipeMenuPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeMenuPeer::COURSE_ID, CoursePeer::COURSE_ID);

		$rs = RecipeMenuPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinMenu(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipeMenuPeer::addSelectColumns($c);
		$startcol = (RecipeMenuPeer::NUM_COLUMNS - RecipeMenuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MenuPeer::addSelectColumns($c);

		$c->addJoin(RecipeMenuPeer::MENU_ID, MenuPeer::MENU_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeMenuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MenuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getMenu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRecipeMenu($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRecipeMenus();
				$obj2->addRecipeMenu($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinRecipe(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipeMenuPeer::addSelectColumns($c);
		$startcol = (RecipeMenuPeer::NUM_COLUMNS - RecipeMenuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RecipePeer::addSelectColumns($c);

		$c->addJoin(RecipeMenuPeer::RECIPE_ID, RecipePeer::RECIPE_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeMenuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RecipePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getRecipe(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRecipeMenu($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRecipeMenus();
				$obj2->addRecipeMenu($obj1); 			}
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

		RecipeMenuPeer::addSelectColumns($c);
		$startcol = (RecipeMenuPeer::NUM_COLUMNS - RecipeMenuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CoursePeer::addSelectColumns($c);

		$c->addJoin(RecipeMenuPeer::COURSE_ID, CoursePeer::COURSE_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeMenuPeer::getOMClass();

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
										$temp_obj2->addRecipeMenu($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRecipeMenus();
				$obj2->addRecipeMenu($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeMenuPeer::MENU_ID, MenuPeer::MENU_ID);

		$criteria->addJoin(RecipeMenuPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$criteria->addJoin(RecipeMenuPeer::COURSE_ID, CoursePeer::COURSE_ID);

		$rs = RecipeMenuPeer::doSelectRS($criteria, $con);
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

		RecipeMenuPeer::addSelectColumns($c);
		$startcol2 = (RecipeMenuPeer::NUM_COLUMNS - RecipeMenuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MenuPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MenuPeer::NUM_COLUMNS;

		RecipePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + RecipePeer::NUM_COLUMNS;

		CoursePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CoursePeer::NUM_COLUMNS;

		$c->addJoin(RecipeMenuPeer::MENU_ID, MenuPeer::MENU_ID);

		$c->addJoin(RecipeMenuPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$c->addJoin(RecipeMenuPeer::COURSE_ID, CoursePeer::COURSE_ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeMenuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = MenuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getMenu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRecipeMenu($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipeMenus();
				$obj2->addRecipeMenu($obj1);
			}


					
			$omClass = RecipePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getRecipe(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRecipeMenu($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initRecipeMenus();
				$obj3->addRecipeMenu($obj1);
			}


					
			$omClass = CoursePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCourse(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRecipeMenu($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initRecipeMenus();
				$obj4->addRecipeMenu($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptMenu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeMenuPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$criteria->addJoin(RecipeMenuPeer::COURSE_ID, CoursePeer::COURSE_ID);

		$rs = RecipeMenuPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptRecipe(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeMenuPeer::MENU_ID, MenuPeer::MENU_ID);

		$criteria->addJoin(RecipeMenuPeer::COURSE_ID, CoursePeer::COURSE_ID);

		$rs = RecipeMenuPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeMenuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeMenuPeer::MENU_ID, MenuPeer::MENU_ID);

		$criteria->addJoin(RecipeMenuPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$rs = RecipeMenuPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptMenu(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipeMenuPeer::addSelectColumns($c);
		$startcol2 = (RecipeMenuPeer::NUM_COLUMNS - RecipeMenuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RecipePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RecipePeer::NUM_COLUMNS;

		CoursePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CoursePeer::NUM_COLUMNS;

		$c->addJoin(RecipeMenuPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$c->addJoin(RecipeMenuPeer::COURSE_ID, CoursePeer::COURSE_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeMenuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RecipePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getRecipe(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRecipeMenu($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipeMenus();
				$obj2->addRecipeMenu($obj1);
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
					$temp_obj3->addRecipeMenu($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initRecipeMenus();
				$obj3->addRecipeMenu($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptRecipe(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipeMenuPeer::addSelectColumns($c);
		$startcol2 = (RecipeMenuPeer::NUM_COLUMNS - RecipeMenuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MenuPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MenuPeer::NUM_COLUMNS;

		CoursePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CoursePeer::NUM_COLUMNS;

		$c->addJoin(RecipeMenuPeer::MENU_ID, MenuPeer::MENU_ID);

		$c->addJoin(RecipeMenuPeer::COURSE_ID, CoursePeer::COURSE_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeMenuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MenuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getMenu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRecipeMenu($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipeMenus();
				$obj2->addRecipeMenu($obj1);
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
					$temp_obj3->addRecipeMenu($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initRecipeMenus();
				$obj3->addRecipeMenu($obj1);
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

		RecipeMenuPeer::addSelectColumns($c);
		$startcol2 = (RecipeMenuPeer::NUM_COLUMNS - RecipeMenuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MenuPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MenuPeer::NUM_COLUMNS;

		RecipePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + RecipePeer::NUM_COLUMNS;

		$c->addJoin(RecipeMenuPeer::MENU_ID, MenuPeer::MENU_ID);

		$c->addJoin(RecipeMenuPeer::RECIPE_ID, RecipePeer::RECIPE_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeMenuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MenuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getMenu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRecipeMenu($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipeMenus();
				$obj2->addRecipeMenu($obj1);
			}

			$omClass = RecipePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getRecipe(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRecipeMenu($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initRecipeMenus();
				$obj3->addRecipeMenu($obj1);
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
		return RecipeMenuPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(RecipeMenuPeer::MENU_ID);
			$selectCriteria->add(RecipeMenuPeer::MENU_ID, $criteria->remove(RecipeMenuPeer::MENU_ID), $comparison);

			$comparison = $criteria->getComparison(RecipeMenuPeer::RECIPE_ID);
			$selectCriteria->add(RecipeMenuPeer::RECIPE_ID, $criteria->remove(RecipeMenuPeer::RECIPE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RecipeMenuPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RecipeMenuPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof RecipeMenu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

				$vals[0][] = $value[0];
				$vals[1][] = $value[1];
			}

			$criteria->add(RecipeMenuPeer::MENU_ID, $vals[0], Criteria::IN);
			$criteria->add(RecipeMenuPeer::RECIPE_ID, $vals[1], Criteria::IN);
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

	
	public static function doValidate(RecipeMenu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RecipeMenuPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RecipeMenuPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RecipeMenuPeer::DATABASE_NAME, RecipeMenuPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RecipeMenuPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $menu_id, $recipe_id, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(RecipeMenuPeer::MENU_ID, $menu_id);
		$criteria->add(RecipeMenuPeer::RECIPE_ID, $recipe_id);
		$v = RecipeMenuPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseRecipeMenuPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RecipeMenuMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RecipeMenuMapBuilder');
}

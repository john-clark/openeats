<?php


abstract class BaseRecipeKeywordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'recipe_keyword';

	
	const CLASS_DEFAULT = 'lib.model.RecipeKeyword';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RECIPE_ID = 'recipe_keyword.RECIPE_ID';

	
	const USER_ID = 'recipe_keyword.USER_ID';

	
	const KEYWORD = 'recipe_keyword.KEYWORD';

	
	const NORMALIZED_KEYWORD = 'recipe_keyword.NORMALIZED_KEYWORD';

	
	const CREATED_AT = 'recipe_keyword.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('RecipeId', 'UserId', 'Keyword', 'NormalizedKeyword', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (RecipeKeywordPeer::RECIPE_ID, RecipeKeywordPeer::USER_ID, RecipeKeywordPeer::KEYWORD, RecipeKeywordPeer::NORMALIZED_KEYWORD, RecipeKeywordPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('RECIPE_ID', 'USER_ID', 'KEYWORD', 'NORMALIZED_KEYWORD', 'CREATED_AT', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('RecipeId' => 0, 'UserId' => 1, 'Keyword' => 2, 'NormalizedKeyword' => 3, 'CreatedAt' => 4, ),
		BasePeer::TYPE_COLNAME => array (RecipeKeywordPeer::RECIPE_ID => 0, RecipeKeywordPeer::USER_ID => 1, RecipeKeywordPeer::KEYWORD => 2, RecipeKeywordPeer::NORMALIZED_KEYWORD => 3, RecipeKeywordPeer::CREATED_AT => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('RECIPE_ID' => 0, 'USER_ID' => 1, 'KEYWORD' => 2, 'NORMALIZED_KEYWORD' => 3, 'CREATED_AT' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RecipeKeywordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RecipeKeywordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RecipeKeywordPeer::getTableMap();
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
		return str_replace(RecipeKeywordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RecipeKeywordPeer::RECIPE_ID);

		$criteria->addSelectColumn(RecipeKeywordPeer::USER_ID);

		$criteria->addSelectColumn(RecipeKeywordPeer::KEYWORD);

		$criteria->addSelectColumn(RecipeKeywordPeer::NORMALIZED_KEYWORD);

		$criteria->addSelectColumn(RecipeKeywordPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(recipe_keyword.RECIPE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT recipe_keyword.RECIPE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RecipeKeywordPeer::doSelectRS($criteria, $con);
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
		$objects = RecipeKeywordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RecipeKeywordPeer::populateObjects(RecipeKeywordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RecipeKeywordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RecipeKeywordPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinRecipe(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeKeywordPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$rs = RecipeKeywordPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeKeywordPeer::USER_ID, UserPeer::USER_ID);

		$rs = RecipeKeywordPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinRecipe(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipeKeywordPeer::addSelectColumns($c);
		$startcol = (RecipeKeywordPeer::NUM_COLUMNS - RecipeKeywordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RecipePeer::addSelectColumns($c);

		$c->addJoin(RecipeKeywordPeer::RECIPE_ID, RecipePeer::RECIPE_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeKeywordPeer::getOMClass();

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
										$temp_obj2->addRecipeKeyword($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRecipeKeywords();
				$obj2->addRecipeKeyword($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinUser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipeKeywordPeer::addSelectColumns($c);
		$startcol = (RecipeKeywordPeer::NUM_COLUMNS - RecipeKeywordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UserPeer::addSelectColumns($c);

		$c->addJoin(RecipeKeywordPeer::USER_ID, UserPeer::USER_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeKeywordPeer::getOMClass();

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
										$temp_obj2->addRecipeKeyword($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRecipeKeywords();
				$obj2->addRecipeKeyword($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeKeywordPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$criteria->addJoin(RecipeKeywordPeer::USER_ID, UserPeer::USER_ID);

		$rs = RecipeKeywordPeer::doSelectRS($criteria, $con);
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

		RecipeKeywordPeer::addSelectColumns($c);
		$startcol2 = (RecipeKeywordPeer::NUM_COLUMNS - RecipeKeywordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RecipePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RecipePeer::NUM_COLUMNS;

		UserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UserPeer::NUM_COLUMNS;

		$c->addJoin(RecipeKeywordPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$c->addJoin(RecipeKeywordPeer::USER_ID, UserPeer::USER_ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeKeywordPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = RecipePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getRecipe(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRecipeKeyword($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipeKeywords();
				$obj2->addRecipeKeyword($obj1);
			}


					
			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUser(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRecipeKeyword($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initRecipeKeywords();
				$obj3->addRecipeKeyword($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptRecipe(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeKeywordPeer::USER_ID, UserPeer::USER_ID);

		$rs = RecipeKeywordPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeKeywordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeKeywordPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$rs = RecipeKeywordPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptRecipe(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipeKeywordPeer::addSelectColumns($c);
		$startcol2 = (RecipeKeywordPeer::NUM_COLUMNS - RecipeKeywordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		$c->addJoin(RecipeKeywordPeer::USER_ID, UserPeer::USER_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeKeywordPeer::getOMClass();

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
					$temp_obj2->addRecipeKeyword($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipeKeywords();
				$obj2->addRecipeKeyword($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptUser(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipeKeywordPeer::addSelectColumns($c);
		$startcol2 = (RecipeKeywordPeer::NUM_COLUMNS - RecipeKeywordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RecipePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RecipePeer::NUM_COLUMNS;

		$c->addJoin(RecipeKeywordPeer::RECIPE_ID, RecipePeer::RECIPE_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeKeywordPeer::getOMClass();

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
					$temp_obj2->addRecipeKeyword($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipeKeywords();
				$obj2->addRecipeKeyword($obj1);
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
		return RecipeKeywordPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(RecipeKeywordPeer::RECIPE_ID);
			$selectCriteria->add(RecipeKeywordPeer::RECIPE_ID, $criteria->remove(RecipeKeywordPeer::RECIPE_ID), $comparison);

			$comparison = $criteria->getComparison(RecipeKeywordPeer::USER_ID);
			$selectCriteria->add(RecipeKeywordPeer::USER_ID, $criteria->remove(RecipeKeywordPeer::USER_ID), $comparison);

			$comparison = $criteria->getComparison(RecipeKeywordPeer::NORMALIZED_KEYWORD);
			$selectCriteria->add(RecipeKeywordPeer::NORMALIZED_KEYWORD, $criteria->remove(RecipeKeywordPeer::NORMALIZED_KEYWORD), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RecipeKeywordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RecipeKeywordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof RecipeKeyword) {

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
				$vals[2][] = $value[2];
			}

			$criteria->add(RecipeKeywordPeer::RECIPE_ID, $vals[0], Criteria::IN);
			$criteria->add(RecipeKeywordPeer::USER_ID, $vals[1], Criteria::IN);
			$criteria->add(RecipeKeywordPeer::NORMALIZED_KEYWORD, $vals[2], Criteria::IN);
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

	
	public static function doValidate(RecipeKeyword $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RecipeKeywordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RecipeKeywordPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RecipeKeywordPeer::DATABASE_NAME, RecipeKeywordPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RecipeKeywordPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $recipe_id, $user_id, $normalized_keyword, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(RecipeKeywordPeer::RECIPE_ID, $recipe_id);
		$criteria->add(RecipeKeywordPeer::USER_ID, $user_id);
		$criteria->add(RecipeKeywordPeer::NORMALIZED_KEYWORD, $normalized_keyword);
		$v = RecipeKeywordPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseRecipeKeywordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RecipeKeywordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RecipeKeywordMapBuilder');
}

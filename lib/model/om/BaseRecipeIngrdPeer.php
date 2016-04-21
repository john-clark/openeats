<?php


abstract class BaseRecipeIngrdPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'recipe_ingrd';

	
	const CLASS_DEFAULT = 'lib.model.RecipeIngrd';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RECIPE_INGRD_ID = 'recipe_ingrd.RECIPE_INGRD_ID';

	
	const RECIPE_ID = 'recipe_ingrd.RECIPE_ID';

	
	const INGRD_ID = 'recipe_ingrd.INGRD_ID';

	
	const INGRD_SEQ = 'recipe_ingrd.INGRD_SEQ';

	
	const INGRD_PREP = 'recipe_ingrd.INGRD_PREP';

	
	const INGRD_MSRMT = 'recipe_ingrd.INGRD_MSRMT';

	
	const INGRD_QTY = 'recipe_ingrd.INGRD_QTY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('RecipeIngrdId', 'RecipeId', 'IngrdId', 'IngrdSeq', 'IngrdPrep', 'IngrdMsrmt', 'IngrdQty', ),
		BasePeer::TYPE_COLNAME => array (RecipeIngrdPeer::RECIPE_INGRD_ID, RecipeIngrdPeer::RECIPE_ID, RecipeIngrdPeer::INGRD_ID, RecipeIngrdPeer::INGRD_SEQ, RecipeIngrdPeer::INGRD_PREP, RecipeIngrdPeer::INGRD_MSRMT, RecipeIngrdPeer::INGRD_QTY, ),
		BasePeer::TYPE_FIELDNAME => array ('RECIPE_INGRD_ID', 'RECIPE_ID', 'INGRD_ID', 'INGRD_SEQ', 'INGRD_PREP', 'INGRD_MSRMT', 'INGRD_QTY', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('RecipeIngrdId' => 0, 'RecipeId' => 1, 'IngrdId' => 2, 'IngrdSeq' => 3, 'IngrdPrep' => 4, 'IngrdMsrmt' => 5, 'IngrdQty' => 6, ),
		BasePeer::TYPE_COLNAME => array (RecipeIngrdPeer::RECIPE_INGRD_ID => 0, RecipeIngrdPeer::RECIPE_ID => 1, RecipeIngrdPeer::INGRD_ID => 2, RecipeIngrdPeer::INGRD_SEQ => 3, RecipeIngrdPeer::INGRD_PREP => 4, RecipeIngrdPeer::INGRD_MSRMT => 5, RecipeIngrdPeer::INGRD_QTY => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('RECIPE_INGRD_ID' => 0, 'RECIPE_ID' => 1, 'INGRD_ID' => 2, 'INGRD_SEQ' => 3, 'INGRD_PREP' => 4, 'INGRD_MSRMT' => 5, 'INGRD_QTY' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RecipeIngrdMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RecipeIngrdMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RecipeIngrdPeer::getTableMap();
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
		return str_replace(RecipeIngrdPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RecipeIngrdPeer::RECIPE_INGRD_ID);

		$criteria->addSelectColumn(RecipeIngrdPeer::RECIPE_ID);

		$criteria->addSelectColumn(RecipeIngrdPeer::INGRD_ID);

		$criteria->addSelectColumn(RecipeIngrdPeer::INGRD_SEQ);

		$criteria->addSelectColumn(RecipeIngrdPeer::INGRD_PREP);

		$criteria->addSelectColumn(RecipeIngrdPeer::INGRD_MSRMT);

		$criteria->addSelectColumn(RecipeIngrdPeer::INGRD_QTY);

	}

	const COUNT = 'COUNT(recipe_ingrd.RECIPE_INGRD_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT recipe_ingrd.RECIPE_INGRD_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RecipeIngrdPeer::doSelectRS($criteria, $con);
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
		$objects = RecipeIngrdPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RecipeIngrdPeer::populateObjects(RecipeIngrdPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RecipeIngrdPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RecipeIngrdPeer::getOMClass();
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
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeIngrdPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$rs = RecipeIngrdPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinIngredient(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeIngrdPeer::INGRD_ID, IngredientPeer::INGRD_ID);

		$rs = RecipeIngrdPeer::doSelectRS($criteria, $con);
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

		RecipeIngrdPeer::addSelectColumns($c);
		$startcol = (RecipeIngrdPeer::NUM_COLUMNS - RecipeIngrdPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RecipePeer::addSelectColumns($c);

		$c->addJoin(RecipeIngrdPeer::RECIPE_ID, RecipePeer::RECIPE_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeIngrdPeer::getOMClass();

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
										$temp_obj2->addRecipeIngrd($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRecipeIngrds();
				$obj2->addRecipeIngrd($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinIngredient(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipeIngrdPeer::addSelectColumns($c);
		$startcol = (RecipeIngrdPeer::NUM_COLUMNS - RecipeIngrdPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		IngredientPeer::addSelectColumns($c);

		$c->addJoin(RecipeIngrdPeer::INGRD_ID, IngredientPeer::INGRD_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeIngrdPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IngredientPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getIngredient(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRecipeIngrd($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRecipeIngrds();
				$obj2->addRecipeIngrd($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeIngrdPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$criteria->addJoin(RecipeIngrdPeer::INGRD_ID, IngredientPeer::INGRD_ID);

		$rs = RecipeIngrdPeer::doSelectRS($criteria, $con);
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

		RecipeIngrdPeer::addSelectColumns($c);
		$startcol2 = (RecipeIngrdPeer::NUM_COLUMNS - RecipeIngrdPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RecipePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RecipePeer::NUM_COLUMNS;

		IngredientPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + IngredientPeer::NUM_COLUMNS;

		$c->addJoin(RecipeIngrdPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$c->addJoin(RecipeIngrdPeer::INGRD_ID, IngredientPeer::INGRD_ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeIngrdPeer::getOMClass();


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
					$temp_obj2->addRecipeIngrd($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipeIngrds();
				$obj2->addRecipeIngrd($obj1);
			}


					
			$omClass = IngredientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getIngredient(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRecipeIngrd($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initRecipeIngrds();
				$obj3->addRecipeIngrd($obj1);
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
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeIngrdPeer::INGRD_ID, IngredientPeer::INGRD_ID);

		$rs = RecipeIngrdPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptIngredient(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RecipeIngrdPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RecipeIngrdPeer::RECIPE_ID, RecipePeer::RECIPE_ID);

		$rs = RecipeIngrdPeer::doSelectRS($criteria, $con);
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

		RecipeIngrdPeer::addSelectColumns($c);
		$startcol2 = (RecipeIngrdPeer::NUM_COLUMNS - RecipeIngrdPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		IngredientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + IngredientPeer::NUM_COLUMNS;

		$c->addJoin(RecipeIngrdPeer::INGRD_ID, IngredientPeer::INGRD_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeIngrdPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IngredientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getIngredient(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRecipeIngrd($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipeIngrds();
				$obj2->addRecipeIngrd($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptIngredient(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RecipeIngrdPeer::addSelectColumns($c);
		$startcol2 = (RecipeIngrdPeer::NUM_COLUMNS - RecipeIngrdPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RecipePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RecipePeer::NUM_COLUMNS;

		$c->addJoin(RecipeIngrdPeer::RECIPE_ID, RecipePeer::RECIPE_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RecipeIngrdPeer::getOMClass();

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
					$temp_obj2->addRecipeIngrd($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRecipeIngrds();
				$obj2->addRecipeIngrd($obj1);
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
		return RecipeIngrdPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RecipeIngrdPeer::RECIPE_INGRD_ID); 

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
			$comparison = $criteria->getComparison(RecipeIngrdPeer::RECIPE_INGRD_ID);
			$selectCriteria->add(RecipeIngrdPeer::RECIPE_INGRD_ID, $criteria->remove(RecipeIngrdPeer::RECIPE_INGRD_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RecipeIngrdPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RecipeIngrdPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof RecipeIngrd) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RecipeIngrdPeer::RECIPE_INGRD_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(RecipeIngrd $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RecipeIngrdPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RecipeIngrdPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RecipeIngrdPeer::DATABASE_NAME, RecipeIngrdPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RecipeIngrdPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RecipeIngrdPeer::DATABASE_NAME);

		$criteria->add(RecipeIngrdPeer::RECIPE_INGRD_ID, $pk);


		$v = RecipeIngrdPeer::doSelect($criteria, $con);

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
			$criteria->add(RecipeIngrdPeer::RECIPE_INGRD_ID, $pks, Criteria::IN);
			$objs = RecipeIngrdPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRecipeIngrdPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RecipeIngrdMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RecipeIngrdMapBuilder');
}

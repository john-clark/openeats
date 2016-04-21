<?php


abstract class BaseGroceryItemPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'grocery_item';

	
	const CLASS_DEFAULT = 'lib.model.GroceryItem';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const GROCERY_ITEM_ID = 'grocery_item.GROCERY_ITEM_ID';

	
	const GROCERY_ID = 'grocery_item.GROCERY_ID';

	
	const QTY = 'grocery_item.QTY';

	
	const MSRMT = 'grocery_item.MSRMT';

	
	const GROCERY_ITEM = 'grocery_item.GROCERY_ITEM';

	
	const AISLE_ID = 'grocery_item.AISLE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('GroceryItemId', 'GroceryId', 'Qty', 'Msrmt', 'GroceryItem', 'AisleId', ),
		BasePeer::TYPE_COLNAME => array (GroceryItemPeer::GROCERY_ITEM_ID, GroceryItemPeer::GROCERY_ID, GroceryItemPeer::QTY, GroceryItemPeer::MSRMT, GroceryItemPeer::GROCERY_ITEM, GroceryItemPeer::AISLE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('GROCERY_ITEM_ID', 'GROCERY_ID', 'QTY', 'MSRMT', 'GROCERY_ITEM', 'AISLE_ID', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('GroceryItemId' => 0, 'GroceryId' => 1, 'Qty' => 2, 'Msrmt' => 3, 'GroceryItem' => 4, 'AisleId' => 5, ),
		BasePeer::TYPE_COLNAME => array (GroceryItemPeer::GROCERY_ITEM_ID => 0, GroceryItemPeer::GROCERY_ID => 1, GroceryItemPeer::QTY => 2, GroceryItemPeer::MSRMT => 3, GroceryItemPeer::GROCERY_ITEM => 4, GroceryItemPeer::AISLE_ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('GROCERY_ITEM_ID' => 0, 'GROCERY_ID' => 1, 'QTY' => 2, 'MSRMT' => 3, 'GROCERY_ITEM' => 4, 'AISLE_ID' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GroceryItemMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GroceryItemMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GroceryItemPeer::getTableMap();
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
		return str_replace(GroceryItemPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GroceryItemPeer::GROCERY_ITEM_ID);

		$criteria->addSelectColumn(GroceryItemPeer::GROCERY_ID);

		$criteria->addSelectColumn(GroceryItemPeer::QTY);

		$criteria->addSelectColumn(GroceryItemPeer::MSRMT);

		$criteria->addSelectColumn(GroceryItemPeer::GROCERY_ITEM);

		$criteria->addSelectColumn(GroceryItemPeer::AISLE_ID);

	}

	const COUNT = 'COUNT(grocery_item.GROCERY_ITEM_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT grocery_item.GROCERY_ITEM_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GroceryItemPeer::doSelectRS($criteria, $con);
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
		$objects = GroceryItemPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GroceryItemPeer::populateObjects(GroceryItemPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GroceryItemPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GroceryItemPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinGrocerylist(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(GroceryItemPeer::GROCERY_ID, GrocerylistPeer::GROCERY_ID);

		$rs = GroceryItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinGroceryAisle(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(GroceryItemPeer::AISLE_ID, GroceryAislePeer::AISLE_ID);

		$rs = GroceryItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinGrocerylist(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		GroceryItemPeer::addSelectColumns($c);
		$startcol = (GroceryItemPeer::NUM_COLUMNS - GroceryItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		GrocerylistPeer::addSelectColumns($c);

		$c->addJoin(GroceryItemPeer::GROCERY_ID, GrocerylistPeer::GROCERY_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = GroceryItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = GrocerylistPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getGrocerylist(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addGroceryItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initGroceryItems();
				$obj2->addGroceryItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinGroceryAisle(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		GroceryItemPeer::addSelectColumns($c);
		$startcol = (GroceryItemPeer::NUM_COLUMNS - GroceryItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		GroceryAislePeer::addSelectColumns($c);

		$c->addJoin(GroceryItemPeer::AISLE_ID, GroceryAislePeer::AISLE_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = GroceryItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = GroceryAislePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getGroceryAisle(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addGroceryItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initGroceryItems();
				$obj2->addGroceryItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(GroceryItemPeer::GROCERY_ID, GrocerylistPeer::GROCERY_ID);

		$criteria->addJoin(GroceryItemPeer::AISLE_ID, GroceryAislePeer::AISLE_ID);

		$rs = GroceryItemPeer::doSelectRS($criteria, $con);
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

		GroceryItemPeer::addSelectColumns($c);
		$startcol2 = (GroceryItemPeer::NUM_COLUMNS - GroceryItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		GrocerylistPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + GrocerylistPeer::NUM_COLUMNS;

		GroceryAislePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + GroceryAislePeer::NUM_COLUMNS;

		$c->addJoin(GroceryItemPeer::GROCERY_ID, GrocerylistPeer::GROCERY_ID);

		$c->addJoin(GroceryItemPeer::AISLE_ID, GroceryAislePeer::AISLE_ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = GroceryItemPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = GrocerylistPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getGrocerylist(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addGroceryItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initGroceryItems();
				$obj2->addGroceryItem($obj1);
			}


					
			$omClass = GroceryAislePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getGroceryAisle(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addGroceryItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initGroceryItems();
				$obj3->addGroceryItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptGrocerylist(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(GroceryItemPeer::AISLE_ID, GroceryAislePeer::AISLE_ID);

		$rs = GroceryItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptGroceryAisle(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GroceryItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(GroceryItemPeer::GROCERY_ID, GrocerylistPeer::GROCERY_ID);

		$rs = GroceryItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptGrocerylist(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		GroceryItemPeer::addSelectColumns($c);
		$startcol2 = (GroceryItemPeer::NUM_COLUMNS - GroceryItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		GroceryAislePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + GroceryAislePeer::NUM_COLUMNS;

		$c->addJoin(GroceryItemPeer::AISLE_ID, GroceryAislePeer::AISLE_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = GroceryItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = GroceryAislePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getGroceryAisle(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addGroceryItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initGroceryItems();
				$obj2->addGroceryItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptGroceryAisle(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		GroceryItemPeer::addSelectColumns($c);
		$startcol2 = (GroceryItemPeer::NUM_COLUMNS - GroceryItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		GrocerylistPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + GrocerylistPeer::NUM_COLUMNS;

		$c->addJoin(GroceryItemPeer::GROCERY_ID, GrocerylistPeer::GROCERY_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = GroceryItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = GrocerylistPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getGrocerylist(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addGroceryItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initGroceryItems();
				$obj2->addGroceryItem($obj1);
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
		return GroceryItemPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GroceryItemPeer::GROCERY_ITEM_ID); 

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
			$comparison = $criteria->getComparison(GroceryItemPeer::GROCERY_ITEM_ID);
			$selectCriteria->add(GroceryItemPeer::GROCERY_ITEM_ID, $criteria->remove(GroceryItemPeer::GROCERY_ITEM_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GroceryItemPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GroceryItemPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GroceryItem) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GroceryItemPeer::GROCERY_ITEM_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GroceryItem $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GroceryItemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GroceryItemPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(GroceryItemPeer::DATABASE_NAME, GroceryItemPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = GroceryItemPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(GroceryItemPeer::DATABASE_NAME);

		$criteria->add(GroceryItemPeer::GROCERY_ITEM_ID, $pk);


		$v = GroceryItemPeer::doSelect($criteria, $con);

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
			$criteria->add(GroceryItemPeer::GROCERY_ITEM_ID, $pks, Criteria::IN);
			$objs = GroceryItemPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGroceryItemPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GroceryItemMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GroceryItemMapBuilder');
}

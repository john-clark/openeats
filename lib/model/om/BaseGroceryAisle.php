<?php


abstract class BaseGroceryAisle extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $aisle_id;


	
	protected $aisle;

	
	protected $collGroceryItems;

	
	protected $lastGroceryItemCriteria = null;

	
	protected $collGroceryMasters;

	
	protected $lastGroceryMasterCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getAisleId()
	{

		return $this->aisle_id;
	}

	
	public function getAisle()
	{

		return $this->aisle;
	}

	
	public function setAisleId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->aisle_id !== $v) {
			$this->aisle_id = $v;
			$this->modifiedColumns[] = GroceryAislePeer::AISLE_ID;
		}

	} 
	
	public function setAisle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->aisle !== $v) {
			$this->aisle = $v;
			$this->modifiedColumns[] = GroceryAislePeer::AISLE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->aisle_id = $rs->getInt($startcol + 0);

			$this->aisle = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GroceryAisle object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GroceryAislePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GroceryAislePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GroceryAislePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GroceryAislePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setAisleId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GroceryAislePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collGroceryItems !== null) {
				foreach($this->collGroceryItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGroceryMasters !== null) {
				foreach($this->collGroceryMasters as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = GroceryAislePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGroceryItems !== null) {
					foreach($this->collGroceryItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGroceryMasters !== null) {
					foreach($this->collGroceryMasters as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GroceryAislePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAisleId();
				break;
			case 1:
				return $this->getAisle();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GroceryAislePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAisleId(),
			$keys[1] => $this->getAisle(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GroceryAislePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAisleId($value);
				break;
			case 1:
				$this->setAisle($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GroceryAislePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAisleId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAisle($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GroceryAislePeer::DATABASE_NAME);

		if ($this->isColumnModified(GroceryAislePeer::AISLE_ID)) $criteria->add(GroceryAislePeer::AISLE_ID, $this->aisle_id);
		if ($this->isColumnModified(GroceryAislePeer::AISLE)) $criteria->add(GroceryAislePeer::AISLE, $this->aisle);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GroceryAislePeer::DATABASE_NAME);

		$criteria->add(GroceryAislePeer::AISLE_ID, $this->aisle_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getAisleId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setAisleId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAisle($this->aisle);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getGroceryItems() as $relObj) {
				$copyObj->addGroceryItem($relObj->copy($deepCopy));
			}

			foreach($this->getGroceryMasters() as $relObj) {
				$copyObj->addGroceryMaster($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setAisleId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new GroceryAislePeer();
		}
		return self::$peer;
	}

	
	public function initGroceryItems()
	{
		if ($this->collGroceryItems === null) {
			$this->collGroceryItems = array();
		}
	}

	
	public function getGroceryItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroceryItems === null) {
			if ($this->isNew()) {
			   $this->collGroceryItems = array();
			} else {

				$criteria->add(GroceryItemPeer::AISLE_ID, $this->getAisleId());

				GroceryItemPeer::addSelectColumns($criteria);
				$this->collGroceryItems = GroceryItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GroceryItemPeer::AISLE_ID, $this->getAisleId());

				GroceryItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastGroceryItemCriteria) || !$this->lastGroceryItemCriteria->equals($criteria)) {
					$this->collGroceryItems = GroceryItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGroceryItemCriteria = $criteria;
		return $this->collGroceryItems;
	}

	
	public function countGroceryItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GroceryItemPeer::AISLE_ID, $this->getAisleId());

		return GroceryItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGroceryItem(GroceryItem $l)
	{
		$this->collGroceryItems[] = $l;
		$l->setGroceryAisle($this);
	}


	
	public function getGroceryItemsJoinGrocerylist($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroceryItems === null) {
			if ($this->isNew()) {
				$this->collGroceryItems = array();
			} else {

				$criteria->add(GroceryItemPeer::AISLE_ID, $this->getAisleId());

				$this->collGroceryItems = GroceryItemPeer::doSelectJoinGrocerylist($criteria, $con);
			}
		} else {
									
			$criteria->add(GroceryItemPeer::AISLE_ID, $this->getAisleId());

			if (!isset($this->lastGroceryItemCriteria) || !$this->lastGroceryItemCriteria->equals($criteria)) {
				$this->collGroceryItems = GroceryItemPeer::doSelectJoinGrocerylist($criteria, $con);
			}
		}
		$this->lastGroceryItemCriteria = $criteria;

		return $this->collGroceryItems;
	}

	
	public function initGroceryMasters()
	{
		if ($this->collGroceryMasters === null) {
			$this->collGroceryMasters = array();
		}
	}

	
	public function getGroceryMasters($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryMasterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroceryMasters === null) {
			if ($this->isNew()) {
			   $this->collGroceryMasters = array();
			} else {

				$criteria->add(GroceryMasterPeer::AISLE_ID, $this->getAisleId());

				GroceryMasterPeer::addSelectColumns($criteria);
				$this->collGroceryMasters = GroceryMasterPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GroceryMasterPeer::AISLE_ID, $this->getAisleId());

				GroceryMasterPeer::addSelectColumns($criteria);
				if (!isset($this->lastGroceryMasterCriteria) || !$this->lastGroceryMasterCriteria->equals($criteria)) {
					$this->collGroceryMasters = GroceryMasterPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGroceryMasterCriteria = $criteria;
		return $this->collGroceryMasters;
	}

	
	public function countGroceryMasters($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryMasterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GroceryMasterPeer::AISLE_ID, $this->getAisleId());

		return GroceryMasterPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGroceryMaster(GroceryMaster $l)
	{
		$this->collGroceryMasters[] = $l;
		$l->setGroceryAisle($this);
	}


	
	public function getGroceryMastersJoinUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryMasterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroceryMasters === null) {
			if ($this->isNew()) {
				$this->collGroceryMasters = array();
			} else {

				$criteria->add(GroceryMasterPeer::AISLE_ID, $this->getAisleId());

				$this->collGroceryMasters = GroceryMasterPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(GroceryMasterPeer::AISLE_ID, $this->getAisleId());

			if (!isset($this->lastGroceryMasterCriteria) || !$this->lastGroceryMasterCriteria->equals($criteria)) {
				$this->collGroceryMasters = GroceryMasterPeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastGroceryMasterCriteria = $criteria;

		return $this->collGroceryMasters;
	}

} 
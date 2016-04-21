<?php


abstract class BaseGrocerylist extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $grocery_id;


	
	protected $grocery_nm;


	
	protected $grocery_strip_nm;


	
	protected $user_id;


	
	protected $created_at;

	
	protected $aUser;

	
	protected $collGroceryItems;

	
	protected $lastGroceryItemCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getGroceryId()
	{

		return $this->grocery_id;
	}

	
	public function getGroceryNm()
	{

		return $this->grocery_nm;
	}

	
	public function getGroceryStripNm()
	{

		return $this->grocery_strip_nm;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getCreatedAt($format = 'Y-m-d')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setGroceryId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->grocery_id !== $v) {
			$this->grocery_id = $v;
			$this->modifiedColumns[] = GrocerylistPeer::GROCERY_ID;
		}

	} 
	
	public function setGroceryNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->grocery_nm !== $v) {
			$this->grocery_nm = $v;
			$this->modifiedColumns[] = GrocerylistPeer::GROCERY_NM;
		}

	} 
	
	public function setGroceryStripNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->grocery_strip_nm !== $v) {
			$this->grocery_strip_nm = $v;
			$this->modifiedColumns[] = GrocerylistPeer::GROCERY_STRIP_NM;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = GrocerylistPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = GrocerylistPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->grocery_id = $rs->getInt($startcol + 0);

			$this->grocery_nm = $rs->getString($startcol + 1);

			$this->grocery_strip_nm = $rs->getString($startcol + 2);

			$this->user_id = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getDate($startcol + 4, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Grocerylist object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GrocerylistPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GrocerylistPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(GrocerylistPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GrocerylistPeer::DATABASE_NAME);
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


												
			if ($this->aUser !== null) {
				if ($this->aUser->isModified()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GrocerylistPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setGroceryId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GrocerylistPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collGroceryItems !== null) {
				foreach($this->collGroceryItems as $referrerFK) {
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


												
			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}


			if (($retval = GrocerylistPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGroceryItems !== null) {
					foreach($this->collGroceryItems as $referrerFK) {
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
		$pos = GrocerylistPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getGroceryId();
				break;
			case 1:
				return $this->getGroceryNm();
				break;
			case 2:
				return $this->getGroceryStripNm();
				break;
			case 3:
				return $this->getUserId();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GrocerylistPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getGroceryId(),
			$keys[1] => $this->getGroceryNm(),
			$keys[2] => $this->getGroceryStripNm(),
			$keys[3] => $this->getUserId(),
			$keys[4] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GrocerylistPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setGroceryId($value);
				break;
			case 1:
				$this->setGroceryNm($value);
				break;
			case 2:
				$this->setGroceryStripNm($value);
				break;
			case 3:
				$this->setUserId($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GrocerylistPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setGroceryId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGroceryNm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGroceryStripNm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GrocerylistPeer::DATABASE_NAME);

		if ($this->isColumnModified(GrocerylistPeer::GROCERY_ID)) $criteria->add(GrocerylistPeer::GROCERY_ID, $this->grocery_id);
		if ($this->isColumnModified(GrocerylistPeer::GROCERY_NM)) $criteria->add(GrocerylistPeer::GROCERY_NM, $this->grocery_nm);
		if ($this->isColumnModified(GrocerylistPeer::GROCERY_STRIP_NM)) $criteria->add(GrocerylistPeer::GROCERY_STRIP_NM, $this->grocery_strip_nm);
		if ($this->isColumnModified(GrocerylistPeer::USER_ID)) $criteria->add(GrocerylistPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(GrocerylistPeer::CREATED_AT)) $criteria->add(GrocerylistPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GrocerylistPeer::DATABASE_NAME);

		$criteria->add(GrocerylistPeer::GROCERY_ID, $this->grocery_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getGroceryId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setGroceryId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setGroceryNm($this->grocery_nm);

		$copyObj->setGroceryStripNm($this->grocery_strip_nm);

		$copyObj->setUserId($this->user_id);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getGroceryItems() as $relObj) {
				$copyObj->addGroceryItem($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setGroceryId(NULL); 
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
			self::$peer = new GrocerylistPeer();
		}
		return self::$peer;
	}

	
	public function setUser($v)
	{


		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getUserId());
		}


		$this->aUser = $v;
	}


	
	public function getUser($con = null)
	{
		if ($this->aUser === null && ($this->user_id !== null)) {
						include_once 'lib/model/om/BaseUserPeer.php';

			$this->aUser = UserPeer::retrieveByPK($this->user_id, $con);

			
		}
		return $this->aUser;
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

				$criteria->add(GroceryItemPeer::GROCERY_ID, $this->getGroceryId());

				GroceryItemPeer::addSelectColumns($criteria);
				$this->collGroceryItems = GroceryItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GroceryItemPeer::GROCERY_ID, $this->getGroceryId());

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

		$criteria->add(GroceryItemPeer::GROCERY_ID, $this->getGroceryId());

		return GroceryItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGroceryItem(GroceryItem $l)
	{
		$this->collGroceryItems[] = $l;
		$l->setGrocerylist($this);
	}


	
	public function getGroceryItemsJoinGroceryAisle($criteria = null, $con = null)
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

				$criteria->add(GroceryItemPeer::GROCERY_ID, $this->getGroceryId());

				$this->collGroceryItems = GroceryItemPeer::doSelectJoinGroceryAisle($criteria, $con);
			}
		} else {
									
			$criteria->add(GroceryItemPeer::GROCERY_ID, $this->getGroceryId());

			if (!isset($this->lastGroceryItemCriteria) || !$this->lastGroceryItemCriteria->equals($criteria)) {
				$this->collGroceryItems = GroceryItemPeer::doSelectJoinGroceryAisle($criteria, $con);
			}
		}
		$this->lastGroceryItemCriteria = $criteria;

		return $this->collGroceryItems;
	}

} 
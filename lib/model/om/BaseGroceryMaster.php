<?php


abstract class BaseGroceryMaster extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $master_id;


	
	protected $qty;


	
	protected $msrmt;


	
	protected $grocery_item;


	
	protected $aisle_id;


	
	protected $user_id;

	
	protected $aUser;

	
	protected $aGroceryAisle;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMasterId()
	{

		return $this->master_id;
	}

	
	public function getQty()
	{

		return $this->qty;
	}

	
	public function getMsrmt()
	{

		return $this->msrmt;
	}

	
	public function getGroceryItem()
	{

		return $this->grocery_item;
	}

	
	public function getAisleId()
	{

		return $this->aisle_id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function setMasterId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->master_id !== $v) {
			$this->master_id = $v;
			$this->modifiedColumns[] = GroceryMasterPeer::MASTER_ID;
		}

	} 
	
	public function setQty($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->qty !== $v) {
			$this->qty = $v;
			$this->modifiedColumns[] = GroceryMasterPeer::QTY;
		}

	} 
	
	public function setMsrmt($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->msrmt !== $v) {
			$this->msrmt = $v;
			$this->modifiedColumns[] = GroceryMasterPeer::MSRMT;
		}

	} 
	
	public function setGroceryItem($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->grocery_item !== $v) {
			$this->grocery_item = $v;
			$this->modifiedColumns[] = GroceryMasterPeer::GROCERY_ITEM;
		}

	} 
	
	public function setAisleId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->aisle_id !== $v) {
			$this->aisle_id = $v;
			$this->modifiedColumns[] = GroceryMasterPeer::AISLE_ID;
		}

		if ($this->aGroceryAisle !== null && $this->aGroceryAisle->getAisleId() !== $v) {
			$this->aGroceryAisle = null;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = GroceryMasterPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->master_id = $rs->getInt($startcol + 0);

			$this->qty = $rs->getString($startcol + 1);

			$this->msrmt = $rs->getString($startcol + 2);

			$this->grocery_item = $rs->getString($startcol + 3);

			$this->aisle_id = $rs->getInt($startcol + 4);

			$this->user_id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GroceryMaster object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GroceryMasterPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GroceryMasterPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GroceryMasterPeer::DATABASE_NAME);
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

			if ($this->aGroceryAisle !== null) {
				if ($this->aGroceryAisle->isModified()) {
					$affectedRows += $this->aGroceryAisle->save($con);
				}
				$this->setGroceryAisle($this->aGroceryAisle);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GroceryMasterPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setMasterId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GroceryMasterPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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

			if ($this->aGroceryAisle !== null) {
				if (!$this->aGroceryAisle->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGroceryAisle->getValidationFailures());
				}
			}


			if (($retval = GroceryMasterPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GroceryMasterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMasterId();
				break;
			case 1:
				return $this->getQty();
				break;
			case 2:
				return $this->getMsrmt();
				break;
			case 3:
				return $this->getGroceryItem();
				break;
			case 4:
				return $this->getAisleId();
				break;
			case 5:
				return $this->getUserId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GroceryMasterPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMasterId(),
			$keys[1] => $this->getQty(),
			$keys[2] => $this->getMsrmt(),
			$keys[3] => $this->getGroceryItem(),
			$keys[4] => $this->getAisleId(),
			$keys[5] => $this->getUserId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GroceryMasterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMasterId($value);
				break;
			case 1:
				$this->setQty($value);
				break;
			case 2:
				$this->setMsrmt($value);
				break;
			case 3:
				$this->setGroceryItem($value);
				break;
			case 4:
				$this->setAisleId($value);
				break;
			case 5:
				$this->setUserId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GroceryMasterPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMasterId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setQty($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMsrmt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGroceryItem($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAisleId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUserId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GroceryMasterPeer::DATABASE_NAME);

		if ($this->isColumnModified(GroceryMasterPeer::MASTER_ID)) $criteria->add(GroceryMasterPeer::MASTER_ID, $this->master_id);
		if ($this->isColumnModified(GroceryMasterPeer::QTY)) $criteria->add(GroceryMasterPeer::QTY, $this->qty);
		if ($this->isColumnModified(GroceryMasterPeer::MSRMT)) $criteria->add(GroceryMasterPeer::MSRMT, $this->msrmt);
		if ($this->isColumnModified(GroceryMasterPeer::GROCERY_ITEM)) $criteria->add(GroceryMasterPeer::GROCERY_ITEM, $this->grocery_item);
		if ($this->isColumnModified(GroceryMasterPeer::AISLE_ID)) $criteria->add(GroceryMasterPeer::AISLE_ID, $this->aisle_id);
		if ($this->isColumnModified(GroceryMasterPeer::USER_ID)) $criteria->add(GroceryMasterPeer::USER_ID, $this->user_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GroceryMasterPeer::DATABASE_NAME);

		$criteria->add(GroceryMasterPeer::MASTER_ID, $this->master_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getMasterId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setMasterId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setQty($this->qty);

		$copyObj->setMsrmt($this->msrmt);

		$copyObj->setGroceryItem($this->grocery_item);

		$copyObj->setAisleId($this->aisle_id);

		$copyObj->setUserId($this->user_id);


		$copyObj->setNew(true);

		$copyObj->setMasterId(NULL); 
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
			self::$peer = new GroceryMasterPeer();
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

	
	public function setGroceryAisle($v)
	{


		if ($v === null) {
			$this->setAisleId(NULL);
		} else {
			$this->setAisleId($v->getAisleId());
		}


		$this->aGroceryAisle = $v;
	}


	
	public function getGroceryAisle($con = null)
	{
		if ($this->aGroceryAisle === null && ($this->aisle_id !== null)) {
						include_once 'lib/model/om/BaseGroceryAislePeer.php';

			$this->aGroceryAisle = GroceryAislePeer::retrieveByPK($this->aisle_id, $con);

			
		}
		return $this->aGroceryAisle;
	}

} 
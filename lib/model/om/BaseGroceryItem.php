<?php


abstract class BaseGroceryItem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $grocery_item_id;


	
	protected $grocery_id;


	
	protected $qty;


	
	protected $msrmt;


	
	protected $grocery_item;


	
	protected $aisle_id;

	
	protected $aGrocerylist;

	
	protected $aGroceryAisle;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getGroceryItemId()
	{

		return $this->grocery_item_id;
	}

	
	public function getGroceryId()
	{

		return $this->grocery_id;
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

	
	public function setGroceryItemId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->grocery_item_id !== $v) {
			$this->grocery_item_id = $v;
			$this->modifiedColumns[] = GroceryItemPeer::GROCERY_ITEM_ID;
		}

	} 
	
	public function setGroceryId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->grocery_id !== $v) {
			$this->grocery_id = $v;
			$this->modifiedColumns[] = GroceryItemPeer::GROCERY_ID;
		}

		if ($this->aGrocerylist !== null && $this->aGrocerylist->getGroceryId() !== $v) {
			$this->aGrocerylist = null;
		}

	} 
	
	public function setQty($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->qty !== $v) {
			$this->qty = $v;
			$this->modifiedColumns[] = GroceryItemPeer::QTY;
		}

	} 
	
	public function setMsrmt($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->msrmt !== $v) {
			$this->msrmt = $v;
			$this->modifiedColumns[] = GroceryItemPeer::MSRMT;
		}

	} 
	
	public function setGroceryItem($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->grocery_item !== $v) {
			$this->grocery_item = $v;
			$this->modifiedColumns[] = GroceryItemPeer::GROCERY_ITEM;
		}

	} 
	
	public function setAisleId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->aisle_id !== $v) {
			$this->aisle_id = $v;
			$this->modifiedColumns[] = GroceryItemPeer::AISLE_ID;
		}

		if ($this->aGroceryAisle !== null && $this->aGroceryAisle->getAisleId() !== $v) {
			$this->aGroceryAisle = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->grocery_item_id = $rs->getInt($startcol + 0);

			$this->grocery_id = $rs->getInt($startcol + 1);

			$this->qty = $rs->getString($startcol + 2);

			$this->msrmt = $rs->getString($startcol + 3);

			$this->grocery_item = $rs->getString($startcol + 4);

			$this->aisle_id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GroceryItem object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GroceryItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GroceryItemPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GroceryItemPeer::DATABASE_NAME);
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


												
			if ($this->aGrocerylist !== null) {
				if ($this->aGrocerylist->isModified()) {
					$affectedRows += $this->aGrocerylist->save($con);
				}
				$this->setGrocerylist($this->aGrocerylist);
			}

			if ($this->aGroceryAisle !== null) {
				if ($this->aGroceryAisle->isModified()) {
					$affectedRows += $this->aGroceryAisle->save($con);
				}
				$this->setGroceryAisle($this->aGroceryAisle);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GroceryItemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setGroceryItemId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GroceryItemPeer::doUpdate($this, $con);
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


												
			if ($this->aGrocerylist !== null) {
				if (!$this->aGrocerylist->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGrocerylist->getValidationFailures());
				}
			}

			if ($this->aGroceryAisle !== null) {
				if (!$this->aGroceryAisle->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGroceryAisle->getValidationFailures());
				}
			}


			if (($retval = GroceryItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GroceryItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getGroceryItemId();
				break;
			case 1:
				return $this->getGroceryId();
				break;
			case 2:
				return $this->getQty();
				break;
			case 3:
				return $this->getMsrmt();
				break;
			case 4:
				return $this->getGroceryItem();
				break;
			case 5:
				return $this->getAisleId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GroceryItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getGroceryItemId(),
			$keys[1] => $this->getGroceryId(),
			$keys[2] => $this->getQty(),
			$keys[3] => $this->getMsrmt(),
			$keys[4] => $this->getGroceryItem(),
			$keys[5] => $this->getAisleId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GroceryItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setGroceryItemId($value);
				break;
			case 1:
				$this->setGroceryId($value);
				break;
			case 2:
				$this->setQty($value);
				break;
			case 3:
				$this->setMsrmt($value);
				break;
			case 4:
				$this->setGroceryItem($value);
				break;
			case 5:
				$this->setAisleId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GroceryItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setGroceryItemId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGroceryId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setQty($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMsrmt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setGroceryItem($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAisleId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GroceryItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(GroceryItemPeer::GROCERY_ITEM_ID)) $criteria->add(GroceryItemPeer::GROCERY_ITEM_ID, $this->grocery_item_id);
		if ($this->isColumnModified(GroceryItemPeer::GROCERY_ID)) $criteria->add(GroceryItemPeer::GROCERY_ID, $this->grocery_id);
		if ($this->isColumnModified(GroceryItemPeer::QTY)) $criteria->add(GroceryItemPeer::QTY, $this->qty);
		if ($this->isColumnModified(GroceryItemPeer::MSRMT)) $criteria->add(GroceryItemPeer::MSRMT, $this->msrmt);
		if ($this->isColumnModified(GroceryItemPeer::GROCERY_ITEM)) $criteria->add(GroceryItemPeer::GROCERY_ITEM, $this->grocery_item);
		if ($this->isColumnModified(GroceryItemPeer::AISLE_ID)) $criteria->add(GroceryItemPeer::AISLE_ID, $this->aisle_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GroceryItemPeer::DATABASE_NAME);

		$criteria->add(GroceryItemPeer::GROCERY_ITEM_ID, $this->grocery_item_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getGroceryItemId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setGroceryItemId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setGroceryId($this->grocery_id);

		$copyObj->setQty($this->qty);

		$copyObj->setMsrmt($this->msrmt);

		$copyObj->setGroceryItem($this->grocery_item);

		$copyObj->setAisleId($this->aisle_id);


		$copyObj->setNew(true);

		$copyObj->setGroceryItemId(NULL); 
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
			self::$peer = new GroceryItemPeer();
		}
		return self::$peer;
	}

	
	public function setGrocerylist($v)
	{


		if ($v === null) {
			$this->setGroceryId(NULL);
		} else {
			$this->setGroceryId($v->getGroceryId());
		}


		$this->aGrocerylist = $v;
	}


	
	public function getGrocerylist($con = null)
	{
		if ($this->aGrocerylist === null && ($this->grocery_id !== null)) {
						include_once 'lib/model/om/BaseGrocerylistPeer.php';

			$this->aGrocerylist = GrocerylistPeer::retrieveByPK($this->grocery_id, $con);

			
		}
		return $this->aGrocerylist;
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
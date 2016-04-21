<?php


abstract class BaseGroceryExclude extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $exclude_id;


	
	protected $grocery_item;


	
	protected $user_id;

	
	protected $aUser;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getExcludeId()
	{

		return $this->exclude_id;
	}

	
	public function getGroceryItem()
	{

		return $this->grocery_item;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function setExcludeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->exclude_id !== $v) {
			$this->exclude_id = $v;
			$this->modifiedColumns[] = GroceryExcludePeer::EXCLUDE_ID;
		}

	} 
	
	public function setGroceryItem($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->grocery_item !== $v) {
			$this->grocery_item = $v;
			$this->modifiedColumns[] = GroceryExcludePeer::GROCERY_ITEM;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = GroceryExcludePeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->exclude_id = $rs->getInt($startcol + 0);

			$this->grocery_item = $rs->getString($startcol + 1);

			$this->user_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GroceryExclude object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GroceryExcludePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GroceryExcludePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GroceryExcludePeer::DATABASE_NAME);
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
					$pk = GroceryExcludePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setExcludeId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GroceryExcludePeer::doUpdate($this, $con);
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


			if (($retval = GroceryExcludePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GroceryExcludePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getExcludeId();
				break;
			case 1:
				return $this->getGroceryItem();
				break;
			case 2:
				return $this->getUserId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GroceryExcludePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getExcludeId(),
			$keys[1] => $this->getGroceryItem(),
			$keys[2] => $this->getUserId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GroceryExcludePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setExcludeId($value);
				break;
			case 1:
				$this->setGroceryItem($value);
				break;
			case 2:
				$this->setUserId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GroceryExcludePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setExcludeId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGroceryItem($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GroceryExcludePeer::DATABASE_NAME);

		if ($this->isColumnModified(GroceryExcludePeer::EXCLUDE_ID)) $criteria->add(GroceryExcludePeer::EXCLUDE_ID, $this->exclude_id);
		if ($this->isColumnModified(GroceryExcludePeer::GROCERY_ITEM)) $criteria->add(GroceryExcludePeer::GROCERY_ITEM, $this->grocery_item);
		if ($this->isColumnModified(GroceryExcludePeer::USER_ID)) $criteria->add(GroceryExcludePeer::USER_ID, $this->user_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GroceryExcludePeer::DATABASE_NAME);

		$criteria->add(GroceryExcludePeer::EXCLUDE_ID, $this->exclude_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getExcludeId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setExcludeId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setGroceryItem($this->grocery_item);

		$copyObj->setUserId($this->user_id);


		$copyObj->setNew(true);

		$copyObj->setExcludeId(NULL); 
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
			self::$peer = new GroceryExcludePeer();
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

} 
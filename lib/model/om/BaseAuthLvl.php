<?php


abstract class BaseAuthLvl extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $auth_lvl_id;


	
	protected $auth_lvl_nm;

	
	protected $collUsers;

	
	protected $lastUserCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getAuthLvlId()
	{

		return $this->auth_lvl_id;
	}

	
	public function getAuthLvlNm()
	{

		return $this->auth_lvl_nm;
	}

	
	public function setAuthLvlId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->auth_lvl_id !== $v) {
			$this->auth_lvl_id = $v;
			$this->modifiedColumns[] = AuthLvlPeer::AUTH_LVL_ID;
		}

	} 
	
	public function setAuthLvlNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->auth_lvl_nm !== $v) {
			$this->auth_lvl_nm = $v;
			$this->modifiedColumns[] = AuthLvlPeer::AUTH_LVL_NM;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->auth_lvl_id = $rs->getInt($startcol + 0);

			$this->auth_lvl_nm = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AuthLvl object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AuthLvlPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AuthLvlPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AuthLvlPeer::DATABASE_NAME);
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
					$pk = AuthLvlPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setAuthLvlId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AuthLvlPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collUsers !== null) {
				foreach($this->collUsers as $referrerFK) {
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


			if (($retval = AuthLvlPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUsers !== null) {
					foreach($this->collUsers as $referrerFK) {
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
		$pos = AuthLvlPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAuthLvlId();
				break;
			case 1:
				return $this->getAuthLvlNm();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AuthLvlPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAuthLvlId(),
			$keys[1] => $this->getAuthLvlNm(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AuthLvlPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAuthLvlId($value);
				break;
			case 1:
				$this->setAuthLvlNm($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AuthLvlPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAuthLvlId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAuthLvlNm($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AuthLvlPeer::DATABASE_NAME);

		if ($this->isColumnModified(AuthLvlPeer::AUTH_LVL_ID)) $criteria->add(AuthLvlPeer::AUTH_LVL_ID, $this->auth_lvl_id);
		if ($this->isColumnModified(AuthLvlPeer::AUTH_LVL_NM)) $criteria->add(AuthLvlPeer::AUTH_LVL_NM, $this->auth_lvl_nm);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AuthLvlPeer::DATABASE_NAME);

		$criteria->add(AuthLvlPeer::AUTH_LVL_ID, $this->auth_lvl_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getAuthLvlId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setAuthLvlId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAuthLvlNm($this->auth_lvl_nm);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getUsers() as $relObj) {
				$copyObj->addUser($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setAuthLvlId(NULL); 
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
			self::$peer = new AuthLvlPeer();
		}
		return self::$peer;
	}

	
	public function initUsers()
	{
		if ($this->collUsers === null) {
			$this->collUsers = array();
		}
	}

	
	public function getUsers($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsers === null) {
			if ($this->isNew()) {
			   $this->collUsers = array();
			} else {

				$criteria->add(UserPeer::AUTH_LVL_ID, $this->getAuthLvlId());

				UserPeer::addSelectColumns($criteria);
				$this->collUsers = UserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UserPeer::AUTH_LVL_ID, $this->getAuthLvlId());

				UserPeer::addSelectColumns($criteria);
				if (!isset($this->lastUserCriteria) || !$this->lastUserCriteria->equals($criteria)) {
					$this->collUsers = UserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserCriteria = $criteria;
		return $this->collUsers;
	}

	
	public function countUsers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UserPeer::AUTH_LVL_ID, $this->getAuthLvlId());

		return UserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUser(User $l)
	{
		$this->collUsers[] = $l;
		$l->setAuthLvl($this);
	}

} 
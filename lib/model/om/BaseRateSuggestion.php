<?php


abstract class BaseRateSuggestion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_id;


	
	protected $suggestion_id;


	
	protected $rate;


	
	protected $created_at;

	
	protected $aUser;

	
	protected $aRecipeSuggestion;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getSuggestionId()
	{

		return $this->suggestion_id;
	}

	
	public function getRate()
	{

		return $this->rate;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
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

	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = RateSuggestionPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setSuggestionId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->suggestion_id !== $v) {
			$this->suggestion_id = $v;
			$this->modifiedColumns[] = RateSuggestionPeer::SUGGESTION_ID;
		}

		if ($this->aRecipeSuggestion !== null && $this->aRecipeSuggestion->getSuggestionId() !== $v) {
			$this->aRecipeSuggestion = null;
		}

	} 
	
	public function setRate($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->rate !== $v) {
			$this->rate = $v;
			$this->modifiedColumns[] = RateSuggestionPeer::RATE;
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
			$this->modifiedColumns[] = RateSuggestionPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->user_id = $rs->getInt($startcol + 0);

			$this->suggestion_id = $rs->getInt($startcol + 1);

			$this->rate = $rs->getString($startcol + 2);

			$this->created_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RateSuggestion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RateSuggestionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RateSuggestionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(RateSuggestionPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RateSuggestionPeer::DATABASE_NAME);
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

			if ($this->aRecipeSuggestion !== null) {
				if ($this->aRecipeSuggestion->isModified()) {
					$affectedRows += $this->aRecipeSuggestion->save($con);
				}
				$this->setRecipeSuggestion($this->aRecipeSuggestion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RateSuggestionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RateSuggestionPeer::doUpdate($this, $con);
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

			if ($this->aRecipeSuggestion !== null) {
				if (!$this->aRecipeSuggestion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRecipeSuggestion->getValidationFailures());
				}
			}


			if (($retval = RateSuggestionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RateSuggestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
				break;
			case 1:
				return $this->getSuggestionId();
				break;
			case 2:
				return $this->getRate();
				break;
			case 3:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RateSuggestionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getSuggestionId(),
			$keys[2] => $this->getRate(),
			$keys[3] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RateSuggestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setSuggestionId($value);
				break;
			case 2:
				$this->setRate($value);
				break;
			case 3:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RateSuggestionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSuggestionId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRate($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RateSuggestionPeer::DATABASE_NAME);

		if ($this->isColumnModified(RateSuggestionPeer::USER_ID)) $criteria->add(RateSuggestionPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(RateSuggestionPeer::SUGGESTION_ID)) $criteria->add(RateSuggestionPeer::SUGGESTION_ID, $this->suggestion_id);
		if ($this->isColumnModified(RateSuggestionPeer::RATE)) $criteria->add(RateSuggestionPeer::RATE, $this->rate);
		if ($this->isColumnModified(RateSuggestionPeer::CREATED_AT)) $criteria->add(RateSuggestionPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RateSuggestionPeer::DATABASE_NAME);

		$criteria->add(RateSuggestionPeer::USER_ID, $this->user_id);
		$criteria->add(RateSuggestionPeer::SUGGESTION_ID, $this->suggestion_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getUserId();

		$pks[1] = $this->getSuggestionId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setUserId($keys[0]);

		$this->setSuggestionId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRate($this->rate);

		$copyObj->setCreatedAt($this->created_at);


		$copyObj->setNew(true);

		$copyObj->setUserId(NULL); 
		$copyObj->setSuggestionId(NULL); 
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
			self::$peer = new RateSuggestionPeer();
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

	
	public function setRecipeSuggestion($v)
	{


		if ($v === null) {
			$this->setSuggestionId(NULL);
		} else {
			$this->setSuggestionId($v->getSuggestionId());
		}


		$this->aRecipeSuggestion = $v;
	}


	
	public function getRecipeSuggestion($con = null)
	{
		if ($this->aRecipeSuggestion === null && ($this->suggestion_id !== null)) {
						include_once 'lib/model/om/BaseRecipeSuggestionPeer.php';

			$this->aRecipeSuggestion = RecipeSuggestionPeer::retrieveByPK($this->suggestion_id, $con);

			
		}
		return $this->aRecipeSuggestion;
	}

} 
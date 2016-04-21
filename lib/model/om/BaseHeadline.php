<?php


abstract class BaseHeadline extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $headline_id;


	
	protected $headline_title;


	
	protected $headline_strip_title;


	
	protected $headline_intro;


	
	protected $headline_body;


	
	protected $headline_type;


	
	protected $created_at;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getHeadlineId()
	{

		return $this->headline_id;
	}

	
	public function getHeadlineTitle()
	{

		return $this->headline_title;
	}

	
	public function getHeadlineStripTitle()
	{

		return $this->headline_strip_title;
	}

	
	public function getHeadlineIntro()
	{

		return $this->headline_intro;
	}

	
	public function getHeadlineBody()
	{

		return $this->headline_body;
	}

	
	public function getHeadlineType()
	{

		return $this->headline_type;
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

	
	public function setHeadlineId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->headline_id !== $v) {
			$this->headline_id = $v;
			$this->modifiedColumns[] = HeadlinePeer::HEADLINE_ID;
		}

	} 
	
	public function setHeadlineTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->headline_title !== $v) {
			$this->headline_title = $v;
			$this->modifiedColumns[] = HeadlinePeer::HEADLINE_TITLE;
		}

	} 
	
	public function setHeadlineStripTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->headline_strip_title !== $v) {
			$this->headline_strip_title = $v;
			$this->modifiedColumns[] = HeadlinePeer::HEADLINE_STRIP_TITLE;
		}

	} 
	
	public function setHeadlineIntro($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->headline_intro !== $v) {
			$this->headline_intro = $v;
			$this->modifiedColumns[] = HeadlinePeer::HEADLINE_INTRO;
		}

	} 
	
	public function setHeadlineBody($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->headline_body !== $v) {
			$this->headline_body = $v;
			$this->modifiedColumns[] = HeadlinePeer::HEADLINE_BODY;
		}

	} 
	
	public function setHeadlineType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->headline_type !== $v) {
			$this->headline_type = $v;
			$this->modifiedColumns[] = HeadlinePeer::HEADLINE_TYPE;
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
			$this->modifiedColumns[] = HeadlinePeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->headline_id = $rs->getInt($startcol + 0);

			$this->headline_title = $rs->getString($startcol + 1);

			$this->headline_strip_title = $rs->getString($startcol + 2);

			$this->headline_intro = $rs->getString($startcol + 3);

			$this->headline_body = $rs->getString($startcol + 4);

			$this->headline_type = $rs->getString($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Headline object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HeadlinePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HeadlinePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(HeadlinePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HeadlinePeer::DATABASE_NAME);
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
					$pk = HeadlinePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setHeadlineId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HeadlinePeer::doUpdate($this, $con);
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


			if (($retval = HeadlinePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HeadlinePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getHeadlineId();
				break;
			case 1:
				return $this->getHeadlineTitle();
				break;
			case 2:
				return $this->getHeadlineStripTitle();
				break;
			case 3:
				return $this->getHeadlineIntro();
				break;
			case 4:
				return $this->getHeadlineBody();
				break;
			case 5:
				return $this->getHeadlineType();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HeadlinePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getHeadlineId(),
			$keys[1] => $this->getHeadlineTitle(),
			$keys[2] => $this->getHeadlineStripTitle(),
			$keys[3] => $this->getHeadlineIntro(),
			$keys[4] => $this->getHeadlineBody(),
			$keys[5] => $this->getHeadlineType(),
			$keys[6] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HeadlinePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setHeadlineId($value);
				break;
			case 1:
				$this->setHeadlineTitle($value);
				break;
			case 2:
				$this->setHeadlineStripTitle($value);
				break;
			case 3:
				$this->setHeadlineIntro($value);
				break;
			case 4:
				$this->setHeadlineBody($value);
				break;
			case 5:
				$this->setHeadlineType($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HeadlinePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setHeadlineId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setHeadlineTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHeadlineStripTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHeadlineIntro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHeadlineBody($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHeadlineType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HeadlinePeer::DATABASE_NAME);

		if ($this->isColumnModified(HeadlinePeer::HEADLINE_ID)) $criteria->add(HeadlinePeer::HEADLINE_ID, $this->headline_id);
		if ($this->isColumnModified(HeadlinePeer::HEADLINE_TITLE)) $criteria->add(HeadlinePeer::HEADLINE_TITLE, $this->headline_title);
		if ($this->isColumnModified(HeadlinePeer::HEADLINE_STRIP_TITLE)) $criteria->add(HeadlinePeer::HEADLINE_STRIP_TITLE, $this->headline_strip_title);
		if ($this->isColumnModified(HeadlinePeer::HEADLINE_INTRO)) $criteria->add(HeadlinePeer::HEADLINE_INTRO, $this->headline_intro);
		if ($this->isColumnModified(HeadlinePeer::HEADLINE_BODY)) $criteria->add(HeadlinePeer::HEADLINE_BODY, $this->headline_body);
		if ($this->isColumnModified(HeadlinePeer::HEADLINE_TYPE)) $criteria->add(HeadlinePeer::HEADLINE_TYPE, $this->headline_type);
		if ($this->isColumnModified(HeadlinePeer::CREATED_AT)) $criteria->add(HeadlinePeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HeadlinePeer::DATABASE_NAME);

		$criteria->add(HeadlinePeer::HEADLINE_ID, $this->headline_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getHeadlineId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setHeadlineId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setHeadlineTitle($this->headline_title);

		$copyObj->setHeadlineStripTitle($this->headline_strip_title);

		$copyObj->setHeadlineIntro($this->headline_intro);

		$copyObj->setHeadlineBody($this->headline_body);

		$copyObj->setHeadlineType($this->headline_type);

		$copyObj->setCreatedAt($this->created_at);


		$copyObj->setNew(true);

		$copyObj->setHeadlineId(NULL); 
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
			self::$peer = new HeadlinePeer();
		}
		return self::$peer;
	}

} 
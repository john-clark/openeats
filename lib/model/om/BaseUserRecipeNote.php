<?php


abstract class BaseUserRecipeNote extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_id;


	
	protected $recipe_id;


	
	protected $recipe_note;


	
	protected $updated_at;

	
	protected $aUser;

	
	protected $aRecipe;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getRecipeId()
	{

		return $this->recipe_id;
	}

	
	public function getRecipeNote()
	{

		return $this->recipe_note;
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
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
			$this->modifiedColumns[] = UserRecipeNotePeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setRecipeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->recipe_id !== $v) {
			$this->recipe_id = $v;
			$this->modifiedColumns[] = UserRecipeNotePeer::RECIPE_ID;
		}

		if ($this->aRecipe !== null && $this->aRecipe->getRecipeId() !== $v) {
			$this->aRecipe = null;
		}

	} 
	
	public function setRecipeNote($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recipe_note !== $v) {
			$this->recipe_note = $v;
			$this->modifiedColumns[] = UserRecipeNotePeer::RECIPE_NOTE;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = UserRecipeNotePeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->user_id = $rs->getInt($startcol + 0);

			$this->recipe_id = $rs->getInt($startcol + 1);

			$this->recipe_note = $rs->getString($startcol + 2);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating UserRecipeNote object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserRecipeNotePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UserRecipeNotePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(UserRecipeNotePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserRecipeNotePeer::DATABASE_NAME);
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

			if ($this->aRecipe !== null) {
				if ($this->aRecipe->isModified()) {
					$affectedRows += $this->aRecipe->save($con);
				}
				$this->setRecipe($this->aRecipe);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserRecipeNotePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += UserRecipeNotePeer::doUpdate($this, $con);
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

			if ($this->aRecipe !== null) {
				if (!$this->aRecipe->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRecipe->getValidationFailures());
				}
			}


			if (($retval = UserRecipeNotePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserRecipeNotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
				break;
			case 1:
				return $this->getRecipeId();
				break;
			case 2:
				return $this->getRecipeNote();
				break;
			case 3:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserRecipeNotePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getRecipeId(),
			$keys[2] => $this->getRecipeNote(),
			$keys[3] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserRecipeNotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setRecipeId($value);
				break;
			case 2:
				$this->setRecipeNote($value);
				break;
			case 3:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserRecipeNotePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRecipeId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRecipeNote($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UserRecipeNotePeer::DATABASE_NAME);

		if ($this->isColumnModified(UserRecipeNotePeer::USER_ID)) $criteria->add(UserRecipeNotePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(UserRecipeNotePeer::RECIPE_ID)) $criteria->add(UserRecipeNotePeer::RECIPE_ID, $this->recipe_id);
		if ($this->isColumnModified(UserRecipeNotePeer::RECIPE_NOTE)) $criteria->add(UserRecipeNotePeer::RECIPE_NOTE, $this->recipe_note);
		if ($this->isColumnModified(UserRecipeNotePeer::UPDATED_AT)) $criteria->add(UserRecipeNotePeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UserRecipeNotePeer::DATABASE_NAME);

		$criteria->add(UserRecipeNotePeer::USER_ID, $this->user_id);
		$criteria->add(UserRecipeNotePeer::RECIPE_ID, $this->recipe_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getUserId();

		$pks[1] = $this->getRecipeId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setUserId($keys[0]);

		$this->setRecipeId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRecipeNote($this->recipe_note);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setUserId(NULL); 
		$copyObj->setRecipeId(NULL); 
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
			self::$peer = new UserRecipeNotePeer();
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

	
	public function setRecipe($v)
	{


		if ($v === null) {
			$this->setRecipeId(NULL);
		} else {
			$this->setRecipeId($v->getRecipeId());
		}


		$this->aRecipe = $v;
	}


	
	public function getRecipe($con = null)
	{
		if ($this->aRecipe === null && ($this->recipe_id !== null)) {
						include_once 'lib/model/om/BaseRecipePeer.php';

			$this->aRecipe = RecipePeer::retrieveByPK($this->recipe_id, $con);

			
		}
		return $this->aRecipe;
	}

} 
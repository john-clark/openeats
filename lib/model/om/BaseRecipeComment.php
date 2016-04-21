<?php


abstract class BaseRecipeComment extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $comment_id;


	
	protected $user_id;


	
	protected $recipe_id;


	
	protected $comment;


	
	protected $created_at;

	
	protected $aUser;

	
	protected $aRecipe;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCommentId()
	{

		return $this->comment_id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getRecipeId()
	{

		return $this->recipe_id;
	}

	
	public function getComment()
	{

		return $this->comment;
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

	
	public function setCommentId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->comment_id !== $v) {
			$this->comment_id = $v;
			$this->modifiedColumns[] = RecipeCommentPeer::COMMENT_ID;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = RecipeCommentPeer::USER_ID;
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
			$this->modifiedColumns[] = RecipeCommentPeer::RECIPE_ID;
		}

		if ($this->aRecipe !== null && $this->aRecipe->getRecipeId() !== $v) {
			$this->aRecipe = null;
		}

	} 
	
	public function setComment($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = RecipeCommentPeer::COMMENT;
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
			$this->modifiedColumns[] = RecipeCommentPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->comment_id = $rs->getInt($startcol + 0);

			$this->user_id = $rs->getInt($startcol + 1);

			$this->recipe_id = $rs->getInt($startcol + 2);

			$this->comment = $rs->getString($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RecipeComment object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecipeCommentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RecipeCommentPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(RecipeCommentPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecipeCommentPeer::DATABASE_NAME);
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
					$pk = RecipeCommentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setCommentId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RecipeCommentPeer::doUpdate($this, $con);
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


			if (($retval = RecipeCommentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RecipeCommentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCommentId();
				break;
			case 1:
				return $this->getUserId();
				break;
			case 2:
				return $this->getRecipeId();
				break;
			case 3:
				return $this->getComment();
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
		$keys = RecipeCommentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCommentId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getRecipeId(),
			$keys[3] => $this->getComment(),
			$keys[4] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RecipeCommentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCommentId($value);
				break;
			case 1:
				$this->setUserId($value);
				break;
			case 2:
				$this->setRecipeId($value);
				break;
			case 3:
				$this->setComment($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RecipeCommentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCommentId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRecipeId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setComment($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RecipeCommentPeer::DATABASE_NAME);

		if ($this->isColumnModified(RecipeCommentPeer::COMMENT_ID)) $criteria->add(RecipeCommentPeer::COMMENT_ID, $this->comment_id);
		if ($this->isColumnModified(RecipeCommentPeer::USER_ID)) $criteria->add(RecipeCommentPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(RecipeCommentPeer::RECIPE_ID)) $criteria->add(RecipeCommentPeer::RECIPE_ID, $this->recipe_id);
		if ($this->isColumnModified(RecipeCommentPeer::COMMENT)) $criteria->add(RecipeCommentPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(RecipeCommentPeer::CREATED_AT)) $criteria->add(RecipeCommentPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RecipeCommentPeer::DATABASE_NAME);

		$criteria->add(RecipeCommentPeer::COMMENT_ID, $this->comment_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCommentId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCommentId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUserId($this->user_id);

		$copyObj->setRecipeId($this->recipe_id);

		$copyObj->setComment($this->comment);

		$copyObj->setCreatedAt($this->created_at);


		$copyObj->setNew(true);

		$copyObj->setCommentId(NULL); 
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
			self::$peer = new RecipeCommentPeer();
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
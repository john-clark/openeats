<?php


abstract class BaseIngredient extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ingrd_id;


	
	protected $ingrd_nm;


	
	protected $user_id;

	
	protected $aUser;

	
	protected $collRecipeIngrds;

	
	protected $lastRecipeIngrdCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIngrdId()
	{

		return $this->ingrd_id;
	}

	
	public function getIngrdNm()
	{

		return $this->ingrd_nm;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function setIngrdId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ingrd_id !== $v) {
			$this->ingrd_id = $v;
			$this->modifiedColumns[] = IngredientPeer::INGRD_ID;
		}

	} 
	
	public function setIngrdNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ingrd_nm !== $v) {
			$this->ingrd_nm = $v;
			$this->modifiedColumns[] = IngredientPeer::INGRD_NM;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = IngredientPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ingrd_id = $rs->getInt($startcol + 0);

			$this->ingrd_nm = $rs->getString($startcol + 1);

			$this->user_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ingredient object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(IngredientPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IngredientPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(IngredientPeer::DATABASE_NAME);
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
					$pk = IngredientPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIngrdId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IngredientPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRecipeIngrds !== null) {
				foreach($this->collRecipeIngrds as $referrerFK) {
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


			if (($retval = IngredientPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRecipeIngrds !== null) {
					foreach($this->collRecipeIngrds as $referrerFK) {
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
		$pos = IngredientPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIngrdId();
				break;
			case 1:
				return $this->getIngrdNm();
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
		$keys = IngredientPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIngrdId(),
			$keys[1] => $this->getIngrdNm(),
			$keys[2] => $this->getUserId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IngredientPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIngrdId($value);
				break;
			case 1:
				$this->setIngrdNm($value);
				break;
			case 2:
				$this->setUserId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IngredientPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIngrdId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIngrdNm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IngredientPeer::DATABASE_NAME);

		if ($this->isColumnModified(IngredientPeer::INGRD_ID)) $criteria->add(IngredientPeer::INGRD_ID, $this->ingrd_id);
		if ($this->isColumnModified(IngredientPeer::INGRD_NM)) $criteria->add(IngredientPeer::INGRD_NM, $this->ingrd_nm);
		if ($this->isColumnModified(IngredientPeer::USER_ID)) $criteria->add(IngredientPeer::USER_ID, $this->user_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IngredientPeer::DATABASE_NAME);

		$criteria->add(IngredientPeer::INGRD_ID, $this->ingrd_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIngrdId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIngrdId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIngrdNm($this->ingrd_nm);

		$copyObj->setUserId($this->user_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRecipeIngrds() as $relObj) {
				$copyObj->addRecipeIngrd($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIngrdId(NULL); 
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
			self::$peer = new IngredientPeer();
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

	
	public function initRecipeIngrds()
	{
		if ($this->collRecipeIngrds === null) {
			$this->collRecipeIngrds = array();
		}
	}

	
	public function getRecipeIngrds($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeIngrdPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeIngrds === null) {
			if ($this->isNew()) {
			   $this->collRecipeIngrds = array();
			} else {

				$criteria->add(RecipeIngrdPeer::INGRD_ID, $this->getIngrdId());

				RecipeIngrdPeer::addSelectColumns($criteria);
				$this->collRecipeIngrds = RecipeIngrdPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeIngrdPeer::INGRD_ID, $this->getIngrdId());

				RecipeIngrdPeer::addSelectColumns($criteria);
				if (!isset($this->lastRecipeIngrdCriteria) || !$this->lastRecipeIngrdCriteria->equals($criteria)) {
					$this->collRecipeIngrds = RecipeIngrdPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRecipeIngrdCriteria = $criteria;
		return $this->collRecipeIngrds;
	}

	
	public function countRecipeIngrds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeIngrdPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RecipeIngrdPeer::INGRD_ID, $this->getIngrdId());

		return RecipeIngrdPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeIngrd(RecipeIngrd $l)
	{
		$this->collRecipeIngrds[] = $l;
		$l->setIngredient($this);
	}


	
	public function getRecipeIngrdsJoinRecipe($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeIngrdPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeIngrds === null) {
			if ($this->isNew()) {
				$this->collRecipeIngrds = array();
			} else {

				$criteria->add(RecipeIngrdPeer::INGRD_ID, $this->getIngrdId());

				$this->collRecipeIngrds = RecipeIngrdPeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeIngrdPeer::INGRD_ID, $this->getIngrdId());

			if (!isset($this->lastRecipeIngrdCriteria) || !$this->lastRecipeIngrdCriteria->equals($criteria)) {
				$this->collRecipeIngrds = RecipeIngrdPeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastRecipeIngrdCriteria = $criteria;

		return $this->collRecipeIngrds;
	}

} 
<?php


abstract class BaseRecipeSuggestion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $suggestion_id;


	
	protected $recipe_id;


	
	protected $user_id;


	
	protected $suggestion;


	
	protected $nb_rate;


	
	protected $created_at;

	
	protected $aUser;

	
	protected $aRecipe;

	
	protected $collRateSuggestions;

	
	protected $lastRateSuggestionCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getSuggestionId()
	{

		return $this->suggestion_id;
	}

	
	public function getRecipeId()
	{

		return $this->recipe_id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getSuggestion()
	{

		return $this->suggestion;
	}

	
	public function getNbRate()
	{

		return $this->nb_rate;
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

	
	public function setSuggestionId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->suggestion_id !== $v) {
			$this->suggestion_id = $v;
			$this->modifiedColumns[] = RecipeSuggestionPeer::SUGGESTION_ID;
		}

	} 
	
	public function setRecipeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->recipe_id !== $v) {
			$this->recipe_id = $v;
			$this->modifiedColumns[] = RecipeSuggestionPeer::RECIPE_ID;
		}

		if ($this->aRecipe !== null && $this->aRecipe->getRecipeId() !== $v) {
			$this->aRecipe = null;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = RecipeSuggestionPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setSuggestion($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->suggestion !== $v) {
			$this->suggestion = $v;
			$this->modifiedColumns[] = RecipeSuggestionPeer::SUGGESTION;
		}

	} 
	
	public function setNbRate($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->nb_rate !== $v) {
			$this->nb_rate = $v;
			$this->modifiedColumns[] = RecipeSuggestionPeer::NB_RATE;
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
			$this->modifiedColumns[] = RecipeSuggestionPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->suggestion_id = $rs->getInt($startcol + 0);

			$this->recipe_id = $rs->getInt($startcol + 1);

			$this->user_id = $rs->getInt($startcol + 2);

			$this->suggestion = $rs->getString($startcol + 3);

			$this->nb_rate = $rs->getInt($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RecipeSuggestion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecipeSuggestionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RecipeSuggestionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(RecipeSuggestionPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecipeSuggestionPeer::DATABASE_NAME);
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
					$pk = RecipeSuggestionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setSuggestionId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RecipeSuggestionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRateSuggestions !== null) {
				foreach($this->collRateSuggestions as $referrerFK) {
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

			if ($this->aRecipe !== null) {
				if (!$this->aRecipe->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRecipe->getValidationFailures());
				}
			}


			if (($retval = RecipeSuggestionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRateSuggestions !== null) {
					foreach($this->collRateSuggestions as $referrerFK) {
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
		$pos = RecipeSuggestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getSuggestionId();
				break;
			case 1:
				return $this->getRecipeId();
				break;
			case 2:
				return $this->getUserId();
				break;
			case 3:
				return $this->getSuggestion();
				break;
			case 4:
				return $this->getNbRate();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RecipeSuggestionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getSuggestionId(),
			$keys[1] => $this->getRecipeId(),
			$keys[2] => $this->getUserId(),
			$keys[3] => $this->getSuggestion(),
			$keys[4] => $this->getNbRate(),
			$keys[5] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RecipeSuggestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setSuggestionId($value);
				break;
			case 1:
				$this->setRecipeId($value);
				break;
			case 2:
				$this->setUserId($value);
				break;
			case 3:
				$this->setSuggestion($value);
				break;
			case 4:
				$this->setNbRate($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RecipeSuggestionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setSuggestionId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRecipeId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSuggestion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNbRate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RecipeSuggestionPeer::DATABASE_NAME);

		if ($this->isColumnModified(RecipeSuggestionPeer::SUGGESTION_ID)) $criteria->add(RecipeSuggestionPeer::SUGGESTION_ID, $this->suggestion_id);
		if ($this->isColumnModified(RecipeSuggestionPeer::RECIPE_ID)) $criteria->add(RecipeSuggestionPeer::RECIPE_ID, $this->recipe_id);
		if ($this->isColumnModified(RecipeSuggestionPeer::USER_ID)) $criteria->add(RecipeSuggestionPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(RecipeSuggestionPeer::SUGGESTION)) $criteria->add(RecipeSuggestionPeer::SUGGESTION, $this->suggestion);
		if ($this->isColumnModified(RecipeSuggestionPeer::NB_RATE)) $criteria->add(RecipeSuggestionPeer::NB_RATE, $this->nb_rate);
		if ($this->isColumnModified(RecipeSuggestionPeer::CREATED_AT)) $criteria->add(RecipeSuggestionPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RecipeSuggestionPeer::DATABASE_NAME);

		$criteria->add(RecipeSuggestionPeer::SUGGESTION_ID, $this->suggestion_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getSuggestionId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setSuggestionId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRecipeId($this->recipe_id);

		$copyObj->setUserId($this->user_id);

		$copyObj->setSuggestion($this->suggestion);

		$copyObj->setNbRate($this->nb_rate);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRateSuggestions() as $relObj) {
				$copyObj->addRateSuggestion($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

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
			self::$peer = new RecipeSuggestionPeer();
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

	
	public function initRateSuggestions()
	{
		if ($this->collRateSuggestions === null) {
			$this->collRateSuggestions = array();
		}
	}

	
	public function getRateSuggestions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRateSuggestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRateSuggestions === null) {
			if ($this->isNew()) {
			   $this->collRateSuggestions = array();
			} else {

				$criteria->add(RateSuggestionPeer::SUGGESTION_ID, $this->getSuggestionId());

				RateSuggestionPeer::addSelectColumns($criteria);
				$this->collRateSuggestions = RateSuggestionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RateSuggestionPeer::SUGGESTION_ID, $this->getSuggestionId());

				RateSuggestionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRateSuggestionCriteria) || !$this->lastRateSuggestionCriteria->equals($criteria)) {
					$this->collRateSuggestions = RateSuggestionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRateSuggestionCriteria = $criteria;
		return $this->collRateSuggestions;
	}

	
	public function countRateSuggestions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRateSuggestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RateSuggestionPeer::SUGGESTION_ID, $this->getSuggestionId());

		return RateSuggestionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRateSuggestion(RateSuggestion $l)
	{
		$this->collRateSuggestions[] = $l;
		$l->setRecipeSuggestion($this);
	}


	
	public function getRateSuggestionsJoinUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRateSuggestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRateSuggestions === null) {
			if ($this->isNew()) {
				$this->collRateSuggestions = array();
			} else {

				$criteria->add(RateSuggestionPeer::SUGGESTION_ID, $this->getSuggestionId());

				$this->collRateSuggestions = RateSuggestionPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(RateSuggestionPeer::SUGGESTION_ID, $this->getSuggestionId());

			if (!isset($this->lastRateSuggestionCriteria) || !$this->lastRateSuggestionCriteria->equals($criteria)) {
				$this->collRateSuggestions = RateSuggestionPeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastRateSuggestionCriteria = $criteria;

		return $this->collRateSuggestions;
	}

} 
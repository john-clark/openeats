<?php


abstract class BaseEthnicity extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ethnicity_id;


	
	protected $ethnicity_nm;


	
	protected $ethnicity_desc;

	
	protected $collRecipes;

	
	protected $lastRecipeCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getEthnicityId()
	{

		return $this->ethnicity_id;
	}

	
	public function getEthnicityNm()
	{

		return $this->ethnicity_nm;
	}

	
	public function getEthnicityDesc()
	{

		return $this->ethnicity_desc;
	}

	
	public function setEthnicityId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ethnicity_id !== $v) {
			$this->ethnicity_id = $v;
			$this->modifiedColumns[] = EthnicityPeer::ETHNICITY_ID;
		}

	} 
	
	public function setEthnicityNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ethnicity_nm !== $v) {
			$this->ethnicity_nm = $v;
			$this->modifiedColumns[] = EthnicityPeer::ETHNICITY_NM;
		}

	} 
	
	public function setEthnicityDesc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ethnicity_desc !== $v) {
			$this->ethnicity_desc = $v;
			$this->modifiedColumns[] = EthnicityPeer::ETHNICITY_DESC;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ethnicity_id = $rs->getInt($startcol + 0);

			$this->ethnicity_nm = $rs->getString($startcol + 1);

			$this->ethnicity_desc = $rs->getString($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ethnicity object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EthnicityPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EthnicityPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EthnicityPeer::DATABASE_NAME);
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
					$pk = EthnicityPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setEthnicityId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EthnicityPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRecipes !== null) {
				foreach($this->collRecipes as $referrerFK) {
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


			if (($retval = EthnicityPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRecipes !== null) {
					foreach($this->collRecipes as $referrerFK) {
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
		$pos = EthnicityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getEthnicityId();
				break;
			case 1:
				return $this->getEthnicityNm();
				break;
			case 2:
				return $this->getEthnicityDesc();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EthnicityPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEthnicityId(),
			$keys[1] => $this->getEthnicityNm(),
			$keys[2] => $this->getEthnicityDesc(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EthnicityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setEthnicityId($value);
				break;
			case 1:
				$this->setEthnicityNm($value);
				break;
			case 2:
				$this->setEthnicityDesc($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EthnicityPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEthnicityId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEthnicityNm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEthnicityDesc($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EthnicityPeer::DATABASE_NAME);

		if ($this->isColumnModified(EthnicityPeer::ETHNICITY_ID)) $criteria->add(EthnicityPeer::ETHNICITY_ID, $this->ethnicity_id);
		if ($this->isColumnModified(EthnicityPeer::ETHNICITY_NM)) $criteria->add(EthnicityPeer::ETHNICITY_NM, $this->ethnicity_nm);
		if ($this->isColumnModified(EthnicityPeer::ETHNICITY_DESC)) $criteria->add(EthnicityPeer::ETHNICITY_DESC, $this->ethnicity_desc);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EthnicityPeer::DATABASE_NAME);

		$criteria->add(EthnicityPeer::ETHNICITY_ID, $this->ethnicity_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getEthnicityId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setEthnicityId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setEthnicityNm($this->ethnicity_nm);

		$copyObj->setEthnicityDesc($this->ethnicity_desc);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRecipes() as $relObj) {
				$copyObj->addRecipe($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setEthnicityId(NULL); 
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
			self::$peer = new EthnicityPeer();
		}
		return self::$peer;
	}

	
	public function initRecipes()
	{
		if ($this->collRecipes === null) {
			$this->collRecipes = array();
		}
	}

	
	public function getRecipes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipes === null) {
			if ($this->isNew()) {
			   $this->collRecipes = array();
			} else {

				$criteria->add(RecipePeer::ETHNICITY_ID, $this->getEthnicityId());

				RecipePeer::addSelectColumns($criteria);
				$this->collRecipes = RecipePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipePeer::ETHNICITY_ID, $this->getEthnicityId());

				RecipePeer::addSelectColumns($criteria);
				if (!isset($this->lastRecipeCriteria) || !$this->lastRecipeCriteria->equals($criteria)) {
					$this->collRecipes = RecipePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRecipeCriteria = $criteria;
		return $this->collRecipes;
	}

	
	public function countRecipes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRecipePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RecipePeer::ETHNICITY_ID, $this->getEthnicityId());

		return RecipePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipe(Recipe $l)
	{
		$this->collRecipes[] = $l;
		$l->setEthnicity($this);
	}


	
	public function getRecipesJoinUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipes === null) {
			if ($this->isNew()) {
				$this->collRecipes = array();
			} else {

				$criteria->add(RecipePeer::ETHNICITY_ID, $this->getEthnicityId());

				$this->collRecipes = RecipePeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipePeer::ETHNICITY_ID, $this->getEthnicityId());

			if (!isset($this->lastRecipeCriteria) || !$this->lastRecipeCriteria->equals($criteria)) {
				$this->collRecipes = RecipePeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastRecipeCriteria = $criteria;

		return $this->collRecipes;
	}


	
	public function getRecipesJoinCourse($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipes === null) {
			if ($this->isNew()) {
				$this->collRecipes = array();
			} else {

				$criteria->add(RecipePeer::ETHNICITY_ID, $this->getEthnicityId());

				$this->collRecipes = RecipePeer::doSelectJoinCourse($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipePeer::ETHNICITY_ID, $this->getEthnicityId());

			if (!isset($this->lastRecipeCriteria) || !$this->lastRecipeCriteria->equals($criteria)) {
				$this->collRecipes = RecipePeer::doSelectJoinCourse($criteria, $con);
			}
		}
		$this->lastRecipeCriteria = $criteria;

		return $this->collRecipes;
	}

} 
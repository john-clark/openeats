<?php


abstract class BasePlanner extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $planner_id;


	
	protected $recipe_id;


	
	protected $menu_id;


	
	protected $user_id;


	
	protected $planner_date;

	
	protected $aRecipe;

	
	protected $aUser;

	
	protected $aMenu;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPlannerId()
	{

		return $this->planner_id;
	}

	
	public function getRecipeId()
	{

		return $this->recipe_id;
	}

	
	public function getMenuId()
	{

		return $this->menu_id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getPlannerDate($format = 'Y-m-d H:i:s')
	{

		if ($this->planner_date === null || $this->planner_date === '') {
			return null;
		} elseif (!is_int($this->planner_date)) {
						$ts = strtotime($this->planner_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [planner_date] as date/time value: " . var_export($this->planner_date, true));
			}
		} else {
			$ts = $this->planner_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setPlannerId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->planner_id !== $v) {
			$this->planner_id = $v;
			$this->modifiedColumns[] = PlannerPeer::PLANNER_ID;
		}

	} 
	
	public function setRecipeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->recipe_id !== $v) {
			$this->recipe_id = $v;
			$this->modifiedColumns[] = PlannerPeer::RECIPE_ID;
		}

		if ($this->aRecipe !== null && $this->aRecipe->getRecipeId() !== $v) {
			$this->aRecipe = null;
		}

	} 
	
	public function setMenuId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->menu_id !== $v) {
			$this->menu_id = $v;
			$this->modifiedColumns[] = PlannerPeer::MENU_ID;
		}

		if ($this->aMenu !== null && $this->aMenu->getMenuId() !== $v) {
			$this->aMenu = null;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = PlannerPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setPlannerDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [planner_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->planner_date !== $ts) {
			$this->planner_date = $ts;
			$this->modifiedColumns[] = PlannerPeer::PLANNER_DATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->planner_id = $rs->getInt($startcol + 0);

			$this->recipe_id = $rs->getInt($startcol + 1);

			$this->menu_id = $rs->getInt($startcol + 2);

			$this->user_id = $rs->getInt($startcol + 3);

			$this->planner_date = $rs->getTimestamp($startcol + 4, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Planner object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PlannerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PlannerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PlannerPeer::DATABASE_NAME);
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


												
			if ($this->aRecipe !== null) {
				if ($this->aRecipe->isModified()) {
					$affectedRows += $this->aRecipe->save($con);
				}
				$this->setRecipe($this->aRecipe);
			}

			if ($this->aUser !== null) {
				if ($this->aUser->isModified()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}

			if ($this->aMenu !== null) {
				if ($this->aMenu->isModified()) {
					$affectedRows += $this->aMenu->save($con);
				}
				$this->setMenu($this->aMenu);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PlannerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setPlannerId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PlannerPeer::doUpdate($this, $con);
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


												
			if ($this->aRecipe !== null) {
				if (!$this->aRecipe->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRecipe->getValidationFailures());
				}
			}

			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}

			if ($this->aMenu !== null) {
				if (!$this->aMenu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMenu->getValidationFailures());
				}
			}


			if (($retval = PlannerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PlannerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPlannerId();
				break;
			case 1:
				return $this->getRecipeId();
				break;
			case 2:
				return $this->getMenuId();
				break;
			case 3:
				return $this->getUserId();
				break;
			case 4:
				return $this->getPlannerDate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PlannerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPlannerId(),
			$keys[1] => $this->getRecipeId(),
			$keys[2] => $this->getMenuId(),
			$keys[3] => $this->getUserId(),
			$keys[4] => $this->getPlannerDate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PlannerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPlannerId($value);
				break;
			case 1:
				$this->setRecipeId($value);
				break;
			case 2:
				$this->setMenuId($value);
				break;
			case 3:
				$this->setUserId($value);
				break;
			case 4:
				$this->setPlannerDate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PlannerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPlannerId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRecipeId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMenuId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPlannerDate($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PlannerPeer::DATABASE_NAME);

		if ($this->isColumnModified(PlannerPeer::PLANNER_ID)) $criteria->add(PlannerPeer::PLANNER_ID, $this->planner_id);
		if ($this->isColumnModified(PlannerPeer::RECIPE_ID)) $criteria->add(PlannerPeer::RECIPE_ID, $this->recipe_id);
		if ($this->isColumnModified(PlannerPeer::MENU_ID)) $criteria->add(PlannerPeer::MENU_ID, $this->menu_id);
		if ($this->isColumnModified(PlannerPeer::USER_ID)) $criteria->add(PlannerPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(PlannerPeer::PLANNER_DATE)) $criteria->add(PlannerPeer::PLANNER_DATE, $this->planner_date);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PlannerPeer::DATABASE_NAME);

		$criteria->add(PlannerPeer::PLANNER_ID, $this->planner_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getPlannerId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setPlannerId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRecipeId($this->recipe_id);

		$copyObj->setMenuId($this->menu_id);

		$copyObj->setUserId($this->user_id);

		$copyObj->setPlannerDate($this->planner_date);


		$copyObj->setNew(true);

		$copyObj->setPlannerId(NULL); 
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
			self::$peer = new PlannerPeer();
		}
		return self::$peer;
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

	
	public function setMenu($v)
	{


		if ($v === null) {
			$this->setMenuId(NULL);
		} else {
			$this->setMenuId($v->getMenuId());
		}


		$this->aMenu = $v;
	}


	
	public function getMenu($con = null)
	{
		if ($this->aMenu === null && ($this->menu_id !== null)) {
						include_once 'lib/model/om/BaseMenuPeer.php';

			$this->aMenu = MenuPeer::retrieveByPK($this->menu_id, $con);

			
		}
		return $this->aMenu;
	}

} 
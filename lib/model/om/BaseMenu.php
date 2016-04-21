<?php


abstract class BaseMenu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $menu_id;


	
	protected $menu_nm;


	
	protected $menu_strip_nm;


	
	protected $user_id;


	
	protected $menu_desc;


	
	protected $menu_private;


	
	protected $created_at;

	
	protected $aUser;

	
	protected $collMenuItems;

	
	protected $lastMenuItemCriteria = null;

	
	protected $collPlanners;

	
	protected $lastPlannerCriteria = null;

	
	protected $collRecipeMenus;

	
	protected $lastRecipeMenuCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMenuId()
	{

		return $this->menu_id;
	}

	
	public function getMenuNm()
	{

		return $this->menu_nm;
	}

	
	public function getMenuStripNm()
	{

		return $this->menu_strip_nm;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getMenuDesc()
	{

		return $this->menu_desc;
	}

	
	public function getMenuPrivate()
	{

		return $this->menu_private;
	}

	
	public function getCreatedAt($format = 'Y-m-d')
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

	
	public function setMenuId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->menu_id !== $v) {
			$this->menu_id = $v;
			$this->modifiedColumns[] = MenuPeer::MENU_ID;
		}

	} 
	
	public function setMenuNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->menu_nm !== $v) {
			$this->menu_nm = $v;
			$this->modifiedColumns[] = MenuPeer::MENU_NM;
		}

	} 
	
	public function setMenuStripNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->menu_strip_nm !== $v) {
			$this->menu_strip_nm = $v;
			$this->modifiedColumns[] = MenuPeer::MENU_STRIP_NM;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = MenuPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setMenuDesc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->menu_desc !== $v) {
			$this->menu_desc = $v;
			$this->modifiedColumns[] = MenuPeer::MENU_DESC;
		}

	} 
	
	public function setMenuPrivate($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->menu_private !== $v) {
			$this->menu_private = $v;
			$this->modifiedColumns[] = MenuPeer::MENU_PRIVATE;
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
			$this->modifiedColumns[] = MenuPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->menu_id = $rs->getInt($startcol + 0);

			$this->menu_nm = $rs->getString($startcol + 1);

			$this->menu_strip_nm = $rs->getString($startcol + 2);

			$this->user_id = $rs->getInt($startcol + 3);

			$this->menu_desc = $rs->getString($startcol + 4);

			$this->menu_private = $rs->getInt($startcol + 5);

			$this->created_at = $rs->getDate($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Menu object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MenuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MenuPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MenuPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MenuPeer::DATABASE_NAME);
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
					$pk = MenuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setMenuId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MenuPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collMenuItems !== null) {
				foreach($this->collMenuItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPlanners !== null) {
				foreach($this->collPlanners as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRecipeMenus !== null) {
				foreach($this->collRecipeMenus as $referrerFK) {
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


			if (($retval = MenuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collMenuItems !== null) {
					foreach($this->collMenuItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPlanners !== null) {
					foreach($this->collPlanners as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRecipeMenus !== null) {
					foreach($this->collRecipeMenus as $referrerFK) {
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
		$pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMenuId();
				break;
			case 1:
				return $this->getMenuNm();
				break;
			case 2:
				return $this->getMenuStripNm();
				break;
			case 3:
				return $this->getUserId();
				break;
			case 4:
				return $this->getMenuDesc();
				break;
			case 5:
				return $this->getMenuPrivate();
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
		$keys = MenuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMenuId(),
			$keys[1] => $this->getMenuNm(),
			$keys[2] => $this->getMenuStripNm(),
			$keys[3] => $this->getUserId(),
			$keys[4] => $this->getMenuDesc(),
			$keys[5] => $this->getMenuPrivate(),
			$keys[6] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMenuId($value);
				break;
			case 1:
				$this->setMenuNm($value);
				break;
			case 2:
				$this->setMenuStripNm($value);
				break;
			case 3:
				$this->setUserId($value);
				break;
			case 4:
				$this->setMenuDesc($value);
				break;
			case 5:
				$this->setMenuPrivate($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MenuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMenuId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMenuNm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMenuStripNm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMenuDesc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMenuPrivate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MenuPeer::DATABASE_NAME);

		if ($this->isColumnModified(MenuPeer::MENU_ID)) $criteria->add(MenuPeer::MENU_ID, $this->menu_id);
		if ($this->isColumnModified(MenuPeer::MENU_NM)) $criteria->add(MenuPeer::MENU_NM, $this->menu_nm);
		if ($this->isColumnModified(MenuPeer::MENU_STRIP_NM)) $criteria->add(MenuPeer::MENU_STRIP_NM, $this->menu_strip_nm);
		if ($this->isColumnModified(MenuPeer::USER_ID)) $criteria->add(MenuPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(MenuPeer::MENU_DESC)) $criteria->add(MenuPeer::MENU_DESC, $this->menu_desc);
		if ($this->isColumnModified(MenuPeer::MENU_PRIVATE)) $criteria->add(MenuPeer::MENU_PRIVATE, $this->menu_private);
		if ($this->isColumnModified(MenuPeer::CREATED_AT)) $criteria->add(MenuPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MenuPeer::DATABASE_NAME);

		$criteria->add(MenuPeer::MENU_ID, $this->menu_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getMenuId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setMenuId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setMenuNm($this->menu_nm);

		$copyObj->setMenuStripNm($this->menu_strip_nm);

		$copyObj->setUserId($this->user_id);

		$copyObj->setMenuDesc($this->menu_desc);

		$copyObj->setMenuPrivate($this->menu_private);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getMenuItems() as $relObj) {
				$copyObj->addMenuItem($relObj->copy($deepCopy));
			}

			foreach($this->getPlanners() as $relObj) {
				$copyObj->addPlanner($relObj->copy($deepCopy));
			}

			foreach($this->getRecipeMenus() as $relObj) {
				$copyObj->addRecipeMenu($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setMenuId(NULL); 
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
			self::$peer = new MenuPeer();
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

	
	public function initMenuItems()
	{
		if ($this->collMenuItems === null) {
			$this->collMenuItems = array();
		}
	}

	
	public function getMenuItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMenuItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMenuItems === null) {
			if ($this->isNew()) {
			   $this->collMenuItems = array();
			} else {

				$criteria->add(MenuItemPeer::MENU_ID, $this->getMenuId());

				MenuItemPeer::addSelectColumns($criteria);
				$this->collMenuItems = MenuItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MenuItemPeer::MENU_ID, $this->getMenuId());

				MenuItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastMenuItemCriteria) || !$this->lastMenuItemCriteria->equals($criteria)) {
					$this->collMenuItems = MenuItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMenuItemCriteria = $criteria;
		return $this->collMenuItems;
	}

	
	public function countMenuItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMenuItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MenuItemPeer::MENU_ID, $this->getMenuId());

		return MenuItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMenuItem(MenuItem $l)
	{
		$this->collMenuItems[] = $l;
		$l->setMenu($this);
	}


	
	public function getMenuItemsJoinCourse($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMenuItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMenuItems === null) {
			if ($this->isNew()) {
				$this->collMenuItems = array();
			} else {

				$criteria->add(MenuItemPeer::MENU_ID, $this->getMenuId());

				$this->collMenuItems = MenuItemPeer::doSelectJoinCourse($criteria, $con);
			}
		} else {
									
			$criteria->add(MenuItemPeer::MENU_ID, $this->getMenuId());

			if (!isset($this->lastMenuItemCriteria) || !$this->lastMenuItemCriteria->equals($criteria)) {
				$this->collMenuItems = MenuItemPeer::doSelectJoinCourse($criteria, $con);
			}
		}
		$this->lastMenuItemCriteria = $criteria;

		return $this->collMenuItems;
	}

	
	public function initPlanners()
	{
		if ($this->collPlanners === null) {
			$this->collPlanners = array();
		}
	}

	
	public function getPlanners($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePlannerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPlanners === null) {
			if ($this->isNew()) {
			   $this->collPlanners = array();
			} else {

				$criteria->add(PlannerPeer::MENU_ID, $this->getMenuId());

				PlannerPeer::addSelectColumns($criteria);
				$this->collPlanners = PlannerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PlannerPeer::MENU_ID, $this->getMenuId());

				PlannerPeer::addSelectColumns($criteria);
				if (!isset($this->lastPlannerCriteria) || !$this->lastPlannerCriteria->equals($criteria)) {
					$this->collPlanners = PlannerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPlannerCriteria = $criteria;
		return $this->collPlanners;
	}

	
	public function countPlanners($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePlannerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PlannerPeer::MENU_ID, $this->getMenuId());

		return PlannerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPlanner(Planner $l)
	{
		$this->collPlanners[] = $l;
		$l->setMenu($this);
	}


	
	public function getPlannersJoinRecipe($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePlannerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPlanners === null) {
			if ($this->isNew()) {
				$this->collPlanners = array();
			} else {

				$criteria->add(PlannerPeer::MENU_ID, $this->getMenuId());

				$this->collPlanners = PlannerPeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(PlannerPeer::MENU_ID, $this->getMenuId());

			if (!isset($this->lastPlannerCriteria) || !$this->lastPlannerCriteria->equals($criteria)) {
				$this->collPlanners = PlannerPeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastPlannerCriteria = $criteria;

		return $this->collPlanners;
	}


	
	public function getPlannersJoinUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePlannerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPlanners === null) {
			if ($this->isNew()) {
				$this->collPlanners = array();
			} else {

				$criteria->add(PlannerPeer::MENU_ID, $this->getMenuId());

				$this->collPlanners = PlannerPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(PlannerPeer::MENU_ID, $this->getMenuId());

			if (!isset($this->lastPlannerCriteria) || !$this->lastPlannerCriteria->equals($criteria)) {
				$this->collPlanners = PlannerPeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastPlannerCriteria = $criteria;

		return $this->collPlanners;
	}

	
	public function initRecipeMenus()
	{
		if ($this->collRecipeMenus === null) {
			$this->collRecipeMenus = array();
		}
	}

	
	public function getRecipeMenus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeMenuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeMenus === null) {
			if ($this->isNew()) {
			   $this->collRecipeMenus = array();
			} else {

				$criteria->add(RecipeMenuPeer::MENU_ID, $this->getMenuId());

				RecipeMenuPeer::addSelectColumns($criteria);
				$this->collRecipeMenus = RecipeMenuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeMenuPeer::MENU_ID, $this->getMenuId());

				RecipeMenuPeer::addSelectColumns($criteria);
				if (!isset($this->lastRecipeMenuCriteria) || !$this->lastRecipeMenuCriteria->equals($criteria)) {
					$this->collRecipeMenus = RecipeMenuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRecipeMenuCriteria = $criteria;
		return $this->collRecipeMenus;
	}

	
	public function countRecipeMenus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeMenuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RecipeMenuPeer::MENU_ID, $this->getMenuId());

		return RecipeMenuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeMenu(RecipeMenu $l)
	{
		$this->collRecipeMenus[] = $l;
		$l->setMenu($this);
	}


	
	public function getRecipeMenusJoinRecipe($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeMenuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeMenus === null) {
			if ($this->isNew()) {
				$this->collRecipeMenus = array();
			} else {

				$criteria->add(RecipeMenuPeer::MENU_ID, $this->getMenuId());

				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeMenuPeer::MENU_ID, $this->getMenuId());

			if (!isset($this->lastRecipeMenuCriteria) || !$this->lastRecipeMenuCriteria->equals($criteria)) {
				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastRecipeMenuCriteria = $criteria;

		return $this->collRecipeMenus;
	}


	
	public function getRecipeMenusJoinCourse($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeMenuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeMenus === null) {
			if ($this->isNew()) {
				$this->collRecipeMenus = array();
			} else {

				$criteria->add(RecipeMenuPeer::MENU_ID, $this->getMenuId());

				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinCourse($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeMenuPeer::MENU_ID, $this->getMenuId());

			if (!isset($this->lastRecipeMenuCriteria) || !$this->lastRecipeMenuCriteria->equals($criteria)) {
				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinCourse($criteria, $con);
			}
		}
		$this->lastRecipeMenuCriteria = $criteria;

		return $this->collRecipeMenus;
	}

} 
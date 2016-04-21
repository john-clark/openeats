<?php


abstract class BaseCourse extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $course_id;


	
	protected $course_nm;


	
	protected $course_desc;

	
	protected $collMenuItems;

	
	protected $lastMenuItemCriteria = null;

	
	protected $collRecipes;

	
	protected $lastRecipeCriteria = null;

	
	protected $collRecipeMenus;

	
	protected $lastRecipeMenuCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCourseId()
	{

		return $this->course_id;
	}

	
	public function getCourseNm()
	{

		return $this->course_nm;
	}

	
	public function getCourseDesc()
	{

		return $this->course_desc;
	}

	
	public function setCourseId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->course_id !== $v) {
			$this->course_id = $v;
			$this->modifiedColumns[] = CoursePeer::COURSE_ID;
		}

	} 
	
	public function setCourseNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->course_nm !== $v) {
			$this->course_nm = $v;
			$this->modifiedColumns[] = CoursePeer::COURSE_NM;
		}

	} 
	
	public function setCourseDesc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->course_desc !== $v) {
			$this->course_desc = $v;
			$this->modifiedColumns[] = CoursePeer::COURSE_DESC;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->course_id = $rs->getInt($startcol + 0);

			$this->course_nm = $rs->getString($startcol + 1);

			$this->course_desc = $rs->getString($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Course object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CoursePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CoursePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CoursePeer::DATABASE_NAME);
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
					$pk = CoursePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setCourseId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CoursePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collMenuItems !== null) {
				foreach($this->collMenuItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRecipes !== null) {
				foreach($this->collRecipes as $referrerFK) {
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


			if (($retval = CoursePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collMenuItems !== null) {
					foreach($this->collMenuItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRecipes !== null) {
					foreach($this->collRecipes as $referrerFK) {
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
		$pos = CoursePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCourseId();
				break;
			case 1:
				return $this->getCourseNm();
				break;
			case 2:
				return $this->getCourseDesc();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CoursePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCourseId(),
			$keys[1] => $this->getCourseNm(),
			$keys[2] => $this->getCourseDesc(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CoursePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCourseId($value);
				break;
			case 1:
				$this->setCourseNm($value);
				break;
			case 2:
				$this->setCourseDesc($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CoursePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCourseId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCourseNm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCourseDesc($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CoursePeer::DATABASE_NAME);

		if ($this->isColumnModified(CoursePeer::COURSE_ID)) $criteria->add(CoursePeer::COURSE_ID, $this->course_id);
		if ($this->isColumnModified(CoursePeer::COURSE_NM)) $criteria->add(CoursePeer::COURSE_NM, $this->course_nm);
		if ($this->isColumnModified(CoursePeer::COURSE_DESC)) $criteria->add(CoursePeer::COURSE_DESC, $this->course_desc);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CoursePeer::DATABASE_NAME);

		$criteria->add(CoursePeer::COURSE_ID, $this->course_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCourseId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCourseId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCourseNm($this->course_nm);

		$copyObj->setCourseDesc($this->course_desc);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getMenuItems() as $relObj) {
				$copyObj->addMenuItem($relObj->copy($deepCopy));
			}

			foreach($this->getRecipes() as $relObj) {
				$copyObj->addRecipe($relObj->copy($deepCopy));
			}

			foreach($this->getRecipeMenus() as $relObj) {
				$copyObj->addRecipeMenu($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setCourseId(NULL); 
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
			self::$peer = new CoursePeer();
		}
		return self::$peer;
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

				$criteria->add(MenuItemPeer::COURSE_ID, $this->getCourseId());

				MenuItemPeer::addSelectColumns($criteria);
				$this->collMenuItems = MenuItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MenuItemPeer::COURSE_ID, $this->getCourseId());

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

		$criteria->add(MenuItemPeer::COURSE_ID, $this->getCourseId());

		return MenuItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMenuItem(MenuItem $l)
	{
		$this->collMenuItems[] = $l;
		$l->setCourse($this);
	}


	
	public function getMenuItemsJoinMenu($criteria = null, $con = null)
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

				$criteria->add(MenuItemPeer::COURSE_ID, $this->getCourseId());

				$this->collMenuItems = MenuItemPeer::doSelectJoinMenu($criteria, $con);
			}
		} else {
									
			$criteria->add(MenuItemPeer::COURSE_ID, $this->getCourseId());

			if (!isset($this->lastMenuItemCriteria) || !$this->lastMenuItemCriteria->equals($criteria)) {
				$this->collMenuItems = MenuItemPeer::doSelectJoinMenu($criteria, $con);
			}
		}
		$this->lastMenuItemCriteria = $criteria;

		return $this->collMenuItems;
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

				$criteria->add(RecipePeer::COURSE_ID, $this->getCourseId());

				RecipePeer::addSelectColumns($criteria);
				$this->collRecipes = RecipePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipePeer::COURSE_ID, $this->getCourseId());

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

		$criteria->add(RecipePeer::COURSE_ID, $this->getCourseId());

		return RecipePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipe(Recipe $l)
	{
		$this->collRecipes[] = $l;
		$l->setCourse($this);
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

				$criteria->add(RecipePeer::COURSE_ID, $this->getCourseId());

				$this->collRecipes = RecipePeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipePeer::COURSE_ID, $this->getCourseId());

			if (!isset($this->lastRecipeCriteria) || !$this->lastRecipeCriteria->equals($criteria)) {
				$this->collRecipes = RecipePeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastRecipeCriteria = $criteria;

		return $this->collRecipes;
	}


	
	public function getRecipesJoinEthnicity($criteria = null, $con = null)
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

				$criteria->add(RecipePeer::COURSE_ID, $this->getCourseId());

				$this->collRecipes = RecipePeer::doSelectJoinEthnicity($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipePeer::COURSE_ID, $this->getCourseId());

			if (!isset($this->lastRecipeCriteria) || !$this->lastRecipeCriteria->equals($criteria)) {
				$this->collRecipes = RecipePeer::doSelectJoinEthnicity($criteria, $con);
			}
		}
		$this->lastRecipeCriteria = $criteria;

		return $this->collRecipes;
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

				$criteria->add(RecipeMenuPeer::COURSE_ID, $this->getCourseId());

				RecipeMenuPeer::addSelectColumns($criteria);
				$this->collRecipeMenus = RecipeMenuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeMenuPeer::COURSE_ID, $this->getCourseId());

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

		$criteria->add(RecipeMenuPeer::COURSE_ID, $this->getCourseId());

		return RecipeMenuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeMenu(RecipeMenu $l)
	{
		$this->collRecipeMenus[] = $l;
		$l->setCourse($this);
	}


	
	public function getRecipeMenusJoinMenu($criteria = null, $con = null)
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

				$criteria->add(RecipeMenuPeer::COURSE_ID, $this->getCourseId());

				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinMenu($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeMenuPeer::COURSE_ID, $this->getCourseId());

			if (!isset($this->lastRecipeMenuCriteria) || !$this->lastRecipeMenuCriteria->equals($criteria)) {
				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinMenu($criteria, $con);
			}
		}
		$this->lastRecipeMenuCriteria = $criteria;

		return $this->collRecipeMenus;
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

				$criteria->add(RecipeMenuPeer::COURSE_ID, $this->getCourseId());

				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeMenuPeer::COURSE_ID, $this->getCourseId());

			if (!isset($this->lastRecipeMenuCriteria) || !$this->lastRecipeMenuCriteria->equals($criteria)) {
				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastRecipeMenuCriteria = $criteria;

		return $this->collRecipeMenus;
	}

} 
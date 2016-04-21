<?php


abstract class BaseRecipeMenu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $menu_id;


	
	protected $recipe_id;


	
	protected $course_id;


	
	protected $recipe_desc;

	
	protected $aMenu;

	
	protected $aRecipe;

	
	protected $aCourse;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMenuId()
	{

		return $this->menu_id;
	}

	
	public function getRecipeId()
	{

		return $this->recipe_id;
	}

	
	public function getCourseId()
	{

		return $this->course_id;
	}

	
	public function getRecipeDesc()
	{

		return $this->recipe_desc;
	}

	
	public function setMenuId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->menu_id !== $v) {
			$this->menu_id = $v;
			$this->modifiedColumns[] = RecipeMenuPeer::MENU_ID;
		}

		if ($this->aMenu !== null && $this->aMenu->getMenuId() !== $v) {
			$this->aMenu = null;
		}

	} 
	
	public function setRecipeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->recipe_id !== $v) {
			$this->recipe_id = $v;
			$this->modifiedColumns[] = RecipeMenuPeer::RECIPE_ID;
		}

		if ($this->aRecipe !== null && $this->aRecipe->getRecipeId() !== $v) {
			$this->aRecipe = null;
		}

	} 
	
	public function setCourseId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->course_id !== $v) {
			$this->course_id = $v;
			$this->modifiedColumns[] = RecipeMenuPeer::COURSE_ID;
		}

		if ($this->aCourse !== null && $this->aCourse->getCourseId() !== $v) {
			$this->aCourse = null;
		}

	} 
	
	public function setRecipeDesc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recipe_desc !== $v) {
			$this->recipe_desc = $v;
			$this->modifiedColumns[] = RecipeMenuPeer::RECIPE_DESC;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->menu_id = $rs->getInt($startcol + 0);

			$this->recipe_id = $rs->getInt($startcol + 1);

			$this->course_id = $rs->getInt($startcol + 2);

			$this->recipe_desc = $rs->getString($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RecipeMenu object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecipeMenuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RecipeMenuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RecipeMenuPeer::DATABASE_NAME);
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


												
			if ($this->aMenu !== null) {
				if ($this->aMenu->isModified()) {
					$affectedRows += $this->aMenu->save($con);
				}
				$this->setMenu($this->aMenu);
			}

			if ($this->aRecipe !== null) {
				if ($this->aRecipe->isModified()) {
					$affectedRows += $this->aRecipe->save($con);
				}
				$this->setRecipe($this->aRecipe);
			}

			if ($this->aCourse !== null) {
				if ($this->aCourse->isModified()) {
					$affectedRows += $this->aCourse->save($con);
				}
				$this->setCourse($this->aCourse);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RecipeMenuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RecipeMenuPeer::doUpdate($this, $con);
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


												
			if ($this->aMenu !== null) {
				if (!$this->aMenu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMenu->getValidationFailures());
				}
			}

			if ($this->aRecipe !== null) {
				if (!$this->aRecipe->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRecipe->getValidationFailures());
				}
			}

			if ($this->aCourse !== null) {
				if (!$this->aCourse->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCourse->getValidationFailures());
				}
			}


			if (($retval = RecipeMenuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RecipeMenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMenuId();
				break;
			case 1:
				return $this->getRecipeId();
				break;
			case 2:
				return $this->getCourseId();
				break;
			case 3:
				return $this->getRecipeDesc();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RecipeMenuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMenuId(),
			$keys[1] => $this->getRecipeId(),
			$keys[2] => $this->getCourseId(),
			$keys[3] => $this->getRecipeDesc(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RecipeMenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMenuId($value);
				break;
			case 1:
				$this->setRecipeId($value);
				break;
			case 2:
				$this->setCourseId($value);
				break;
			case 3:
				$this->setRecipeDesc($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RecipeMenuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMenuId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRecipeId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCourseId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRecipeDesc($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RecipeMenuPeer::DATABASE_NAME);

		if ($this->isColumnModified(RecipeMenuPeer::MENU_ID)) $criteria->add(RecipeMenuPeer::MENU_ID, $this->menu_id);
		if ($this->isColumnModified(RecipeMenuPeer::RECIPE_ID)) $criteria->add(RecipeMenuPeer::RECIPE_ID, $this->recipe_id);
		if ($this->isColumnModified(RecipeMenuPeer::COURSE_ID)) $criteria->add(RecipeMenuPeer::COURSE_ID, $this->course_id);
		if ($this->isColumnModified(RecipeMenuPeer::RECIPE_DESC)) $criteria->add(RecipeMenuPeer::RECIPE_DESC, $this->recipe_desc);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RecipeMenuPeer::DATABASE_NAME);

		$criteria->add(RecipeMenuPeer::MENU_ID, $this->menu_id);
		$criteria->add(RecipeMenuPeer::RECIPE_ID, $this->recipe_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getMenuId();

		$pks[1] = $this->getRecipeId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setMenuId($keys[0]);

		$this->setRecipeId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCourseId($this->course_id);

		$copyObj->setRecipeDesc($this->recipe_desc);


		$copyObj->setNew(true);

		$copyObj->setMenuId(NULL); 
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
			self::$peer = new RecipeMenuPeer();
		}
		return self::$peer;
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

	
	public function setCourse($v)
	{


		if ($v === null) {
			$this->setCourseId(NULL);
		} else {
			$this->setCourseId($v->getCourseId());
		}


		$this->aCourse = $v;
	}


	
	public function getCourse($con = null)
	{
		if ($this->aCourse === null && ($this->course_id !== null)) {
						include_once 'lib/model/om/BaseCoursePeer.php';

			$this->aCourse = CoursePeer::retrieveByPK($this->course_id, $con);

			
		}
		return $this->aCourse;
	}

} 
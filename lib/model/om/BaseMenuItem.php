<?php


abstract class BaseMenuItem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $item_id;


	
	protected $menu_id;


	
	protected $course_id;


	
	protected $item_nm;


	
	protected $item_desc;

	
	protected $aMenu;

	
	protected $aCourse;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getItemId()
	{

		return $this->item_id;
	}

	
	public function getMenuId()
	{

		return $this->menu_id;
	}

	
	public function getCourseId()
	{

		return $this->course_id;
	}

	
	public function getItemNm()
	{

		return $this->item_nm;
	}

	
	public function getItemDesc()
	{

		return $this->item_desc;
	}

	
	public function setItemId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->item_id !== $v) {
			$this->item_id = $v;
			$this->modifiedColumns[] = MenuItemPeer::ITEM_ID;
		}

	} 
	
	public function setMenuId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->menu_id !== $v) {
			$this->menu_id = $v;
			$this->modifiedColumns[] = MenuItemPeer::MENU_ID;
		}

		if ($this->aMenu !== null && $this->aMenu->getMenuId() !== $v) {
			$this->aMenu = null;
		}

	} 
	
	public function setCourseId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->course_id !== $v) {
			$this->course_id = $v;
			$this->modifiedColumns[] = MenuItemPeer::COURSE_ID;
		}

		if ($this->aCourse !== null && $this->aCourse->getCourseId() !== $v) {
			$this->aCourse = null;
		}

	} 
	
	public function setItemNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->item_nm !== $v) {
			$this->item_nm = $v;
			$this->modifiedColumns[] = MenuItemPeer::ITEM_NM;
		}

	} 
	
	public function setItemDesc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->item_desc !== $v) {
			$this->item_desc = $v;
			$this->modifiedColumns[] = MenuItemPeer::ITEM_DESC;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->item_id = $rs->getInt($startcol + 0);

			$this->menu_id = $rs->getInt($startcol + 1);

			$this->course_id = $rs->getInt($startcol + 2);

			$this->item_nm = $rs->getString($startcol + 3);

			$this->item_desc = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MenuItem object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MenuItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MenuItemPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MenuItemPeer::DATABASE_NAME);
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

			if ($this->aCourse !== null) {
				if ($this->aCourse->isModified()) {
					$affectedRows += $this->aCourse->save($con);
				}
				$this->setCourse($this->aCourse);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MenuItemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setItemId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MenuItemPeer::doUpdate($this, $con);
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

			if ($this->aCourse !== null) {
				if (!$this->aCourse->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCourse->getValidationFailures());
				}
			}


			if (($retval = MenuItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MenuItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getItemId();
				break;
			case 1:
				return $this->getMenuId();
				break;
			case 2:
				return $this->getCourseId();
				break;
			case 3:
				return $this->getItemNm();
				break;
			case 4:
				return $this->getItemDesc();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MenuItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getItemId(),
			$keys[1] => $this->getMenuId(),
			$keys[2] => $this->getCourseId(),
			$keys[3] => $this->getItemNm(),
			$keys[4] => $this->getItemDesc(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MenuItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setItemId($value);
				break;
			case 1:
				$this->setMenuId($value);
				break;
			case 2:
				$this->setCourseId($value);
				break;
			case 3:
				$this->setItemNm($value);
				break;
			case 4:
				$this->setItemDesc($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MenuItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setItemId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMenuId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCourseId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setItemNm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setItemDesc($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MenuItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(MenuItemPeer::ITEM_ID)) $criteria->add(MenuItemPeer::ITEM_ID, $this->item_id);
		if ($this->isColumnModified(MenuItemPeer::MENU_ID)) $criteria->add(MenuItemPeer::MENU_ID, $this->menu_id);
		if ($this->isColumnModified(MenuItemPeer::COURSE_ID)) $criteria->add(MenuItemPeer::COURSE_ID, $this->course_id);
		if ($this->isColumnModified(MenuItemPeer::ITEM_NM)) $criteria->add(MenuItemPeer::ITEM_NM, $this->item_nm);
		if ($this->isColumnModified(MenuItemPeer::ITEM_DESC)) $criteria->add(MenuItemPeer::ITEM_DESC, $this->item_desc);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MenuItemPeer::DATABASE_NAME);

		$criteria->add(MenuItemPeer::ITEM_ID, $this->item_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getItemId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setItemId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setMenuId($this->menu_id);

		$copyObj->setCourseId($this->course_id);

		$copyObj->setItemNm($this->item_nm);

		$copyObj->setItemDesc($this->item_desc);


		$copyObj->setNew(true);

		$copyObj->setItemId(NULL); 
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
			self::$peer = new MenuItemPeer();
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
<?php


abstract class BaseRecipeIngrd extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $recipe_ingrd_id;


	
	protected $recipe_id;


	
	protected $ingrd_id;


	
	protected $ingrd_seq;


	
	protected $ingrd_prep = '';


	
	protected $ingrd_msrmt = '';


	
	protected $ingrd_qty = '';

	
	protected $aRecipe;

	
	protected $aIngredient;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRecipeIngrdId()
	{

		return $this->recipe_ingrd_id;
	}

	
	public function getRecipeId()
	{

		return $this->recipe_id;
	}

	
	public function getIngrdId()
	{

		return $this->ingrd_id;
	}

	
	public function getIngrdSeq()
	{

		return $this->ingrd_seq;
	}

	
	public function getIngrdPrep()
	{

		return $this->ingrd_prep;
	}

	
	public function getIngrdMsrmt()
	{

		return $this->ingrd_msrmt;
	}

	
	public function getIngrdQty()
	{

		return $this->ingrd_qty;
	}

	
	public function setRecipeIngrdId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->recipe_ingrd_id !== $v) {
			$this->recipe_ingrd_id = $v;
			$this->modifiedColumns[] = RecipeIngrdPeer::RECIPE_INGRD_ID;
		}

	} 
	
	public function setRecipeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->recipe_id !== $v) {
			$this->recipe_id = $v;
			$this->modifiedColumns[] = RecipeIngrdPeer::RECIPE_ID;
		}

		if ($this->aRecipe !== null && $this->aRecipe->getRecipeId() !== $v) {
			$this->aRecipe = null;
		}

	} 
	
	public function setIngrdId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ingrd_id !== $v) {
			$this->ingrd_id = $v;
			$this->modifiedColumns[] = RecipeIngrdPeer::INGRD_ID;
		}

		if ($this->aIngredient !== null && $this->aIngredient->getIngrdId() !== $v) {
			$this->aIngredient = null;
		}

	} 
	
	public function setIngrdSeq($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ingrd_seq !== $v) {
			$this->ingrd_seq = $v;
			$this->modifiedColumns[] = RecipeIngrdPeer::INGRD_SEQ;
		}

	} 
	
	public function setIngrdPrep($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ingrd_prep !== $v || $v === '') {
			$this->ingrd_prep = $v;
			$this->modifiedColumns[] = RecipeIngrdPeer::INGRD_PREP;
		}

	} 
	
	public function setIngrdMsrmt($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ingrd_msrmt !== $v || $v === '') {
			$this->ingrd_msrmt = $v;
			$this->modifiedColumns[] = RecipeIngrdPeer::INGRD_MSRMT;
		}

	} 
	
	public function setIngrdQty($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ingrd_qty !== $v || $v === '') {
			$this->ingrd_qty = $v;
			$this->modifiedColumns[] = RecipeIngrdPeer::INGRD_QTY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->recipe_ingrd_id = $rs->getInt($startcol + 0);

			$this->recipe_id = $rs->getInt($startcol + 1);

			$this->ingrd_id = $rs->getInt($startcol + 2);

			$this->ingrd_seq = $rs->getInt($startcol + 3);

			$this->ingrd_prep = $rs->getString($startcol + 4);

			$this->ingrd_msrmt = $rs->getString($startcol + 5);

			$this->ingrd_qty = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RecipeIngrd object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecipeIngrdPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RecipeIngrdPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RecipeIngrdPeer::DATABASE_NAME);
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

			if ($this->aIngredient !== null) {
				if ($this->aIngredient->isModified()) {
					$affectedRows += $this->aIngredient->save($con);
				}
				$this->setIngredient($this->aIngredient);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RecipeIngrdPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setRecipeIngrdId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RecipeIngrdPeer::doUpdate($this, $con);
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

			if ($this->aIngredient !== null) {
				if (!$this->aIngredient->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIngredient->getValidationFailures());
				}
			}


			if (($retval = RecipeIngrdPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RecipeIngrdPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRecipeIngrdId();
				break;
			case 1:
				return $this->getRecipeId();
				break;
			case 2:
				return $this->getIngrdId();
				break;
			case 3:
				return $this->getIngrdSeq();
				break;
			case 4:
				return $this->getIngrdPrep();
				break;
			case 5:
				return $this->getIngrdMsrmt();
				break;
			case 6:
				return $this->getIngrdQty();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RecipeIngrdPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRecipeIngrdId(),
			$keys[1] => $this->getRecipeId(),
			$keys[2] => $this->getIngrdId(),
			$keys[3] => $this->getIngrdSeq(),
			$keys[4] => $this->getIngrdPrep(),
			$keys[5] => $this->getIngrdMsrmt(),
			$keys[6] => $this->getIngrdQty(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RecipeIngrdPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRecipeIngrdId($value);
				break;
			case 1:
				$this->setRecipeId($value);
				break;
			case 2:
				$this->setIngrdId($value);
				break;
			case 3:
				$this->setIngrdSeq($value);
				break;
			case 4:
				$this->setIngrdPrep($value);
				break;
			case 5:
				$this->setIngrdMsrmt($value);
				break;
			case 6:
				$this->setIngrdQty($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RecipeIngrdPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRecipeIngrdId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRecipeId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIngrdId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIngrdSeq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIngrdPrep($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIngrdMsrmt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIngrdQty($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RecipeIngrdPeer::DATABASE_NAME);

		if ($this->isColumnModified(RecipeIngrdPeer::RECIPE_INGRD_ID)) $criteria->add(RecipeIngrdPeer::RECIPE_INGRD_ID, $this->recipe_ingrd_id);
		if ($this->isColumnModified(RecipeIngrdPeer::RECIPE_ID)) $criteria->add(RecipeIngrdPeer::RECIPE_ID, $this->recipe_id);
		if ($this->isColumnModified(RecipeIngrdPeer::INGRD_ID)) $criteria->add(RecipeIngrdPeer::INGRD_ID, $this->ingrd_id);
		if ($this->isColumnModified(RecipeIngrdPeer::INGRD_SEQ)) $criteria->add(RecipeIngrdPeer::INGRD_SEQ, $this->ingrd_seq);
		if ($this->isColumnModified(RecipeIngrdPeer::INGRD_PREP)) $criteria->add(RecipeIngrdPeer::INGRD_PREP, $this->ingrd_prep);
		if ($this->isColumnModified(RecipeIngrdPeer::INGRD_MSRMT)) $criteria->add(RecipeIngrdPeer::INGRD_MSRMT, $this->ingrd_msrmt);
		if ($this->isColumnModified(RecipeIngrdPeer::INGRD_QTY)) $criteria->add(RecipeIngrdPeer::INGRD_QTY, $this->ingrd_qty);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RecipeIngrdPeer::DATABASE_NAME);

		$criteria->add(RecipeIngrdPeer::RECIPE_INGRD_ID, $this->recipe_ingrd_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getRecipeIngrdId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setRecipeIngrdId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRecipeId($this->recipe_id);

		$copyObj->setIngrdId($this->ingrd_id);

		$copyObj->setIngrdSeq($this->ingrd_seq);

		$copyObj->setIngrdPrep($this->ingrd_prep);

		$copyObj->setIngrdMsrmt($this->ingrd_msrmt);

		$copyObj->setIngrdQty($this->ingrd_qty);


		$copyObj->setNew(true);

		$copyObj->setRecipeIngrdId(NULL); 
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
			self::$peer = new RecipeIngrdPeer();
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

	
	public function setIngredient($v)
	{


		if ($v === null) {
			$this->setIngrdId(NULL);
		} else {
			$this->setIngrdId($v->getIngrdId());
		}


		$this->aIngredient = $v;
	}


	
	public function getIngredient($con = null)
	{
		if ($this->aIngredient === null && ($this->ingrd_id !== null)) {
						include_once 'lib/model/om/BaseIngredientPeer.php';

			$this->aIngredient = IngredientPeer::retrieveByPK($this->ingrd_id, $con);

			
		}
		return $this->aIngredient;
	}

} 
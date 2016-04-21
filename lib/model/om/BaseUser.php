<?php


abstract class BaseUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_id;


	
	protected $user_fn = '';


	
	protected $user_ln = '';


	
	protected $user_about;


	
	protected $user_login = '';


	
	protected $user_pswd = '';


	
	protected $pswd_salt = '';


	
	protected $user_email = '';


	
	protected $auth_lvl_id;


	
	protected $remember_key;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $user_lastlogin;


	
	protected $user_ip;


	
	protected $planner_private;

	
	protected $aAuthLvl;

	
	protected $collGroceryExcludes;

	
	protected $lastGroceryExcludeCriteria = null;

	
	protected $collGroceryMasters;

	
	protected $lastGroceryMasterCriteria = null;

	
	protected $collGrocerylists;

	
	protected $lastGrocerylistCriteria = null;

	
	protected $collIngredients;

	
	protected $lastIngredientCriteria = null;

	
	protected $collMenus;

	
	protected $lastMenuCriteria = null;

	
	protected $collPlanners;

	
	protected $lastPlannerCriteria = null;

	
	protected $collRates;

	
	protected $lastRateCriteria = null;

	
	protected $collRateSuggestions;

	
	protected $lastRateSuggestionCriteria = null;

	
	protected $collRecipes;

	
	protected $lastRecipeCriteria = null;

	
	protected $collRecipeComments;

	
	protected $lastRecipeCommentCriteria = null;

	
	protected $collRecipeKeywords;

	
	protected $lastRecipeKeywordCriteria = null;

	
	protected $collRecipeReports;

	
	protected $lastRecipeReportCriteria = null;

	
	protected $collRecipeSuggestions;

	
	protected $lastRecipeSuggestionCriteria = null;

	
	protected $collStoredRecipes;

	
	protected $lastStoredRecipeCriteria = null;

	
	protected $collUserRecipeNotes;

	
	protected $lastUserRecipeNoteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getUserFn()
	{

		return $this->user_fn;
	}

	
	public function getUserLn()
	{

		return $this->user_ln;
	}

	
	public function getUserAbout()
	{

		return $this->user_about;
	}

	
	public function getUserLogin()
	{

		return $this->user_login;
	}

	
	public function getUserPswd()
	{

		return $this->user_pswd;
	}

	
	public function getPswdSalt()
	{

		return $this->pswd_salt;
	}

	
	public function getUserEmail()
	{

		return $this->user_email;
	}

	
	public function getAuthLvlId()
	{

		return $this->auth_lvl_id;
	}

	
	public function getRememberKey()
	{

		return $this->remember_key;
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

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUserLastlogin($format = 'Y-m-d H:i:s')
	{

		if ($this->user_lastlogin === null || $this->user_lastlogin === '') {
			return null;
		} elseif (!is_int($this->user_lastlogin)) {
						$ts = strtotime($this->user_lastlogin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [user_lastlogin] as date/time value: " . var_export($this->user_lastlogin, true));
			}
		} else {
			$ts = $this->user_lastlogin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUserIp()
	{

		return $this->user_ip;
	}

	
	public function getPlannerPrivate()
	{

		return $this->planner_private;
	}

	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = UserPeer::USER_ID;
		}

	} 
	
	public function setUserFn($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_fn !== $v || $v === '') {
			$this->user_fn = $v;
			$this->modifiedColumns[] = UserPeer::USER_FN;
		}

	} 
	
	public function setUserLn($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_ln !== $v || $v === '') {
			$this->user_ln = $v;
			$this->modifiedColumns[] = UserPeer::USER_LN;
		}

	} 
	
	public function setUserAbout($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_about !== $v) {
			$this->user_about = $v;
			$this->modifiedColumns[] = UserPeer::USER_ABOUT;
		}

	} 
	
	public function setUserLogin($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_login !== $v || $v === '') {
			$this->user_login = $v;
			$this->modifiedColumns[] = UserPeer::USER_LOGIN;
		}

	} 
	
	public function setUserPswd($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_pswd !== $v || $v === '') {
			$this->user_pswd = $v;
			$this->modifiedColumns[] = UserPeer::USER_PSWD;
		}

	} 
	
	public function setPswdSalt($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pswd_salt !== $v || $v === '') {
			$this->pswd_salt = $v;
			$this->modifiedColumns[] = UserPeer::PSWD_SALT;
		}

	} 
	
	public function setUserEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_email !== $v || $v === '') {
			$this->user_email = $v;
			$this->modifiedColumns[] = UserPeer::USER_EMAIL;
		}

	} 
	
	public function setAuthLvlId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->auth_lvl_id !== $v) {
			$this->auth_lvl_id = $v;
			$this->modifiedColumns[] = UserPeer::AUTH_LVL_ID;
		}

		if ($this->aAuthLvl !== null && $this->aAuthLvl->getAuthLvlId() !== $v) {
			$this->aAuthLvl = null;
		}

	} 
	
	public function setRememberKey($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remember_key !== $v) {
			$this->remember_key = $v;
			$this->modifiedColumns[] = UserPeer::REMEMBER_KEY;
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
			$this->modifiedColumns[] = UserPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = UserPeer::UPDATED_AT;
		}

	} 
	
	public function setUserLastlogin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [user_lastlogin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->user_lastlogin !== $ts) {
			$this->user_lastlogin = $ts;
			$this->modifiedColumns[] = UserPeer::USER_LASTLOGIN;
		}

	} 
	
	public function setUserIp($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_ip !== $v) {
			$this->user_ip = $v;
			$this->modifiedColumns[] = UserPeer::USER_IP;
		}

	} 
	
	public function setPlannerPrivate($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->planner_private !== $v) {
			$this->planner_private = $v;
			$this->modifiedColumns[] = UserPeer::PLANNER_PRIVATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->user_id = $rs->getInt($startcol + 0);

			$this->user_fn = $rs->getString($startcol + 1);

			$this->user_ln = $rs->getString($startcol + 2);

			$this->user_about = $rs->getString($startcol + 3);

			$this->user_login = $rs->getString($startcol + 4);

			$this->user_pswd = $rs->getString($startcol + 5);

			$this->pswd_salt = $rs->getString($startcol + 6);

			$this->user_email = $rs->getString($startcol + 7);

			$this->auth_lvl_id = $rs->getInt($startcol + 8);

			$this->remember_key = $rs->getString($startcol + 9);

			$this->created_at = $rs->getTimestamp($startcol + 10, null);

			$this->updated_at = $rs->getTimestamp($startcol + 11, null);

			$this->user_lastlogin = $rs->getTimestamp($startcol + 12, null);

			$this->user_ip = $rs->getString($startcol + 13);

			$this->planner_private = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(UserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(UserPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
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


												
			if ($this->aAuthLvl !== null) {
				if ($this->aAuthLvl->isModified()) {
					$affectedRows += $this->aAuthLvl->save($con);
				}
				$this->setAuthLvl($this->aAuthLvl);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setUserId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collGroceryExcludes !== null) {
				foreach($this->collGroceryExcludes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGroceryMasters !== null) {
				foreach($this->collGroceryMasters as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGrocerylists !== null) {
				foreach($this->collGrocerylists as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collIngredients !== null) {
				foreach($this->collIngredients as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMenus !== null) {
				foreach($this->collMenus as $referrerFK) {
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

			if ($this->collRates !== null) {
				foreach($this->collRates as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRateSuggestions !== null) {
				foreach($this->collRateSuggestions as $referrerFK) {
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

			if ($this->collRecipeComments !== null) {
				foreach($this->collRecipeComments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRecipeKeywords !== null) {
				foreach($this->collRecipeKeywords as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRecipeReports !== null) {
				foreach($this->collRecipeReports as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRecipeSuggestions !== null) {
				foreach($this->collRecipeSuggestions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collStoredRecipes !== null) {
				foreach($this->collStoredRecipes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUserRecipeNotes !== null) {
				foreach($this->collUserRecipeNotes as $referrerFK) {
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


												
			if ($this->aAuthLvl !== null) {
				if (!$this->aAuthLvl->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAuthLvl->getValidationFailures());
				}
			}


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGroceryExcludes !== null) {
					foreach($this->collGroceryExcludes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGroceryMasters !== null) {
					foreach($this->collGroceryMasters as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGrocerylists !== null) {
					foreach($this->collGrocerylists as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collIngredients !== null) {
					foreach($this->collIngredients as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMenus !== null) {
					foreach($this->collMenus as $referrerFK) {
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

				if ($this->collRates !== null) {
					foreach($this->collRates as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRateSuggestions !== null) {
					foreach($this->collRateSuggestions as $referrerFK) {
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

				if ($this->collRecipeComments !== null) {
					foreach($this->collRecipeComments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRecipeKeywords !== null) {
					foreach($this->collRecipeKeywords as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRecipeReports !== null) {
					foreach($this->collRecipeReports as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRecipeSuggestions !== null) {
					foreach($this->collRecipeSuggestions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collStoredRecipes !== null) {
					foreach($this->collStoredRecipes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserRecipeNotes !== null) {
					foreach($this->collUserRecipeNotes as $referrerFK) {
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
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
				break;
			case 1:
				return $this->getUserFn();
				break;
			case 2:
				return $this->getUserLn();
				break;
			case 3:
				return $this->getUserAbout();
				break;
			case 4:
				return $this->getUserLogin();
				break;
			case 5:
				return $this->getUserPswd();
				break;
			case 6:
				return $this->getPswdSalt();
				break;
			case 7:
				return $this->getUserEmail();
				break;
			case 8:
				return $this->getAuthLvlId();
				break;
			case 9:
				return $this->getRememberKey();
				break;
			case 10:
				return $this->getCreatedAt();
				break;
			case 11:
				return $this->getUpdatedAt();
				break;
			case 12:
				return $this->getUserLastlogin();
				break;
			case 13:
				return $this->getUserIp();
				break;
			case 14:
				return $this->getPlannerPrivate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getUserFn(),
			$keys[2] => $this->getUserLn(),
			$keys[3] => $this->getUserAbout(),
			$keys[4] => $this->getUserLogin(),
			$keys[5] => $this->getUserPswd(),
			$keys[6] => $this->getPswdSalt(),
			$keys[7] => $this->getUserEmail(),
			$keys[8] => $this->getAuthLvlId(),
			$keys[9] => $this->getRememberKey(),
			$keys[10] => $this->getCreatedAt(),
			$keys[11] => $this->getUpdatedAt(),
			$keys[12] => $this->getUserLastlogin(),
			$keys[13] => $this->getUserIp(),
			$keys[14] => $this->getPlannerPrivate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setUserFn($value);
				break;
			case 2:
				$this->setUserLn($value);
				break;
			case 3:
				$this->setUserAbout($value);
				break;
			case 4:
				$this->setUserLogin($value);
				break;
			case 5:
				$this->setUserPswd($value);
				break;
			case 6:
				$this->setPswdSalt($value);
				break;
			case 7:
				$this->setUserEmail($value);
				break;
			case 8:
				$this->setAuthLvlId($value);
				break;
			case 9:
				$this->setRememberKey($value);
				break;
			case 10:
				$this->setCreatedAt($value);
				break;
			case 11:
				$this->setUpdatedAt($value);
				break;
			case 12:
				$this->setUserLastlogin($value);
				break;
			case 13:
				$this->setUserIp($value);
				break;
			case 14:
				$this->setPlannerPrivate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserFn($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserLn($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserAbout($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUserLogin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUserPswd($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPswdSalt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUserEmail($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAuthLvlId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRememberKey($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUserLastlogin($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUserIp($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPlannerPrivate($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPeer::USER_ID)) $criteria->add(UserPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(UserPeer::USER_FN)) $criteria->add(UserPeer::USER_FN, $this->user_fn);
		if ($this->isColumnModified(UserPeer::USER_LN)) $criteria->add(UserPeer::USER_LN, $this->user_ln);
		if ($this->isColumnModified(UserPeer::USER_ABOUT)) $criteria->add(UserPeer::USER_ABOUT, $this->user_about);
		if ($this->isColumnModified(UserPeer::USER_LOGIN)) $criteria->add(UserPeer::USER_LOGIN, $this->user_login);
		if ($this->isColumnModified(UserPeer::USER_PSWD)) $criteria->add(UserPeer::USER_PSWD, $this->user_pswd);
		if ($this->isColumnModified(UserPeer::PSWD_SALT)) $criteria->add(UserPeer::PSWD_SALT, $this->pswd_salt);
		if ($this->isColumnModified(UserPeer::USER_EMAIL)) $criteria->add(UserPeer::USER_EMAIL, $this->user_email);
		if ($this->isColumnModified(UserPeer::AUTH_LVL_ID)) $criteria->add(UserPeer::AUTH_LVL_ID, $this->auth_lvl_id);
		if ($this->isColumnModified(UserPeer::REMEMBER_KEY)) $criteria->add(UserPeer::REMEMBER_KEY, $this->remember_key);
		if ($this->isColumnModified(UserPeer::CREATED_AT)) $criteria->add(UserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(UserPeer::UPDATED_AT)) $criteria->add(UserPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(UserPeer::USER_LASTLOGIN)) $criteria->add(UserPeer::USER_LASTLOGIN, $this->user_lastlogin);
		if ($this->isColumnModified(UserPeer::USER_IP)) $criteria->add(UserPeer::USER_IP, $this->user_ip);
		if ($this->isColumnModified(UserPeer::PLANNER_PRIVATE)) $criteria->add(UserPeer::PLANNER_PRIVATE, $this->planner_private);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		$criteria->add(UserPeer::USER_ID, $this->user_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getUserId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setUserId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUserFn($this->user_fn);

		$copyObj->setUserLn($this->user_ln);

		$copyObj->setUserAbout($this->user_about);

		$copyObj->setUserLogin($this->user_login);

		$copyObj->setUserPswd($this->user_pswd);

		$copyObj->setPswdSalt($this->pswd_salt);

		$copyObj->setUserEmail($this->user_email);

		$copyObj->setAuthLvlId($this->auth_lvl_id);

		$copyObj->setRememberKey($this->remember_key);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUserLastlogin($this->user_lastlogin);

		$copyObj->setUserIp($this->user_ip);

		$copyObj->setPlannerPrivate($this->planner_private);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getGroceryExcludes() as $relObj) {
				$copyObj->addGroceryExclude($relObj->copy($deepCopy));
			}

			foreach($this->getGroceryMasters() as $relObj) {
				$copyObj->addGroceryMaster($relObj->copy($deepCopy));
			}

			foreach($this->getGrocerylists() as $relObj) {
				$copyObj->addGrocerylist($relObj->copy($deepCopy));
			}

			foreach($this->getIngredients() as $relObj) {
				$copyObj->addIngredient($relObj->copy($deepCopy));
			}

			foreach($this->getMenus() as $relObj) {
				$copyObj->addMenu($relObj->copy($deepCopy));
			}

			foreach($this->getPlanners() as $relObj) {
				$copyObj->addPlanner($relObj->copy($deepCopy));
			}

			foreach($this->getRates() as $relObj) {
				$copyObj->addRate($relObj->copy($deepCopy));
			}

			foreach($this->getRateSuggestions() as $relObj) {
				$copyObj->addRateSuggestion($relObj->copy($deepCopy));
			}

			foreach($this->getRecipes() as $relObj) {
				$copyObj->addRecipe($relObj->copy($deepCopy));
			}

			foreach($this->getRecipeComments() as $relObj) {
				$copyObj->addRecipeComment($relObj->copy($deepCopy));
			}

			foreach($this->getRecipeKeywords() as $relObj) {
				$copyObj->addRecipeKeyword($relObj->copy($deepCopy));
			}

			foreach($this->getRecipeReports() as $relObj) {
				$copyObj->addRecipeReport($relObj->copy($deepCopy));
			}

			foreach($this->getRecipeSuggestions() as $relObj) {
				$copyObj->addRecipeSuggestion($relObj->copy($deepCopy));
			}

			foreach($this->getStoredRecipes() as $relObj) {
				$copyObj->addStoredRecipe($relObj->copy($deepCopy));
			}

			foreach($this->getUserRecipeNotes() as $relObj) {
				$copyObj->addUserRecipeNote($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setUserId(NULL); 
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
			self::$peer = new UserPeer();
		}
		return self::$peer;
	}

	
	public function setAuthLvl($v)
	{


		if ($v === null) {
			$this->setAuthLvlId(NULL);
		} else {
			$this->setAuthLvlId($v->getAuthLvlId());
		}


		$this->aAuthLvl = $v;
	}


	
	public function getAuthLvl($con = null)
	{
		if ($this->aAuthLvl === null && ($this->auth_lvl_id !== null)) {
						include_once 'lib/model/om/BaseAuthLvlPeer.php';

			$this->aAuthLvl = AuthLvlPeer::retrieveByPK($this->auth_lvl_id, $con);

			
		}
		return $this->aAuthLvl;
	}

	
	public function initGroceryExcludes()
	{
		if ($this->collGroceryExcludes === null) {
			$this->collGroceryExcludes = array();
		}
	}

	
	public function getGroceryExcludes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryExcludePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroceryExcludes === null) {
			if ($this->isNew()) {
			   $this->collGroceryExcludes = array();
			} else {

				$criteria->add(GroceryExcludePeer::USER_ID, $this->getUserId());

				GroceryExcludePeer::addSelectColumns($criteria);
				$this->collGroceryExcludes = GroceryExcludePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GroceryExcludePeer::USER_ID, $this->getUserId());

				GroceryExcludePeer::addSelectColumns($criteria);
				if (!isset($this->lastGroceryExcludeCriteria) || !$this->lastGroceryExcludeCriteria->equals($criteria)) {
					$this->collGroceryExcludes = GroceryExcludePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGroceryExcludeCriteria = $criteria;
		return $this->collGroceryExcludes;
	}

	
	public function countGroceryExcludes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryExcludePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GroceryExcludePeer::USER_ID, $this->getUserId());

		return GroceryExcludePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGroceryExclude(GroceryExclude $l)
	{
		$this->collGroceryExcludes[] = $l;
		$l->setUser($this);
	}

	
	public function initGroceryMasters()
	{
		if ($this->collGroceryMasters === null) {
			$this->collGroceryMasters = array();
		}
	}

	
	public function getGroceryMasters($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryMasterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroceryMasters === null) {
			if ($this->isNew()) {
			   $this->collGroceryMasters = array();
			} else {

				$criteria->add(GroceryMasterPeer::USER_ID, $this->getUserId());

				GroceryMasterPeer::addSelectColumns($criteria);
				$this->collGroceryMasters = GroceryMasterPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GroceryMasterPeer::USER_ID, $this->getUserId());

				GroceryMasterPeer::addSelectColumns($criteria);
				if (!isset($this->lastGroceryMasterCriteria) || !$this->lastGroceryMasterCriteria->equals($criteria)) {
					$this->collGroceryMasters = GroceryMasterPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGroceryMasterCriteria = $criteria;
		return $this->collGroceryMasters;
	}

	
	public function countGroceryMasters($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryMasterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GroceryMasterPeer::USER_ID, $this->getUserId());

		return GroceryMasterPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGroceryMaster(GroceryMaster $l)
	{
		$this->collGroceryMasters[] = $l;
		$l->setUser($this);
	}


	
	public function getGroceryMastersJoinGroceryAisle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGroceryMasterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroceryMasters === null) {
			if ($this->isNew()) {
				$this->collGroceryMasters = array();
			} else {

				$criteria->add(GroceryMasterPeer::USER_ID, $this->getUserId());

				$this->collGroceryMasters = GroceryMasterPeer::doSelectJoinGroceryAisle($criteria, $con);
			}
		} else {
									
			$criteria->add(GroceryMasterPeer::USER_ID, $this->getUserId());

			if (!isset($this->lastGroceryMasterCriteria) || !$this->lastGroceryMasterCriteria->equals($criteria)) {
				$this->collGroceryMasters = GroceryMasterPeer::doSelectJoinGroceryAisle($criteria, $con);
			}
		}
		$this->lastGroceryMasterCriteria = $criteria;

		return $this->collGroceryMasters;
	}

	
	public function initGrocerylists()
	{
		if ($this->collGrocerylists === null) {
			$this->collGrocerylists = array();
		}
	}

	
	public function getGrocerylists($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGrocerylistPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGrocerylists === null) {
			if ($this->isNew()) {
			   $this->collGrocerylists = array();
			} else {

				$criteria->add(GrocerylistPeer::USER_ID, $this->getUserId());

				GrocerylistPeer::addSelectColumns($criteria);
				$this->collGrocerylists = GrocerylistPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GrocerylistPeer::USER_ID, $this->getUserId());

				GrocerylistPeer::addSelectColumns($criteria);
				if (!isset($this->lastGrocerylistCriteria) || !$this->lastGrocerylistCriteria->equals($criteria)) {
					$this->collGrocerylists = GrocerylistPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGrocerylistCriteria = $criteria;
		return $this->collGrocerylists;
	}

	
	public function countGrocerylists($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGrocerylistPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GrocerylistPeer::USER_ID, $this->getUserId());

		return GrocerylistPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGrocerylist(Grocerylist $l)
	{
		$this->collGrocerylists[] = $l;
		$l->setUser($this);
	}

	
	public function initIngredients()
	{
		if ($this->collIngredients === null) {
			$this->collIngredients = array();
		}
	}

	
	public function getIngredients($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIngredientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIngredients === null) {
			if ($this->isNew()) {
			   $this->collIngredients = array();
			} else {

				$criteria->add(IngredientPeer::USER_ID, $this->getUserId());

				IngredientPeer::addSelectColumns($criteria);
				$this->collIngredients = IngredientPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IngredientPeer::USER_ID, $this->getUserId());

				IngredientPeer::addSelectColumns($criteria);
				if (!isset($this->lastIngredientCriteria) || !$this->lastIngredientCriteria->equals($criteria)) {
					$this->collIngredients = IngredientPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIngredientCriteria = $criteria;
		return $this->collIngredients;
	}

	
	public function countIngredients($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIngredientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IngredientPeer::USER_ID, $this->getUserId());

		return IngredientPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIngredient(Ingredient $l)
	{
		$this->collIngredients[] = $l;
		$l->setUser($this);
	}

	
	public function initMenus()
	{
		if ($this->collMenus === null) {
			$this->collMenus = array();
		}
	}

	
	public function getMenus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMenuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMenus === null) {
			if ($this->isNew()) {
			   $this->collMenus = array();
			} else {

				$criteria->add(MenuPeer::USER_ID, $this->getUserId());

				MenuPeer::addSelectColumns($criteria);
				$this->collMenus = MenuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MenuPeer::USER_ID, $this->getUserId());

				MenuPeer::addSelectColumns($criteria);
				if (!isset($this->lastMenuCriteria) || !$this->lastMenuCriteria->equals($criteria)) {
					$this->collMenus = MenuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMenuCriteria = $criteria;
		return $this->collMenus;
	}

	
	public function countMenus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMenuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MenuPeer::USER_ID, $this->getUserId());

		return MenuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMenu(Menu $l)
	{
		$this->collMenus[] = $l;
		$l->setUser($this);
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

				$criteria->add(PlannerPeer::USER_ID, $this->getUserId());

				PlannerPeer::addSelectColumns($criteria);
				$this->collPlanners = PlannerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PlannerPeer::USER_ID, $this->getUserId());

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

		$criteria->add(PlannerPeer::USER_ID, $this->getUserId());

		return PlannerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPlanner(Planner $l)
	{
		$this->collPlanners[] = $l;
		$l->setUser($this);
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

				$criteria->add(PlannerPeer::USER_ID, $this->getUserId());

				$this->collPlanners = PlannerPeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(PlannerPeer::USER_ID, $this->getUserId());

			if (!isset($this->lastPlannerCriteria) || !$this->lastPlannerCriteria->equals($criteria)) {
				$this->collPlanners = PlannerPeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastPlannerCriteria = $criteria;

		return $this->collPlanners;
	}


	
	public function getPlannersJoinMenu($criteria = null, $con = null)
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

				$criteria->add(PlannerPeer::USER_ID, $this->getUserId());

				$this->collPlanners = PlannerPeer::doSelectJoinMenu($criteria, $con);
			}
		} else {
									
			$criteria->add(PlannerPeer::USER_ID, $this->getUserId());

			if (!isset($this->lastPlannerCriteria) || !$this->lastPlannerCriteria->equals($criteria)) {
				$this->collPlanners = PlannerPeer::doSelectJoinMenu($criteria, $con);
			}
		}
		$this->lastPlannerCriteria = $criteria;

		return $this->collPlanners;
	}

	
	public function initRates()
	{
		if ($this->collRates === null) {
			$this->collRates = array();
		}
	}

	
	public function getRates($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRates === null) {
			if ($this->isNew()) {
			   $this->collRates = array();
			} else {

				$criteria->add(RatePeer::USER_ID, $this->getUserId());

				RatePeer::addSelectColumns($criteria);
				$this->collRates = RatePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RatePeer::USER_ID, $this->getUserId());

				RatePeer::addSelectColumns($criteria);
				if (!isset($this->lastRateCriteria) || !$this->lastRateCriteria->equals($criteria)) {
					$this->collRates = RatePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRateCriteria = $criteria;
		return $this->collRates;
	}

	
	public function countRates($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RatePeer::USER_ID, $this->getUserId());

		return RatePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRate(Rate $l)
	{
		$this->collRates[] = $l;
		$l->setUser($this);
	}


	
	public function getRatesJoinRecipe($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRates === null) {
			if ($this->isNew()) {
				$this->collRates = array();
			} else {

				$criteria->add(RatePeer::USER_ID, $this->getUserId());

				$this->collRates = RatePeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(RatePeer::USER_ID, $this->getUserId());

			if (!isset($this->lastRateCriteria) || !$this->lastRateCriteria->equals($criteria)) {
				$this->collRates = RatePeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastRateCriteria = $criteria;

		return $this->collRates;
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

				$criteria->add(RateSuggestionPeer::USER_ID, $this->getUserId());

				RateSuggestionPeer::addSelectColumns($criteria);
				$this->collRateSuggestions = RateSuggestionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RateSuggestionPeer::USER_ID, $this->getUserId());

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

		$criteria->add(RateSuggestionPeer::USER_ID, $this->getUserId());

		return RateSuggestionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRateSuggestion(RateSuggestion $l)
	{
		$this->collRateSuggestions[] = $l;
		$l->setUser($this);
	}


	
	public function getRateSuggestionsJoinRecipeSuggestion($criteria = null, $con = null)
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

				$criteria->add(RateSuggestionPeer::USER_ID, $this->getUserId());

				$this->collRateSuggestions = RateSuggestionPeer::doSelectJoinRecipeSuggestion($criteria, $con);
			}
		} else {
									
			$criteria->add(RateSuggestionPeer::USER_ID, $this->getUserId());

			if (!isset($this->lastRateSuggestionCriteria) || !$this->lastRateSuggestionCriteria->equals($criteria)) {
				$this->collRateSuggestions = RateSuggestionPeer::doSelectJoinRecipeSuggestion($criteria, $con);
			}
		}
		$this->lastRateSuggestionCriteria = $criteria;

		return $this->collRateSuggestions;
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

				$criteria->add(RecipePeer::USER_ID, $this->getUserId());

				RecipePeer::addSelectColumns($criteria);
				$this->collRecipes = RecipePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipePeer::USER_ID, $this->getUserId());

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

		$criteria->add(RecipePeer::USER_ID, $this->getUserId());

		return RecipePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipe(Recipe $l)
	{
		$this->collRecipes[] = $l;
		$l->setUser($this);
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

				$criteria->add(RecipePeer::USER_ID, $this->getUserId());

				$this->collRecipes = RecipePeer::doSelectJoinCourse($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipePeer::USER_ID, $this->getUserId());

			if (!isset($this->lastRecipeCriteria) || !$this->lastRecipeCriteria->equals($criteria)) {
				$this->collRecipes = RecipePeer::doSelectJoinCourse($criteria, $con);
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

				$criteria->add(RecipePeer::USER_ID, $this->getUserId());

				$this->collRecipes = RecipePeer::doSelectJoinEthnicity($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipePeer::USER_ID, $this->getUserId());

			if (!isset($this->lastRecipeCriteria) || !$this->lastRecipeCriteria->equals($criteria)) {
				$this->collRecipes = RecipePeer::doSelectJoinEthnicity($criteria, $con);
			}
		}
		$this->lastRecipeCriteria = $criteria;

		return $this->collRecipes;
	}

	
	public function initRecipeComments()
	{
		if ($this->collRecipeComments === null) {
			$this->collRecipeComments = array();
		}
	}

	
	public function getRecipeComments($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeCommentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeComments === null) {
			if ($this->isNew()) {
			   $this->collRecipeComments = array();
			} else {

				$criteria->add(RecipeCommentPeer::USER_ID, $this->getUserId());

				RecipeCommentPeer::addSelectColumns($criteria);
				$this->collRecipeComments = RecipeCommentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeCommentPeer::USER_ID, $this->getUserId());

				RecipeCommentPeer::addSelectColumns($criteria);
				if (!isset($this->lastRecipeCommentCriteria) || !$this->lastRecipeCommentCriteria->equals($criteria)) {
					$this->collRecipeComments = RecipeCommentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRecipeCommentCriteria = $criteria;
		return $this->collRecipeComments;
	}

	
	public function countRecipeComments($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeCommentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RecipeCommentPeer::USER_ID, $this->getUserId());

		return RecipeCommentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeComment(RecipeComment $l)
	{
		$this->collRecipeComments[] = $l;
		$l->setUser($this);
	}


	
	public function getRecipeCommentsJoinRecipe($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeCommentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeComments === null) {
			if ($this->isNew()) {
				$this->collRecipeComments = array();
			} else {

				$criteria->add(RecipeCommentPeer::USER_ID, $this->getUserId());

				$this->collRecipeComments = RecipeCommentPeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeCommentPeer::USER_ID, $this->getUserId());

			if (!isset($this->lastRecipeCommentCriteria) || !$this->lastRecipeCommentCriteria->equals($criteria)) {
				$this->collRecipeComments = RecipeCommentPeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastRecipeCommentCriteria = $criteria;

		return $this->collRecipeComments;
	}

	
	public function initRecipeKeywords()
	{
		if ($this->collRecipeKeywords === null) {
			$this->collRecipeKeywords = array();
		}
	}

	
	public function getRecipeKeywords($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeKeywordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeKeywords === null) {
			if ($this->isNew()) {
			   $this->collRecipeKeywords = array();
			} else {

				$criteria->add(RecipeKeywordPeer::USER_ID, $this->getUserId());

				RecipeKeywordPeer::addSelectColumns($criteria);
				$this->collRecipeKeywords = RecipeKeywordPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeKeywordPeer::USER_ID, $this->getUserId());

				RecipeKeywordPeer::addSelectColumns($criteria);
				if (!isset($this->lastRecipeKeywordCriteria) || !$this->lastRecipeKeywordCriteria->equals($criteria)) {
					$this->collRecipeKeywords = RecipeKeywordPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRecipeKeywordCriteria = $criteria;
		return $this->collRecipeKeywords;
	}

	
	public function countRecipeKeywords($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeKeywordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RecipeKeywordPeer::USER_ID, $this->getUserId());

		return RecipeKeywordPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeKeyword(RecipeKeyword $l)
	{
		$this->collRecipeKeywords[] = $l;
		$l->setUser($this);
	}


	
	public function getRecipeKeywordsJoinRecipe($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeKeywordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeKeywords === null) {
			if ($this->isNew()) {
				$this->collRecipeKeywords = array();
			} else {

				$criteria->add(RecipeKeywordPeer::USER_ID, $this->getUserId());

				$this->collRecipeKeywords = RecipeKeywordPeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeKeywordPeer::USER_ID, $this->getUserId());

			if (!isset($this->lastRecipeKeywordCriteria) || !$this->lastRecipeKeywordCriteria->equals($criteria)) {
				$this->collRecipeKeywords = RecipeKeywordPeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastRecipeKeywordCriteria = $criteria;

		return $this->collRecipeKeywords;
	}

	
	public function initRecipeReports()
	{
		if ($this->collRecipeReports === null) {
			$this->collRecipeReports = array();
		}
	}

	
	public function getRecipeReports($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeReportPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeReports === null) {
			if ($this->isNew()) {
			   $this->collRecipeReports = array();
			} else {

				$criteria->add(RecipeReportPeer::USER_ID, $this->getUserId());

				RecipeReportPeer::addSelectColumns($criteria);
				$this->collRecipeReports = RecipeReportPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeReportPeer::USER_ID, $this->getUserId());

				RecipeReportPeer::addSelectColumns($criteria);
				if (!isset($this->lastRecipeReportCriteria) || !$this->lastRecipeReportCriteria->equals($criteria)) {
					$this->collRecipeReports = RecipeReportPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRecipeReportCriteria = $criteria;
		return $this->collRecipeReports;
	}

	
	public function countRecipeReports($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeReportPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RecipeReportPeer::USER_ID, $this->getUserId());

		return RecipeReportPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeReport(RecipeReport $l)
	{
		$this->collRecipeReports[] = $l;
		$l->setUser($this);
	}


	
	public function getRecipeReportsJoinRecipe($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeReportPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeReports === null) {
			if ($this->isNew()) {
				$this->collRecipeReports = array();
			} else {

				$criteria->add(RecipeReportPeer::USER_ID, $this->getUserId());

				$this->collRecipeReports = RecipeReportPeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeReportPeer::USER_ID, $this->getUserId());

			if (!isset($this->lastRecipeReportCriteria) || !$this->lastRecipeReportCriteria->equals($criteria)) {
				$this->collRecipeReports = RecipeReportPeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastRecipeReportCriteria = $criteria;

		return $this->collRecipeReports;
	}

	
	public function initRecipeSuggestions()
	{
		if ($this->collRecipeSuggestions === null) {
			$this->collRecipeSuggestions = array();
		}
	}

	
	public function getRecipeSuggestions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeSuggestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeSuggestions === null) {
			if ($this->isNew()) {
			   $this->collRecipeSuggestions = array();
			} else {

				$criteria->add(RecipeSuggestionPeer::USER_ID, $this->getUserId());

				RecipeSuggestionPeer::addSelectColumns($criteria);
				$this->collRecipeSuggestions = RecipeSuggestionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeSuggestionPeer::USER_ID, $this->getUserId());

				RecipeSuggestionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRecipeSuggestionCriteria) || !$this->lastRecipeSuggestionCriteria->equals($criteria)) {
					$this->collRecipeSuggestions = RecipeSuggestionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRecipeSuggestionCriteria = $criteria;
		return $this->collRecipeSuggestions;
	}

	
	public function countRecipeSuggestions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeSuggestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RecipeSuggestionPeer::USER_ID, $this->getUserId());

		return RecipeSuggestionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeSuggestion(RecipeSuggestion $l)
	{
		$this->collRecipeSuggestions[] = $l;
		$l->setUser($this);
	}


	
	public function getRecipeSuggestionsJoinRecipe($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRecipeSuggestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRecipeSuggestions === null) {
			if ($this->isNew()) {
				$this->collRecipeSuggestions = array();
			} else {

				$criteria->add(RecipeSuggestionPeer::USER_ID, $this->getUserId());

				$this->collRecipeSuggestions = RecipeSuggestionPeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeSuggestionPeer::USER_ID, $this->getUserId());

			if (!isset($this->lastRecipeSuggestionCriteria) || !$this->lastRecipeSuggestionCriteria->equals($criteria)) {
				$this->collRecipeSuggestions = RecipeSuggestionPeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastRecipeSuggestionCriteria = $criteria;

		return $this->collRecipeSuggestions;
	}

	
	public function initStoredRecipes()
	{
		if ($this->collStoredRecipes === null) {
			$this->collStoredRecipes = array();
		}
	}

	
	public function getStoredRecipes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseStoredRecipePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collStoredRecipes === null) {
			if ($this->isNew()) {
			   $this->collStoredRecipes = array();
			} else {

				$criteria->add(StoredRecipePeer::USER_ID, $this->getUserId());

				StoredRecipePeer::addSelectColumns($criteria);
				$this->collStoredRecipes = StoredRecipePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(StoredRecipePeer::USER_ID, $this->getUserId());

				StoredRecipePeer::addSelectColumns($criteria);
				if (!isset($this->lastStoredRecipeCriteria) || !$this->lastStoredRecipeCriteria->equals($criteria)) {
					$this->collStoredRecipes = StoredRecipePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastStoredRecipeCriteria = $criteria;
		return $this->collStoredRecipes;
	}

	
	public function countStoredRecipes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseStoredRecipePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(StoredRecipePeer::USER_ID, $this->getUserId());

		return StoredRecipePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addStoredRecipe(StoredRecipe $l)
	{
		$this->collStoredRecipes[] = $l;
		$l->setUser($this);
	}


	
	public function getStoredRecipesJoinRecipe($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseStoredRecipePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collStoredRecipes === null) {
			if ($this->isNew()) {
				$this->collStoredRecipes = array();
			} else {

				$criteria->add(StoredRecipePeer::USER_ID, $this->getUserId());

				$this->collStoredRecipes = StoredRecipePeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(StoredRecipePeer::USER_ID, $this->getUserId());

			if (!isset($this->lastStoredRecipeCriteria) || !$this->lastStoredRecipeCriteria->equals($criteria)) {
				$this->collStoredRecipes = StoredRecipePeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastStoredRecipeCriteria = $criteria;

		return $this->collStoredRecipes;
	}

	
	public function initUserRecipeNotes()
	{
		if ($this->collUserRecipeNotes === null) {
			$this->collUserRecipeNotes = array();
		}
	}

	
	public function getUserRecipeNotes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUserRecipeNotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserRecipeNotes === null) {
			if ($this->isNew()) {
			   $this->collUserRecipeNotes = array();
			} else {

				$criteria->add(UserRecipeNotePeer::USER_ID, $this->getUserId());

				UserRecipeNotePeer::addSelectColumns($criteria);
				$this->collUserRecipeNotes = UserRecipeNotePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UserRecipeNotePeer::USER_ID, $this->getUserId());

				UserRecipeNotePeer::addSelectColumns($criteria);
				if (!isset($this->lastUserRecipeNoteCriteria) || !$this->lastUserRecipeNoteCriteria->equals($criteria)) {
					$this->collUserRecipeNotes = UserRecipeNotePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserRecipeNoteCriteria = $criteria;
		return $this->collUserRecipeNotes;
	}

	
	public function countUserRecipeNotes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseUserRecipeNotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UserRecipeNotePeer::USER_ID, $this->getUserId());

		return UserRecipeNotePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUserRecipeNote(UserRecipeNote $l)
	{
		$this->collUserRecipeNotes[] = $l;
		$l->setUser($this);
	}


	
	public function getUserRecipeNotesJoinRecipe($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUserRecipeNotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserRecipeNotes === null) {
			if ($this->isNew()) {
				$this->collUserRecipeNotes = array();
			} else {

				$criteria->add(UserRecipeNotePeer::USER_ID, $this->getUserId());

				$this->collUserRecipeNotes = UserRecipeNotePeer::doSelectJoinRecipe($criteria, $con);
			}
		} else {
									
			$criteria->add(UserRecipeNotePeer::USER_ID, $this->getUserId());

			if (!isset($this->lastUserRecipeNoteCriteria) || !$this->lastUserRecipeNoteCriteria->equals($criteria)) {
				$this->collUserRecipeNotes = UserRecipeNotePeer::doSelectJoinRecipe($criteria, $con);
			}
		}
		$this->lastUserRecipeNoteCriteria = $criteria;

		return $this->collUserRecipeNotes;
	}

} 
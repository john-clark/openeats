<?php


abstract class BaseRecipe extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $recipe_id;


	
	protected $recipe_strip_nm = '';


	
	protected $recipe_nm = '';


	
	protected $recipe_desc = '';


	
	protected $recipe_prep_tm = '';


	
	protected $recipe_cook_tm;


	
	protected $recipe_srvgs;


	
	protected $recipe_srvg_sz;


	
	protected $recipe_directions;


	
	protected $recipe_picture;


	
	protected $user_id;


	
	protected $course_id;


	
	protected $ethnicity_id;


	
	protected $base;


	
	protected $average_rating = 0;


	
	protected $nb_comment;


	
	protected $nb_report;


	
	protected $nb_suggestion;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aUser;

	
	protected $aCourse;

	
	protected $aEthnicity;

	
	protected $collPlanners;

	
	protected $lastPlannerCriteria = null;

	
	protected $collRates;

	
	protected $lastRateCriteria = null;

	
	protected $collRecipeComments;

	
	protected $lastRecipeCommentCriteria = null;

	
	protected $collRecipeIngrds;

	
	protected $lastRecipeIngrdCriteria = null;

	
	protected $collRecipeKeywords;

	
	protected $lastRecipeKeywordCriteria = null;

	
	protected $collRecipeMenus;

	
	protected $lastRecipeMenuCriteria = null;

	
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

	
	public function getRecipeId()
	{

		return $this->recipe_id;
	}

	
	public function getRecipeStripNm()
	{

		return $this->recipe_strip_nm;
	}

	
	public function getRecipeNm()
	{

		return $this->recipe_nm;
	}

	
	public function getRecipeDesc()
	{

		return $this->recipe_desc;
	}

	
	public function getRecipePrepTm()
	{

		return $this->recipe_prep_tm;
	}

	
	public function getRecipeCookTm()
	{

		return $this->recipe_cook_tm;
	}

	
	public function getRecipeSrvgs()
	{

		return $this->recipe_srvgs;
	}

	
	public function getRecipeSrvgSz()
	{

		return $this->recipe_srvg_sz;
	}

	
	public function getRecipeDirections()
	{

		return $this->recipe_directions;
	}

	
	public function getRecipePicture()
	{

		return $this->recipe_picture;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getCourseId()
	{

		return $this->course_id;
	}

	
	public function getEthnicityId()
	{

		return $this->ethnicity_id;
	}

	
	public function getBase()
	{

		return $this->base;
	}

	
	public function getAverageRating()
	{

		return $this->average_rating;
	}

	
	public function getNbComment()
	{

		return $this->nb_comment;
	}

	
	public function getNbReport()
	{

		return $this->nb_report;
	}

	
	public function getNbSuggestion()
	{

		return $this->nb_suggestion;
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

	
	public function setRecipeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->recipe_id !== $v) {
			$this->recipe_id = $v;
			$this->modifiedColumns[] = RecipePeer::RECIPE_ID;
		}

	} 
	
	public function setRecipeStripNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recipe_strip_nm !== $v || $v === '') {
			$this->recipe_strip_nm = $v;
			$this->modifiedColumns[] = RecipePeer::RECIPE_STRIP_NM;
		}

	} 
	
	public function setRecipeNm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recipe_nm !== $v || $v === '') {
			$this->recipe_nm = $v;
			$this->modifiedColumns[] = RecipePeer::RECIPE_NM;
		}

	} 
	
	public function setRecipeDesc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recipe_desc !== $v || $v === '') {
			$this->recipe_desc = $v;
			$this->modifiedColumns[] = RecipePeer::RECIPE_DESC;
		}

	} 
	
	public function setRecipePrepTm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recipe_prep_tm !== $v || $v === '') {
			$this->recipe_prep_tm = $v;
			$this->modifiedColumns[] = RecipePeer::RECIPE_PREP_TM;
		}

	} 
	
	public function setRecipeCookTm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recipe_cook_tm !== $v) {
			$this->recipe_cook_tm = $v;
			$this->modifiedColumns[] = RecipePeer::RECIPE_COOK_TM;
		}

	} 
	
	public function setRecipeSrvgs($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->recipe_srvgs !== $v) {
			$this->recipe_srvgs = $v;
			$this->modifiedColumns[] = RecipePeer::RECIPE_SRVGS;
		}

	} 
	
	public function setRecipeSrvgSz($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recipe_srvg_sz !== $v) {
			$this->recipe_srvg_sz = $v;
			$this->modifiedColumns[] = RecipePeer::RECIPE_SRVG_SZ;
		}

	} 
	
	public function setRecipeDirections($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recipe_directions !== $v) {
			$this->recipe_directions = $v;
			$this->modifiedColumns[] = RecipePeer::RECIPE_DIRECTIONS;
		}

	} 
	
	public function setRecipePicture($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recipe_picture !== $v) {
			$this->recipe_picture = $v;
			$this->modifiedColumns[] = RecipePeer::RECIPE_PICTURE;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = RecipePeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setCourseId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->course_id !== $v) {
			$this->course_id = $v;
			$this->modifiedColumns[] = RecipePeer::COURSE_ID;
		}

		if ($this->aCourse !== null && $this->aCourse->getCourseId() !== $v) {
			$this->aCourse = null;
		}

	} 
	
	public function setEthnicityId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ethnicity_id !== $v) {
			$this->ethnicity_id = $v;
			$this->modifiedColumns[] = RecipePeer::ETHNICITY_ID;
		}

		if ($this->aEthnicity !== null && $this->aEthnicity->getEthnicityId() !== $v) {
			$this->aEthnicity = null;
		}

	} 
	
	public function setBase($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->base !== $v) {
			$this->base = $v;
			$this->modifiedColumns[] = RecipePeer::BASE;
		}

	} 
	
	public function setAverageRating($v)
	{

		if ($this->average_rating !== $v || $v === 0) {
			$this->average_rating = $v;
			$this->modifiedColumns[] = RecipePeer::AVERAGE_RATING;
		}

	} 
	
	public function setNbComment($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->nb_comment !== $v) {
			$this->nb_comment = $v;
			$this->modifiedColumns[] = RecipePeer::NB_COMMENT;
		}

	} 
	
	public function setNbReport($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->nb_report !== $v) {
			$this->nb_report = $v;
			$this->modifiedColumns[] = RecipePeer::NB_REPORT;
		}

	} 
	
	public function setNbSuggestion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->nb_suggestion !== $v) {
			$this->nb_suggestion = $v;
			$this->modifiedColumns[] = RecipePeer::NB_SUGGESTION;
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
			$this->modifiedColumns[] = RecipePeer::CREATED_AT;
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
			$this->modifiedColumns[] = RecipePeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->recipe_id = $rs->getInt($startcol + 0);

			$this->recipe_strip_nm = $rs->getString($startcol + 1);

			$this->recipe_nm = $rs->getString($startcol + 2);

			$this->recipe_desc = $rs->getString($startcol + 3);

			$this->recipe_prep_tm = $rs->getString($startcol + 4);

			$this->recipe_cook_tm = $rs->getString($startcol + 5);

			$this->recipe_srvgs = $rs->getInt($startcol + 6);

			$this->recipe_srvg_sz = $rs->getString($startcol + 7);

			$this->recipe_directions = $rs->getString($startcol + 8);

			$this->recipe_picture = $rs->getString($startcol + 9);

			$this->user_id = $rs->getInt($startcol + 10);

			$this->course_id = $rs->getInt($startcol + 11);

			$this->ethnicity_id = $rs->getInt($startcol + 12);

			$this->base = $rs->getString($startcol + 13);

			$this->average_rating = $rs->getFloat($startcol + 14);

			$this->nb_comment = $rs->getInt($startcol + 15);

			$this->nb_report = $rs->getInt($startcol + 16);

			$this->nb_suggestion = $rs->getInt($startcol + 17);

			$this->created_at = $rs->getTimestamp($startcol + 18, null);

			$this->updated_at = $rs->getTimestamp($startcol + 19, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 20; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Recipe object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecipePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RecipePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(RecipePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(RecipePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecipePeer::DATABASE_NAME);
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

			if ($this->aCourse !== null) {
				if ($this->aCourse->isModified()) {
					$affectedRows += $this->aCourse->save($con);
				}
				$this->setCourse($this->aCourse);
			}

			if ($this->aEthnicity !== null) {
				if ($this->aEthnicity->isModified()) {
					$affectedRows += $this->aEthnicity->save($con);
				}
				$this->setEthnicity($this->aEthnicity);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RecipePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setRecipeId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RecipePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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

			if ($this->collRecipeComments !== null) {
				foreach($this->collRecipeComments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRecipeIngrds !== null) {
				foreach($this->collRecipeIngrds as $referrerFK) {
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

			if ($this->collRecipeMenus !== null) {
				foreach($this->collRecipeMenus as $referrerFK) {
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


												
			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}

			if ($this->aCourse !== null) {
				if (!$this->aCourse->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCourse->getValidationFailures());
				}
			}

			if ($this->aEthnicity !== null) {
				if (!$this->aEthnicity->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEthnicity->getValidationFailures());
				}
			}


			if (($retval = RecipePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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

				if ($this->collRecipeComments !== null) {
					foreach($this->collRecipeComments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRecipeIngrds !== null) {
					foreach($this->collRecipeIngrds as $referrerFK) {
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

				if ($this->collRecipeMenus !== null) {
					foreach($this->collRecipeMenus as $referrerFK) {
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
		$pos = RecipePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRecipeId();
				break;
			case 1:
				return $this->getRecipeStripNm();
				break;
			case 2:
				return $this->getRecipeNm();
				break;
			case 3:
				return $this->getRecipeDesc();
				break;
			case 4:
				return $this->getRecipePrepTm();
				break;
			case 5:
				return $this->getRecipeCookTm();
				break;
			case 6:
				return $this->getRecipeSrvgs();
				break;
			case 7:
				return $this->getRecipeSrvgSz();
				break;
			case 8:
				return $this->getRecipeDirections();
				break;
			case 9:
				return $this->getRecipePicture();
				break;
			case 10:
				return $this->getUserId();
				break;
			case 11:
				return $this->getCourseId();
				break;
			case 12:
				return $this->getEthnicityId();
				break;
			case 13:
				return $this->getBase();
				break;
			case 14:
				return $this->getAverageRating();
				break;
			case 15:
				return $this->getNbComment();
				break;
			case 16:
				return $this->getNbReport();
				break;
			case 17:
				return $this->getNbSuggestion();
				break;
			case 18:
				return $this->getCreatedAt();
				break;
			case 19:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RecipePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRecipeId(),
			$keys[1] => $this->getRecipeStripNm(),
			$keys[2] => $this->getRecipeNm(),
			$keys[3] => $this->getRecipeDesc(),
			$keys[4] => $this->getRecipePrepTm(),
			$keys[5] => $this->getRecipeCookTm(),
			$keys[6] => $this->getRecipeSrvgs(),
			$keys[7] => $this->getRecipeSrvgSz(),
			$keys[8] => $this->getRecipeDirections(),
			$keys[9] => $this->getRecipePicture(),
			$keys[10] => $this->getUserId(),
			$keys[11] => $this->getCourseId(),
			$keys[12] => $this->getEthnicityId(),
			$keys[13] => $this->getBase(),
			$keys[14] => $this->getAverageRating(),
			$keys[15] => $this->getNbComment(),
			$keys[16] => $this->getNbReport(),
			$keys[17] => $this->getNbSuggestion(),
			$keys[18] => $this->getCreatedAt(),
			$keys[19] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RecipePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRecipeId($value);
				break;
			case 1:
				$this->setRecipeStripNm($value);
				break;
			case 2:
				$this->setRecipeNm($value);
				break;
			case 3:
				$this->setRecipeDesc($value);
				break;
			case 4:
				$this->setRecipePrepTm($value);
				break;
			case 5:
				$this->setRecipeCookTm($value);
				break;
			case 6:
				$this->setRecipeSrvgs($value);
				break;
			case 7:
				$this->setRecipeSrvgSz($value);
				break;
			case 8:
				$this->setRecipeDirections($value);
				break;
			case 9:
				$this->setRecipePicture($value);
				break;
			case 10:
				$this->setUserId($value);
				break;
			case 11:
				$this->setCourseId($value);
				break;
			case 12:
				$this->setEthnicityId($value);
				break;
			case 13:
				$this->setBase($value);
				break;
			case 14:
				$this->setAverageRating($value);
				break;
			case 15:
				$this->setNbComment($value);
				break;
			case 16:
				$this->setNbReport($value);
				break;
			case 17:
				$this->setNbSuggestion($value);
				break;
			case 18:
				$this->setCreatedAt($value);
				break;
			case 19:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RecipePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRecipeId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRecipeStripNm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRecipeNm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRecipeDesc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRecipePrepTm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRecipeCookTm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRecipeSrvgs($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRecipeSrvgSz($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRecipeDirections($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRecipePicture($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUserId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCourseId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setEthnicityId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setBase($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAverageRating($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNbComment($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNbReport($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNbSuggestion($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCreatedAt($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setUpdatedAt($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RecipePeer::DATABASE_NAME);

		if ($this->isColumnModified(RecipePeer::RECIPE_ID)) $criteria->add(RecipePeer::RECIPE_ID, $this->recipe_id);
		if ($this->isColumnModified(RecipePeer::RECIPE_STRIP_NM)) $criteria->add(RecipePeer::RECIPE_STRIP_NM, $this->recipe_strip_nm);
		if ($this->isColumnModified(RecipePeer::RECIPE_NM)) $criteria->add(RecipePeer::RECIPE_NM, $this->recipe_nm);
		if ($this->isColumnModified(RecipePeer::RECIPE_DESC)) $criteria->add(RecipePeer::RECIPE_DESC, $this->recipe_desc);
		if ($this->isColumnModified(RecipePeer::RECIPE_PREP_TM)) $criteria->add(RecipePeer::RECIPE_PREP_TM, $this->recipe_prep_tm);
		if ($this->isColumnModified(RecipePeer::RECIPE_COOK_TM)) $criteria->add(RecipePeer::RECIPE_COOK_TM, $this->recipe_cook_tm);
		if ($this->isColumnModified(RecipePeer::RECIPE_SRVGS)) $criteria->add(RecipePeer::RECIPE_SRVGS, $this->recipe_srvgs);
		if ($this->isColumnModified(RecipePeer::RECIPE_SRVG_SZ)) $criteria->add(RecipePeer::RECIPE_SRVG_SZ, $this->recipe_srvg_sz);
		if ($this->isColumnModified(RecipePeer::RECIPE_DIRECTIONS)) $criteria->add(RecipePeer::RECIPE_DIRECTIONS, $this->recipe_directions);
		if ($this->isColumnModified(RecipePeer::RECIPE_PICTURE)) $criteria->add(RecipePeer::RECIPE_PICTURE, $this->recipe_picture);
		if ($this->isColumnModified(RecipePeer::USER_ID)) $criteria->add(RecipePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(RecipePeer::COURSE_ID)) $criteria->add(RecipePeer::COURSE_ID, $this->course_id);
		if ($this->isColumnModified(RecipePeer::ETHNICITY_ID)) $criteria->add(RecipePeer::ETHNICITY_ID, $this->ethnicity_id);
		if ($this->isColumnModified(RecipePeer::BASE)) $criteria->add(RecipePeer::BASE, $this->base);
		if ($this->isColumnModified(RecipePeer::AVERAGE_RATING)) $criteria->add(RecipePeer::AVERAGE_RATING, $this->average_rating);
		if ($this->isColumnModified(RecipePeer::NB_COMMENT)) $criteria->add(RecipePeer::NB_COMMENT, $this->nb_comment);
		if ($this->isColumnModified(RecipePeer::NB_REPORT)) $criteria->add(RecipePeer::NB_REPORT, $this->nb_report);
		if ($this->isColumnModified(RecipePeer::NB_SUGGESTION)) $criteria->add(RecipePeer::NB_SUGGESTION, $this->nb_suggestion);
		if ($this->isColumnModified(RecipePeer::CREATED_AT)) $criteria->add(RecipePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(RecipePeer::UPDATED_AT)) $criteria->add(RecipePeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RecipePeer::DATABASE_NAME);

		$criteria->add(RecipePeer::RECIPE_ID, $this->recipe_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getRecipeId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setRecipeId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRecipeStripNm($this->recipe_strip_nm);

		$copyObj->setRecipeNm($this->recipe_nm);

		$copyObj->setRecipeDesc($this->recipe_desc);

		$copyObj->setRecipePrepTm($this->recipe_prep_tm);

		$copyObj->setRecipeCookTm($this->recipe_cook_tm);

		$copyObj->setRecipeSrvgs($this->recipe_srvgs);

		$copyObj->setRecipeSrvgSz($this->recipe_srvg_sz);

		$copyObj->setRecipeDirections($this->recipe_directions);

		$copyObj->setRecipePicture($this->recipe_picture);

		$copyObj->setUserId($this->user_id);

		$copyObj->setCourseId($this->course_id);

		$copyObj->setEthnicityId($this->ethnicity_id);

		$copyObj->setBase($this->base);

		$copyObj->setAverageRating($this->average_rating);

		$copyObj->setNbComment($this->nb_comment);

		$copyObj->setNbReport($this->nb_report);

		$copyObj->setNbSuggestion($this->nb_suggestion);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPlanners() as $relObj) {
				$copyObj->addPlanner($relObj->copy($deepCopy));
			}

			foreach($this->getRates() as $relObj) {
				$copyObj->addRate($relObj->copy($deepCopy));
			}

			foreach($this->getRecipeComments() as $relObj) {
				$copyObj->addRecipeComment($relObj->copy($deepCopy));
			}

			foreach($this->getRecipeIngrds() as $relObj) {
				$copyObj->addRecipeIngrd($relObj->copy($deepCopy));
			}

			foreach($this->getRecipeKeywords() as $relObj) {
				$copyObj->addRecipeKeyword($relObj->copy($deepCopy));
			}

			foreach($this->getRecipeMenus() as $relObj) {
				$copyObj->addRecipeMenu($relObj->copy($deepCopy));
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
			self::$peer = new RecipePeer();
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

	
	public function setEthnicity($v)
	{


		if ($v === null) {
			$this->setEthnicityId(NULL);
		} else {
			$this->setEthnicityId($v->getEthnicityId());
		}


		$this->aEthnicity = $v;
	}


	
	public function getEthnicity($con = null)
	{
		if ($this->aEthnicity === null && ($this->ethnicity_id !== null)) {
						include_once 'lib/model/om/BaseEthnicityPeer.php';

			$this->aEthnicity = EthnicityPeer::retrieveByPK($this->ethnicity_id, $con);

			
		}
		return $this->aEthnicity;
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

				$criteria->add(PlannerPeer::RECIPE_ID, $this->getRecipeId());

				PlannerPeer::addSelectColumns($criteria);
				$this->collPlanners = PlannerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PlannerPeer::RECIPE_ID, $this->getRecipeId());

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

		$criteria->add(PlannerPeer::RECIPE_ID, $this->getRecipeId());

		return PlannerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPlanner(Planner $l)
	{
		$this->collPlanners[] = $l;
		$l->setRecipe($this);
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

				$criteria->add(PlannerPeer::RECIPE_ID, $this->getRecipeId());

				$this->collPlanners = PlannerPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(PlannerPeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastPlannerCriteria) || !$this->lastPlannerCriteria->equals($criteria)) {
				$this->collPlanners = PlannerPeer::doSelectJoinUser($criteria, $con);
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

				$criteria->add(PlannerPeer::RECIPE_ID, $this->getRecipeId());

				$this->collPlanners = PlannerPeer::doSelectJoinMenu($criteria, $con);
			}
		} else {
									
			$criteria->add(PlannerPeer::RECIPE_ID, $this->getRecipeId());

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

				$criteria->add(RatePeer::RECIPE_ID, $this->getRecipeId());

				RatePeer::addSelectColumns($criteria);
				$this->collRates = RatePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RatePeer::RECIPE_ID, $this->getRecipeId());

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

		$criteria->add(RatePeer::RECIPE_ID, $this->getRecipeId());

		return RatePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRate(Rate $l)
	{
		$this->collRates[] = $l;
		$l->setRecipe($this);
	}


	
	public function getRatesJoinUser($criteria = null, $con = null)
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

				$criteria->add(RatePeer::RECIPE_ID, $this->getRecipeId());

				$this->collRates = RatePeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(RatePeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastRateCriteria) || !$this->lastRateCriteria->equals($criteria)) {
				$this->collRates = RatePeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastRateCriteria = $criteria;

		return $this->collRates;
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

				$criteria->add(RecipeCommentPeer::RECIPE_ID, $this->getRecipeId());

				RecipeCommentPeer::addSelectColumns($criteria);
				$this->collRecipeComments = RecipeCommentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeCommentPeer::RECIPE_ID, $this->getRecipeId());

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

		$criteria->add(RecipeCommentPeer::RECIPE_ID, $this->getRecipeId());

		return RecipeCommentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeComment(RecipeComment $l)
	{
		$this->collRecipeComments[] = $l;
		$l->setRecipe($this);
	}


	
	public function getRecipeCommentsJoinUser($criteria = null, $con = null)
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

				$criteria->add(RecipeCommentPeer::RECIPE_ID, $this->getRecipeId());

				$this->collRecipeComments = RecipeCommentPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeCommentPeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastRecipeCommentCriteria) || !$this->lastRecipeCommentCriteria->equals($criteria)) {
				$this->collRecipeComments = RecipeCommentPeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastRecipeCommentCriteria = $criteria;

		return $this->collRecipeComments;
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

				$criteria->add(RecipeIngrdPeer::RECIPE_ID, $this->getRecipeId());

				RecipeIngrdPeer::addSelectColumns($criteria);
				$this->collRecipeIngrds = RecipeIngrdPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeIngrdPeer::RECIPE_ID, $this->getRecipeId());

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

		$criteria->add(RecipeIngrdPeer::RECIPE_ID, $this->getRecipeId());

		return RecipeIngrdPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeIngrd(RecipeIngrd $l)
	{
		$this->collRecipeIngrds[] = $l;
		$l->setRecipe($this);
	}


	
	public function getRecipeIngrdsJoinIngredient($criteria = null, $con = null)
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

				$criteria->add(RecipeIngrdPeer::RECIPE_ID, $this->getRecipeId());

				$this->collRecipeIngrds = RecipeIngrdPeer::doSelectJoinIngredient($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeIngrdPeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastRecipeIngrdCriteria) || !$this->lastRecipeIngrdCriteria->equals($criteria)) {
				$this->collRecipeIngrds = RecipeIngrdPeer::doSelectJoinIngredient($criteria, $con);
			}
		}
		$this->lastRecipeIngrdCriteria = $criteria;

		return $this->collRecipeIngrds;
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

				$criteria->add(RecipeKeywordPeer::RECIPE_ID, $this->getRecipeId());

				RecipeKeywordPeer::addSelectColumns($criteria);
				$this->collRecipeKeywords = RecipeKeywordPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeKeywordPeer::RECIPE_ID, $this->getRecipeId());

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

		$criteria->add(RecipeKeywordPeer::RECIPE_ID, $this->getRecipeId());

		return RecipeKeywordPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeKeyword(RecipeKeyword $l)
	{
		$this->collRecipeKeywords[] = $l;
		$l->setRecipe($this);
	}


	
	public function getRecipeKeywordsJoinUser($criteria = null, $con = null)
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

				$criteria->add(RecipeKeywordPeer::RECIPE_ID, $this->getRecipeId());

				$this->collRecipeKeywords = RecipeKeywordPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeKeywordPeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastRecipeKeywordCriteria) || !$this->lastRecipeKeywordCriteria->equals($criteria)) {
				$this->collRecipeKeywords = RecipeKeywordPeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastRecipeKeywordCriteria = $criteria;

		return $this->collRecipeKeywords;
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

				$criteria->add(RecipeMenuPeer::RECIPE_ID, $this->getRecipeId());

				RecipeMenuPeer::addSelectColumns($criteria);
				$this->collRecipeMenus = RecipeMenuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeMenuPeer::RECIPE_ID, $this->getRecipeId());

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

		$criteria->add(RecipeMenuPeer::RECIPE_ID, $this->getRecipeId());

		return RecipeMenuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeMenu(RecipeMenu $l)
	{
		$this->collRecipeMenus[] = $l;
		$l->setRecipe($this);
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

				$criteria->add(RecipeMenuPeer::RECIPE_ID, $this->getRecipeId());

				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinMenu($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeMenuPeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastRecipeMenuCriteria) || !$this->lastRecipeMenuCriteria->equals($criteria)) {
				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinMenu($criteria, $con);
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

				$criteria->add(RecipeMenuPeer::RECIPE_ID, $this->getRecipeId());

				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinCourse($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeMenuPeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastRecipeMenuCriteria) || !$this->lastRecipeMenuCriteria->equals($criteria)) {
				$this->collRecipeMenus = RecipeMenuPeer::doSelectJoinCourse($criteria, $con);
			}
		}
		$this->lastRecipeMenuCriteria = $criteria;

		return $this->collRecipeMenus;
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

				$criteria->add(RecipeReportPeer::RECIPE_ID, $this->getRecipeId());

				RecipeReportPeer::addSelectColumns($criteria);
				$this->collRecipeReports = RecipeReportPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeReportPeer::RECIPE_ID, $this->getRecipeId());

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

		$criteria->add(RecipeReportPeer::RECIPE_ID, $this->getRecipeId());

		return RecipeReportPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeReport(RecipeReport $l)
	{
		$this->collRecipeReports[] = $l;
		$l->setRecipe($this);
	}


	
	public function getRecipeReportsJoinUser($criteria = null, $con = null)
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

				$criteria->add(RecipeReportPeer::RECIPE_ID, $this->getRecipeId());

				$this->collRecipeReports = RecipeReportPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeReportPeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastRecipeReportCriteria) || !$this->lastRecipeReportCriteria->equals($criteria)) {
				$this->collRecipeReports = RecipeReportPeer::doSelectJoinUser($criteria, $con);
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

				$criteria->add(RecipeSuggestionPeer::RECIPE_ID, $this->getRecipeId());

				RecipeSuggestionPeer::addSelectColumns($criteria);
				$this->collRecipeSuggestions = RecipeSuggestionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RecipeSuggestionPeer::RECIPE_ID, $this->getRecipeId());

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

		$criteria->add(RecipeSuggestionPeer::RECIPE_ID, $this->getRecipeId());

		return RecipeSuggestionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRecipeSuggestion(RecipeSuggestion $l)
	{
		$this->collRecipeSuggestions[] = $l;
		$l->setRecipe($this);
	}


	
	public function getRecipeSuggestionsJoinUser($criteria = null, $con = null)
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

				$criteria->add(RecipeSuggestionPeer::RECIPE_ID, $this->getRecipeId());

				$this->collRecipeSuggestions = RecipeSuggestionPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(RecipeSuggestionPeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastRecipeSuggestionCriteria) || !$this->lastRecipeSuggestionCriteria->equals($criteria)) {
				$this->collRecipeSuggestions = RecipeSuggestionPeer::doSelectJoinUser($criteria, $con);
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

				$criteria->add(StoredRecipePeer::RECIPE_ID, $this->getRecipeId());

				StoredRecipePeer::addSelectColumns($criteria);
				$this->collStoredRecipes = StoredRecipePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(StoredRecipePeer::RECIPE_ID, $this->getRecipeId());

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

		$criteria->add(StoredRecipePeer::RECIPE_ID, $this->getRecipeId());

		return StoredRecipePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addStoredRecipe(StoredRecipe $l)
	{
		$this->collStoredRecipes[] = $l;
		$l->setRecipe($this);
	}


	
	public function getStoredRecipesJoinUser($criteria = null, $con = null)
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

				$criteria->add(StoredRecipePeer::RECIPE_ID, $this->getRecipeId());

				$this->collStoredRecipes = StoredRecipePeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(StoredRecipePeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastStoredRecipeCriteria) || !$this->lastStoredRecipeCriteria->equals($criteria)) {
				$this->collStoredRecipes = StoredRecipePeer::doSelectJoinUser($criteria, $con);
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

				$criteria->add(UserRecipeNotePeer::RECIPE_ID, $this->getRecipeId());

				UserRecipeNotePeer::addSelectColumns($criteria);
				$this->collUserRecipeNotes = UserRecipeNotePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UserRecipeNotePeer::RECIPE_ID, $this->getRecipeId());

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

		$criteria->add(UserRecipeNotePeer::RECIPE_ID, $this->getRecipeId());

		return UserRecipeNotePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUserRecipeNote(UserRecipeNote $l)
	{
		$this->collUserRecipeNotes[] = $l;
		$l->setRecipe($this);
	}


	
	public function getUserRecipeNotesJoinUser($criteria = null, $con = null)
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

				$criteria->add(UserRecipeNotePeer::RECIPE_ID, $this->getRecipeId());

				$this->collUserRecipeNotes = UserRecipeNotePeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(UserRecipeNotePeer::RECIPE_ID, $this->getRecipeId());

			if (!isset($this->lastUserRecipeNoteCriteria) || !$this->lastUserRecipeNoteCriteria->equals($criteria)) {
				$this->collUserRecipeNotes = UserRecipeNotePeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastUserRecipeNoteCriteria = $criteria;

		return $this->collUserRecipeNotes;
	}

} 
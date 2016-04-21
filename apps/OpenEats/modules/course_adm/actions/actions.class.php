<?php

/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * course_adm actions.
 * Currently only used to add comments to recipes but may be extended at some point
 * @package    openeats
 * @subpackage course_admn
 * @author     Quenten Griffith
 * 
 */
class course_admActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('course_adm', 'list');
  }

  public function executeList()
  {
    $c = new Criteria();
    if($this->getRequestParameter('sort')):
      $c->addAscendingOrderByColumn(CoursePeer::$this->getRequestParameter('sort'));
    else:
      $c->addAscendingOrderByColumn(CoursePeer::COURSE_NM);
   endif;
    $pager = new sfPropelPager('Course', 10);
    $pager->setCriteria($c);
    $pager->setPage($this->getRequestParameter('page', 1));
    $pager->init();
    $this->pager = $pager;	
  }

  public function executeEdit()
  {
    if($this->getRequestParameter('course_nm'))
    {
      $this->course = CoursePeer::getCourseByName($this->getRequestParameter('course_nm'));
    }
	else
	{
	  $this->course = new Course();
	}  
    $this->forward404Unless($this->course);
  }

  public function executeUpdate()
  {
    $course_nm = $this->getRequestParameter('course');
    # check to see if you are trying to save a course with the same name as another
     $exists = CoursePeer::getCourseByName($course_nm);
     if($exists):
       if($exists->getCourseId() != $this->getRequestParameter('course_id'))
       {
	      $this->setFlash('error', "Course Name $course_nm in use can't save");
	      $this->redirect('course_adm');
	      exit;
       }
     endif;
      
    if($this->getRequestParameter('course_id'))
    {
      //get the orignal name of the course prior to the chagne so that the object will upate the old course with the new name
      $course = CoursePeer::retrieveByPk($this->getRequestParameter('course_id'));
    }
    else
    {
	  $course = new Course();
    }
    $course->setCourseNm($course_nm);
    $course->save();
    $this->setFlash('notice', "Course Updated!");
    $this->redirect('course_adm');	
  }

  public function executeDelete()
  {
	$course = CoursePeer::retrieveByPk($this->getRequestParameter('course_id'));
	$this->forward404Unless($course);
	//don't delete the course if a recipe has it in use
	$count = $course->countRecipes();
	if($count > 0)
	{
		$this->setFlash('error', "Can't remove course because $count recipes are using the course");
		$this->redirect('course_adm');
	}
	else
	{
		$course->delete();
		$this->setFlash('notice', 'Course removed!');
		$this->redirect('course_adm');
	}
  }

  public function executeShowRecipes()
  {
    $this->course = CoursePeer::getCourseByName($this->getRequestParameter('course_nm'));
    $this->forward404Unless($this->course);
    $this->recipes = $this->course->getRecipes();
  }
  public function handleErrorUpdate()
  {  
  	$this->forward('course_adm', 'edit');
  } 	 
}

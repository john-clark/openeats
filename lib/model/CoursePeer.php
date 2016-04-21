<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

  // include base peer class
  require_once 'lib/model/om/BaseCoursePeer.php';
  
  // include object class
  include_once 'lib/model/Course.php';


/**
 * Skeleton subclass for performing query and update operations on the 'course' table.
 *
 * 
 *
 * @package model
 */	

class CoursePeer extends BaseCoursePeer {
	
	public static function getCourseNm()
	{
		$courses = self::doSelect(new Criteria());
		$coursenm_array = array();
		foreach ($courses as $course)
		{
			$coursenm_array[$course->getCourseId()] = $course->getCourseNm();
		}
		return $coursenm_array;
	}
	
	public static function getCourseByName($name)
	{
	   $c = new Criteria();
	   $c->add(CoursePeer::COURSE_NM, $name);
	   return CoursePeer::doSelectOne($c);
	}

} 

<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'lib/model/om/BaseCourse.php';


/**
 * Skeleton subclass for representing a row from the 'course' table.
 *
 *
 * @package model
 */	

class Course extends BaseCourse { 
	
  public function __toString()
   {
    	return $this->getCourseNm();
   }

} 

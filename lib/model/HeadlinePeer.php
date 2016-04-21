<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

  // include base peer class
  require_once 'lib/model/om/BaseHeadlinePeer.php';
  
  // include object class
  include_once 'lib/model/Headline.php';


/**
 * Skeleton subclass for performing query and update operations on the 'headline' table.
 *
 * 
 *
 * @package model
 */	
class HeadlinePeer extends BaseHeadlinePeer {

	/**
	 * Get the headline from the stripped title passed via links
	 *
	 * @param $title stripped title passed from links
	 * @return headline object
	 */
	
	public static function getHeadlineFromStripTitle($title)
	{
		$c = new Criteria;
        $c->add(HeadlinePeer::HEADLINE_STRIP_TITLE, $title);
        $c->add(HeadlinePeer::HEADLINE_TYPE, 'headline');
        return HeadlinePeer::doSelectOne($c);
	}
    public static function getHeadlineFromType($type)
    {
	   $c = new Criteria;
	   $c->add(self::HEADLINE_TYPE, $type);
	   return self::doSelectOne($c);
    }

    public static function getHeadline()
    {
	    $c = new Criteria();
		$c->addDescendingOrderByColumn(self::CREATED_AT);
		$c->add(self::HEADLINE_TYPE, 'headline');
	    return self::doSelect($c); 
    }

} 

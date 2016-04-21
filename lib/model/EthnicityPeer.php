<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

  // include base peer class
  require_once 'lib/model/om/BaseEthnicityPeer.php';
  
  // include object class
  include_once 'lib/model/Ethnicity.php';


/**
 * Skeleton subclass for performing query and update operations on the 'ethnicity' table.
 *
  *
 * @package model
 */	

class EthnicityPeer extends BaseEthnicityPeer {
	
	public static function getEthnByName($name)
	{
	   $c = new Criteria();
	   $c->add(EthnicityPeer::ETHNICITY_NM, $name);
	   return EthnicityPeer::doSelectOne($c);
	}
}
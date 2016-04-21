<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'lib/model/om/BaseRate.php';


/**
 * Skeleton subclass for representing a row from the 'rate' table.
 *
 *
 * @package model
 */	
class Rate extends BaseRate {

 /**
  * Update the average rate in the recipe table and if it is not complete roll back
  *
  * @param $con connect to the database
  * @return unknown
  */
	
  public function save($con = null)
  {

    //get the database connection
  	$con = Propel::getConnection();
    try
    {
      $con->begin();

      $ret = parent::save($con);

      // update average_vote in recipe table
      $c = new Criteria();
      $c->add(RatePeer::RECIPE_ID, $this->getRecipeId());
      $rates = RatePeer::doSelect($c);

      $sum_of_rates = 0;
      foreach($rates as $rate)
      {
        $sum_of_rates += $rate->getRate();
      }

      $this->getRecipe()->setAverageRating($sum_of_rates / count($rates));
      $this->getRecipe()->save($con);

      $con->commit();

      return $ret;
    }
    catch (Exception $e)
    {
      $con->rollback();
      throw $e;
    }
  }
} 

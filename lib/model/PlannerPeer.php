<?php
/*
 * This file is part of the OpenEats package.
 * (c) 2008 OpenEats
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for performing query and update operations on the 'planner' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PlannerPeer extends BasePlannerPeer
{
	public static function getRecipePlannerForUser($id)
	{
		$c = new Criteria();
		$c->add(self::USER_ID, $id);
		$c->add(self::MENU_ID, null, CRITERIA::ISNULL);
		return self::doSelect($c);
	}
	
	public static function getMenuPlannerForUser($id)
	{
		$c = new Criteria();
		$c->add(self::USER_ID, $id);
		$c->add(self::RECIPE_ID, null, CRITERIA::ISNULL);
		return self::doSelect($c);
	}
	
	public static function getLastPlanned($user_id, $recipe_id)
	{
		$c = new Criteria();
	    $c->add(self::USER_ID, $user_id);
		$c->add(self::RECIPE_ID, $recipe_id);
	    $c->addDescendingOrderByColumn(self::PLANNER_DATE);
		$c->setLimit(1);
		return self::doSelectOne($c);
	}
}

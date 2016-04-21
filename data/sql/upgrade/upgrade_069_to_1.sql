CREATE TABLE `grocery_exclude` (
  `EXCLUDE_ID` int(11) NOT NULL auto_increment,
  `GROCERY_ITEM` varchar(255) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY  (`EXCLUDE_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB;

ALTER TABLE `grocery_exclude` ADD CONSTRAINT `grocery_exclude_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `grocery_item` CHANGE `QTY` `QTY` TINYINT( 5 ) NULL DEFAULT NULL;  
ALTER TABLE `grocery_item` ADD `MSRMT` VARCHAR( 15 ) NULL AFTER `QTY` ;


CREATE TABLE `grocery_master` (
  `MASTER_ID` int(11) NOT NULL auto_increment,
  `QTY` tinyint(5) default NULL,
  `MSRMT` varchar(15) default NULL,
  `GROCERY_ITEM` varchar(255) NOT NULL,
  `AISLE_ID` int(11) default NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY  (`MASTER_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `AISLE_ID` (`AISLE_ID`)
) ENGINE=InnoDB;

ALTER TABLE `grocery_master`
  ADD CONSTRAINT `grocery_master_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grocery_master_ibfk_2` FOREIGN KEY (`AISLE_ID`) REFERENCES `grocery_aisle` (`AISLE_ID`) ON UPDATE CASCADE;

UPDATE recipe_ingrd SET INGRD_MSRMT="teaspoon" WHERE INGRD_MSRMT="teaspoon(s)";
UPDATE recipe_ingrd SET INGRD_MSRMT="package" WHERE INGRD_MSRMT="package(s)";
UPDATE recipe_ingrd SET INGRD_MSRMT="tablespoon" WHERE INGRD_MSRMT="tablespoon(s)";
UPDATE recipe_ingrd SET INGRD_MSRMT="cup" WHERE INGRD_MSRMT="cup(s)";
UPDATE recipe_ingrd SET INGRD_MSRMT="can" WHERE INGRD_MSRMT="can(s)";
UPDATE recipe_ingrd SET INGRD_MSRMT="gallon" WHERE INGRD_MSRMT="gallon(s)";
UPDATE recipe_ingrd SET INGRD_MSRMT="pint" WHERE INGRD_MSRMT="pint(s)";
UPDATE recipe_ingrd SET INGRD_MSRMT="quart" WHERE INGRD_MSRMT="quart(s)";
UPDATE recipe_ingrd SET INGRD_MSRMT="ounce" WHERE INGRD_MSRMT="ounce(s)";
UPDATE recipe_ingrd SET INGRD_MSRMT="clove" WHERE INGRD_MSRMT="clove(s)";
UPDATE recipe_ingrd SET INGRD_MSRMT="pound" WHERE INGRD_MSRMT="pound(s)";

ALTER TABLE `user` ADD `planner_private` TINYINT( 1 ) NULL ;
ALTER TABLE `menu` ADD `MENU_PRIVATE` TINYINT( 1 ) NULL AFTER `MENU_DESC` ;

INSERT INTO `headline` VALUES (NULL, 'OpenEats Disclaimer', 'openeats_disclaimer', '', '<p>OpenEats or the author of recipes are not liable for anything that happens during any phase of following a recipe, including but not limited to preparation and consuming.</p> <br /> <p>Recipes can not be copyrighted.  A list of ingredients and the method to combine and cook them can not be copyrighted Only the literary expression associated with a recipe, such as what you write in the description field, can be copyrighted.  If the directions and description are in your own words then the recipe is yours.  Please refrain from copying this information from another site and pasted it here.  Those types of recipes that are reported will be removed.</p>', 'disclaimer', NULL);
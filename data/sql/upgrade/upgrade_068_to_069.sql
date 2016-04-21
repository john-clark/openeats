CREATE TABLE `grocerylist` (
  `GROCERY_ID` int(11) NOT NULL auto_increment,
  `GROCERY_NM` varchar(255) NOT NULL,
  `GROCERY_STRIP_NM` varchar(255) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CREATED_AT` date default NULL,
  PRIMARY KEY  (`GROCERY_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB;

ALTER TABLE `grocerylist`
  ADD CONSTRAINT `grocerylist_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `grocery_aisle` (
  `AISLE_ID` int(11) NOT NULL auto_increment,
  `AISLE` varchar(25) NOT NULL,
  PRIMARY KEY  (`AISLE_ID`)
) ENGINE=InnoDB;

CREATE TABLE `grocery_item` (
  `GROCERY_ITEM_ID` int(11) NOT NULL auto_increment,
  `GROCERY_ID` int(11) NOT NULL,
  `GROCERY_ITEM` varchar(255) NOT NULL,
  `AISLE_ID` int(11) default NULL,
  PRIMARY KEY  (`GROCERY_ITEM_ID`),
  KEY `GROCERY_ID` (`GROCERY_ID`),
  KEY `AISLE_ID` (`AISLE_ID`)
) ENGINE=InnoDB;

ALTER TABLE `grocery_item`
  ADD CONSTRAINT `grocery_item_ibfk_1` FOREIGN KEY (`GROCERY_ID`) REFERENCES `grocerylist` (`GROCERY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grocery_item_ibfk_2` FOREIGN KEY (`AISLE_ID`) REFERENCES `grocery_aisle` (`AISLE_ID`) ON UPDATE CASCADE;

ALTER TABLE `grocery_item` ADD `QTY` VARCHAR( 15 ) NULL AFTER `GROCERY_ID`;

INSERT INTO `grocery_aisle` VALUES (1, 'Bakery');
INSERT INTO `grocery_aisle` VALUES (2, 'Baking Supplies');
INSERT INTO `grocery_aisle` VALUES (3, 'Beverage');
INSERT INTO `grocery_aisle` VALUES (4, 'Cooking');
INSERT INTO `grocery_aisle` VALUES (5, 'Canned Foods');
INSERT INTO `grocery_aisle` VALUES (6, 'Cereals');
INSERT INTO `grocery_aisle` VALUES (7, 'Condiments and Salad Dres');
INSERT INTO `grocery_aisle` VALUES (8, 'Dairy');
INSERT INTO `grocery_aisle` VALUES (9, 'Deli');
INSERT INTO `grocery_aisle` VALUES (10, 'Ethnic Foods');
INSERT INTO `grocery_aisle` VALUES (11, 'Frozen Foods');
INSERT INTO `grocery_aisle` VALUES (12, 'Health and Beauty');
INSERT INTO `grocery_aisle` VALUES (13, 'Household Products');
INSERT INTO `grocery_aisle` VALUES (14, 'Meat Case');
INSERT INTO `grocery_aisle` VALUES (15, 'Organic');
INSERT INTO `grocery_aisle` VALUES (16, 'Other');
INSERT INTO `grocery_aisle` VALUES (17, 'Pasta Rice and Beans');
INSERT INTO `grocery_aisle` VALUES (18, 'Pet Supplies');
INSERT INTO `grocery_aisle` VALUES (19, 'Produce');
INSERT INTO `grocery_aisle` VALUES (20, 'Snacks');
INSERT INTO `grocery_aisle` VALUES (21, 'Soup');

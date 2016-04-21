CREATE TABLE `planner` (
  `PLANNER_ID` int(11) NOT NULL auto_increment,
  `RECIPE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PLANNER_DATE` date default NULL,
  PRIMARY KEY  (`PLANNER_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB;


ALTER TABLE `planner`
  ADD CONSTRAINT `planner_ibfk_1` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planner_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `recipe_ingrd` ADD `INGRD_SEQ` INT( 11 ) NULL AFTER `INGRD_ID`; 


CREATE TABLE `user_recipe_note` (
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `RECIPE_NOTE` text NOT NULL,
  `UPDATED_AT` datetime default NULL,
  PRIMARY KEY  (`USER_ID`,`RECIPE_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `user_recipe_note`
  ADD CONSTRAINT `user_recipe_note_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_recipe_note_ibfk_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

 ALTER TABLE `recipe` CHANGE `AVERAGE_RATING` `AVERAGE_RATING` DOUBLE NOT NULL DEFAULT '0';
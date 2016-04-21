ALTER TABLE `user` CHANGE `USER_LOGIN` `USER_LOGIN` VARCHAR( 20 );
ALTER TABLE `planner` CHANGE `RECIPE_ID` `RECIPE_ID` INT( 11 ) NULL;
ALTER TABLE `planner` ADD `MENU_ID` INT( 11 ) NULL AFTER `RECIPE_ID`;

CREATE TABLE `menu` (
  `MENU_ID` int(11) NOT NULL auto_increment,
  `MENU_NM` varchar(255) NOT NULL,
  `MENU_STRIP_NM` varchar(255) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `MENU_DESC` varchar(255) default NULL,
  `CREATED_AT` date default NULL,
  PRIMARY KEY  (`MENU_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

ALTER TABLE `menu` ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `recipe_menu` (
  `MENU_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  PRIMARY KEY  (`MENU_ID`,`RECIPE_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  KEY `COURSE_ID` (`COURSE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `recipe_menu`
  ADD CONSTRAINT `recipe_menu_ibfk_1` FOREIGN KEY (`MENU_ID`) REFERENCES `menu` (`MENU_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_menu_ibfk_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_menu_ibfk_3` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON UPDATE CASCADE;


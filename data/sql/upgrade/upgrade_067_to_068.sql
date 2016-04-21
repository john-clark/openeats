UPDATE `course` SET `COURSE_NM` = 'Breakfast' WHERE `course`.`COURSE_ID` =2 LIMIT 1 ;
UPDATE `course` SET `COURSE_NM` = 'Appetizer' WHERE `course`.`COURSE_ID` =5 LIMIT 1 ;
UPDATE `course` SET `COURSE_NM` = 'Soup' WHERE `course`.`COURSE_ID` =11 LIMIT 1 ;
UPDATE `course` SET `COURSE_NM` = 'Sauce' WHERE `course`.`COURSE_ID` =13 LIMIT 1 ;
INSERT INTO `course` (`COURSE_ID`, `COURSE_NM`, `COURSE_DESC`) VALUES (NULL, 'Snacks', NULL);

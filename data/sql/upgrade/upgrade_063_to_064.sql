--Create user_recipe_note table to store notes users can create for each recipe


CREATE TABLE `user_recipe_note` (
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `RECIPE_NOTE` text NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  PRIMARY KEY  (`USER_ID`,`RECIPE_ID`)
) ENGINE=InnoDB;

ALTER TABLE user_recipe_note ADD FOREIGN KEY (USER_ID) REFERENCES user(USER_ID) ON DELETE CASCADE ON UPDATE CASCADE
ALTER TABLE user_recipe_note ADD FOREIGN KEY (RECIPE_ID) REFERENCES recipe(RECIPE_ID) ON DELETE CASCADE ON UPDATE CASCADE

---Chad Parry found a bug that a recipe would create but throw an error because the average rating was null this should fix it
 ALTER TABLE `recipe` CHANGE `AVERAGE_RATING` `AVERAGE_RATING` DOUBLE NOT NULL DEFAULT '0' 
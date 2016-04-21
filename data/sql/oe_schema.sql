SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
CREATE TABLE `auth_lvl` (
  `AUTH_LVL_ID` int(11) NOT NULL auto_increment,
  `AUTH_LVL_NM` varchar(20) default NULL,
  PRIMARY KEY  (`AUTH_LVL_ID`)
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `auth_lvl` VALUES (1,'author');
INSERT INTO `auth_lvl` VALUES (2,'administrator');
INSERT INTO `auth_lvl` VALUES (3,'moderator');
CREATE TABLE `course` (
  `COURSE_ID` int(11) NOT NULL auto_increment,
  `COURSE_NM` varchar(50) default NULL,
  `COURSE_DESC` varchar(255) default NULL,
  PRIMARY KEY  (`COURSE_ID`)
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

INSERT INTO `course` VALUES (1,'Entree','');
INSERT INTO `course` VALUES (2,'Breakfast','');
INSERT INTO `course` VALUES (3,'Sandwich',NULL);
INSERT INTO `course` VALUES (4,'Dessert',NULL);
INSERT INTO `course` VALUES (5,'Appetizer',NULL);
INSERT INTO `course` VALUES (7,'Side Dish',NULL);
INSERT INTO `course` VALUES (8,'Beverage',NULL);
INSERT INTO `course` VALUES (10,'Salad',NULL);
INSERT INTO `course` VALUES (11,'Soup',NULL);
INSERT INTO `course` VALUES (12,'Bread',NULL);
INSERT INTO `course` VALUES (13,'Sauce',NULL);
INSERT INTO `course` VALUES (14,'Snacks',NULL);
CREATE TABLE `ethnicity` (
  `ETHNICITY_ID` int(11) NOT NULL auto_increment,
  `ETHNICITY_NM` varchar(25) default NULL,
  `ETHNICITY_DESC` varchar(255) default NULL,
  PRIMARY KEY  (`ETHNICITY_ID`)
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `ethnicity` VALUES (1,'American','');
INSERT INTO `ethnicity` VALUES (2,'Asian','');
INSERT INTO `ethnicity` VALUES (3,'Mexican',NULL);
INSERT INTO `ethnicity` VALUES (4,'Italian',NULL);
INSERT INTO `ethnicity` VALUES (5,'Indian',NULL);
INSERT INTO `ethnicity` VALUES (6,'Mediterranean',NULL);
CREATE TABLE `grocery_aisle` (
  `AISLE_ID` int(11) NOT NULL auto_increment,
  `AISLE` varchar(25) NOT NULL,
  PRIMARY KEY  (`AISLE_ID`)
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

INSERT INTO `grocery_aisle` VALUES (1,'Bakery');
INSERT INTO `grocery_aisle` VALUES (2,'Baking Supplies');
INSERT INTO `grocery_aisle` VALUES (3,'Beverage');
INSERT INTO `grocery_aisle` VALUES (4,'Cooking');
INSERT INTO `grocery_aisle` VALUES (5,'Canned Foods');
INSERT INTO `grocery_aisle` VALUES (6,'Cereals');
INSERT INTO `grocery_aisle` VALUES (7,'Condiments and Salad Dres');
INSERT INTO `grocery_aisle` VALUES (8,'Dairy');
INSERT INTO `grocery_aisle` VALUES (9,'Deli');
INSERT INTO `grocery_aisle` VALUES (10,'Ethnic Foods');
INSERT INTO `grocery_aisle` VALUES (11,'Frozen Foods');
INSERT INTO `grocery_aisle` VALUES (12,'Health and Beauty');
INSERT INTO `grocery_aisle` VALUES (13,'Household Products');
INSERT INTO `grocery_aisle` VALUES (14,'Meat Case');
INSERT INTO `grocery_aisle` VALUES (15,'Organic');
INSERT INTO `grocery_aisle` VALUES (16,'Other');
INSERT INTO `grocery_aisle` VALUES (17,'Pasta Rice and Beans');
INSERT INTO `grocery_aisle` VALUES (18,'Pet Supplies');
INSERT INTO `grocery_aisle` VALUES (19,'Produce');
INSERT INTO `grocery_aisle` VALUES (20,'Snacks');
INSERT INTO `grocery_aisle` VALUES (21,'Soup');
CREATE TABLE `grocery_exclude` (
  `EXCLUDE_ID` int(11) NOT NULL auto_increment ,
  `GROCERY_ITEM` varchar(255) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY  (`EXCLUDE_ID`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `grocery_exclude_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `grocery_item` (
  `GROCERY_ITEM_ID` int(11) NOT NULL auto_increment,
  `GROCERY_ID` int(11) NOT NULL,
  `QTY` varchar(10) default NULL,
  `MSRMT` varchar(15) default NULL,
  `GROCERY_ITEM` varchar(255) NOT NULL,
  `AISLE_ID` int(11) default NULL,
  PRIMARY KEY  (`GROCERY_ITEM_ID`),
  KEY `GROCERY_ID` (`GROCERY_ID`),
  KEY `AISLE_ID` (`AISLE_ID`),
  CONSTRAINT `grocery_item_ibfk_1` FOREIGN KEY (`GROCERY_ID`) REFERENCES `grocerylist` (`GROCERY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `grocery_item_ibfk_2` FOREIGN KEY (`AISLE_ID`) REFERENCES `grocery_aisle` (`AISLE_ID`) ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `grocery_master` (
  `MASTER_ID` int(11) NOT NULL auto_increment,
  `QTY` varchar(10) default NULL,
  `MSRMT` varchar(15) default NULL,
  `GROCERY_ITEM` varchar(255) NOT NULL,
  `AISLE_ID` int(11) default NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY  (`MASTER_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `AISLE_ID` (`AISLE_ID`),
  CONSTRAINT `grocery_master_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `grocery_master_ibfk_2` FOREIGN KEY (`AISLE_ID`) REFERENCES `grocery_aisle` (`AISLE_ID`) ON UPDATE CASCADE
)ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `grocerylist` (
  `GROCERY_ID` int(11) NOT NULL auto_increment,
  `GROCERY_NM` varchar(255) NOT NULL,
  `GROCERY_STRIP_NM` varchar(255) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CREATED_AT` date default NULL,
  PRIMARY KEY  (`GROCERY_ID`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `grocerylist_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `headline` (
  `HEADLINE_ID` int(11) NOT NULL auto_increment,
  `HEADLINE_TITLE` varchar(100) NOT NULL,
  `HEADLINE_STRIP_TITLE` varchar(200) NOT NULL,
  `HEADLINE_INTRO` varchar(2000) NOT NULL,
  `HEADLINE_BODY`  longtext NOT NULL,
  `HEADLINE_TYPE` varchar(50) default NULL,
  `CREATED_AT` datetime NOT NULL,
  PRIMARY KEY  (`HEADLINE_ID`),
  UNIQUE KEY `HEADLINE_TITLE` (`HEADLINE_TITLE`)
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO `headline` VALUES (1,'A Website community to shares recipes','a_website_community_to_shares_recipes','','<p>OpenEats is a community recipe sharing website developed on Open Source software. The project goes beyond the standard recipe sites, allowing you also to plan your meals, rate recipes, apply keywords to recipes, save your favorite recipes and much more. Some of the features are still being developed so if you do not see them now, don\'t worry they are coming.</p>','frontpage','2007-10-21 00:00:00');
INSERT INTO `headline` VALUES (2,'About','about','','<p>OpenEats is an <a target=\"_blank\" href=\"http://www.opensource.org\">Open Source</a> recipe management website. Build on they <a href=\"http://www.symfony-project.com\" target=\"_blank\">symfony </a>PHP Framework&nbsp; A few of OpenEats current features are;</p>\r\n<ul>\r\n    <li>Add your own recipes to share with the communitity</li>\r\n    <li>Search amoung all the recipes others have contributed</li>\r\n    <li>Store your favorite recipes to easily locate later</li>\r\n    <li>Add keywords to recipes so you can associate them to things you understand</li>\r\n    <li>Rate recipes that you try</li>\r\n    <li>Plus many more new features coming in future releases</li>\r\n</ul>\r\n<p>If you would like to help out with the project or just make a suggestion on things you would like to see, head over to the <a href=\"http://www.openeats.org\" target=\"_blank\">Developers Site</a>&nbsp; Or you can visit our <a href=\"http://sourceforge.net/projects/openeats\" target=\"_blank\">SourceForge</a> page</p>','about','2007-10-21 00:00:00');
INSERT INTO `headline` VALUES (3,'OpenEats FAQ','openeats_faq','','<h3>&nbsp;</h3>\r\n<h3>What is OpenEats?</h3>\r\n<p>OpenEats is an Open Source Recipe Management Website where you are free to share your recipes with others, or search for new recipes</p>\r\n<p>&nbsp;</p>\r\n<h3>What is OpenSource?</h3>\r\n<p>Open Source is a way of sharing and giving back. This site is Open Source which means anyone can take the code the site has been created in and use it and change it any way they want. To learn more you can read about <a href=\"http://www.opensource.org/\">OpenSource</a></p>\r\n<p>&nbsp;</p>\r\n<blockquote> </blockquote>\r\n<h3>What is the Symfony Framework?</h3>\r\n<p>Symfony is a great PHP framework that allows people to code PHP websites quick, and effectively with out having to build everything from the ground up. To learn more visit it their site <a href=\"http://symfony-project.com/\">symfony</a></p>\r\n<blockquote> </blockquote><blockquote></blockquote><blockquote><dl id=\"faq\"><dt></dt></dl></blockquote>','faq','2007-10-22 00:00:00');
INSERT INTO `headline` VALUES (4,'OpenEats Installed','openeats_installed','<p>You have succesfully installed the latest version of OpenEats</p>','<p>Thank you for installing OpenEats I hope you enjoy it as much as I did creating it</p>','headline','2007-11-24 15:25:39');
INSERT INTO `headline` VALUES (5,'OpenEats Disclaimer','openeats_disclaimer','','<p>OpenEats or the author of recipes are not liable for anything that happens during any phase of following a recipe, including but not limited to preparation and consuming.</p> <br /> <p>Recipes can not be copyrighted. A list of ingredients and the method to combine and cook them can not be copyrighted Only the literary expression associated with a recipe, such as what you write in the description field, can be copyrighted. If the directions and description are in your own words then the recipe is yours. Please refrain from copying this information from another site and pasted it here. Those types of recipes that are reported will be removed.</p>','disclaimer','2007-11-24 15:25:39');
CREATE TABLE `ingredient` (
  `INGRD_ID` int(11) NOT NULL auto_increment,
  `INGRD_NM` varchar(50) NOT NULL,
  `USER_ID` int(11) default NULL,
  PRIMARY KEY  (`INGRD_ID`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `ingredient_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=470 ;

INSERT INTO `ingredient` VALUES (1,'Adobo chipotle',NULL);
INSERT INTO `ingredient` VALUES (2,'Allspice',NULL);
INSERT INTO `ingredient` VALUES (3,'Aluminum foil',NULL);
INSERT INTO `ingredient` VALUES (4,'Angel hair pasta',NULL);
INSERT INTO `ingredient` VALUES (5,'Apple',NULL);
INSERT INTO `ingredient` VALUES (6,'Applesauce',NULL);
INSERT INTO `ingredient` VALUES (7,'Asparagus',NULL);
INSERT INTO `ingredient` VALUES (8,'Avocado',NULL);
INSERT INTO `ingredient` VALUES (9,'Baby corn',NULL);
INSERT INTO `ingredient` VALUES (10,'Bacon',NULL);
INSERT INTO `ingredient` VALUES (11,'Bacon bits',NULL);
INSERT INTO `ingredient` VALUES (12,'Bag of salad',NULL);
INSERT INTO `ingredient` VALUES (13,'Bagel',NULL);
INSERT INTO `ingredient` VALUES (14,'Baking potato',NULL);
INSERT INTO `ingredient` VALUES (15,'Baking powder',NULL);
INSERT INTO `ingredient` VALUES (16,'Baking soda',NULL);
INSERT INTO `ingredient` VALUES (17,'Balsamic vinegar',NULL);
INSERT INTO `ingredient` VALUES (18,'Banana',NULL);
INSERT INTO `ingredient` VALUES (19,'Barley',NULL);
INSERT INTO `ingredient` VALUES (20,'Basil leaves',NULL);
INSERT INTO `ingredient` VALUES (21,'Basil pesto sauce',NULL);
INSERT INTO `ingredient` VALUES (22,'Bay leaves',NULL);
INSERT INTO `ingredient` VALUES (23,'Beef bouillon',NULL);
INSERT INTO `ingredient` VALUES (24,'Beef brisket',NULL);
INSERT INTO `ingredient` VALUES (25,'Beef chuck roast',NULL);
INSERT INTO `ingredient` VALUES (26,'Beef flank steak',NULL);
INSERT INTO `ingredient` VALUES (27,'Beef flip steak',NULL);
INSERT INTO `ingredient` VALUES (28,'Beef rump roast',NULL);
INSERT INTO `ingredient` VALUES (29,'Beef sirloin tip steak',NULL);
INSERT INTO `ingredient` VALUES (30,'Beef stew meat',NULL);
INSERT INTO `ingredient` VALUES (31,'Biscuits',NULL);
INSERT INTO `ingredient` VALUES (32,'Bisquick',NULL);
INSERT INTO `ingredient` VALUES (33,'Black beans',NULL);
INSERT INTO `ingredient` VALUES (34,'Black pepper',NULL);
INSERT INTO `ingredient` VALUES (35,'Blueberries',NULL);
INSERT INTO `ingredient` VALUES (36,'Bologna',NULL);
INSERT INTO `ingredient` VALUES (37,'Bourbon whiskey',NULL);
INSERT INTO `ingredient` VALUES (38,'Bowtie pasta',NULL);
INSERT INTO `ingredient` VALUES (39,'Bread crumbs',NULL);
INSERT INTO `ingredient` VALUES (40,'Broccoli',NULL);
INSERT INTO `ingredient` VALUES (41,'Brown Mustard',NULL);
INSERT INTO `ingredient` VALUES (42,'Brown sugar',NULL);
INSERT INTO `ingredient` VALUES (43,'Butter',NULL);
INSERT INTO `ingredient` VALUES (44,'Buttermilk',NULL);
INSERT INTO `ingredient` VALUES (45,'Button mushroom',NULL);
INSERT INTO `ingredient` VALUES (46,'Cabbage',NULL);
INSERT INTO `ingredient` VALUES (47,'Canned bamboo shoots',NULL);
INSERT INTO `ingredient` VALUES (48,'Canned green beans',NULL);
INSERT INTO `ingredient` VALUES (49,'Canned minced clams',NULL);
INSERT INTO `ingredient` VALUES (50,'Canned pruned italian tomatos',NULL);
INSERT INTO `ingredient` VALUES (51,'Canned salmon',NULL);
INSERT INTO `ingredient` VALUES (52,'Carrot',NULL);
INSERT INTO `ingredient` VALUES (53,'Cayenne Pepper',NULL);
INSERT INTO `ingredient` VALUES (54,'Ceaser dressing',NULL);
INSERT INTO `ingredient` VALUES (55,'Celery',NULL);
INSERT INTO `ingredient` VALUES (56,'Cereal',NULL);
INSERT INTO `ingredient` VALUES (57,'Cheddar cheese',NULL);
INSERT INTO `ingredient` VALUES (58,'Chicken bouillon',NULL);
INSERT INTO `ingredient` VALUES (59,'Chicken breast',NULL);
INSERT INTO `ingredient` VALUES (60,'Chicken broth',NULL);
INSERT INTO `ingredient` VALUES (61,'Chili powder',NULL);
INSERT INTO `ingredient` VALUES (62,'Chinese five spice',NULL);
INSERT INTO `ingredient` VALUES (63,'Chives',NULL);
INSERT INTO `ingredient` VALUES (64,'Chocolate syrup',NULL);
INSERT INTO `ingredient` VALUES (65,'Cilantro',NULL);
INSERT INTO `ingredient` VALUES (66,'Cinnamon',NULL);
INSERT INTO `ingredient` VALUES (67,'Cloves',NULL);
INSERT INTO `ingredient` VALUES (68,'Coca-cola',NULL);
INSERT INTO `ingredient` VALUES (69,'Cocoa powder',NULL);
INSERT INTO `ingredient` VALUES (70,'Coffee beans',NULL);
INSERT INTO `ingredient` VALUES (71,'Cool whip',NULL);
INSERT INTO `ingredient` VALUES (72,'Corn starch',NULL);
INSERT INTO `ingredient` VALUES (73,'Cornish Game Hens',NULL);
INSERT INTO `ingredient` VALUES (74,'Cornmeal',NULL);
INSERT INTO `ingredient` VALUES (75,'Couscous',NULL);
INSERT INTO `ingredient` VALUES (76,'Cream cheese',NULL);
INSERT INTO `ingredient` VALUES (77,'Cream of chicken soup',NULL);
INSERT INTO `ingredient` VALUES (78,'Cream of mushroom soup',NULL);
INSERT INTO `ingredient` VALUES (79,'Cream of tartar',NULL);
INSERT INTO `ingredient` VALUES (80,'Crescent rolls',NULL);
INSERT INTO `ingredient` VALUES (81,'Crumbled Blue Cheese',NULL);
INSERT INTO `ingredient` VALUES (82,'Cucumber ranch dressing',NULL);
INSERT INTO `ingredient` VALUES (83,'Cumin',NULL);
INSERT INTO `ingredient` VALUES (84,'Curry',NULL);
INSERT INTO `ingredient` VALUES (85,'Dark Kidney Beans',NULL);
INSERT INTO `ingredient` VALUES (86,'Deli chicken',NULL);
INSERT INTO `ingredient` VALUES (87,'Deli ham',NULL);
INSERT INTO `ingredient` VALUES (88,'Deli mustard',NULL);
INSERT INTO `ingredient` VALUES (89,'Deli turkey',NULL);
INSERT INTO `ingredient` VALUES (90,'Diced tomatoes',NULL);
INSERT INTO `ingredient` VALUES (91,'Dill',NULL);
INSERT INTO `ingredient` VALUES (92,'Dry mustard',NULL);
INSERT INTO `ingredient` VALUES (93,'Dry sherry',NULL);
INSERT INTO `ingredient` VALUES (94,'Egg',NULL);
INSERT INTO `ingredient` VALUES (95,'Egg noodles',NULL);
INSERT INTO `ingredient` VALUES (96,'Eggplant',NULL);
INSERT INTO `ingredient` VALUES (97,'Evaporated milk',NULL);
INSERT INTO `ingredient` VALUES (98,'Fajita seasoning mix',NULL);
INSERT INTO `ingredient` VALUES (99,'Fennel seed',NULL);
INSERT INTO `ingredient` VALUES (100,'Feta Cheese',NULL);
INSERT INTO `ingredient` VALUES (101,'Flour',NULL);
INSERT INTO `ingredient` VALUES (102,'French Baquette',NULL);
INSERT INTO `ingredient` VALUES (103,'Frozen corn',NULL);
INSERT INTO `ingredient` VALUES (104,'Frozen peas',NULL);
INSERT INTO `ingredient` VALUES (105,'Garbanzo beans',NULL);
INSERT INTO `ingredient` VALUES (106,'Garlic',NULL);
INSERT INTO `ingredient` VALUES (107,'Garlic powder',NULL);
INSERT INTO `ingredient` VALUES (108,'Garlic Salt',NULL);
INSERT INTO `ingredient` VALUES (109,'Ginger',NULL);
INSERT INTO `ingredient` VALUES (110,'Ginger root',NULL);
INSERT INTO `ingredient` VALUES (111,'Goat Cheese',NULL);
INSERT INTO `ingredient` VALUES (112,'Graham cracker pie crust',NULL);
INSERT INTO `ingredient` VALUES (113,'Granola bar',NULL);
INSERT INTO `ingredient` VALUES (114,'Grape jelly',NULL);
INSERT INTO `ingredient` VALUES (115,'Green beans',NULL);
INSERT INTO `ingredient` VALUES (116,'Green bell pepper',NULL);
INSERT INTO `ingredient` VALUES (117,'Green chili',NULL);
INSERT INTO `ingredient` VALUES (118,'Green onion',NULL);
INSERT INTO `ingredient` VALUES (119,'Green tea',NULL);
INSERT INTO `ingredient` VALUES (120,'Ground beef',NULL);
INSERT INTO `ingredient` VALUES (121,'Ground Pork',NULL);
INSERT INTO `ingredient` VALUES (122,'Ground Turkey',NULL);
INSERT INTO `ingredient` VALUES (123,'Hamburger bun',NULL);
INSERT INTO `ingredient` VALUES (124,'Hazelnut liquor',NULL);
INSERT INTO `ingredient` VALUES (125,'Heavy cream',NULL);
INSERT INTO `ingredient` VALUES (126,'Honey',NULL);
INSERT INTO `ingredient` VALUES (127,'Hot sauce',NULL);
INSERT INTO `ingredient` VALUES (128,'Ice cream',NULL);
INSERT INTO `ingredient` VALUES (129,'Ice cube',NULL);
INSERT INTO `ingredient` VALUES (130,'Italian bread',NULL);
INSERT INTO `ingredient` VALUES (131,'Italian salad dressing',NULL);
INSERT INTO `ingredient` VALUES (132,'Italian seasonings',NULL);
INSERT INTO `ingredient` VALUES (133,'Jalapeno pepper',NULL);
INSERT INTO `ingredient` VALUES (134,'Cranberry sauce',NULL);
INSERT INTO `ingredient` VALUES (135,'Ketchup',NULL);
INSERT INTO `ingredient` VALUES (136,'Kidney beans',NULL);
INSERT INTO `ingredient` VALUES (137,'Kieser Rolls',NULL);
INSERT INTO `ingredient` VALUES (138,'Kirsch',NULL);
INSERT INTO `ingredient` VALUES (139,'Kosher salt',NULL);
INSERT INTO `ingredient` VALUES (140,'Lamb',NULL);
INSERT INTO `ingredient` VALUES (141,'Lambrusco wine',NULL);
INSERT INTO `ingredient` VALUES (142,'Lasagna noodles',NULL);
INSERT INTO `ingredient` VALUES (143,'Lemon',NULL);
INSERT INTO `ingredient` VALUES (144,'Lemon juice',NULL);
INSERT INTO `ingredient` VALUES (145,'Lemon peel',NULL);
INSERT INTO `ingredient` VALUES (146,'Lemon Pepper Seasoning',NULL);
INSERT INTO `ingredient` VALUES (147,'Lemonade',NULL);
INSERT INTO `ingredient` VALUES (148,'Lettuce',NULL);
INSERT INTO `ingredient` VALUES (149,'Light Kidney Beans',NULL);
INSERT INTO `ingredient` VALUES (150,'Lime',NULL);
INSERT INTO `ingredient` VALUES (151,'Lime juice',NULL);
INSERT INTO `ingredient` VALUES (152,'Linguine',NULL);
INSERT INTO `ingredient` VALUES (153,'Macaroni',NULL);
INSERT INTO `ingredient` VALUES (154,'Mango',NULL);
INSERT INTO `ingredient` VALUES (155,'Marachino cherries',NULL);
INSERT INTO `ingredient` VALUES (156,'Marsala wine',NULL);
INSERT INTO `ingredient` VALUES (157,'Mayonnaise',NULL);
INSERT INTO `ingredient` VALUES (158,'Mexican grated cheese',NULL);
INSERT INTO `ingredient` VALUES (159,'Milk',NULL);
INSERT INTO `ingredient` VALUES (160,'Minute Rice',NULL);
INSERT INTO `ingredient` VALUES (161,'Mixed Green Salad',NULL);
INSERT INTO `ingredient` VALUES (162,'Monterey jack cheese',NULL);
INSERT INTO `ingredient` VALUES (163,'Montreal steak spices',NULL);
INSERT INTO `ingredient` VALUES (164,'Mozzarella grated cheese',NULL);
INSERT INTO `ingredient` VALUES (165,'Mozzarella slices',NULL);
INSERT INTO `ingredient` VALUES (166,'Muffin cups',NULL);
INSERT INTO `ingredient` VALUES (167,'Mussels',NULL);
INSERT INTO `ingredient` VALUES (168,'Oatmeal',NULL);
INSERT INTO `ingredient` VALUES (169,'Olive oil',NULL);
INSERT INTO `ingredient` VALUES (170,'Onion Powder',NULL);
INSERT INTO `ingredient` VALUES (171,'Orange juice',NULL);
INSERT INTO `ingredient` VALUES (172,'Oregano',NULL);
INSERT INTO `ingredient` VALUES (173,'Oreo cookies',NULL);
INSERT INTO `ingredient` VALUES (174,'Paprika',NULL);
INSERT INTO `ingredient` VALUES (175,'Parmesan cheese',NULL);
INSERT INTO `ingredient` VALUES (176,'Parsley',NULL);
INSERT INTO `ingredient` VALUES (177,'Parsley flakes',NULL);
INSERT INTO `ingredient` VALUES (178,'Peanut butter',NULL);
INSERT INTO `ingredient` VALUES (179,'Pecans',NULL);
INSERT INTO `ingredient` VALUES (180,'Pickled ginger',NULL);
INSERT INTO `ingredient` VALUES (181,'Pierogies',NULL);
INSERT INTO `ingredient` VALUES (182,'Pitted  Black Olives',NULL);
INSERT INTO `ingredient` VALUES (183,'Pitted Green Olives',NULL);
INSERT INTO `ingredient` VALUES (184,'Pitted Kalameata Olives',NULL);
INSERT INTO `ingredient` VALUES (185,'Pork chops',NULL);
INSERT INTO `ingredient` VALUES (186,'Pork Roast',NULL);
INSERT INTO `ingredient` VALUES (187,'Portobello mushroom',NULL);
INSERT INTO `ingredient` VALUES (188,'Powdered sugar',NULL);
INSERT INTO `ingredient` VALUES (189,'Provolone Cheese',NULL);
INSERT INTO `ingredient` VALUES (190,'Pumpkin pie mix',NULL);
INSERT INTO `ingredient` VALUES (191,'Raspberry preserves',NULL);
INSERT INTO `ingredient` VALUES (192,'Red bell pepper',NULL);
INSERT INTO `ingredient` VALUES (193,'Red cooking wine',NULL);
INSERT INTO `ingredient` VALUES (194,'Red onion',NULL);
INSERT INTO `ingredient` VALUES (195,'Red potato',NULL);
INSERT INTO `ingredient` VALUES (196,'Red wine vinegar',NULL);
INSERT INTO `ingredient` VALUES (197,'Rice vinegar',NULL);
INSERT INTO `ingredient` VALUES (198,'Ricotta cheese',NULL);
INSERT INTO `ingredient` VALUES (199,'Roasting chicken',NULL);
INSERT INTO `ingredient` VALUES (200,'Roma tomato',NULL);
INSERT INTO `ingredient` VALUES (201,'Rosemary',NULL);
INSERT INTO `ingredient` VALUES (202,'Rotini',NULL);
INSERT INTO `ingredient` VALUES (203,'Salsa',NULL);
INSERT INTO `ingredient` VALUES (204,'Salt',NULL);
INSERT INTO `ingredient` VALUES (205,'Sandwich bags',NULL);
INSERT INTO `ingredient` VALUES (206,'Sangria',NULL);
INSERT INTO `ingredient` VALUES (207,'Scallions',NULL);
INSERT INTO `ingredient` VALUES (208,'Scallops',NULL);
INSERT INTO `ingredient` VALUES (209,'Seasoned croutons',NULL);
INSERT INTO `ingredient` VALUES (210,'Semi-sweet baking chocolate',NULL);
INSERT INTO `ingredient` VALUES (211,'Semi-sweet chocolate chips',NULL);
INSERT INTO `ingredient` VALUES (212,'Serrano peppers',NULL);
INSERT INTO `ingredient` VALUES (213,'Shallot',NULL);
INSERT INTO `ingredient` VALUES (214,'Shitake mushroom',NULL);
INSERT INTO `ingredient` VALUES (215,'Shortening',NULL);
INSERT INTO `ingredient` VALUES (216,'Shreaded Mexican Cheese',NULL);
INSERT INTO `ingredient` VALUES (217,'Skinless salmon fillet',NULL);
INSERT INTO `ingredient` VALUES (218,'Smoked salmon',NULL);
INSERT INTO `ingredient` VALUES (219,'Snow pea pods',NULL);
INSERT INTO `ingredient` VALUES (220,'Sorbet',NULL);
INSERT INTO `ingredient` VALUES (221,'Sour cherries',NULL);
INSERT INTO `ingredient` VALUES (222,'Sour cream',NULL);
INSERT INTO `ingredient` VALUES (223,'Soy sauce',NULL);
INSERT INTO `ingredient` VALUES (224,'Spinach',NULL);
INSERT INTO `ingredient` VALUES (225,'Stewed Tomatos',NULL);
INSERT INTO `ingredient` VALUES (226,'Strawberries',NULL);
INSERT INTO `ingredient` VALUES (227,'Strawberry wine',NULL);
INSERT INTO `ingredient` VALUES (228,'Stuffing mix',NULL);
INSERT INTO `ingredient` VALUES (229,'Sugar',NULL);
INSERT INTO `ingredient` VALUES (230,'Summer squash',NULL);
INSERT INTO `ingredient` VALUES (231,'Sun Dried Tomatos',NULL);
INSERT INTO `ingredient` VALUES (232,'Sushi rice',NULL);
INSERT INTO `ingredient` VALUES (233,'Sushi seaweed',NULL);
INSERT INTO `ingredient` VALUES (234,'Sweet pea pods',NULL);
INSERT INTO `ingredient` VALUES (235,'Sweet potato',NULL);
INSERT INTO `ingredient` VALUES (236,'Swiss cheese',NULL);
INSERT INTO `ingredient` VALUES (237,'Syrup',NULL);
INSERT INTO `ingredient` VALUES (238,'Taco Seasoning',NULL);
INSERT INTO `ingredient` VALUES (239,'Tapenade',NULL);
INSERT INTO `ingredient` VALUES (240,'Tarragon',NULL);
INSERT INTO `ingredient` VALUES (241,'Tea bags',NULL);
INSERT INTO `ingredient` VALUES (242,'Teriyaki sauce',NULL);
INSERT INTO `ingredient` VALUES (243,'Tiger Shrimp',NULL);
INSERT INTO `ingredient` VALUES (244,'Tomato',NULL);
INSERT INTO `ingredient` VALUES (245,'Tomato Juice',NULL);
INSERT INTO `ingredient` VALUES (246,'Tomato paste',NULL);
INSERT INTO `ingredient` VALUES (247,'Tomato sauce',NULL);
INSERT INTO `ingredient` VALUES (248,'Tortellini',NULL);
INSERT INTO `ingredient` VALUES (249,'Tortila Chips',NULL);
INSERT INTO `ingredient` VALUES (250,'Tortillas',NULL);
INSERT INTO `ingredient` VALUES (251,'Turkey sausage',NULL);
INSERT INTO `ingredient` VALUES (252,'Turmeric',NULL);
INSERT INTO `ingredient` VALUES (253,'Unsweetened baking chocolate',NULL);
INSERT INTO `ingredient` VALUES (254,'Vanilla extract',NULL);
INSERT INTO `ingredient` VALUES (255,'Vegetable broth',NULL);
INSERT INTO `ingredient` VALUES (256,'Vegetable oil',NULL);
INSERT INTO `ingredient` VALUES (257,'Walnuts',NULL);
INSERT INTO `ingredient` VALUES (258,'Wasabi',NULL);
INSERT INTO `ingredient` VALUES (259,'Water',NULL);
INSERT INTO `ingredient` VALUES (260,'Water chestnuts',NULL);
INSERT INTO `ingredient` VALUES (261,'Wheat bread',NULL);
INSERT INTO `ingredient` VALUES (262,'Whipped cream',NULL);
INSERT INTO `ingredient` VALUES (263,'White bread',NULL);
INSERT INTO `ingredient` VALUES (264,'White chocolate chips',NULL);
INSERT INTO `ingredient` VALUES (265,'White cooking wine',NULL);
INSERT INTO `ingredient` VALUES (266,'White onion',NULL);
INSERT INTO `ingredient` VALUES (267,'White rice',NULL);
INSERT INTO `ingredient` VALUES (268,'White vinegar',NULL);
INSERT INTO `ingredient` VALUES (269,'Wild rice',NULL);
INSERT INTO `ingredient` VALUES (270,'Worcestershire sauce',NULL);
INSERT INTO `ingredient` VALUES (271,'Yellow onion',NULL);
INSERT INTO `ingredient` VALUES (272,'Yogurt',NULL);
INSERT INTO `ingredient` VALUES (274,'White Pepper',NULL);
INSERT INTO `ingredient` VALUES (275,'Whole wheat flour',NULL);
INSERT INTO `ingredient` VALUES (276,'Sea salt',NULL);
INSERT INTO `ingredient` VALUES (277,'Kiwi fruit',NULL);
INSERT INTO `ingredient` VALUES (278,'Crawfish',NULL);
INSERT INTO `ingredient` VALUES (280,'Catfish',NULL);
INSERT INTO `ingredient` VALUES (360,'Mrs dash',NULL);
INSERT INTO `ingredient` VALUES (361,'Romaine lettuce',NULL);
INSERT INTO `ingredient` VALUES (438,'Peppermint baking chips',NULL);
INSERT INTO `ingredient` VALUES (445,'Peppermint extract',NULL);
INSERT INTO `ingredient` VALUES (452,'Mini chocolate chips',NULL);
INSERT INTO `ingredient` VALUES (453,'Graham crackers',NULL);
INSERT INTO `ingredient` VALUES (459,'Onion bun',NULL);
INSERT INTO `ingredient` VALUES (460,'Brie',NULL);
INSERT INTO `ingredient` VALUES (461,'Pork',NULL);
INSERT INTO `ingredient` VALUES (462,'Test',NULL);
INSERT INTO `ingredient` VALUES (463,'Oats',NULL);
INSERT INTO `ingredient` VALUES (464,'Almonds',NULL);
INSERT INTO `ingredient` VALUES (465,'Cashews',NULL);
INSERT INTO `ingredient` VALUES (466,'Coconut',NULL);
INSERT INTO `ingredient` VALUES (467,'Maple syrup',NULL);
INSERT INTO `ingredient` VALUES (468,'Raisins',NULL);
INSERT INTO `ingredient` VALUES (469,'Beef',NULL);
CREATE TABLE `menu` (
  `MENU_ID` int(11) NOT NULL auto_increment,
  `MENU_NM` varchar(255) NOT NULL,
  `MENU_STRIP_NM` varchar(255) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `MENU_DESC` varchar(255) default NULL,
  `MENU_PRIVATE` tinyint(1) default NULL,
  `CREATED_AT` date default NULL,
  PRIMARY KEY  (`MENU_ID`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `planner` (
  `PLANNER_ID` int(11) NOT NULL auto_increment,
  `RECIPE_ID` int(11) default NULL,
  `MENU_ID` int(11) default NULL,
  `USER_ID` int(11) NOT NULL,
  `PLANNER_DATE` date default NULL,
  PRIMARY KEY  (`PLANNER_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `planner_ibfk_1` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `planner_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `rate` (
  `RATE_ID` int(11) NOT NULL auto_increment,
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `RATE` int(11) NOT NULL,
  `CREATED_AT` datetime default '0000-00-00 00:00:00',
  PRIMARY KEY  (`RATE_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  CONSTRAINT `rate_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rate_FK_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `rate_suggestion` (
  `USER_ID` int(11) NOT NULL,
  `SUGGESTION_ID` int(11) NOT NULL,
  `RATE` varchar(20) NOT NULL,
  `CREATED_AT` datetime default '0000-00-00 00:00:00',
  PRIMARY KEY  (`USER_ID`,`SUGGESTION_ID`),
  KEY `SUGGESTION_ID` (`SUGGESTION_ID`),
  CONSTRAINT `rate_suggestion_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rate_suggestion_FK_2` FOREIGN KEY (`SUGGESTION_ID`) REFERENCES `recipe_suggestion` (`SUGGESTION_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `recipe` (
  `RECIPE_ID` int(11) NOT NULL auto_increment,
  `RECIPE_STRIP_NM` varchar(255) NOT NULL default '',
  `RECIPE_NM` varchar(255) NOT NULL default '',
  `RECIPE_DESC` varchar(2000) NOT NULL default '',
  `RECIPE_PREP_TM` varchar(50) NOT NULL default '',
  `RECIPE_COOK_TM` varchar(50) default NULL,
  `RECIPE_SRVGS` int(11) default NULL,
  `RECIPE_SRVG_SZ` varchar(25) default NULL,
  `RECIPE_DIRECTIONS` varchar(4000) default NULL,
  `RECIPE_PICTURE` varchar(400) default NULL,
  `USER_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `ETHNICITY_ID` int(11) NOT NULL,
  `BASE` varchar(20) default NULL,
  `AVERAGE_RATING` double NOT NULL default '0',
  `NB_COMMENT` int(11) default NULL,
  `NB_REPORT` int(11) default NULL,
  `NB_SUGGESTION` int(11) default NULL,
  `CREATED_AT` datetime NOT NULL default '0000-00-00 00:00:00',
  `UPDATED_AT` datetime default NULL,
  PRIMARY KEY  (`RECIPE_ID`),
  UNIQUE KEY `RECIPE_STRIP_NM` (`RECIPE_STRIP_NM`),
  KEY `USER_ID` (`USER_ID`),
  KEY `COURSE_ID` (`COURSE_ID`),
  KEY `ETHNICITY_ID` (`ETHNICITY_ID`),
  CONSTRAINT `recipe_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recipe_FK_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON UPDATE CASCADE,
  CONSTRAINT `recipe_FK_3` FOREIGN KEY (`ETHNICITY_ID`) REFERENCES `ethnicity` (`ETHNICITY_ID`) ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `recipe_comment` (
  `COMMENT_ID` int(11) NOT NULL auto_increment,
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `COMMENT` text,
  `CREATED_AT` datetime default NULL,
  PRIMARY KEY  (`COMMENT_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  CONSTRAINT `recipe_comment_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recipe_comment_FK_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `recipe_ingrd` (
  `RECIPE_INGRD_ID` int(11) NOT NULL auto_increment, 
  `RECIPE_ID` int(11) NOT NULL,
  `INGRD_ID` int(11) NOT NULL,
  `INGRD_SEQ` int(11) default NULL,
  `INGRD_PREP` varchar(30) NOT NULL default '',
  `INGRD_MSRMT` varchar(15) NOT NULL default '',
  `INGRD_QTY` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`RECIPE_INGRD_ID`),
  KEY `INGRD_ID` (`INGRD_ID`),
  CONSTRAINT `recipe_ingrd_FK_1` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recipe_ingrd_FK_2` FOREIGN KEY (`INGRD_ID`) REFERENCES `ingredient` (`INGRD_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `recipe_keyword` (
  `RECIPE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `KEYWORD` varchar(100) NOT NULL default '',
  `NORMALIZED_KEYWORD` varchar(100) NOT NULL default '',
  `CREATED_AT` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`RECIPE_ID`,`USER_ID`,`NORMALIZED_KEYWORD`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `recipe_keyword_FK_1` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recipe_keyword_FK_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `recipe_menu` (
  `MENU_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `RECIPE_DESC` varchar(2000) NULL, 
  PRIMARY KEY  (`MENU_ID`,`RECIPE_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  KEY `COURSE_ID` (`COURSE_ID`),
  CONSTRAINT `recipe_menu_ibfk_1` FOREIGN KEY (`MENU_ID`) REFERENCES `menu` (`MENU_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recipe_menu_ibfk_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recipe_menu_ibfk_3` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `recipe_report` (
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`USER_ID`,`RECIPE_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  CONSTRAINT `recipe_report_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recipe_report_FK_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `recipe_suggestion` (
  `SUGGESTION_ID` int(11) NOT NULL auto_increment,
  `RECIPE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `SUGGESTION` text NOT NULL,
  `NB_RATE` int(11) default NULL,
  `CREATED_AT` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`SUGGESTION_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  CONSTRAINT `recipe_suggestion_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recipe_suggestion_FK_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `stored_recipe` (
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  PRIMARY KEY  (`USER_ID`,`RECIPE_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  CONSTRAINT `stored_recipe_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `stored_recipe_FK_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL auto_increment,
  `USER_FN` varchar(15) NOT NULL default '',
  `USER_LN` varchar(20) NOT NULL default '',
  `USER_ABOUT` text,
  `USER_LOGIN` varchar(20) default NULL,
  `USER_PSWD` varchar(40) NOT NULL default '',
  `PSWD_SALT` varchar(32) NOT NULL default '',
  `USER_EMAIL` varchar(255) NOT NULL default '',
  `AUTH_LVL_ID` int(11) NOT NULL,
  `remember_key` varchar(255) default NULL,
  `CREATED_AT` datetime default NULL,
  `UPDATED_AT` datetime default NULL,
  `USER_LASTLOGIN` datetime default NULL,
  `USER_IP` varchar(16) default NULL,
  `planner_private` tinyint(1) default NULL,
  PRIMARY KEY  (`USER_ID`),
  KEY `AUTH_LVL_ID` (`AUTH_LVL_ID`),
  CONSTRAINT `user_FK_1` FOREIGN KEY (`AUTH_LVL_ID`) REFERENCES `auth_lvl` (`AUTH_LVL_ID`) ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `user` VALUES (1,'admin','admin',NULL,'admin','7169133d6210d40b688d02a417ce40b2320bfbe9','6946369b23bbda3395b3fd03c1828bac','',2,NULL,NULL,NULL,NULL,NULL,NULL);
CREATE TABLE `user_recipe_note` (
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `RECIPE_NOTE` text NOT NULL,
  `UPDATED_AT` datetime default NULL,
  PRIMARY KEY  (`USER_ID`,`RECIPE_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  CONSTRAINT `user_recipe_note_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_recipe_note_ibfk_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `menu_item` ( 
	`ITEM_ID` INT( 11 ) NOT NULL AUTO_INCREMENT, 
	`MENU_ID` INT( 11 ) NOT NULL , 
	`COURSE_ID` INT( 11 ) NOT NULL , 
	`ITEM_NM` varchar(100) NOT NULL,
	`ITEM_DESC` VARCHAR( 2000 ) NOT NULL , 
	 PRIMARY KEY ( `ITEM_ID` ) 
	) ENGINE=MYISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
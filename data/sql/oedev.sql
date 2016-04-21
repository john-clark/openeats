-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2009 at 06:58 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oedev`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_lvl`
--

CREATE TABLE `auth_lvl` (
  `AUTH_LVL_ID` int(11) NOT NULL auto_increment,
  `AUTH_LVL_NM` varchar(20) default NULL,
  PRIMARY KEY  (`AUTH_LVL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `auth_lvl`
--

INSERT INTO `auth_lvl` VALUES(1, 'author');
INSERT INTO `auth_lvl` VALUES(2, 'administrator');
INSERT INTO `auth_lvl` VALUES(3, 'moderator');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `COURSE_ID` int(11) NOT NULL auto_increment,
  `COURSE_NM` varchar(50) default NULL,
  `COURSE_DESC` varchar(255) default NULL,
  PRIMARY KEY  (`COURSE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` VALUES(1, 'Entree', '');
INSERT INTO `course` VALUES(2, 'Breakfast', '');
INSERT INTO `course` VALUES(3, 'Sandwich', NULL);
INSERT INTO `course` VALUES(4, 'Dessert', NULL);
INSERT INTO `course` VALUES(5, 'Appetizer', NULL);
INSERT INTO `course` VALUES(7, 'Side Dish', NULL);
INSERT INTO `course` VALUES(8, 'Beverage', NULL);
INSERT INTO `course` VALUES(10, 'Salad', NULL);
INSERT INTO `course` VALUES(11, 'Soup', NULL);
INSERT INTO `course` VALUES(12, 'Bread', NULL);
INSERT INTO `course` VALUES(13, 'Sauce', NULL);
INSERT INTO `course` VALUES(14, 'Snacks', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ethnicity`
--

CREATE TABLE `ethnicity` (
  `ETHNICITY_ID` int(11) NOT NULL auto_increment,
  `ETHNICITY_NM` varchar(25) default NULL,
  `ETHNICITY_DESC` varchar(255) default NULL,
  PRIMARY KEY  (`ETHNICITY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ethnicity`
--

INSERT INTO `ethnicity` VALUES(1, 'American', '');
INSERT INTO `ethnicity` VALUES(2, 'Asian', '');
INSERT INTO `ethnicity` VALUES(3, 'Mexican', NULL);
INSERT INTO `ethnicity` VALUES(4, 'Italian', NULL);
INSERT INTO `ethnicity` VALUES(5, 'Indian', NULL);
INSERT INTO `ethnicity` VALUES(6, 'Mediterranean', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grocerylist`
--

CREATE TABLE `grocerylist` (
  `GROCERY_ID` int(11) NOT NULL auto_increment,
  `GROCERY_NM` varchar(255) NOT NULL,
  `GROCERY_STRIP_NM` varchar(255) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CREATED_AT` date default NULL,
  PRIMARY KEY  (`GROCERY_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `grocerylist`
--

INSERT INTO `grocerylist` VALUES(24, 'abc', 'abc', 1, '2008-09-28');
INSERT INTO `grocerylist` VALUES(28, 'test', 'test', 1, '2009-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `grocery_aisle`
--

CREATE TABLE `grocery_aisle` (
  `AISLE_ID` int(11) NOT NULL auto_increment,
  `AISLE` varchar(25) NOT NULL,
  PRIMARY KEY  (`AISLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `grocery_aisle`
--

INSERT INTO `grocery_aisle` VALUES(1, 'Bakery');
INSERT INTO `grocery_aisle` VALUES(2, 'Baking Supplies');
INSERT INTO `grocery_aisle` VALUES(3, 'Beverage');
INSERT INTO `grocery_aisle` VALUES(4, 'Cooking');
INSERT INTO `grocery_aisle` VALUES(5, 'Canned Foods');
INSERT INTO `grocery_aisle` VALUES(6, 'Cereals');
INSERT INTO `grocery_aisle` VALUES(7, 'Condiments and Salad Dres');
INSERT INTO `grocery_aisle` VALUES(8, 'Dairy');
INSERT INTO `grocery_aisle` VALUES(9, 'Deli');
INSERT INTO `grocery_aisle` VALUES(10, 'Ethnic Foods');
INSERT INTO `grocery_aisle` VALUES(11, 'Frozen Foods');
INSERT INTO `grocery_aisle` VALUES(12, 'Health and Beauty');
INSERT INTO `grocery_aisle` VALUES(13, 'Household Products');
INSERT INTO `grocery_aisle` VALUES(14, 'Meat Case');
INSERT INTO `grocery_aisle` VALUES(15, 'Organic');
INSERT INTO `grocery_aisle` VALUES(16, 'Other');
INSERT INTO `grocery_aisle` VALUES(17, 'Pasta Rice and Beans');
INSERT INTO `grocery_aisle` VALUES(18, 'Pet Supplies');
INSERT INTO `grocery_aisle` VALUES(19, 'Produce');
INSERT INTO `grocery_aisle` VALUES(20, 'Snacks');
INSERT INTO `grocery_aisle` VALUES(21, 'Soup');

-- --------------------------------------------------------

--
-- Table structure for table `grocery_exclude`
--

CREATE TABLE `grocery_exclude` (
  `EXCLUDE_ID` int(11) NOT NULL auto_increment,
  `GROCERY_ITEM` varchar(255) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY  (`EXCLUDE_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grocery_exclude`
--

INSERT INTO `grocery_exclude` VALUES(1, 'Tapenade', 1);
INSERT INTO `grocery_exclude` VALUES(2, 'Ddda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grocery_item`
--

CREATE TABLE `grocery_item` (
  `GROCERY_ITEM_ID` int(11) NOT NULL auto_increment,
  `GROCERY_ID` int(11) NOT NULL,
  `QTY` varchar(10) default NULL,
  `MSRMT` varchar(15) default NULL,
  `GROCERY_ITEM` varchar(255) NOT NULL,
  `AISLE_ID` int(11) default NULL,
  PRIMARY KEY  (`GROCERY_ITEM_ID`),
  KEY `GROCERY_ID` (`GROCERY_ID`),
  KEY `AISLE_ID` (`AISLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `grocery_item`
--

INSERT INTO `grocery_item` VALUES(40, 24, '1', 'dash', 'Taco Seasoning', 2);
INSERT INTO `grocery_item` VALUES(55, 28, '1', '', 'Lime', 3);
INSERT INTO `grocery_item` VALUES(56, 28, '4', 'teaspoons', 'Sugar', 7);
INSERT INTO `grocery_item` VALUES(57, 28, '1 1/2', 'ounce', 'Rum', 5);
INSERT INTO `grocery_item` VALUES(58, 28, '12', 'whole', 'Spearmint leaves', 3);
INSERT INTO `grocery_item` VALUES(59, 28, '7', 'ounce', 'Club soda', 18);
INSERT INTO `grocery_item` VALUES(60, 28, '3', '', 'Pariffin wax', NULL);
INSERT INTO `grocery_item` VALUES(61, 28, '', '', 'Allspice', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grocery_master`
--

CREATE TABLE `grocery_master` (
  `MASTER_ID` int(11) NOT NULL auto_increment,
  `QTY` varchar(10) default NULL,
  `MSRMT` varchar(15) default NULL,
  `GROCERY_ITEM` varchar(255) NOT NULL,
  `AISLE_ID` int(11) default NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY  (`MASTER_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `AISLE_ID` (`AISLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `grocery_master`
--

INSERT INTO `grocery_master` VALUES(1, '2', 'teaspoon(s)', 'Baby cornddd', NULL, 1);
INSERT INTO `grocery_master` VALUES(2, '1', '', 'Bag of salad', 6, 1);
INSERT INTO `grocery_master` VALUES(3, '2', '', 'Dark Kidney Beans', NULL, 1);
INSERT INTO `grocery_master` VALUES(4, '1', 'large', 'Adobo chipotle', 19, 1);
INSERT INTO `grocery_master` VALUES(5, '0', '', 'Allspice', NULL, 1);
INSERT INTO `grocery_master` VALUES(6, '1', 'dash', 'Hamburger bun', 19, 1);
INSERT INTO `grocery_master` VALUES(7, '2', 'bags', 'Sugar', NULL, 1);
INSERT INTO `grocery_master` VALUES(8, '0', '', 'Abcdef', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `headline`
--

CREATE TABLE `headline` (
  `HEADLINE_ID` int(11) NOT NULL auto_increment,
  `HEADLINE_TITLE` varchar(100) NOT NULL,
  `HEADLINE_STRIP_TITLE` varchar(200) NOT NULL,
  `HEADLINE_INTRO` varchar(2000) NOT NULL,
  `HEADLINE_BODY` longtext NOT NULL,
  `HEADLINE_TYPE` varchar(50) default NULL,
  `CREATED_AT` datetime default NULL,
  PRIMARY KEY  (`HEADLINE_ID`),
  UNIQUE KEY `HEADLINE_TITLE` (`HEADLINE_TITLE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `headline`
--

INSERT INTO `headline` VALUES(4, 'RSS Feed added', 'rss_feed_added', 'We have added a new RSS feed for the headline area', 'We hope to expand this into the recipe area, once we figure out which areas people would be most intrested in having an rss feed to.', 'headline', '2006-08-14 18:59:56');
INSERT INTO `headline` VALUES(6, 'Version 0.3.8 released', 'version_0_3_8_released', 'Version 0.3.8 has been released', 'This version adds a RSS feed module.&nbsp; Right now the only RSS feed is for the headline section, but we will be adding more RSS feeds with future releases.&nbsp; We have fixed a few bugs with this release in the recipe and headline module.&nbsp; Also added a print feature to the recipe area.&nbsp; The next release should start the new layout design.&nbsp; Instead of the boring black text on white background.', 'headline', '2006-08-25 19:55:39');
INSERT INTO `headline` VALUES(7, 'Version 0.4.0 Developers Release', 'version_0_4_0_developers_release', 'Much has changed since the last release, for example the layout and template.&nbsp; The front page is a new module I am working on.&nbsp; Instead of listing all the recipes, which was the normal front page, I decided to make a dedicate front page which will grow as the site grows.&nbsp; The biggest change of course is the new template.&nbsp; It is far from finished but it has come along way since the last release.&nbsp; Thanks to', '&nbsp; The biggest change of course is the new template.&nbsp; It is far from finished but it has come along way since the last release.&nbsp;&nbsp; It is based on the Aqueous template found here&nbsp; <a href="http://www.sixshootermedia.com/ostemplates/aqueous/" target="_blank" name="Aqueous">www.sixshootermedia.com/ostemplates/aqueous/</a><br />\r\nOpenEats is looking for more developers and web designers to help move the project along.&nbsp; Please visit <a href="http://www.openeats.org" target="_blank">www.openeats.org</a><br />\r\nFor more information and detials', 'headline', '2006-10-22 16:43:12');
INSERT INTO `headline` VALUES(8, 'Version 0.4.5 Released', 'version_0_4_5_released', 'A new developers release is ready.&nbsp; With many enhancements, bug fixes, and a major upgrade in the framework.', 'Just a few of the things included in this release are;<br />\r\n<br />\r\n<ul>\r\n    <li>Improved user login page<br />\r\n    </li>\r\n    <li>Improved registration page</li>\r\n    <li>Upgraded to Symfony beta 2 framework</li>\r\n    <li>Improved side bar navigation</li>\r\n    <li>Improved edit recipe form with the ability to add new ingredients in the form</li>\r\n    <li>Optimized MySQL queries to speed up the site</li>\r\n    <li>Improved user profile page</li>\r\n    <li>A new add ingredient page in the top nav bar</li>\r\n</ul>', 'headline', '2006-12-26 13:54:40');
INSERT INTO `headline` VALUES(9, 'Version 0.5.9', 'version_0_5_9', '<p>It has been a long time since a new release has came out.&nbsp; I have moved from Ohio to North Carlonia and this has cause some disruption in my life and I have not been able to work on OpenEats as much as I would like.&nbsp; Also our primary server is down, since it is still in Ohio with most of my stuff.&nbsp; Once the house sells in Ohio and I get more settled in the project will be back running at 100%.</p>', '<p>A few of the new features with this release is</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n    <li>Upgraded of the symfony framework to 1.0.5</li>\r\n    <li>Add icon''s to the recipe menu bar</li>\r\n    <li>Fixed several small bugs</li>\r\n    <li>Did a full site test</li>\r\n    <li>Added boxover java script library to show a tooltip, when you place your mouse of a link to a recipe a picutre pops up</li>\r\n    <li>Corrected some database issues</li>\r\n</ul>', 'headline', '2007-07-01 20:16:51');
INSERT INTO `headline` VALUES(10, 'Version 0.6.0', 'version_0_6_0', '<p>We are proud to announce the first Milestone release of OpenEats.&nbsp; This will be the first release that is packaged up and&nbsp; placed on SourceForge.</p>', '<p>This release is a complete basic recipe site.&nbsp; Some of the features are</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n    <li>Add, Modify recipes</li>\r\n    <li>Robust search engine</li>\r\n    <li>Add keywords (tags) to recipes</li>\r\n    <li>Basic Admin backend</li>\r\n    <li>Add comments to recipes</li>\r\n    <li>Add suggestions to recipes</li>\r\n    <li>Rate recipes</li>\r\n    <li>Store your favorite recipes</li>\r\n    <li>Markup syntax for recipe directions</li>\r\n    <li>Add a picture to your recipe</li>\r\n    <li>Email a recipe to a friend</li>\r\n</ul>\r\n<p>Other features planned are, a grocery list, and a scheduler to allow you to schedule on what days you make what recipes, a &quot;side&quot; recommendation based off the main course, and a menu creator</p>\r\n<p>&nbsp;</p>', 'headline', '2007-09-04 17:02:41');
INSERT INTO `headline` VALUES(11, 'Version 0.6.1', 'version_0_6_1', '<p>Fresh off the heels of version 0.6.0 we have released version 0.6.1 with a few improvments.</p>', '<p>To start off we upgraded to symfony 1.0.7, then we changed the code that displays ingredients, which allows us to list more details about the ingredients on a giving recipe when you edit it.&nbsp; Finally we did some work on the pictures.&nbsp; Users are now able to delete a picture they may of put on a recipe and replace it with a better one when they edit their recipe.&nbsp; The admin can use the admin interface to do the same thing for all recipes.&nbsp; Also we added the six newest recipes on the front page.</p>', 'headline', '2007-09-09 18:46:33');
INSERT INTO `headline` VALUES(12, 'A Website community to shares recipes', 'a_website_community_to_shares_recipes', '', '<p>OpenEats is a community recipe sharing website developed on Open Source software. The project goes beyond the standard recipe sites, allowing you also to plan your meals, rate recipes, apply keywords to recipes, save your favorite recipes and much more. Some of the features are still being developed so if you do not see them now, don''t worry they are coming.</p>', 'frontpage', '2007-10-21 00:00:00');
INSERT INTO `headline` VALUES(13, 'About', 'about', '', '<p>OpenEats is an <a target="_blank" href="http://www.opensource.org">Open Source</a> recipe management website. Build on they <a href="http://www.symfony-project.com" target="_blank">symfony </a>PHP Framework&nbsp; A few of OpenEats current features are;</p>\r\n<ul>\r\n    <li>Add your own recipes to share with the communitity</li>\r\n    <li>Search amoung all the recipes others have contributed</li>\r\n    <li>Store your favorite recipes to easily locate later</li>\r\n    <li>Add keywords to recipes so you can associate them to things you understand</li>\r\n    <li>Rate recipes that you try</li>\r\n    <li>Plus many more new features coming in future releases</li>\r\n</ul>\r\n<p>If you would like to help out with the project or just make a suggestion on things you would like to see, head over to the <a href="http://www.openeats.org" target="_blank">Developers Site</a>&nbsp; Or you can visit our <a href="http://sourceforge.net/projects/openeats" target="_blank">SourceForge</a> page</p>', 'about', '2007-10-21 00:00:00');
INSERT INTO `headline` VALUES(14, 'OpenEats FAQ', 'openeats_faq', '', '<h3>&nbsp;</h3>\r\n<h3>What is OpenEats?</h3>\r\n<p>OpenEats is an Open Source Recipe Management Website where you are free to share your recipes with others, or search for new recipes</p>\r\n<p>&nbsp;</p>\r\n<h3>What is OpenSource?</h3>\r\n<p>Open Source is a way of sharing and giving back. This site is Open Source which means anyone can take the code the site has been created in and use it and change it any way they want. To learn more you can read about <a href="http://www.opensource.org/">OpenSource</a></p>\r\n<p>&nbsp;</p>\r\n<blockquote> </blockquote>\r\n<h3>What is the Symfony Framework?</h3>\r\n<p>Symfony is a great PHP framework that allows people to code PHP websites quick, and effectively with out having to build everything from the ground up. To learn more visit it their site <a href="http://symfony-project.com/">symfony</a></p>\r\n<blockquote> </blockquote><blockquote></blockquote><blockquote><dl id="faq"><dt></dt></dl></blockquote>', 'faq', '2007-10-22 00:00:00');
INSERT INTO `headline` VALUES(15, 'Version 0.6.3', 'version_0_6_3', '<p>Yet another release is under our belts.&nbsp; In between playing several new games for the Wii and preparing our computer for the new OS X that is coming out on Friday, we found time to create a new release.&nbsp; With this new release brings some bug fixes and a few small enhancements.</p>', '<p>Their was a bug with the last release 0.6.2 that was pointed out to my by someone who was trying to upgrade from 0.6.1 to 0.6.2.&nbsp; I made a small database change, but didn''t release that database change with the new release, thanks Mark for catching this.&nbsp; This also made me deicde I should include an upgrade doc for everyone who is keeping their releases up to date.&nbsp; So in this release we have added a section to the install doc for putting OpenEats into debug mode, and have added upgrade doc in the doc folder.&nbsp; Also a few new changes with this release are</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n    <li>Added a link to &quot;Create a Recipe&quot; on the top Nav bar.&nbsp; Some people found it hard to find the link to create a new recipe in the side Nav bar so I added one to the top of the page</li>\r\n    <li>Updated some documentation</li>\r\n    <li>The frontpage text was static content, users that are logged in as an admin can now edit the text on the same page and commit it to the database</li>\r\n    <li>The same goes for the FAQ and the About page, so now you can customize your installs more easily with out having to find the template file with the static text</li>\r\n    <li>Upgraded the framework to symfony 1.0.8</li>\r\n</ul>\r\n<p>In the next release I will start laying out one of three major features, grocery list, menus, or schedule.&nbsp; I am not sure how I want to tie all of these pieces togther yet once I have that figured out development will start on one of those features.</p>', 'headline', '2007-10-24 16:32:52');
INSERT INTO `headline` VALUES(16, 'Next Release', 'next_release', '<p>Over the next several releases of OpenEats we will be rolling out some new big features. Starting off with the meal planner.</p>', '<p>The meal planner is going to allow you to schedule out and plan your weekly meals.&nbsp; A few of the planned features of the meal planner are;</p>\r\n<ul>\r\n    <li>Schedule meals</li>\r\n    <li>Drag and drop meals that you have scheduled onto a new date</li>\r\n    <li>If you have a meal scheduled for that day and you login it will take you do the recipe</li>\r\n    <li>Download to ical</li>\r\n    <li>Allow you to schedule the meals on Google''s calander</li>\r\n    <li>Recipes that schedule will automaticly get stored in your recipe box</li>\r\n    <li>Dates will show up next to recipes you have scheduled in the past so you know how long ago&nbsp; you made that recipe</li>\r\n</ul>\r\n<p>This major feature is going to take some work and it won''t be complete for several more releases but in the next release hopefully some of the basic functions will be working.</p>\r\n<p>&nbsp;</p>', 'headline', '2007-10-28 15:09:37');
INSERT INTO `headline` VALUES(17, 'New Release 0.6.4(Cperry)', 'new_release_0_6_4_cperry_', '<p>The new release is out and sadly it does not include the meal planner.&nbsp; This is a bug fix, and enhancement release.&nbsp; Very little of this relase was actually done by me.&nbsp; This is the first release ever where I have not done 100% of the code.&nbsp; A user of OpenEats spent many hours/days working on patches to make OpenEats better and from his hard work spawned a new release.</p>', '<p>Some major bugs where fixed by one Chad Perry with this release<br />\r\n<br />\r\n&nbsp;&nbsp; 1. Corrected a bug where recipe directions where not showing a validation error if the form failed for creating/update a recipe<br />\r\n&nbsp;&nbsp; 2. Corrected a bug where if your search index did not exist then a lot of search functions would fail now the index is checked to exist if it doesn''t then it gets created<br />\r\n&nbsp;&nbsp; 3. Corrected some display issues with the &quot;Add ingredient&quot; row CSS<br />\r\n<br />\r\nChad not only fixed bugs he added some MAJOR enhancements<br />\r\n<br />\r\n&nbsp;&nbsp; 1. On the edit recipe page, the clunky drop down list for recipe ingredients has been replaced with a new and improved auto complete list, now all you have to do is start to type a few letters of your ingredient and if it is in the data base it will be displayed<br />\r\n&nbsp;&nbsp; 2. No longer do you have to click the plus graphic to add a new ingredient row, Chad has replaced this with a bit of code that will automatically create a new row for you after you add an ingredient<br />\r\n&nbsp;&nbsp; 3.&nbsp; No longer do you have to do click an extra link to add an ingredient that was not found, if you type one in on the ingredient field that was not found it will add it for you autmoaticly<br />\r\n&nbsp;&nbsp; 4.&nbsp; Note feature (the only thing I had to do with this release)&nbsp; You can now add personal notes to any recipe that only you can see and have access to.&nbsp; This will come in handy if you changed a recipe in any way, you can write down what you did in your note section and referee to it the next time you make the recipe</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'headline', '2007-11-24 15:25:39');
INSERT INTO `headline` VALUES(18, 'Menus', 'menus', '<p>The work has begun on the &quot;menu&quot; feature.&nbsp; It will be released in the next release and will grow over the period of several other releases.</p>', '<p>As of now some of the features for the menu are going to be</p>\r\n<ul>\r\n    <li>Create custom menus with as many recipes as you would like</li>\r\n    <li>Schedule your menu''s in the all new recipe planner</li>\r\n    <li>Label your menus recipes so you can organize them in the way you want</li>\r\n    <li>Have a layout similar to a menu you see in a restaurantwith the description of the recipe under the recipe name</li>\r\n</ul>', 'headline', '2007-12-31 12:30:47');
INSERT INTO `headline` VALUES(19, 'OpenEats Disclaimer', 'openeats_disclaimer', '', '<p>OpenEats or the author of recipes are not liable for anything that happens during any phase of following a recipe, including but not limited to preparation and consuming.</p> <br /> <p>Recipes can not be copyrighted.  A list of ingredients and the method to combine and cook them can not be copyrighted Only the literary expression associated with a recipe, such as what you write in the description field, can be copyrighted.  If the directions and description are in your own words then the recipe is yours.  Please refrain from copying this information from another site and pasted it here.  Those types of recipes that are reported will be removed.</p>', 'disclaimer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `INGRD_ID` int(11) NOT NULL auto_increment,
  `INGRD_NM` varchar(50) NOT NULL,
  `USER_ID` int(11) default NULL,
  PRIMARY KEY  (`INGRD_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=505 ;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` VALUES(1, 'Adobo chipotle', NULL);
INSERT INTO `ingredient` VALUES(2, 'Allspice', NULL);
INSERT INTO `ingredient` VALUES(3, 'Aluminum foil', NULL);
INSERT INTO `ingredient` VALUES(4, 'Angel hair pasta', NULL);
INSERT INTO `ingredient` VALUES(5, 'Apple', NULL);
INSERT INTO `ingredient` VALUES(6, 'Applesauce', NULL);
INSERT INTO `ingredient` VALUES(7, 'Asparagus', NULL);
INSERT INTO `ingredient` VALUES(8, 'Avocado', NULL);
INSERT INTO `ingredient` VALUES(9, 'Baby corn', NULL);
INSERT INTO `ingredient` VALUES(10, 'Bacon', NULL);
INSERT INTO `ingredient` VALUES(11, 'Bacon bits', NULL);
INSERT INTO `ingredient` VALUES(12, 'Bag of salad', NULL);
INSERT INTO `ingredient` VALUES(13, 'Bagel', NULL);
INSERT INTO `ingredient` VALUES(14, 'Baking potato', NULL);
INSERT INTO `ingredient` VALUES(15, 'Baking powder', NULL);
INSERT INTO `ingredient` VALUES(16, 'Baking soda', NULL);
INSERT INTO `ingredient` VALUES(17, 'Balsamic vinegar', NULL);
INSERT INTO `ingredient` VALUES(18, 'Banana', NULL);
INSERT INTO `ingredient` VALUES(19, 'Barley', NULL);
INSERT INTO `ingredient` VALUES(20, 'Basil leaves', NULL);
INSERT INTO `ingredient` VALUES(21, 'Basil pesto sauce', NULL);
INSERT INTO `ingredient` VALUES(22, 'Bay leaves', NULL);
INSERT INTO `ingredient` VALUES(23, 'Beef bouillon', NULL);
INSERT INTO `ingredient` VALUES(24, 'Beef brisket', NULL);
INSERT INTO `ingredient` VALUES(25, 'Beef chuck roast', NULL);
INSERT INTO `ingredient` VALUES(26, 'Beef flank steak', NULL);
INSERT INTO `ingredient` VALUES(27, 'Beef flip steak', NULL);
INSERT INTO `ingredient` VALUES(28, 'Beef rump roast', NULL);
INSERT INTO `ingredient` VALUES(29, 'Beef sirloin tip steak', NULL);
INSERT INTO `ingredient` VALUES(30, 'Beef stew meat', NULL);
INSERT INTO `ingredient` VALUES(31, 'Biscuits', NULL);
INSERT INTO `ingredient` VALUES(32, 'Bisquick', NULL);
INSERT INTO `ingredient` VALUES(33, 'Black beans', NULL);
INSERT INTO `ingredient` VALUES(34, 'Black pepper', NULL);
INSERT INTO `ingredient` VALUES(35, 'Blueberries', NULL);
INSERT INTO `ingredient` VALUES(36, 'Bologna', NULL);
INSERT INTO `ingredient` VALUES(37, 'Bourbon whiskey', NULL);
INSERT INTO `ingredient` VALUES(38, 'Bowtie pasta', NULL);
INSERT INTO `ingredient` VALUES(39, 'Bread crumbs', NULL);
INSERT INTO `ingredient` VALUES(40, 'Broccoli', NULL);
INSERT INTO `ingredient` VALUES(41, 'Brown Mustard', NULL);
INSERT INTO `ingredient` VALUES(42, 'Brown sugar', NULL);
INSERT INTO `ingredient` VALUES(43, 'Butter', NULL);
INSERT INTO `ingredient` VALUES(44, 'Buttermilk', NULL);
INSERT INTO `ingredient` VALUES(45, 'Button mushroom', NULL);
INSERT INTO `ingredient` VALUES(46, 'Cabbage', NULL);
INSERT INTO `ingredient` VALUES(47, 'Canned bamboo shoots', NULL);
INSERT INTO `ingredient` VALUES(48, 'Canned green beans', NULL);
INSERT INTO `ingredient` VALUES(49, 'Canned minced clams', NULL);
INSERT INTO `ingredient` VALUES(50, 'Canned pruned italian tomatos', NULL);
INSERT INTO `ingredient` VALUES(51, 'Canned salmon', NULL);
INSERT INTO `ingredient` VALUES(52, 'Carrot', NULL);
INSERT INTO `ingredient` VALUES(53, 'Cayenne Pepper', NULL);
INSERT INTO `ingredient` VALUES(54, 'Ceaser dressing', NULL);
INSERT INTO `ingredient` VALUES(55, 'Celery', NULL);
INSERT INTO `ingredient` VALUES(56, 'Cereal', NULL);
INSERT INTO `ingredient` VALUES(57, 'Cheddar cheese', NULL);
INSERT INTO `ingredient` VALUES(58, 'Chicken bouillon', NULL);
INSERT INTO `ingredient` VALUES(59, 'Chicken breast', NULL);
INSERT INTO `ingredient` VALUES(60, 'Chicken broth', NULL);
INSERT INTO `ingredient` VALUES(61, 'Chili powder', NULL);
INSERT INTO `ingredient` VALUES(62, 'Chinese five spice', NULL);
INSERT INTO `ingredient` VALUES(63, 'Chives', NULL);
INSERT INTO `ingredient` VALUES(64, 'Chocolate syrup', NULL);
INSERT INTO `ingredient` VALUES(65, 'Cilantro', NULL);
INSERT INTO `ingredient` VALUES(66, 'Cinnamon', NULL);
INSERT INTO `ingredient` VALUES(67, 'Cloves', NULL);
INSERT INTO `ingredient` VALUES(68, 'Coca-cola', NULL);
INSERT INTO `ingredient` VALUES(69, 'Cocoa powder', NULL);
INSERT INTO `ingredient` VALUES(70, 'Coffee beans', NULL);
INSERT INTO `ingredient` VALUES(71, 'Cool whip', NULL);
INSERT INTO `ingredient` VALUES(72, 'Corn starch', NULL);
INSERT INTO `ingredient` VALUES(73, 'Cornish Game Hens', NULL);
INSERT INTO `ingredient` VALUES(74, 'Cornmeal', NULL);
INSERT INTO `ingredient` VALUES(75, 'Couscous', NULL);
INSERT INTO `ingredient` VALUES(76, 'Cream cheese', NULL);
INSERT INTO `ingredient` VALUES(77, 'Cream of chicken soup', NULL);
INSERT INTO `ingredient` VALUES(78, 'Cream of mushroom soup', NULL);
INSERT INTO `ingredient` VALUES(79, 'Cream of tartar', NULL);
INSERT INTO `ingredient` VALUES(80, 'Crescent rolls', NULL);
INSERT INTO `ingredient` VALUES(81, 'Crumbled Blue Cheese', NULL);
INSERT INTO `ingredient` VALUES(82, 'Cucumber ranch dressing', NULL);
INSERT INTO `ingredient` VALUES(83, 'Cumin', NULL);
INSERT INTO `ingredient` VALUES(84, 'Curry', NULL);
INSERT INTO `ingredient` VALUES(85, 'Dark Kidney Beans', NULL);
INSERT INTO `ingredient` VALUES(86, 'Deli chicken', NULL);
INSERT INTO `ingredient` VALUES(87, 'Deli ham', NULL);
INSERT INTO `ingredient` VALUES(88, 'Deli mustard', NULL);
INSERT INTO `ingredient` VALUES(89, 'Deli turkey', NULL);
INSERT INTO `ingredient` VALUES(90, 'Diced tomatoes', NULL);
INSERT INTO `ingredient` VALUES(91, 'Dill', NULL);
INSERT INTO `ingredient` VALUES(92, 'Dry mustard', NULL);
INSERT INTO `ingredient` VALUES(93, 'Dry sherry', NULL);
INSERT INTO `ingredient` VALUES(94, 'Egg', NULL);
INSERT INTO `ingredient` VALUES(95, 'Egg noodles', NULL);
INSERT INTO `ingredient` VALUES(96, 'Eggplant', NULL);
INSERT INTO `ingredient` VALUES(97, 'Evaporated milk', NULL);
INSERT INTO `ingredient` VALUES(98, 'Fajita seasoning mix', NULL);
INSERT INTO `ingredient` VALUES(99, 'Fennel seed', NULL);
INSERT INTO `ingredient` VALUES(100, 'Feta Cheese', NULL);
INSERT INTO `ingredient` VALUES(101, 'Flour', NULL);
INSERT INTO `ingredient` VALUES(102, 'French Baquette', NULL);
INSERT INTO `ingredient` VALUES(103, 'Frozen corn', NULL);
INSERT INTO `ingredient` VALUES(104, 'Frozen peas', NULL);
INSERT INTO `ingredient` VALUES(105, 'Garbanzo beans', NULL);
INSERT INTO `ingredient` VALUES(106, 'Garlic', NULL);
INSERT INTO `ingredient` VALUES(107, 'Garlic powder', NULL);
INSERT INTO `ingredient` VALUES(108, 'Garlic Salt', NULL);
INSERT INTO `ingredient` VALUES(109, 'Ginger', NULL);
INSERT INTO `ingredient` VALUES(110, 'Ginger root', NULL);
INSERT INTO `ingredient` VALUES(111, 'Goat Cheese', NULL);
INSERT INTO `ingredient` VALUES(112, 'Graham cracker pie crust', NULL);
INSERT INTO `ingredient` VALUES(113, 'Granola bar', NULL);
INSERT INTO `ingredient` VALUES(114, 'Grape jelly', NULL);
INSERT INTO `ingredient` VALUES(115, 'Green beans', NULL);
INSERT INTO `ingredient` VALUES(116, 'Green bell pepper', NULL);
INSERT INTO `ingredient` VALUES(117, 'Green chili', NULL);
INSERT INTO `ingredient` VALUES(118, 'Green onion', NULL);
INSERT INTO `ingredient` VALUES(119, 'Green tea', NULL);
INSERT INTO `ingredient` VALUES(120, 'Ground beef', NULL);
INSERT INTO `ingredient` VALUES(121, 'Ground Pork', NULL);
INSERT INTO `ingredient` VALUES(122, 'Ground Turkey', NULL);
INSERT INTO `ingredient` VALUES(123, 'Hamburger bun', NULL);
INSERT INTO `ingredient` VALUES(124, 'Hazelnut liquor', NULL);
INSERT INTO `ingredient` VALUES(125, 'Heavy cream', NULL);
INSERT INTO `ingredient` VALUES(126, 'Honey', NULL);
INSERT INTO `ingredient` VALUES(127, 'Hot sauce', NULL);
INSERT INTO `ingredient` VALUES(128, 'Ice cream', NULL);
INSERT INTO `ingredient` VALUES(129, 'Ice cube', NULL);
INSERT INTO `ingredient` VALUES(130, 'Italian bread', NULL);
INSERT INTO `ingredient` VALUES(131, 'Italian salad dressing', NULL);
INSERT INTO `ingredient` VALUES(132, 'Italian seasonings', NULL);
INSERT INTO `ingredient` VALUES(133, 'Jalapeno pepper', NULL);
INSERT INTO `ingredient` VALUES(134, 'Cranberry sauce', NULL);
INSERT INTO `ingredient` VALUES(135, 'Ketchup', NULL);
INSERT INTO `ingredient` VALUES(136, 'Kidney beans', NULL);
INSERT INTO `ingredient` VALUES(137, 'Kieser Rolls', NULL);
INSERT INTO `ingredient` VALUES(138, 'Kirsch', NULL);
INSERT INTO `ingredient` VALUES(139, 'Kosher salt', NULL);
INSERT INTO `ingredient` VALUES(140, 'Lamb', NULL);
INSERT INTO `ingredient` VALUES(141, 'Lambrusco wine', NULL);
INSERT INTO `ingredient` VALUES(142, 'Lasagna noodles', NULL);
INSERT INTO `ingredient` VALUES(143, 'Lemon', NULL);
INSERT INTO `ingredient` VALUES(144, 'Lemon juice', NULL);
INSERT INTO `ingredient` VALUES(145, 'Lemon peel', NULL);
INSERT INTO `ingredient` VALUES(146, 'Lemon Pepper Seasoning', NULL);
INSERT INTO `ingredient` VALUES(147, 'Lemonade', NULL);
INSERT INTO `ingredient` VALUES(148, 'Lettuce', NULL);
INSERT INTO `ingredient` VALUES(149, 'Light Kidney Beans', NULL);
INSERT INTO `ingredient` VALUES(150, 'Lime', NULL);
INSERT INTO `ingredient` VALUES(151, 'Lime juice', NULL);
INSERT INTO `ingredient` VALUES(152, 'Linguine', NULL);
INSERT INTO `ingredient` VALUES(153, 'Macaroni', NULL);
INSERT INTO `ingredient` VALUES(154, 'Mango', NULL);
INSERT INTO `ingredient` VALUES(155, 'Marachino cherries', NULL);
INSERT INTO `ingredient` VALUES(156, 'Marsala wine', NULL);
INSERT INTO `ingredient` VALUES(157, 'Mayonnaise', NULL);
INSERT INTO `ingredient` VALUES(158, 'Mexican grated cheese', NULL);
INSERT INTO `ingredient` VALUES(159, 'Milk', NULL);
INSERT INTO `ingredient` VALUES(160, 'Minute Rice', NULL);
INSERT INTO `ingredient` VALUES(161, 'Mixed Green Salad', NULL);
INSERT INTO `ingredient` VALUES(162, 'Monterey jack cheese', NULL);
INSERT INTO `ingredient` VALUES(163, 'Montreal steak spices', NULL);
INSERT INTO `ingredient` VALUES(164, 'Mozzarella grated cheese', NULL);
INSERT INTO `ingredient` VALUES(165, 'Mozzarella slices', NULL);
INSERT INTO `ingredient` VALUES(166, 'Muffin cups', NULL);
INSERT INTO `ingredient` VALUES(167, 'Mussels', NULL);
INSERT INTO `ingredient` VALUES(168, 'Oatmeal', NULL);
INSERT INTO `ingredient` VALUES(169, 'Olive oil', NULL);
INSERT INTO `ingredient` VALUES(170, 'Onion Powder', NULL);
INSERT INTO `ingredient` VALUES(171, 'Orange juice', NULL);
INSERT INTO `ingredient` VALUES(172, 'Oregano', NULL);
INSERT INTO `ingredient` VALUES(173, 'Oreo cookies', NULL);
INSERT INTO `ingredient` VALUES(174, 'Paprika', NULL);
INSERT INTO `ingredient` VALUES(175, 'Parmesan cheese', NULL);
INSERT INTO `ingredient` VALUES(176, 'Parsley', NULL);
INSERT INTO `ingredient` VALUES(177, 'Parsley flakes', NULL);
INSERT INTO `ingredient` VALUES(178, 'Peanut butter', NULL);
INSERT INTO `ingredient` VALUES(179, 'Pecans', NULL);
INSERT INTO `ingredient` VALUES(180, 'Pickled ginger', NULL);
INSERT INTO `ingredient` VALUES(181, 'Pierogies', NULL);
INSERT INTO `ingredient` VALUES(182, 'Pitted  Black Olives', NULL);
INSERT INTO `ingredient` VALUES(183, 'Pitted Green Olives', NULL);
INSERT INTO `ingredient` VALUES(184, 'Pitted Kalameata Olives', NULL);
INSERT INTO `ingredient` VALUES(185, 'Pork chops', NULL);
INSERT INTO `ingredient` VALUES(186, 'Pork Roast', NULL);
INSERT INTO `ingredient` VALUES(187, 'Portobello mushroom', NULL);
INSERT INTO `ingredient` VALUES(188, 'Powdered sugar', NULL);
INSERT INTO `ingredient` VALUES(189, 'Provolone Cheese', NULL);
INSERT INTO `ingredient` VALUES(190, 'Pumpkin pie mix', NULL);
INSERT INTO `ingredient` VALUES(191, 'Raspberry preserves', NULL);
INSERT INTO `ingredient` VALUES(192, 'Red bell pepper', NULL);
INSERT INTO `ingredient` VALUES(193, 'Red cooking wine', NULL);
INSERT INTO `ingredient` VALUES(194, 'Red onion', NULL);
INSERT INTO `ingredient` VALUES(195, 'Red potato', NULL);
INSERT INTO `ingredient` VALUES(196, 'Red wine vinegar', NULL);
INSERT INTO `ingredient` VALUES(197, 'Rice vinegar', NULL);
INSERT INTO `ingredient` VALUES(198, 'Ricotta cheese', NULL);
INSERT INTO `ingredient` VALUES(199, 'Roasting chicken', NULL);
INSERT INTO `ingredient` VALUES(200, 'Roma tomato', NULL);
INSERT INTO `ingredient` VALUES(201, 'Rosemary', NULL);
INSERT INTO `ingredient` VALUES(202, 'Rotini', NULL);
INSERT INTO `ingredient` VALUES(203, 'Salsa', NULL);
INSERT INTO `ingredient` VALUES(204, 'Salt', NULL);
INSERT INTO `ingredient` VALUES(205, 'Sandwich bags', NULL);
INSERT INTO `ingredient` VALUES(206, 'Sangria', NULL);
INSERT INTO `ingredient` VALUES(207, 'Scallions', NULL);
INSERT INTO `ingredient` VALUES(208, 'Scallops', NULL);
INSERT INTO `ingredient` VALUES(209, 'Seasoned croutons', NULL);
INSERT INTO `ingredient` VALUES(210, 'Semi-sweet baking chocolate', NULL);
INSERT INTO `ingredient` VALUES(211, 'Semi-sweet chocolate chips', NULL);
INSERT INTO `ingredient` VALUES(212, 'Serrano peppers', NULL);
INSERT INTO `ingredient` VALUES(213, 'Shallot', NULL);
INSERT INTO `ingredient` VALUES(214, 'Shitake mushroom', NULL);
INSERT INTO `ingredient` VALUES(215, 'Shortening', NULL);
INSERT INTO `ingredient` VALUES(216, 'Shreaded Mexican Cheese', NULL);
INSERT INTO `ingredient` VALUES(217, 'Skinless salmon fillet', NULL);
INSERT INTO `ingredient` VALUES(218, 'Smoked salmon', NULL);
INSERT INTO `ingredient` VALUES(219, 'Snow pea pods', NULL);
INSERT INTO `ingredient` VALUES(220, 'Sorbet', NULL);
INSERT INTO `ingredient` VALUES(221, 'Sour cherries', NULL);
INSERT INTO `ingredient` VALUES(222, 'Sour cream', NULL);
INSERT INTO `ingredient` VALUES(223, 'Soy sauce', NULL);
INSERT INTO `ingredient` VALUES(224, 'Spinach', NULL);
INSERT INTO `ingredient` VALUES(225, 'Stewed Tomatos', NULL);
INSERT INTO `ingredient` VALUES(226, 'Strawberries', NULL);
INSERT INTO `ingredient` VALUES(227, 'Strawberry wine', NULL);
INSERT INTO `ingredient` VALUES(228, 'Stuffing mix', NULL);
INSERT INTO `ingredient` VALUES(229, 'Sugar', NULL);
INSERT INTO `ingredient` VALUES(230, 'Summer squash', NULL);
INSERT INTO `ingredient` VALUES(231, 'Sun Dried Tomatos', NULL);
INSERT INTO `ingredient` VALUES(232, 'Sushi rice', NULL);
INSERT INTO `ingredient` VALUES(233, 'Sushi seaweed', NULL);
INSERT INTO `ingredient` VALUES(234, 'Sweet pea pods', NULL);
INSERT INTO `ingredient` VALUES(235, 'Sweet potato', NULL);
INSERT INTO `ingredient` VALUES(236, 'Swiss cheese', NULL);
INSERT INTO `ingredient` VALUES(237, 'Syrup', NULL);
INSERT INTO `ingredient` VALUES(238, 'Taco Seasoning', NULL);
INSERT INTO `ingredient` VALUES(239, 'Tapenade', NULL);
INSERT INTO `ingredient` VALUES(240, 'Tarragon', NULL);
INSERT INTO `ingredient` VALUES(241, 'Tea bags', NULL);
INSERT INTO `ingredient` VALUES(242, 'Teriyaki sauce', NULL);
INSERT INTO `ingredient` VALUES(243, 'Tiger Shrimp', NULL);
INSERT INTO `ingredient` VALUES(244, 'Tomato', NULL);
INSERT INTO `ingredient` VALUES(245, 'Tomato Juice', NULL);
INSERT INTO `ingredient` VALUES(246, 'Tomato paste', NULL);
INSERT INTO `ingredient` VALUES(247, 'Tomato sauce', NULL);
INSERT INTO `ingredient` VALUES(248, 'Tortellini', NULL);
INSERT INTO `ingredient` VALUES(249, 'Tortila Chips', NULL);
INSERT INTO `ingredient` VALUES(250, 'Tortillas', NULL);
INSERT INTO `ingredient` VALUES(251, 'Turkey sausage', NULL);
INSERT INTO `ingredient` VALUES(252, 'Turmeric', NULL);
INSERT INTO `ingredient` VALUES(253, 'Unsweetened baking chocolate', NULL);
INSERT INTO `ingredient` VALUES(254, 'Vanilla extract', NULL);
INSERT INTO `ingredient` VALUES(255, 'Vegetable broth', NULL);
INSERT INTO `ingredient` VALUES(256, 'Vegetable oil', NULL);
INSERT INTO `ingredient` VALUES(257, 'Walnuts', NULL);
INSERT INTO `ingredient` VALUES(258, 'Wasabi', NULL);
INSERT INTO `ingredient` VALUES(259, 'Water', NULL);
INSERT INTO `ingredient` VALUES(260, 'Water chestnuts', NULL);
INSERT INTO `ingredient` VALUES(261, 'Wheat bread', NULL);
INSERT INTO `ingredient` VALUES(262, 'Whipped cream', NULL);
INSERT INTO `ingredient` VALUES(263, 'White bread', NULL);
INSERT INTO `ingredient` VALUES(264, 'White chocolate chips', NULL);
INSERT INTO `ingredient` VALUES(265, 'White cooking wine', NULL);
INSERT INTO `ingredient` VALUES(266, 'White onion', NULL);
INSERT INTO `ingredient` VALUES(267, 'White rice', NULL);
INSERT INTO `ingredient` VALUES(268, 'White vinegar', NULL);
INSERT INTO `ingredient` VALUES(269, 'Wild rice', NULL);
INSERT INTO `ingredient` VALUES(270, 'Worcestershire sauce', NULL);
INSERT INTO `ingredient` VALUES(271, 'Yellow onion', NULL);
INSERT INTO `ingredient` VALUES(272, 'Yogurt', NULL);
INSERT INTO `ingredient` VALUES(274, 'White Pepper', NULL);
INSERT INTO `ingredient` VALUES(275, 'Whole wheat flour', NULL);
INSERT INTO `ingredient` VALUES(276, 'Sea salt', NULL);
INSERT INTO `ingredient` VALUES(277, 'Kiwi fruit', NULL);
INSERT INTO `ingredient` VALUES(278, 'Crawfish', NULL);
INSERT INTO `ingredient` VALUES(280, 'Catfish', 1);
INSERT INTO `ingredient` VALUES(360, 'Mrs dash', 2);
INSERT INTO `ingredient` VALUES(361, 'Romaine lettuce', 1);
INSERT INTO `ingredient` VALUES(438, 'Peppermint baking chips', 1);
INSERT INTO `ingredient` VALUES(445, 'Peppermint extract', 1);
INSERT INTO `ingredient` VALUES(452, 'Mini chocolate chips', 1);
INSERT INTO `ingredient` VALUES(453, 'Graham crackers', 1);
INSERT INTO `ingredient` VALUES(459, 'Onion bun', 5);
INSERT INTO `ingredient` VALUES(460, 'Brie', 1);
INSERT INTO `ingredient` VALUES(461, 'Pork', 1);
INSERT INTO `ingredient` VALUES(462, 'Test', 1);
INSERT INTO `ingredient` VALUES(463, 'Oats', 1);
INSERT INTO `ingredient` VALUES(464, 'Almonds', 1);
INSERT INTO `ingredient` VALUES(465, 'Cashews', 1);
INSERT INTO `ingredient` VALUES(466, 'Coconut', 1);
INSERT INTO `ingredient` VALUES(467, 'Maple syrup', 1);
INSERT INTO `ingredient` VALUES(468, 'Raisins', 1);
INSERT INTO `ingredient` VALUES(469, 'Beef', 1);
INSERT INTO `ingredient` VALUES(470, 'Coconut milk', 1);
INSERT INTO `ingredient` VALUES(471, 'Rotini pasta', 11);
INSERT INTO `ingredient` VALUES(472, 'Chicken', 13);
INSERT INTO `ingredient` VALUES(473, 'Ginger paste', 13);
INSERT INTO `ingredient` VALUES(474, 'Pork tenderloin', 13);
INSERT INTO `ingredient` VALUES(475, 'Ground pepper', 13);
INSERT INTO `ingredient` VALUES(476, 'Dried thyme leaves', 13);
INSERT INTO `ingredient` VALUES(477, 'Chilli flakes', 13);
INSERT INTO `ingredient` VALUES(478, 'Mint leaves', 13);
INSERT INTO `ingredient` VALUES(479, 'Ddda', 1);
INSERT INTO `ingredient` VALUES(480, 'Pumpkin puree', 1);
INSERT INTO `ingredient` VALUES(481, 'Sweetened condensed milk', 1);
INSERT INTO `ingredient` VALUES(482, 'Nutmeg', 1);
INSERT INTO `ingredient` VALUES(483, 'Deep dish pie crust', 1);
INSERT INTO `ingredient` VALUES(484, 'Peanut butter chips', 1);
INSERT INTO `ingredient` VALUES(485, 'Egg yolk', 1);
INSERT INTO `ingredient` VALUES(486, 'Egg white', 1);
INSERT INTO `ingredient` VALUES(487, 'Sweet pickle relish', 1);
INSERT INTO `ingredient` VALUES(488, 'Mustard', 1);
INSERT INTO `ingredient` VALUES(489, 'Savory sage sausage roll', 1);
INSERT INTO `ingredient` VALUES(490, 'Cube stuffing', 1);
INSERT INTO `ingredient` VALUES(491, 'Poultry seasoning', 1);
INSERT INTO `ingredient` VALUES(492, 'Dried sage', 1);
INSERT INTO `ingredient` VALUES(493, 'Cornbread crumbs', 1);
INSERT INTO `ingredient` VALUES(494, 'Rum', 1);
INSERT INTO `ingredient` VALUES(495, 'Spearmint leaves', 1);
INSERT INTO `ingredient` VALUES(496, 'Club soda', 1);
INSERT INTO `ingredient` VALUES(497, 'Butternut', 1);
INSERT INTO `ingredient` VALUES(498, 'Abc', 1);
INSERT INTO `ingredient` VALUES(499, 'Salsax', 24);
INSERT INTO `ingredient` VALUES(500, 'Baby cornddd', 1);
INSERT INTO `ingredient` VALUES(502, 'Abcdef', 1);
INSERT INTO `ingredient` VALUES(503, 'Adfasdf', 1);
INSERT INTO `ingredient` VALUES(504, 'Pariffin wax', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MENU_ID` int(11) NOT NULL auto_increment,
  `MENU_NM` varchar(255) NOT NULL,
  `MENU_STRIP_NM` varchar(255) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `MENU_DESC` varchar(255) default NULL,
  `MENU_PRIVATE` tinyint(1) default NULL,
  `CREATED_AT` date default NULL,
  PRIMARY KEY  (`MENU_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` VALUES(9, 'test', 'test', 2, 'adbc', NULL, '2009-01-19');
INSERT INTO `menu` VALUES(12, 'test 2', 'test_2', 1, 'ffdsfasdfasdf', 1, '2009-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `ITEM_ID` int(11) NOT NULL auto_increment,
  `MENU_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `ITEM_NM` varchar(100) NOT NULL,
  `ITEM_DESC` varchar(2000) NOT NULL,
  PRIMARY KEY  (`ITEM_ID`),
  KEY `MENU_ID` (`MENU_ID`),
  KEY `COURSE_ID` (`COURSE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` VALUES(24, 12, 3, 'abc123', 'adfasdfasdfdsaf');
INSERT INTO `menu_item` VALUES(25, 12, 13, 'defgh', 'I like you I like you I like you I like you I like you I like you I like you');

-- --------------------------------------------------------

--
-- Table structure for table `planner`
--

CREATE TABLE `planner` (
  `PLANNER_ID` int(11) NOT NULL auto_increment,
  `RECIPE_ID` int(11) default NULL,
  `MENU_ID` int(11) default NULL,
  `USER_ID` int(11) NOT NULL,
  `PLANNER_DATE` datetime default NULL,
  PRIMARY KEY  (`PLANNER_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `MENU_ID` (`MENU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `planner`
--


-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `RATE_ID` int(11) NOT NULL auto_increment,
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `RATE` int(11) NOT NULL,
  `CREATED_AT` datetime default NULL,
  PRIMARY KEY  (`RATE_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` VALUES(15, 1, 1, 4, '2008-12-14 15:41:46');
INSERT INTO `rate` VALUES(16, 1, 21, 1, '2009-02-01 10:51:50');
INSERT INTO `rate` VALUES(17, 1, 20, 5, '2009-02-01 12:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `rate_suggestion`
--

CREATE TABLE `rate_suggestion` (
  `USER_ID` int(11) NOT NULL,
  `SUGGESTION_ID` int(11) NOT NULL,
  `RATE` varchar(20) NOT NULL,
  `CREATED_AT` datetime default NULL,
  PRIMARY KEY  (`USER_ID`,`SUGGESTION_ID`),
  KEY `SUGGESTION_ID` (`SUGGESTION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_suggestion`
--

INSERT INTO `rate_suggestion` VALUES(1, 1, 'no', '2008-12-14 15:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

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
  `RECIPE_PICTURE` varchar(50) default NULL,
  `USER_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `ETHNICITY_ID` int(11) NOT NULL,
  `BASE` varchar(20) default NULL,
  `AVERAGE_RATING` double NOT NULL default '0',
  `NB_COMMENT` int(11) default NULL,
  `NB_REPORT` int(11) default NULL,
  `NB_SUGGESTION` int(11) default NULL,
  `CREATED_AT` datetime default NULL,
  `UPDATED_AT` datetime default NULL,
  PRIMARY KEY  (`RECIPE_ID`),
  UNIQUE KEY `RECIPE_STRIP_NM` (`RECIPE_STRIP_NM`),
  KEY `USER_ID` (`USER_ID`),
  KEY `COURSE_ID` (`COURSE_ID`),
  KEY `ETHNICITY_ID` (`ETHNICITY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` VALUES(1, 'chili', 'Chili', 'I am asked all the time to make this chili.  This is something I have eaten all through the years growing up and still make up a batch of it every winter.', '25', '1:00', 8, NULL, '1. Brown the ground pork and ground sirlion in a medium pan. Add a teaspoon of sereano pepper while browning the meat.                       2. Season with kosher salt and pepper.  \r\n3. Chop the onion, bell pepper and one Serrano pepper and place them in a large pot.  \r\n4. Open up and drain both cans of kidney beans and add them to the large pot.  \r\n5. Open up both cans of stewed chili style tomatoes and add them to the pot.  \r\n6. Drain the grease away from the browned meat and add the meat to the pot. \r\n7. Pour in the tomato juice over the meat mixture.\r\n8. Add kosher salt, black pepper, two table spoons of chili powder, and two teaspoons of ground cumin. Stir well. \r\n9. Cook slowly over medium low heat for an hour.  If it starts to bubble turn down the heat. Taste during the cooking process to check the seasoning add more to taste.', NULL, 1, 11, 1, 'Beef', 4, NULL, NULL, NULL, '0000-00-00 00:00:00', '2008-12-28 18:47:14');
INSERT INTO `recipe` VALUES(2, 'garlic_mashed_potato', 'Garlic Mashed Potato', 'Wonderful potato''s with a hint of garlic', '10', '0:45', 6, NULL, '1. Cut the red potatoes up in to small chunks and add them to a large stock pot of water. \r\n2. Boil the potatoes on the stove till they are tender. Drain them from the pot and add them to a large mixing bowl. \r\n3. Add the butter, garlic and milk to the potato mixture. Mix well with a hand mixer till they are nice and smooth. Add salt and pepper to taste.', 'garlic_mashed_potato_qgriffith.jpg', 1, 1, 1, 'Vegetable', 3.5, 0, 0, 0, '2006-05-15 05:56:20', '2009-02-03 19:50:11');
INSERT INTO `recipe` VALUES(3, 'lemon_and_garlic_asparagus', 'Lemon and Garlic Asparagus', 'Quick and Easy side dish cooked on the grill or in the broil', '10', '0:15', 2, NULL, '1. Clean and cut the bottom off the asparagus. \r\n1. Coat them in olive oil, garlic and lemon juice and sprinkle with a dash of kosher salt. \r\n1. Place them in the broil on the stove for 15mins, check them in 5 to 10mins it depends on how thick they are. They should be some what tender but still crisp. Another option is to skewer them with bamboo skewers and cook them on the grill.', 'lemon_and_garlic_asparagus_qgriffith.jpg', 1, 7, 1, 'Vegetable', 3, NULL, NULL, NULL, '2006-05-17 18:51:50', '2007-09-09 10:32:05');
INSERT INTO `recipe` VALUES(5, 'lemon_pepper_game_hens', 'Lemon Pepper Game Hens', 'A quick and tasty way to cook up some cornish game hens', '15', '0:45', 2, NULL, '1. Pre-heat the oven to 425 degrees. \r\n2. Remove the skin from the cornish gamehens. \r\n3. Coat them in olive oil. Pierce the flesh with a fork to allow the flavor soak all the way through. \r\n4. Poor the lemon juice in the bottom of the pan and inside of the game hens. \r\n5. Rub the game hens with salt, pepper, and the lemon pepper seasoning. \r\n6. Place some rosemary inside of the game hens and on the outside of the game hens. \r\n7. Place the game hens in the oven and cook for about 45 mins.', 'lemon_pepper_game_hens_qgriffith.jpg', 1, 1, 1, 'Poultry', 3, NULL, NULL, NULL, '2006-07-04 13:45:20', '2007-09-09 10:31:07');
INSERT INTO `recipe` VALUES(7, 'lime_chicken_tostada', 'Lime Chicken Tostada', 'Quick and tasty meal', '30', '0:20', 6, NULL, '###Pre-Steps\r\n1. Place the chicken breast in a zip lock bag or container and add 2 tbs of the lime juice and fajitas seasoning to the bag, shake well and store in the fridge for 30 mins.\r\n\r\n###Making the salad  \r\n2. Place the bell pepper, onion, lettuce, tomato, and white onion in a large bowl.  \r\n3. Add a pinch of salt and 2 tablespoons of lime juice to the bowl then toss.  \r\n4. Grill the chicken breast, and cut them into slices and added to the bowl mixture.  \r\n5. Place the tortillas in a dry pan and cook on each side to brown, flipping only once.  \r\n6. Add the chicken and veggie mixture to the top of the tortilla''s and garnish with salsa, cheese and sour cream', 'lime_chicken_tostadas_qgriffith.jpg', 1, 1, 3, 'Poultry', 2.5, 1, 0, NULL, '2006-08-25 19:36:46', '2007-11-08 19:45:08');
INSERT INTO `recipe` VALUES(11, 'granola', 'Granola', 'A nice healthy breakfast or snake to take on the run add any mix dried fruit you want at the end once it has cooled for an added bit of sweetness.', '15', '1:00', 8, NULL, '1. Preheat Oven to 250 degrees\r\n2. In a large bowl, combine the oats, nuts, coconut, and brown sugar\r\n3. In a separate bowl, combine maple syrup, oil, and salt. Combine both mixtures and pour onto 2 sheet pan\r\n4. Cook for 1 hour, stirring every 15 minutes to achieve an even color, or until the oats have a nice brown color\r\n5. Remove from oven and transfer into a large bowl. Add raisins or any other dried fruit(s) and mix until evenly distributed', 'granola_qgriffith.jpg', 1, 2, 1, 'Bread', 3, 1, NULL, 0, '2007-09-03 10:41:45', '2007-11-11 19:45:06');
INSERT INTO `recipe` VALUES(12, 'pork_medallions_with_sweet_potatoes', 'Pork Medallions with Sweet Potatoes', 'Lean pork tenderloin and sweet potato for a substantial dinner.', '10', '0:20', 4, NULL, '1. Slice pork into thick rounds. Place in a bowl. Sprinkle with seasonings, then rub in. Melt butter in a large frying pan over medium-high heat. Add pork, then reduce heat to medium. Cook until deep golden, 3 min per side, then remove to a bowl.\r\n\r\n2. Meanwhile, *cut potato* into large cubes. After pork is removed from pan, pour in juice and water. Using a wooden spoon, scrape up and stir in any brown bits from pan bottom. Add potato. Boil, then cover and reduce heat. Simmer, stirring often until tender, 10 to 12 min. Return pork and any juices back to pan. Cover and simmer, stirring occasionally, until pork is warm, about 2 min. Stir in mint. \r\n', 'pork_medallions_with_sweet_potatoes_qgriffith.jpg', 1, 1, 1, 'Pork', 3, NULL, 0, NULL, '2007-10-18 14:43:36', '2008-08-31 09:57:31');
INSERT INTO `recipe` VALUES(13, 'deep_dish_creamy_pumpkin_pie', 'Deep Dish Creamy Pumpkin Pie', 'A pumpkin pie with little sweetener added so that you can really taste the pumpkin and the spices', '10', '0:55', 8, NULL, '1.  Preheat oven to 425 degrees\r\n2. Combine pumpkin, condensed milk eggs and all the spices in a large bowl\r\n3. Mix thoroughly with a wire whisk\r\n4. Bake in the over for 15 minutes then reduce the heat to 350 degrees and bake for another 35 to 40 minutes or until a knife inserted comes out clean\r\n\r\n', 'deep_dish_creamy_pumpkin_pie_qgriffith.jpg', 1, 4, 1, 'Vegetable', 0, NULL, NULL, NULL, '2007-11-22 09:53:42', '2007-11-23 07:41:43');
INSERT INTO `recipe` VALUES(15, 'the_chewy_cookie', 'The Chewy Cookie', 'Large chewy cookies with chocolate and peanut butter chips', '20', '0:15', 12, NULL, '1. Pre-Heat Oven to 350 degrees\r\n2. Melt the butter\r\n3. Sift together the flour, salt and baking soda\r\n4. Pour the melted butter in a mixing bowl\r\n5. Add the sugar and brown sugar to the mixing bowl and mix on medium speed\r\n6. Add the egg and the egg yolk, milk and vanilla extract and mix until well combined\r\n7. Stir in the chocolate and peanut butter chips\r\n8. Chill the dough for about 15 minutes in the fridge\r\n9. Scoop out the dough onto parchment lined cookie sheet and bake for 14 minutes until golden brown\r\n\r\n', 'the_chewy_cookie_qgriffith.jpg', 1, 4, 1, 'Bread', 3, NULL, NULL, NULL, '2007-11-22 10:29:04', '2007-11-23 17:05:47');
INSERT INTO `recipe` VALUES(18, 'southern_deviled_eggs', 'Southern Deviled Eggs', 'A nice slightly spicy deviled egg, great for a snack or an appetizer.', '15', '0:10', 12, NULL, '1.  Hard boil the eggs\r\n2.  Halve the 7 eggs lengthwise and remove the yolks\r\n3.  Place the yolks in a small bowl and mash them\r\n4.  Stir in the mayonnaise, pickle relish, and mustard\r\n5.  Add salt and pepper to taste\r\n6.  Fill egg whites with the yolk mixture garnish with cayenne pepper', 'southern_deviled_eggs_qgriffith.jpg', 1, 5, 1, 'Poultry', 3, NULL, NULL, NULL, '2007-11-22 12:36:04', '2008-09-14 18:49:45');
INSERT INTO `recipe` VALUES(19, 'savory_sage_stuffing', 'Savory Sage Stuffing', 'Something I have made every Thanksgiving for the past four years and is always a hit Something I have made every Thanksgiving for the past four years and is always a hitSomething I have made every Thanksgiving for the past four years and is always a hitSomething I have made every Thanksgiving for the past four years and is always a hit Something I have made every Thanksgiving for the past four years and is always a hit Something I have made every Thanksgiving for the past four years and is always a hitSomething I have made every Thanksgiving for the past four years and is always a hitSomething I have made every Thanksgiving for the past four years and is always a hit', '15', '0:45', 8, NULL, '1.  Pre-heat oven to 350 degrees\r\n2.  In a large skillet over medium high heat, crumble sausage and add the onion and celery cook stiring occasionally until sausage is brown\r\n3.  In a 9 by 13 inch casserole dish pour the cubed stuffing and add the cooked sausage mixture on top\r\n4.  Sprinkle with poultry seasoning and the dried sage\r\n5.  Pour the broth and butter over the top of the cubed stuffing and mix to combine\r\n6.  Bake for 45 minutes', 'savory_sage_stuffing_qgriffith.jpg', 1, 1, 1, 'Bread', 4, NULL, NULL, NULL, '2007-11-23 08:06:25', '2009-02-03 19:49:54');
INSERT INTO `recipe` VALUES(20, 'mojito', 'Mojito', 'A nice summer drink to have with your adult friends', '05', '0:00', 1, NULL, 'Gently crush mint leaves and lightly squeeze lime in a cool tall glass. \r\nPour sugar to cover and fill glass with ice. Add Rum, club soda, and stir your emerging mojito well. Garnish with a lime wedge and a few sprigs of mint. \r\n', 'mojito_qgriffith.jpg', 2, 8, 6, 'Alcohol', 5, 0, NULL, 1, '2007-11-24 15:13:19', '2009-02-01 12:24:20');
INSERT INTO `recipe` VALUES(21, 'brats_and_drunken_pepper_sandwich', 'Brats and drunken pepper sandwich', 'asdf', '00', '0:10', 3, NULL, 'asdfsdafsdf', NULL, 1, 14, 1, 'Beef', 1, 1, NULL, NULL, '2009-01-11 12:34:24', '2009-02-01 10:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_comment`
--

CREATE TABLE `recipe_comment` (
  `COMMENT_ID` int(11) NOT NULL auto_increment,
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `COMMENT` text,
  `CREATED_AT` datetime default NULL,
  PRIMARY KEY  (`COMMENT_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `recipe_comment`
--

INSERT INTO `recipe_comment` VALUES(2, 1, 7, 'sfgsdfgs', '2007-11-08 19:45:07');
INSERT INTO `recipe_comment` VALUES(3, 1, 11, 'ddd', '2007-11-11 19:45:06');
INSERT INTO `recipe_comment` VALUES(4, 1, 21, 'dsfasfds', '2009-02-01 10:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingrd`
--

CREATE TABLE `recipe_ingrd` (
  `RECIPIE_INGD_ID` int(11) NOT NULL auto_increment,
  `RECIPE_ID` int(11) NOT NULL,
  `INGRD_ID` int(11) NOT NULL,
  `INGRD_SEQ` int(11) default NULL,
  `INGRD_PREP` varchar(30) NOT NULL default '',
  `INGRD_MSRMT` varchar(15) NOT NULL default '',
  `INGRD_QTY` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`RECIPIE_INGD_ID`),
  KEY `recipe_ingrd_FK_1` (`RECIPE_ID`),
  KEY `recipe_ingrd_FK_2` (`INGRD_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `recipe_ingrd`
--

INSERT INTO `recipe_ingrd` VALUES(1, 1, 61, 0, '', 'tablespoon', '2');
INSERT INTO `recipe_ingrd` VALUES(2, 1, 83, 10, '', 'teaspoon', '2');
INSERT INTO `recipe_ingrd` VALUES(3, 1, 85, 9, '', 'can', '1');
INSERT INTO `recipe_ingrd` VALUES(4, 1, 116, 8, '', 'whole', '1');
INSERT INTO `recipe_ingrd` VALUES(5, 1, 139, 7, '', 'teaspoon', '3');
INSERT INTO `recipe_ingrd` VALUES(6, 1, 149, 6, '', 'can', '1');
INSERT INTO `recipe_ingrd` VALUES(7, 1, 212, 5, 'Finley chopped', 'whole', '1');
INSERT INTO `recipe_ingrd` VALUES(8, 1, 225, 4, 'Chili style', 'can', '2');
INSERT INTO `recipe_ingrd` VALUES(9, 1, 245, 3, '', 'quart', '1');
INSERT INTO `recipe_ingrd` VALUES(10, 1, 266, 2, '', 'whole', '1');
INSERT INTO `recipe_ingrd` VALUES(11, 1, 461, 1, 'Ground', 'pound', '1');
INSERT INTO `recipe_ingrd` VALUES(12, 1, 469, 11, 'Ground', 'pound', '1');
INSERT INTO `recipe_ingrd` VALUES(19, 3, 7, NULL, '', 'bunch', '1');
INSERT INTO `recipe_ingrd` VALUES(20, 3, 106, NULL, 'crushed', 'clove', '3');
INSERT INTO `recipe_ingrd` VALUES(21, 3, 139, NULL, '', 'dash', '1');
INSERT INTO `recipe_ingrd` VALUES(22, 3, 144, NULL, '', 'tablespoon', '4');
INSERT INTO `recipe_ingrd` VALUES(23, 3, 169, NULL, '', 'tablespoon', '2');
INSERT INTO `recipe_ingrd` VALUES(24, 5, 34, NULL, '', 'teaspoon', '1');
INSERT INTO `recipe_ingrd` VALUES(25, 5, 73, NULL, '', 'whole', '2');
INSERT INTO `recipe_ingrd` VALUES(26, 5, 139, NULL, '', 'teaspoon', '1');
INSERT INTO `recipe_ingrd` VALUES(27, 5, 144, NULL, '', 'cup', '1/2');
INSERT INTO `recipe_ingrd` VALUES(28, 5, 146, NULL, '', 'tablespoon', '1');
INSERT INTO `recipe_ingrd` VALUES(29, 5, 169, NULL, '', 'tablespoon', '3');
INSERT INTO `recipe_ingrd` VALUES(30, 5, 201, NULL, '', 'tablespoon', '3');
INSERT INTO `recipe_ingrd` VALUES(31, 7, 34, NULL, '', 'pinch', '1');
INSERT INTO `recipe_ingrd` VALUES(32, 7, 59, NULL, 'skinless', 'whole', '3');
INSERT INTO `recipe_ingrd` VALUES(33, 7, 98, NULL, '', 'package', '1');
INSERT INTO `recipe_ingrd` VALUES(34, 7, 116, NULL, 'diced', 'whole', '1');
INSERT INTO `recipe_ingrd` VALUES(35, 7, 151, NULL, '', 'tablespoon', '4');
INSERT INTO `recipe_ingrd` VALUES(36, 7, 158, NULL, '', 'cup', '1/2');
INSERT INTO `recipe_ingrd` VALUES(37, 7, 194, NULL, 'diced', 'whole', '1');
INSERT INTO `recipe_ingrd` VALUES(38, 7, 200, NULL, '', 'whole', '2');
INSERT INTO `recipe_ingrd` VALUES(39, 7, 203, NULL, '', 'jar', '1');
INSERT INTO `recipe_ingrd` VALUES(40, 7, 204, NULL, '', 'pinch', '1');
INSERT INTO `recipe_ingrd` VALUES(41, 7, 222, NULL, '', 'tablespoon', '4');
INSERT INTO `recipe_ingrd` VALUES(42, 7, 250, NULL, 'small', 'whole', '6');
INSERT INTO `recipe_ingrd` VALUES(43, 7, 361, NULL, '', 'bunch', '1');
INSERT INTO `recipe_ingrd` VALUES(44, 11, 42, NULL, 'dark', 'cup', '1/4');
INSERT INTO `recipe_ingrd` VALUES(45, 11, 204, NULL, '', 'teaspoon', '3/4');
INSERT INTO `recipe_ingrd` VALUES(46, 11, 256, NULL, '', 'cup', '1/4');
INSERT INTO `recipe_ingrd` VALUES(47, 11, 463, NULL, 'rolled', 'cup', '3');
INSERT INTO `recipe_ingrd` VALUES(48, 11, 464, NULL, 'slivered', 'cup', '1');
INSERT INTO `recipe_ingrd` VALUES(49, 11, 465, NULL, '', 'cup', '1');
INSERT INTO `recipe_ingrd` VALUES(50, 11, 466, NULL, 'shreded', 'cup', '3/4');
INSERT INTO `recipe_ingrd` VALUES(51, 11, 467, NULL, '', 'cup', '1/4');
INSERT INTO `recipe_ingrd` VALUES(52, 11, 468, NULL, '', 'cup', '1');
INSERT INTO `recipe_ingrd` VALUES(53, 12, 43, 0, '', 'tablespoon', '1');
INSERT INTO `recipe_ingrd` VALUES(54, 12, 171, 8, '', 'cup', '1/2');
INSERT INTO `recipe_ingrd` VALUES(55, 12, 204, 7, '', 'teaspoon', '1/4');
INSERT INTO `recipe_ingrd` VALUES(56, 12, 235, 6, '', 'whole', '1');
INSERT INTO `recipe_ingrd` VALUES(57, 12, 259, 5, '', 'cup', '1/2');
INSERT INTO `recipe_ingrd` VALUES(58, 12, 474, 4, '', 'whole', '1');
INSERT INTO `recipe_ingrd` VALUES(59, 12, 475, 3, '', 'teaspoon', '1/4');
INSERT INTO `recipe_ingrd` VALUES(60, 12, 476, 2, '', 'teaspoon', '1/4');
INSERT INTO `recipe_ingrd` VALUES(61, 12, 477, 1, '', 'teaspoon', '1/4');
INSERT INTO `recipe_ingrd` VALUES(62, 12, 478, 9, '', 'cup', '1/4');
INSERT INTO `recipe_ingrd` VALUES(63, 13, 66, NULL, 'ground', 'teaspoon', '2');
INSERT INTO `recipe_ingrd` VALUES(64, 13, 94, NULL, '', '', '2');
INSERT INTO `recipe_ingrd` VALUES(65, 13, 109, NULL, 'ground', 'teaspoon', '1');
INSERT INTO `recipe_ingrd` VALUES(66, 13, 204, NULL, '', 'teaspoon', '.5');
INSERT INTO `recipe_ingrd` VALUES(67, 13, 480, NULL, '', 'cup', '4');
INSERT INTO `recipe_ingrd` VALUES(68, 13, 481, NULL, '', 'ounce', '14');
INSERT INTO `recipe_ingrd` VALUES(69, 13, 482, NULL, '', 'teaspoon', '1');
INSERT INTO `recipe_ingrd` VALUES(70, 13, 483, NULL, '9 inch', '', '1');
INSERT INTO `recipe_ingrd` VALUES(71, 15, 16, NULL, '', 'teaspoon', '1');
INSERT INTO `recipe_ingrd` VALUES(72, 15, 42, NULL, '', 'cup', '1/4');
INSERT INTO `recipe_ingrd` VALUES(73, 15, 43, NULL, 'sticks unsalted', '', '2');
INSERT INTO `recipe_ingrd` VALUES(74, 15, 94, NULL, '', '', '1');
INSERT INTO `recipe_ingrd` VALUES(75, 15, 101, NULL, '', 'cup', '2 1/4');
INSERT INTO `recipe_ingrd` VALUES(76, 15, 139, NULL, '', 'teaspoon', '1');
INSERT INTO `recipe_ingrd` VALUES(77, 15, 159, NULL, '', 'tablespoon', '2');
INSERT INTO `recipe_ingrd` VALUES(78, 15, 211, NULL, '', 'cup', '3/4');
INSERT INTO `recipe_ingrd` VALUES(79, 15, 229, NULL, '', 'cup', '1/4');
INSERT INTO `recipe_ingrd` VALUES(80, 15, 254, NULL, '', 'teaspoon', '1/2');
INSERT INTO `recipe_ingrd` VALUES(81, 15, 484, NULL, '', 'cup', '3/4');
INSERT INTO `recipe_ingrd` VALUES(82, 15, 485, NULL, '', '', '1');
INSERT INTO `recipe_ingrd` VALUES(83, 18, 34, NULL, '', 'teaspoon', '2');
INSERT INTO `recipe_ingrd` VALUES(84, 18, 53, NULL, '', 'teaspoon', '2');
INSERT INTO `recipe_ingrd` VALUES(85, 18, 94, NULL, 'Large', 'whole', '7');
INSERT INTO `recipe_ingrd` VALUES(86, 18, 157, NULL, '', 'cup', '1/4');
INSERT INTO `recipe_ingrd` VALUES(87, 18, 204, NULL, '', 'teaspoon', '1');
INSERT INTO `recipe_ingrd` VALUES(88, 18, 487, NULL, '', 'teaspoon', '1 1/12');
INSERT INTO `recipe_ingrd` VALUES(89, 18, 488, NULL, '', 'teaspoon', '1');
INSERT INTO `recipe_ingrd` VALUES(98, 20, 150, 0, '', '', '1');
INSERT INTO `recipe_ingrd` VALUES(99, 20, 229, 1, '', 'teaspoons', '4');
INSERT INTO `recipe_ingrd` VALUES(100, 20, 494, 2, 'Clear', 'ounce', '1 1/2');
INSERT INTO `recipe_ingrd` VALUES(101, 20, 495, 3, 'Fresh', 'whole', '12');
INSERT INTO `recipe_ingrd` VALUES(102, 20, 496, 4, '', 'ounce', '7');
INSERT INTO `recipe_ingrd` VALUES(105, 21, 504, 0, '', '', '');
INSERT INTO `recipe_ingrd` VALUES(106, 21, 2, 1, '', '', '');
INSERT INTO `recipe_ingrd` VALUES(107, 21, 504, 2, '', 'pinch', '3');
INSERT INTO `recipe_ingrd` VALUES(108, 19, 43, 0, 'Melted', 'cup', '1/2');
INSERT INTO `recipe_ingrd` VALUES(109, 19, 55, 1, 'Diced', 'stalk', '3');
INSERT INTO `recipe_ingrd` VALUES(110, 19, 60, 2, '', 'cup', '2 /12');
INSERT INTO `recipe_ingrd` VALUES(111, 19, 266, 3, 'Diced', 'large', '1');
INSERT INTO `recipe_ingrd` VALUES(112, 19, 489, 4, '', 'package', '1');
INSERT INTO `recipe_ingrd` VALUES(113, 19, 490, 5, 'Not instant', 'ounce', '14');
INSERT INTO `recipe_ingrd` VALUES(114, 19, 491, 6, '', 'teaspoon', '1');
INSERT INTO `recipe_ingrd` VALUES(115, 19, 492, 7, '', 'teaspoon', '2');
INSERT INTO `recipe_ingrd` VALUES(116, 2, 34, 0, '', 'dash', '1');
INSERT INTO `recipe_ingrd` VALUES(117, 2, 43, 1, '', 'tablespoon', '2');
INSERT INTO `recipe_ingrd` VALUES(118, 2, 106, 2, 'Crushed', 'clove', '3');
INSERT INTO `recipe_ingrd` VALUES(119, 2, 139, 3, '', 'dash', '1');
INSERT INTO `recipe_ingrd` VALUES(120, 2, 159, 4, '', 'cup', '1/2');
INSERT INTO `recipe_ingrd` VALUES(121, 2, 195, 5, '', 'pound', '3');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_keyword`
--

CREATE TABLE `recipe_keyword` (
  `RECIPE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `KEYWORD` varchar(100) NOT NULL default '',
  `NORMALIZED_KEYWORD` varchar(100) NOT NULL default '',
  `CREATED_AT` datetime default NULL,
  PRIMARY KEY  (`RECIPE_ID`,`USER_ID`,`NORMALIZED_KEYWORD`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_keyword`
--

INSERT INTO `recipe_keyword` VALUES(1, 1, 'hearty', 'hearty', '2007-10-24 20:23:01');
INSERT INTO `recipe_keyword` VALUES(1, 1, 'soup', 'soup', '2007-09-09 18:47:52');
INSERT INTO `recipe_keyword` VALUES(1, 1, 'spicy', 'spicy', '2007-09-09 18:48:00');
INSERT INTO `recipe_keyword` VALUES(1, 1, 'winter', 'winter', '2007-09-09 18:47:46');
INSERT INTO `recipe_keyword` VALUES(2, 1, 'taters', 'taters', '2006-06-10 13:46:25');
INSERT INTO `recipe_keyword` VALUES(2, 5, 'garlic', 'garlic', '2007-06-10 18:06:58');
INSERT INTO `recipe_keyword` VALUES(3, 1, 'garlic', 'garlic', '2007-09-09 18:49:43');
INSERT INTO `recipe_keyword` VALUES(3, 1, 'Grill', 'grill', '2006-05-28 21:31:23');
INSERT INTO `recipe_keyword` VALUES(3, 1, 'Summer', 'summer', '2006-05-29 19:18:12');
INSERT INTO `recipe_keyword` VALUES(5, 1, 'gourmet', 'gourmet', '2007-09-09 18:48:41');
INSERT INTO `recipe_keyword` VALUES(5, 1, 'romantic', 'romantic', '2007-09-09 18:48:30');
INSERT INTO `recipe_keyword` VALUES(5, 2, 'fancy', 'fancy', '2006-11-29 18:55:08');
INSERT INTO `recipe_keyword` VALUES(7, 1, 'easy', 'easy', '2007-04-06 15:10:18');
INSERT INTO `recipe_keyword` VALUES(7, 1, 'lowfat', 'lowfat', '2007-04-06 15:10:20');
INSERT INTO `recipe_keyword` VALUES(7, 1, 'quick', 'quick', '2007-04-06 15:10:16');
INSERT INTO `recipe_keyword` VALUES(11, 1, 'breakfast', 'breakfast', '2007-09-09 18:47:22');
INSERT INTO `recipe_keyword` VALUES(11, 1, 'granola', 'granola', '2007-09-03 10:41:45');
INSERT INTO `recipe_keyword` VALUES(11, 1, 'healthy', 'healthy', '2007-09-03 10:41:45');
INSERT INTO `recipe_keyword` VALUES(11, 1, 'homemade', 'homemade', '2007-09-03 10:41:45');
INSERT INTO `recipe_keyword` VALUES(12, 13, 'dinner', 'dinner', '2007-10-18 14:43:36');
INSERT INTO `recipe_keyword` VALUES(12, 13, 'entree,', 'entree', '2007-10-18 14:43:36');
INSERT INTO `recipe_keyword` VALUES(12, 13, 'Medallions,', 'medallions', '2007-10-18 14:43:36');
INSERT INTO `recipe_keyword` VALUES(12, 13, 'Pork', 'pork', '2007-10-18 14:43:36');
INSERT INTO `recipe_keyword` VALUES(12, 13, 'Potatoes,', 'potatoes', '2007-10-18 14:43:36');
INSERT INTO `recipe_keyword` VALUES(12, 13, 'Sweet', 'sweet', '2007-10-18 14:43:36');
INSERT INTO `recipe_keyword` VALUES(13, 1, 'creamy', 'creamy', '2007-11-22 09:56:00');
INSERT INTO `recipe_keyword` VALUES(13, 1, 'holiday', 'holiday', '2007-11-22 09:55:17');
INSERT INTO `recipe_keyword` VALUES(13, 1, 'pie', 'pie', '2007-11-22 09:54:57');
INSERT INTO `recipe_keyword` VALUES(13, 1, 'pumpkin', 'pumpkin', '2007-11-22 09:53:42');
INSERT INTO `recipe_keyword` VALUES(13, 1, 'thanksgiving', 'thanksgiving', '2007-11-22 09:54:57');
INSERT INTO `recipe_keyword` VALUES(18, 1, 'devil', 'devil', '2007-11-22 12:36:04');
INSERT INTO `recipe_keyword` VALUES(18, 1, 'eggs', 'eggs', '2007-11-22 12:36:04');
INSERT INTO `recipe_keyword` VALUES(19, 1, 'thanksgiving', 'thanksgiving', '2007-11-23 08:06:25');
INSERT INTO `recipe_keyword` VALUES(20, 1, 'cuban', 'cuban', '2008-12-27 20:49:09');
INSERT INTO `recipe_keyword` VALUES(20, 1, 'mint', 'mint', '2008-09-07 16:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_menu`
--

CREATE TABLE `recipe_menu` (
  `MENU_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `RECIPE_DESC` varchar(2000) default NULL,
  PRIMARY KEY  (`MENU_ID`,`RECIPE_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`),
  KEY `COURSE_ID` (`COURSE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_menu`
--

INSERT INTO `recipe_menu` VALUES(9, 3, 7, 'Quick and Easy side dish cooked on the grill or in the broil');
INSERT INTO `recipe_menu` VALUES(9, 19, 7, 'Something I have made every Thanksgiving for the past four years and is always a hit Something I have made every Thanksgiving for the past four years and is always a hitSomething I have made every Thanksgiving for the past four years and is always a hitSomething I have made every Thanksgiving for the past four years and is always a hit Something I have made every Thanksgiving for the past four years and is always a hit Something I have made every Thanksgiving for the past four years and is always a hitSomething I have made every Thanksgiving for the past four years and is always a hitSomething I have made every Thanksgiving for the past four years and is always a hit');
INSERT INTO `recipe_menu` VALUES(9, 21, 1, 'asdf');
INSERT INTO `recipe_menu` VALUES(12, 1, 11, 'I am asked all the time to make this chili.  This is something I have eaten all through the years growing up and still make up a batch of it every winter.');
INSERT INTO `recipe_menu` VALUES(12, 18, 7, 'A nice slightly spicy deviled egg, great for a snack or an appetizer.');
INSERT INTO `recipe_menu` VALUES(12, 20, 8, 'A nice summer drink to have with your adult friends. Lets get DRUNK');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_report`
--

CREATE TABLE `recipe_report` (
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `CREATED_AT` datetime default NULL,
  PRIMARY KEY  (`USER_ID`,`RECIPE_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_report`
--


-- --------------------------------------------------------

--
-- Table structure for table `recipe_suggestion`
--

CREATE TABLE `recipe_suggestion` (
  `SUGGESTION_ID` int(11) NOT NULL auto_increment,
  `RECIPE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `SUGGESTION` text NOT NULL,
  `NB_RATE` int(11) default NULL,
  `CREATED_AT` datetime default NULL,
  PRIMARY KEY  (`SUGGESTION_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `recipe_suggestion`
--

INSERT INTO `recipe_suggestion` VALUES(1, 20, 1, 'adf', NULL, '2008-12-03 14:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `stored_recipe`
--

CREATE TABLE `stored_recipe` (
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  PRIMARY KEY  (`USER_ID`,`RECIPE_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stored_recipe`
--

INSERT INTO `stored_recipe` VALUES(1, 1);
INSERT INTO `stored_recipe` VALUES(10, 1);
INSERT INTO `stored_recipe` VALUES(1, 2);
INSERT INTO `stored_recipe` VALUES(2, 3);
INSERT INTO `stored_recipe` VALUES(20, 5);
INSERT INTO `stored_recipe` VALUES(1, 7);
INSERT INTO `stored_recipe` VALUES(17, 12);
INSERT INTO `stored_recipe` VALUES(1, 18);
INSERT INTO `stored_recipe` VALUES(1, 19);
INSERT INTO `stored_recipe` VALUES(2, 19);
INSERT INTO `stored_recipe` VALUES(1, 20);
INSERT INTO `stored_recipe` VALUES(1, 21);
INSERT INTO `stored_recipe` VALUES(2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL auto_increment,
  `USER_FN` varchar(15) NOT NULL default '',
  `USER_LN` varchar(20) NOT NULL default '',
  `USER_ABOUT` text,
  `USER_LOGIN` varchar(10) NOT NULL default '',
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
  KEY `AUTH_LVL_ID` (`AUTH_LVL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(1, 'Quenten', 'Griffith', 'I am the creating of OpenEats and I hope you all enjoy adding and sharing recipes with this software.', 'qgriffith', '74094bb6dd8d5b17696e6dbc8cf6f9b041b4e2e1', '18bd2b5181cfc04637c4d8d2e3ee4879', 'qgriffith@gmail.com', 2, '801751', '2006-02-24 18:25:42', '2009-02-05 18:56:20', '2009-02-05 18:56:20', '::1', NULL);
INSERT INTO `user` VALUES(2, 'test', 'man', NULL, 'test1', '530a0d841ce1cadd9b06eb060f67dceb5e463fe9', 'e4bdc30d983c82bfed8bec1647dfba95', 'test@here.com', 1, '781207', '2006-05-11 20:59:55', '2009-01-26 08:21:11', '2009-01-26 08:21:11', '170.69.248.21', 0);
INSERT INTO `user` VALUES(3, 'Quenten', 'Griffith', NULL, 'tuxtoo', 'e7b12ed8cc4255834a84f88794fa67081e8f0222', '3d9aa84e75f4072e4df77e90a79b0664', 'qgriffith22@yahoo.com', 1, '166137', '2006-07-22 20:12:32', '2006-07-22 20:16:46', NULL, '', NULL);
INSERT INTO `user` VALUES(4, 'Upgrade', 'Test', NULL, 'uptest', '7ee8e7562472202b546b1dad66a724aaff9d93ac', 'b879bd9d760c46d69cf8df961ba7390d', 'qgriffith@cinci.rr.com', 1, '938009', '2006-12-01 16:57:47', '2006-12-02 07:34:24', NULL, '', NULL);
INSERT INTO `user` VALUES(5, 'Elly', 'Pants', NULL, 'ellie', '17558cc7d493630e316377f6d50534ef6b053649', '01b9264432f0b777a85cc6acf9131af9', 'elly@here.com', 1, NULL, '2007-06-10 18:05:58', '2007-06-27 20:17:58', '2007-06-27 20:17:58', '127.0.0.1', NULL);
INSERT INTO `user` VALUES(6, 'Derek', 'Auerman', NULL, 'dauerman', '96bf49c10fa756576db0cc6c80e570eaa76b5572', '46feac9f5a2c5dc3c05f8fe93d8923bb', 'derek_auerman@hotmail.com', 1, NULL, '2007-09-06 20:09:46', '2007-09-17 09:43:25', '2007-09-17 09:43:25', '24.114.255.19', NULL);
INSERT INTO `user` VALUES(10, 'Nathan', 'Poulos', NULL, 'npoulos', 'f1a6a991dc1497794f3d23e23ac28a281c089d9b', '0a78290bbd88e591ccfcebbed07b4654', 'npoulos@connectedsystems.biz', 1, NULL, '2007-09-20 11:11:39', '2008-12-26 22:00:13', '2008-12-26 22:00:13', '76.226.16.58', NULL);
INSERT INTO `user` VALUES(11, 'Paula', 'Wing', NULL, 'paulawing', 'c8469788cf509a8129f3c861823a486d1e8065cb', '1f5ddff125d00c7521359a01ba3957ae', 'paula@paulawing.com', 1, NULL, '2007-09-25 06:54:51', '2007-09-25 06:54:51', '2007-09-25 06:54:51', '68.230.111.119', NULL);
INSERT INTO `user` VALUES(12, 'William', 'Cook', NULL, 'wfcook', '08b326d33402d4ad06d6a29ffe0802c47dcc963a', '9f515b418fa2fd9c57d6d0be2937f573', 'openeats@wfcook.com', 1, NULL, '2007-09-27 12:09:28', '2007-09-27 12:10:06', '2007-09-27 12:10:06', '207.255.178.114', NULL);
INSERT INTO `user` VALUES(13, 'sam', 'records', NULL, 'samrecords', '6bab2eb54df9f41fac9bd2e2f338a1485120a752', '731466683b80a6c27d00299b2b6c4e45', 'ssharma@rnm.ca', 1, NULL, '2007-10-18 13:50:04', '2007-10-18 14:31:09', '2007-10-18 14:31:09', '24.114.255.3', NULL);
INSERT INTO `user` VALUES(14, 'Irwin', 'Fletcher', NULL, 'ffletch', '27d7ec15ba956a74a2d6004f9673043cb016d9f2', '03ed434bd4bb74edd9521c8bf9fa3caf', 'ffletch@gmail.com', 1, NULL, '2007-10-18 17:25:09', '2007-10-18 17:25:09', '2007-10-18 17:25:08', '206.81.43.125', NULL);
INSERT INTO `user` VALUES(15, 'abc', 'test', NULL, 'abctest', 'f12fdde962528834b845c27c0346e6de41bbd79a', 'e6f60e825172031970faf840b36ff1be', 'here@here.com', 1, NULL, '2007-10-21 17:53:00', '2007-10-21 17:53:13', '2007-10-21 17:53:13', '127.0.0.1', NULL);
INSERT INTO `user` VALUES(16, 'abc', 'test', NULL, 'demouser', 'bb5e94e3a7cbfb1f8bcc94b0241a247442fe7f3e', 'a9e2ad52ce92f077b7f2f56a5f2c7f80', 'here1@here1.com', 1, NULL, '2007-10-21 18:04:10', '2007-10-21 18:04:22', '2007-10-21 18:04:22', '76.182.30.0', NULL);
INSERT INTO `user` VALUES(17, 'ondicz', 'ondicz', NULL, 'ondicz', 'b001a603738392a4e9d2535be94427550a343895', '431dcbc80509a75244b36fa034961135', '191939@centrum.cz', 1, NULL, '2007-10-24 15:19:37', '2007-10-24 15:19:38', '2007-10-24 15:19:37', '88.146.214.65', NULL);
INSERT INTO `user` VALUES(18, 'Mark', 'Docken', NULL, 'styles', '09ca282b8860fde5e5b807aadcf4c94bc8993778', '591ce0d5bfe737592b6d436ddce1cbf2', 'mdocken@coplanar.net', 1, NULL, '2007-10-27 12:08:01', '2007-10-27 12:08:01', '2007-10-27 12:08:00', '206.248.172.193', NULL);
INSERT INTO `user` VALUES(19, 'Martin', 'Gill', NULL, 'MartinSGil', '75bb9a0ca676c7043a44700c15cde453587bbcbd', 'f70909c3b70e44ae51336ee7df40007a', 'martin@martinsgill.co.uk', 1, NULL, '2007-11-05 05:29:21', '2007-11-05 05:29:21', NULL, NULL, NULL);
INSERT INTO `user` VALUES(20, 'open', 'eats', NULL, 'openeats', 'a944e8b0934317a2dd2dd7b77c9f73b2d0403494', 'd4c328efb8d8cd5f08a527c9e3a343ba', 'openeats@selfhealthweb.com', 1, NULL, '2007-11-07 01:01:19', '2007-11-07 01:01:19', '2007-11-07 01:01:19', '200.3.206.6', NULL);
INSERT INTO `user` VALUES(21, 'Myria', 'Sawler', NULL, 'myria34', '3e287c372e399b3e5848d1860ea2a3657c0a2d55', 'f7a3ba6d571e96a6d8832d731aea8e54', 'myria@skylos.com', 1, NULL, '2007-11-14 08:42:14', '2007-11-14 08:42:14', '2007-11-14 08:42:14', '99.251.242.40', NULL);
INSERT INTO `user` VALUES(22, 'Stephen', 'Doty', NULL, 'spdoty', '344c0dac26d98160be846ff86e17aeb099c6b5c1', 'b76134b0a0491b9272dcee22c1647897', 'spdoty@earthlink.net', 1, NULL, '2007-11-18 15:37:14', '2007-11-18 15:47:03', '2007-11-18 15:47:03', '64.185.149.86', NULL);
INSERT INTO `user` VALUES(23, 'Sadri', 'Sahraoui', NULL, 'okworld', 'ec9260bf392d494cc79b91862a7c384b622c4528', 'b5702a6f7690f20ad30661a9e77d7fb7', 'okworld.web@gmail.com', 1, NULL, '2007-11-20 04:23:04', '2007-11-20 04:23:04', '2007-11-20 04:23:04', '212.93.212.194', NULL);
INSERT INTO `user` VALUES(24, 'r', 's', NULL, 'r7silva', 'd58f1c86eca2f9baa1f144ab1d4efe5a8b26cc91', '8b23d93087f1ac766bbd53bedbfedf8b', 'r7silva@gmail.com', 1, NULL, '2008-01-02 16:56:59', '2008-01-02 17:38:48', '2008-01-02 17:38:47', '201.6.165.18', NULL);
INSERT INTO `user` VALUES(25, 'Jennifer', 'Turner', NULL, 'ILoveFood1', '8f0ee391be5f358bd4ea6a36f7647248af7af0a8', '2cdff5499c9d1d584184a6fb2f0f22e0', 'turner.jennifer@gmail.com', 1, NULL, '2008-12-26 22:00:11', '2008-12-26 22:00:11', NULL, NULL, NULL);
INSERT INTO `user` VALUES(26, 'Jennifer', 'Turner', NULL, 'ILoveFood1', 'f3b80d3fe0bb3c4116e77c3feb73b3213cfc6bf7', '62e856f6aafbe014a1215fa049bf768f', 'jennt_99@yahoo.com', 1, NULL, '2008-12-26 22:04:57', '2008-12-26 22:04:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_recipe_note`
--

CREATE TABLE `user_recipe_note` (
  `USER_ID` int(11) NOT NULL,
  `RECIPE_ID` int(11) NOT NULL,
  `RECIPE_NOTE` text NOT NULL,
  `UPDATED_AT` datetime default NULL,
  PRIMARY KEY  (`USER_ID`,`RECIPE_ID`),
  KEY `RECIPE_ID` (`RECIPE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_recipe_note`
--

INSERT INTO `user_recipe_note` VALUES(1, 7, 'Click me to add a note', '2007-11-08 19:52:12');
INSERT INTO `user_recipe_note` VALUES(1, 11, 'im adding a note im cool', '2007-11-09 05:39:06');
INSERT INTO `user_recipe_note` VALUES(1, 12, ' Ok I will add a note and I shall add some more to this note', '2007-11-06 20:11:19');
INSERT INTO `user_recipe_note` VALUES(1, 20, 'asdf', '2008-12-03 14:57:58');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grocerylist`
--
ALTER TABLE `grocerylist`
  ADD CONSTRAINT `grocerylist_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grocery_exclude`
--
ALTER TABLE `grocery_exclude`
  ADD CONSTRAINT `grocery_exclude_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grocery_item`
--
ALTER TABLE `grocery_item`
  ADD CONSTRAINT `grocery_item_ibfk_1` FOREIGN KEY (`GROCERY_ID`) REFERENCES `grocerylist` (`GROCERY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grocery_item_ibfk_2` FOREIGN KEY (`AISLE_ID`) REFERENCES `grocery_aisle` (`AISLE_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `grocery_master`
--
ALTER TABLE `grocery_master`
  ADD CONSTRAINT `grocery_master_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grocery_master_ibfk_2` FOREIGN KEY (`AISLE_ID`) REFERENCES `grocery_aisle` (`AISLE_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `ingredient_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`MENU_ID`) REFERENCES `menu` (`MENU_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_item_ibfk_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `planner`
--
ALTER TABLE `planner`
  ADD CONSTRAINT `planner_ibfk_1` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planner_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planner_ibfk_3` FOREIGN KEY (`MENU_ID`) REFERENCES `menu` (`MENU_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_FK_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate_suggestion`
--
ALTER TABLE `rate_suggestion`
  ADD CONSTRAINT `rate_suggestion_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_suggestion_FK_2` FOREIGN KEY (`SUGGESTION_ID`) REFERENCES `recipe_suggestion` (`SUGGESTION_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_FK_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_FK_3` FOREIGN KEY (`ETHNICITY_ID`) REFERENCES `ethnicity` (`ETHNICITY_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `recipe_comment`
--
ALTER TABLE `recipe_comment`
  ADD CONSTRAINT `recipe_comment_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_comment_FK_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe_ingrd`
--
ALTER TABLE `recipe_ingrd`
  ADD CONSTRAINT `recipe_ingrd_FK_1` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_ingrd_FK_2` FOREIGN KEY (`INGRD_ID`) REFERENCES `ingredient` (`INGRD_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe_keyword`
--
ALTER TABLE `recipe_keyword`
  ADD CONSTRAINT `recipe_keyword_FK_1` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_keyword_FK_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe_menu`
--
ALTER TABLE `recipe_menu`
  ADD CONSTRAINT `recipe_menu_ibfk_1` FOREIGN KEY (`MENU_ID`) REFERENCES `menu` (`MENU_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_menu_ibfk_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_menu_ibfk_3` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `recipe_report`
--
ALTER TABLE `recipe_report`
  ADD CONSTRAINT `recipe_report_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_report_FK_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe_suggestion`
--
ALTER TABLE `recipe_suggestion`
  ADD CONSTRAINT `recipe_suggestion_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_suggestion_FK_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stored_recipe`
--
ALTER TABLE `stored_recipe`
  ADD CONSTRAINT `stored_recipe_FK_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stored_recipe_FK_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_FK_1` FOREIGN KEY (`AUTH_LVL_ID`) REFERENCES `auth_lvl` (`AUTH_LVL_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `user_recipe_note`
--
ALTER TABLE `user_recipe_note`
  ADD CONSTRAINT `user_recipe_note_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_recipe_note_ibfk_2` FOREIGN KEY (`RECIPE_ID`) REFERENCES `recipe` (`RECIPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

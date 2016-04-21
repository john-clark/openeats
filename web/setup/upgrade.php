<?php
if(file_exists('upgrade_lock'))
{
  echo 'The upgrade script has already been ran, please remove the upgrade_lock file if you wish to continue';
  exit;
}

include ('header.php');
include_once './include/db.php';
$upgrade_release = '1.2';

/*function UpgradeDB($db_file)
{
   //get the settings from the database.yml file so I know what to use to connect to the DB
	$conn_file = "../../config/databases.yml";
	$fp = fopen($conn_file, 'r');
	$content = fread($fp, filesize($conn_file));
	$db = array();
	preg_match('/host: (?<host>\s+\w+)/', $content, $matches);
	$db['host'] = $matches['host'];
	preg_match('/database: (?<db>\s+\w+)/', $content, $matches);
	$db['db'] = $matches['db'];
	preg_match('/username: (?<user>\s+\w+)/', $content, $matches);
	$db['user'] = $matches['user'];
	preg_match('/password: (?<pass>\s+\w+)/', $content, $matches);
	$db['pass'] = $matches['pass'];
	fclose($fp);
    echo parse_mysql_dump($db_file,$db['host'],$db['db'],$db['user'],$db['pass']);
}*/

function UpgradeDB($db_file)
{
   //get the settings from the database.yml file so I know what to use to connect to the DB
	$conn_file = "../../config/databases.yml";
	$fp = fopen($conn_file, 'r');
	$content = fread($fp, filesize($conn_file));

	preg_match('/mysql:\/\/\\w+.*/', $content, $matches);
	
	fclose($fp);
	$db = parseDSN($matches[0]);
	//print_r($db);
    echo parse_mysql_dump($db_file,$db['hostspec'],$db['database'],$db['username'],$db['password']);
}

function getInstalledVersion()
{
	//get the version they are currently running
	$app_file = "../../apps/OpenEats/config/app.yml";
	$fp = fopen($app_file, 'r');
	$content = fread($fp, filesize($app_file));

	preg_match('/version: (?<version>\d+.*)/', $content, $matches);
	$version = $matches['version'];
	fclose($fp);
	return trim($version);
}

function checkIfCurrent($version, $upgrade_release)
{
  	settype($upgrade_release, 'string');
	settype($version, 'string');

	if($version == $upgrade_release)
	{
		
		//try to determine if they are running under a subdomain or running under a dir
            $get_uri = $_SERVER['REQUEST_URI'];
            $parse_uri = substr($get_uri, 1);
            $get_dir = explode("/", $parse_uri);
            if($get_dir[0] != 'setup')
            {
	           $dir_name = $get_dir[0];
	        }
		
		echo "Congrats you are at the current version of OpenEats $version\n";
    	echo 'You may now visit your new OpenEats <a href=\'http://'.  $_SERVER['HTTP_HOST'] . '/'.$dir_name .'\' >Site </a>';
        echo '<p><b>Please make sure you remove the cache directory from under your OpenEats installation folder or you will not have the latest code and may have issues</b>';
		file_put_contents('upgrade_lock',''); 
		file_put_contents('install_lock', '');
	    
	    exit;
	}
	//return "not current";
}

function setVersion($old_ver, $new_ver)
{
  	$app_file = "../../apps/OpenEats/config/app.yml";
	$fh = fopen($app_file, 'r');
	$contents = fread($fh, filesize($app_file));
	
	$update_ver = str_replace($old_ver, $new_ver, $contents);
	fclose($fh);
    
    $fh = fopen($app_file, 'w');
	fwrite($fh, $update_ver);
	fclose($fh);
}


//first things first lets see if we are trying to upgrade something that doesn't need upgraded if it is true then the script stops here and does nothing
$version = getInstalledVersion();
checkIfCurrent($version, $upgrade_release);

//if we get to this point then that must mean their version is not up to date

if($version == "1.0.")
{
	 UpgradeDB('../../data/sql/upgrade/upgrade_1.0_to_1.1.sql');
	 SetVersion("1.0. ", "1.1");
	 checkIfCurrent(getInstalledVersion(), $upgrade_release);
	 $version = getInstalledVersion();
}

if($version == "1.1" || $version == "1.1. ")
{
	 #made a big mistake in the DB upgrade if you went from 1.0 to 1.1 a table would have the wrong name stupid typos I hate you.
	 //get the settings from the database.yml file so I know what to use to connect to the DB
    	$conn_file = "../../config/databases.yml";
		$fp = fopen($conn_file, 'r');
		$content = fread($fp, filesize($conn_file));

		preg_match('/mysql:\/\/\\w+.*/', $content, $matches);

		fclose($fp);
		$db = parseDSN($matches[0]);
	  $link = mysql_connect($db['hostspec'], $db['username'], $db['password']) or die('Could not connect to db ' . mysql_error());
	  $select_db = mysql_select_db($db['database'], $link) or die('Could not select db ' . mysql_error());
	  $results = mysql_query('SHOW COLUMNS FROM recipe_ingrd');
	  $row = mysql_fetch_assoc($results);
	  if($row['Field'] != 'RECIPE_INGRD_ID'):
	    UpgradeDB('../../data/sql/upgrade/upgrade_1.1_to_1.1.1.sql');
	  endif;
	SetVersion($version, "1.1.1");
	checkIfCurrent(getInstalledVersion(), $upgrade_release);
	$version = getInstalledVersion();
}
if($version == "1.1.1")
{
	 SetVersion("1.1.1", "1.2");
	 checkIfCurrent(getInstalledVersion(), $upgrade_release);
	 $version = getInstalledVersion();
}


?>
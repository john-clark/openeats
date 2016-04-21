<?php
if(file_exists('install_lock'))
{
  echo 'The installer has already been ran, please remove the install_lock file if you wish to continue';
  exit;
}

include ('header.php');
include_once './include/db.php';
$errors = array();

if(isset($_POST['submit']))
{
  $db_type = $_POST['db_type'];
  $db_name = $_POST['db_name'];
  $db_host = $_POST['db_host'];
  $db_user = $_POST['db_user'];
  $db_password = $_POST['db_password'];
  $dir_name = $_POST['dir_name'];
  $admin_email = $_POST['admin_email'];
  
  if($db_name === '') { $errors['db_name'] = 'name can\'t be blank'; }
  if($db_host === '') { $errors['db_host'] = 'host can\'t be blank'; }
  if($db_user === '') { $errors['db_user'] = 'user can\'t be blank'; }
  if($db_password === '') { $errors['db_password'] = 'password can\'t be blank'; }
  if($admin_email === '') { $errors['admin_email'] = 'Admin email can\'t be blank'; }
  $link = mysql_connect($db_host, $db_user, $db_password) or $errors['db_connect'] = 'Could not connect ' . mysql_error();
  if ($link)
  {
	$test_db = mysql_select_db($db_name, $link);
    if(!$test_db) { $errors['db_select'] = 'can\'t select the database ' . mysql_error(); }
     mysql_close($link);
 }	  
  if(count($errors) === 0)
  {
    
    try
    {
		//create the .htaccess file
	      if($dir_name):
	        $htaccess_file = file_get_contents('./conf/htaccess');
	        $htaccess_file = sprintf($htaccess_file, $dir_name);
	      if(file_exists('../../.htaccess'))
	      {
		    rename('../../.htaccess', '../../.htaccess.orginal');
	      }
	      file_put_contents('../../.htaccess', $htaccess_file);
	      //set the base url based on the dir you installed OE into
	      $base_url_file = file_get_contents('./conf/config.php');
	      $base_url_file = sprintf($base_url_file, $dir_name);
	      if(file_exists('../../apps/OpenEats/config/config.php'))
	      {
		     rename('../../apps/OpenEats/config/config.php', '../../apps/OpenEats/config/config.php.orginal');
	      }
	      file_put_contents('../../apps/OpenEats/config/config.php', $base_url_file);
	      else:
	        rename('../../apps/OpenEats/config/config.sample.php', '../../apps/OpenEats/config/config.php');
	      endif;
	
	      //set admin email address in app.yml
	
	      $app_file = "../../apps/OpenEats/config/app.sample.yml";
	     /* if(file_exists($app_file))
	      {
		    rename($app_file, $app_file.".bak");
	      }*/
	      $fh = fopen($app_file, 'r');
		  $contents = fread($fh, filesize($app_file));
		  $new_email = str_replace("user@localhost.com", $admin_email, $contents);
		  fclose($fh);

		  /*$fh = fopen($app_file, 'w');
		  fwrite($fh, $new_email);
		  fclose($fh);
	      rename($app_file, 'app.yml');*/
	     file_put_contents("../../apps/OpenEats/config/app.yml", $new_email);
	      //set the database settings
	      $data = file_get_contents('./conf/databases.yml');

	      $data = sprintf($data, $db_type, $db_user, $db_password, $db_host, $db_name);

	    /*  if(!file_exists('../../config/databases.yml.original'))
	      {
	        rename('../../config/databases.yml', '../../config/databases.yml.original');
	      }*/

	      file_put_contents('../../config/databases.yml', $data);

	      $data = file_get_contents('./conf/propel.ini');

	      $data = sprintf($data, 
	          $db_type,
	          $db_type, 
	          $db_user, 
	          $db_password, 
	          $db_host,
	          $db_type, 
	          $db_user, 
	          $db_password, 
	          $db_host, 
	          $db_name
	        );

	      //rename('../../config/propel.ini', '../../config/propel.ini.original');

	      file_put_contents('../../config/propel.ini', $data);
          echo parse_mysql_dump('../../data/sql/oe_schema.sql',$db_host,$db_name,$db_user,$db_password);
          file_put_contents('install_lock','');  
          echo '<h1>Success</h1>';
          echo 'You may now visit your new OpenEats <a href=\'http://'.  $_SERVER['HTTP_HOST'] . '/'.$dir_name .'\' >Site </a>';
          echo 'The Administrator user is <b>admin</b> and the password is <b>password</b> by default please change this on login.';
          exit; 
	    }
	    catch(Exception $e)
	    {
	      $errors_fatal = $e;
	    }
	  }
	}
	else
	{
	  $db_name = 'openeats';
	  $db_host = 'localhost';
	  $db_user = 'username';
	  $db_password = '';
	  $dir_name = '';
	  $admin_email ='';
	}

	?>
          <h1>Step 1: Database Settings</h1>
          <?php echo ( count($errors) == 1 ) ? '<p class="error">An error was found...</p>' : '' ?>
	      <?php echo ( count($errors) > 1 ) ? '<p class="error">Errors were found...</p>' : '' ?>
	      <?php echo ( isset($errors_fatal) ) ? '<p class="error">Fatal Error!</p><pre>'.$errors_fatal.'</pre>' : '' ?>
          <p><?php echo ( key_exists('db_connect', $errors)) ? '<span class="error">('. $errors['db_connect'] .')</span>' : ''?></p>
          <p><?php echo ( key_exists('db_select', $errors)) ? '<span class="error">('. $errors['db_select'] .')</span>' : ''?></p>
	      <form method="post" action="config.php">   

	        <input type="hidden" name="step" id="db" value="" />        

	        <p>
	          <label for="db_type">Database:</label>          

	          <select name="db_type" id="db-type">
	          	<option value="mysql">MySQL</option>
	           </select>        
	        </p>

	        <p>
	          <label for="db_name">Database Name:  <?php echo ( key_exists('db_name',$errors) ) ? '<span class="error">('. $errors['db_name'] .')</span>' : '' ?></label>
	          <input type="text" value="<?php echo $db_name; ?>" name="db_name" id="db_name" />
	        </p>

	        <p>
	          <label for="db_host">Database Host:  <?php echo ( key_exists('db_host',$errors) ) ? '<span class="error">('. $errors['db_host'] .')</span>' : '' ?></label>
	          <input type="text" value="<?php echo $db_host; ?>" name="db_host" id="db_host" />
	        </p>

	        <p>
	          <label for="db_user">Database User Name:  <?php echo ( key_exists('db_user',$errors) ) ? '<span class="error">('. $errors['db_user'] .')</span>' : '' ?></label>
	          <input type="text" value="<?php echo $db_user; ?>" name="db_user" id="db_user" />        
	        </p>

	        <p>
	          <label for="db_password">Database Password  <?php echo ( key_exists('db_password',$errors) ) ? '<span class="error">('. $errors['db_password'] .')</span>' : '' ?></label>          
	          <input value="<?php echo $db_password; ?>" type="password" name="db_password" id="db_password" class="big-text" />        
	        </p>	
	<h1>Step 2: App Settings</h1>
	            <p>
		          <?php
		           //try to determine if they are running under a subdomain or running under a dir
		            $get_uri = $_SERVER['REQUEST_URI'];
		            $parse_uri = substr($get_uri, 1);
		            $get_dir = explode("/", $parse_uri);
		            if($get_dir[0] != 'setup')
		            {
			           $dir_name = $get_dir[0];
			        }             
		 
		          ?>
		          <label for="dir_name">Install Location: </label>
		          <input type="text" value="<?php echo $dir_name; ?>" name="dir_name" id="dir_name" /> <br />
		          <sm>enter the directory name of where you installed openeats it doesn't need to be the full path just the directory name <b>Only Use this if you are going to run OpenEats out of a subdirectory such as http://myhost/oe This should auto-detect and fill it in for you</b> 
			        </sm>
			       <br /> <br />
			       <label for="admin_email">Admin Email: <?php echo ( key_exists('admin_email',$errors) ) ? '<span class="error">('. $errors['admin_email'] .')</span>' : '' ?></label>
			       <input type="text" name="admin_email" id="admin_email"><br />
		        </p>
	        <p><input type="submit" name="submit" onclick="this.style.background='#666'; document.getElementById('wait').style.display='inline'" class="positive" value="Next..." /> <span id="wait" style="display:none;">Building project, please be patient as this might take a few seconds...</span>
	      </form>

	<?php

	include('footer.php'); 

	?>
<?php

#function to convert memory size to bytes to do comparsion on

function return_bytes($val) {
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    switch($last) {
        // The 'G' modifier is available since PHP 5.1.0
        case 'g':
            $val *= 1024;
          break;
        case 'm':
            $val *= 1024;
          break;  
        case 'k':
            $val *= 1024;
        break;
    }
       return $val;
}



if(file_exists('install_lock'))
{
  echo 'The installer has already been ran, please remove the install_lock file if you wish to continue';
  exit;
}


include ('header.php');

?>

<h1>OpenEats Installer</h1>

<p>This is an alpha release of the OpenEats installer and can not be used to do an upgrade, only new installs.  If this does not work please follow the manual directions for a new <a href="install.htm">installation</a> or <a href="upgrade.htm">upgrade</a>
<p>First things first, lets check if you meet the OpenEats requirments.</p>
<h3>PHP configuration check</h3>
<ul>
	<li><?php echo 'Current PHP version: ' . phpversion(); if (phpversion() >= 5.0): echo " Pass"; else: echo " <b>FAILED</b> you need at least version 5.0 of PHP to run OpenEats"; endif;?> </li>
	<li><?php echo 'output_buffering = ' . ini_get('output_buffering') . "\n"; echo (ini_get('output_buffering') == 1) ? 'Output buffer is set to On Pass' : 'Output buffer is set to Off please change this to On in your php.ini file <b>WARN</b> OpenEats will still work but with minor annoying warnings';?></li>	
	<li><?php echo 'magic_quotes_gpc = ' . ini_get('magic_quotes_gpc') . "\n"; echo (ini_get('magic_quotes_gbc') == 0) ? 'Magic Qutoes is set to Off Pass' : 'Magic Quotes is set to On please change this to Off in your php.ini file <b>WARN</b> OpenEats should still work with out issues';?></li>
  <?php $bytes = return_bytes(ini_get('memory_limit')); ?>
  <li>Memory Limit: <?php echo 'memory_limit = ' . ini_get('memory_limit') . "\n"; echo ( $bytes >= 32768 ) ? 'Memory size limit Passed' : 'Memory size should be at least 32megs please change in your php.ini file <b>FAIL</b>';?></li>
</ul>

<h3>PHP extensions check</h3>
<?php
# check for the right things are compiled in to php
$ext_array = array();
$ext_array = get_loaded_extensions();
?>
<ul>
	<li><?php echo (in_array('mysql', $ext_array)) ? 'Mysql Installed Pass' : 'PHP has not been compiled with Mysql extensions <b>FAIL</b>';?></li>
	<li><?php echo (in_array('pcre', $ext_array)) ? 'PCRE Installed Pass' : 'PHP has not been compiled with PCRE extensions <b>FAIL</b> The search engine will not work with out PCRE';?></li>
	<li><?php echo (in_array('gd', $ext_array)) ? 'gd Installed Pass' : 'PHP has not been compiled with gd extensions <b>Warn</b> OpenEats will work but if you don\'t have  the ImageMagik or GD compiled on your computer you won\'t be able to upload pictures.';?></li>
</ul>
<p><button onclick="document.location.href='config.php';">Next...</button></p>

<?php

include('footer.php'); 
  
?>
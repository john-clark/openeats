<?php 
/*function parse_mysql_dump($sqldump,$host,$database,$user,$pass){
	$link = mysql_connect($host, $user, $pass);
		if (!$link) {
		   die('Not connected : ' . mysql_error());
		}
		
		// select the current db
		$db_selected = mysql_select_db($database, $link);
		if (!$db_selected) {
		   die ('Can\'t find database : ' . mysql_error());
		}
   $file_content = file('./include/abc.sql');
   foreach($file_content as $sql_line){
     if(trim($sql_line) != "" && strpos($sql_line, "--") === false){
	 echo $sql_line . '<br>';
      // $query = mysql_query($sql_line) or die ('couldn\'t run query ' . mysql_error());
     }
   }
  }*/

function parse_mysql_dump($sqldump,$host,$database,$user,$pass )
{
	$link = mysql_connect($host, $user, $pass) or die('Not connected to database: ' . mysql_error());
	
	//select the database
	$db = mysql_select_db($database, $link) or die ('Can\'t find database ' . mysql_error());
	
	//open file
	
	$sql_file = fopen($sqldump, "r") or die ('couldn\'t open file');
	$lines = fread($sql_file, filesize ($sqldump));
	
	//search every line for a ; followd by a return key and form that to a single line.  this makes the create table statemenst go to one line
	$lines = explode(";\n", $lines);
	foreach ($lines as $line){
	
	// echo $line . '<br>';
     $query = mysql_query($line) or die ('couldn\'t run query ' . mysql_error());
     
   }
}

function parseDSN($dsn)
{
    $parsed = array(
        'phptype'  => false,
        'dbsyntax' => false,
        'username' => false,
        'password' => false,
        'protocol' => false,
        'hostspec' => false,
        'port'     => false,
        'socket'   => false,
        'database' => false,
    );

    if (is_array($dsn)) {
        $dsn = array_merge($parsed, $dsn);
        if (!$dsn['dbsyntax']) {
            $dsn['dbsyntax'] = $dsn['phptype'];
        }
        return $dsn;
    }

    // Find phptype and dbsyntax
    if (($pos = strpos($dsn, '://')) !== false) {
        $str = substr($dsn, 0, $pos);
        $dsn = substr($dsn, $pos + 3);
    } else {
        $str = $dsn;
        $dsn = null;
    }

    // Get phptype and dbsyntax
    // $str => phptype(dbsyntax)
    if (preg_match('|^(.+?)\((.*?)\)$|', $str, $arr)) {
        $parsed['phptype']  = $arr[1];
        $parsed['dbsyntax'] = !$arr[2] ? $arr[1] : $arr[2];
    } else {
        $parsed['phptype']  = $str;
        $parsed['dbsyntax'] = $str;
    }

    if (!count($dsn)) {
        return $parsed;
    }

    // Get (if found): username and password
    // $dsn => username:password@protocol+hostspec/database
    if (($at = strrpos($dsn,'@')) !== false) {
        $str = substr($dsn, 0, $at);
        $dsn = substr($dsn, $at + 1);
        if (($pos = strpos($str, ':')) !== false) {
            $parsed['username'] = rawurldecode(substr($str, 0, $pos));
            $parsed['password'] = rawurldecode(substr($str, $pos + 1));
        } else {
            $parsed['username'] = rawurldecode($str);
        }
    }

    // Find protocol and hostspec

    if (preg_match('|^([^(]+)\((.*?)\)/?(.*?)$|', $dsn, $match)) {
        // $dsn => proto(proto_opts)/database
        $proto       = $match[1];
        $proto_opts  = $match[2] ? $match[2] : false;
        $dsn         = $match[3];

    } else {
        // $dsn => protocol+hostspec/database (old format)
        if (strpos($dsn, '+') !== false) {
            list($proto, $dsn) = explode('+', $dsn, 2);
        }
        if (strpos($dsn, '/') !== false) {
            list($proto_opts, $dsn) = explode('/', $dsn, 2);
        } else {
            $proto_opts = $dsn;
            $dsn = null;
        }
    }

    // process the different protocol options
    $parsed['protocol'] = (!empty($proto)) ? $proto : 'tcp';
    $proto_opts = rawurldecode($proto_opts);
    if (strpos($proto_opts, ':') !== false) {
        list($proto_opts, $parsed['port']) = explode(':', $proto_opts);
    }
    if ($parsed['protocol'] == 'tcp') {
        $parsed['hostspec'] = $proto_opts;
    } elseif ($parsed['protocol'] == 'unix') {
        $parsed['socket'] = $proto_opts;
    }

    // Get dabase if any
    // $dsn => database
    if ($dsn) {
        if (($pos = strpos($dsn, '?')) === false) {
            // /database
            $parsed['database'] = rawurldecode($dsn);
        } else {
            // /database?param1=value1&param2=value2
            $parsed['database'] = rawurldecode(substr($dsn, 0, $pos));
            $dsn = substr($dsn, $pos + 1);
            if (strpos($dsn, '&') !== false) {
                $opts = explode('&', $dsn);
            } else { // database?param1=value1
                $opts = array($dsn);
            }
            foreach ($opts as $opt) {
                list($key, $value) = explode('=', $opt);
                if (!isset($parsed[$key])) {
                    // don't allow params overwrite
                    $parsed[$key] = rawurldecode($value);
                }
            }
        }
    }

    return $parsed;
}


?>
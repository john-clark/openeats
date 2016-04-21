<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="OpenEats Recipe Management::Error" />
<meta name="robots" content="index, follow" />
<meta name="language" content="en" />
<link rel="stylesheet" type="text/css" media="screen" href="../css/errors.css" />
<title>OpenEats Recipe Management::Error</title>
<link rel="shortcut icon" href="/favicon.ico" />
</head>
<?php //open the app.yml file and get the email address for the admin
 $file = "../apps/OpenEats/config/app.yml";
 $fp = fopen($file, 'r');
 $content = fread($fp, filesize($file));

preg_match('/admin_email: (?<email>\w+@\w+\.\w+)/', $content, $matches);
?>



<body>
	<div class="Alert Lock"> 
	  <img src="/sf/sf_default/images/icons/tools48.png" height="48" width="48"/>
	  <div class="AlertMessage">
	    <h1>Oops! An Error Occured</h1>
	    <h5>The server returned a "500 Internal Server Error".</h5>
	  </div>
	</div>
	<br clear=both>
 <dl class="MessageInfo">
    <dt>Something is broken</dt>
    <dd>Please e-mail us at <a href="mailto:<?php echo $matches[email]?>">Mail</a>
    and let us know what you were doing when this error occurred. We will fix it as soon as possible.
    Sorry for any inconvenience caused.</dd>
  
    <dt>What's next</dt>
    <dd>
      <ul class="IconList">
        <li class="LinkMessage"><a href="javascript:history.go(-1)">Back to previous page</a></li>
        <li class="LinkMessage"><a href="/">Go to Homepage</a></li>
      </ul>
    </dd>
  </dl>

</body>
</html>
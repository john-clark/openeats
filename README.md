OpenEats Web app
===================


This project moves the discarded [OpenEats project on SourceForge](https://sourceforge.net/projects/openeats/) to [Github](https://github.com/john-clark/openeats).

----------

Info
----

Based off a base debian 8.4 install with only the webserver task.

**NOTE:** This is testing. I am wiping the VM and now trying these instructions.


**Pre-Reqs:**

> **MYSQL**
> - `apt-get install mysql-server mysql-client`
> - `mysql_secure_installation`
> - `mysql -u root -p -e "CREATE DATABASE openeats"`
> - `mysql -u root -p -e "GRANT ALL PRIVILEGES ON openeats.* TO 'openeats'@'localhost' IDENTIFIED BY 'oepassword'"`

> **PHP** 
> - `apt-get install php5 php5-mysql php5-gd php-pear libpcre3 imagemagick`
> - `vi /etc/php5/apache2/php.ini`
> *change output_buffering = 4096 to on*


**Install:**

> **WebApp**
> - `git clone http://github.com/john-clark/openeats`
> - `chgrp -R www-data openeats`
> - `chmod g+w log cache`

> **Website**
> - `rm /etc/apache2/sites-enabled/00-default.conf`
> - `ln -s /var/www/openeats/conf/apache.conf /etc/apache2/sites-enabled/openeats.conf`
> - `service apache2 restart`

**Configure**

> - *open browser to `http://tempserver/setup/install.php`*
> - *Fill out form*

**To debug errors `mv /var/www/openeats/debug.php /var/www/openeats/web/` 
and browse to `http://tempserver/debug.php`**

**Change config/databases.yml if you changed the mysql info**

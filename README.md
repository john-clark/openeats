OpenEats Symphony Web Application
===================

Original Author is [qgriffith](https://github.com/qgriffith)

This project  is a forkm from [OpenEats project on SourceForge](https://sourceforge.net/projects/openeats/) to [Github](https://github.com/john-clark/openeats).

I am not attempting to add any functionality or fix any bugs or security issues.

[Orginal info](https://openeats.wordpress.com/install/) may be of some help, but is from 2008/09.

----------

Info
----

Based off a base debian 8.4 install with only the webserver task.

###Pre-Reqs:

> **MYSQL**
> - `apt-get install mysql-server mysql-client`
> - `mysql_secure_installation`
> - `mysql -u root -p -e "CREATE DATABASE openeats"`
> - `mysql -u root -p -e "GRANT ALL PRIVILEGES ON openeats.* TO 'openeats'@'localhost' IDENTIFIED BY 'oepassword'"`

> **PHP** 
> - `apt-get install php5 php5-mysql php5-gd php-pear libpcre3 imagemagick`
> - `vi /etc/php5/apache2/php.ini`
> *change output_buffering = 4096 to on*

> **GIT**
> - `apt-get install git-core`

###Install:

> **WebApp**
> - `cd /var/www`
> - `git clone http://github.com/john-clark/openeats`
> - `cd openeats`
> - `mkdir log cache`
> - `chmod g+w log cache`
> - `chgrp -R www-data .`

> **Website**
> - `rm /etc/apache2/sites-enabled/00-default.conf`
> - `ln -s /var/www/openeats/conf/apache.conf /etc/apache2/sites-enabled/openeats.conf`
> - `service apache2 restart`

###Import Database: 
Might change this to importing `/data/sql/oe_schema.sql`

> - *open browser to `http://tempserver/setup/install.php`*
> - *Fill out form*

## Notes:

----

**To debug errors `mv /var/www/openeats/debug.php /var/www/openeats/web/` 
and browse to `http://tempserver/debug.php`**

**Change config/databases.yml if you changed the mysql info**

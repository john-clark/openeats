OpenEats Web app
===================


This project moves the discarded [OpenEats project on SourceForge](https://sourceforge.net/projects/openeats/) to [Github](https://github.com/john-clark/openeats).

----------

Info
----

Based off a base debian 8.4 install with only the webserver task.

> **Pre-Git:**

> `apt-get install lynx git`
> `cd /var/www`
> `use lynx to browse to the sourceforge page and download oe_1.2.tgz`
> `tar xzvf oe_1.2.tgz`
> `mv oe_1.2 openeats`

> **Post-Git:**

> - `git clone http://github.com/john-clark/openeats`

> **Pre-Reqs:**

> - `apt-get install mysql-server mysql-client`
> - `mysql_secure_installation`
> - `apt-get install php5 php5-mysql php5-gd php-pear libpcre3 imagemagick`
> - `vi /etc/php5/apache2/php.ini`
> *change output_buffering = 4096 to on*
> - `rm /etc/apache2/sites-enabled/00-default.conf
> - `ln -s /var/www/openeats/conf/apache.conf /etc/apache2/sites-enabled/openeats.conf`
> *fix/remove the sitename*, 
> *fix log lines*
> - `mysql -u root -p -e "CREATE DATABASE openeats"`
> - `mysql -u root -p -e "GRANT ALL PRIVILEGES ON openeats.* TO 'openeats'@'localhost' IDENTIFIED BY 'oepassword'"`
> - `service apache2 restart`

**Next on the list:**

> **Install:**

> - *open browser to `http://tempserver/setup/install.php`*
> - *Fill out form*
> ... Step 1
> ... Step 2


Commit this!

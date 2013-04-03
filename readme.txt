About ethiomirror CMS
==========================
This CMS was designed specifically for a website called ethiomirror.com, a private owned news paper in Addis Ababa, Ethiopia. 

Currently the website is down due unresolved issues with the government. 

The CMS is not fully complete but functional to a certain level

Installation
==========================
1. execute the dbdump.sql 
2. copy the directory ethiomirror.com to your webserver 
root directory e.g. localhost/ethiomirror.com
3. modify MySQL dtatabase connection string.
i.e. ethiomirror.com/admin/class/includes/dbconnect.php
modify host, username and password according to your MySQL database configuration:
e.g.
	define ('DB', 'ethiomirror');
	define ('HOST', 'localhost');
	define ('USER','root');
	define ('PASSWORD', 'password');

4. to access the back end(CMS admin panel), use /admin
default username: admin
default password: admin
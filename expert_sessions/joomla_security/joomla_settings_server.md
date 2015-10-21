class: center, middle
# Server settings
## Joomla Security
### door: Sander

---
# Database prefix
* Nieuwe installaties = random
* Oude installaties soms nog `jos_` = aanpassen

---
# Backend .htaccess - IP's toestaan
Alleen toegang vanaf bepaalde IP-adressen
```
Deny from ALL
Allow from x.x.x.x
```

---
# Backend .htaccess - wachtwoord
Met wachtwoord afschermen
.htaccess bestand:
```
AuthUserFile "/pad/naar/expertsessie.nl/administrator/.htpasswd"
AuthName "Restricted Area"
AuthType Basic
require valid-user

RewriteEngine On
RewriteRule \.htpasswd$ - [F,L]
```

.htpasswd bestand:
```
expertsessie:$apr1$ZkYPzIry$YdRELnbNn1zRlJ8d7KlRE1
```
http://www.htaccesstools.com/htpasswd-generator/

---
# Frontend .htaccess
* zelf doen
* via extensie als Admin Tools

---
# Frontend .htaccess zelf doen (1)
```
########## Begin - Common hacking tools and bandwidth hoggers block
## By SigSiu.net and @nikosdion.
# This line also disables Akeeba Remote Control 2.5 and earlier
SetEnvIf user-agent "Indy Library" stayout=1
# WARNING: Disabling wget will also block the most common method for
# running CRON jobs. Remove if you have issues with CRON jobs.
SetEnvIf user-agent "Wget" stayout=1
# The following rules are for bandwidth-hogging download tools
SetEnvIf user-agent "libwww-perl" stayout=1
SetEnvIf user-agent "Download Demon" stayout=1
SetEnvIf user-agent "GetRight" stayout=1
SetEnvIf user-agent "GetWeb!" stayout=1
SetEnvIf user-agent "Go!Zilla" stayout=1
SetEnvIf user-agent "Go-Ahead-Got-It" stayout=1
SetEnvIf user-agent "GrabNet" stayout=1
SetEnvIf user-agent "TurnitinBot" stayout=1
# This line denies access to all of the above tools
deny from env=stayout
########## End - Common hacking tools and bandwidth hoggers block
```

---
# Frontend .htaccess zelf doen (2)
```
########## Begin - Rewrite rules to block out some common exploits
## If you experience problems on your site block out the operations listed below
## This attempts to block the most common type of exploit `attempts` to Joomla!
#
# If the request query string contains /proc/self/environ (by SigSiu.net)
RewriteCond %{QUERY_STRING} proc/self/environ [OR]
# Legacy variable injection (these attacks wouldn't work w/out Joomla! 1.5's Legacy Mode plugin)
RewriteCond %{QUERY_STRING} mosConfig_[a-zA-Z_]{1,21}(=|\%3D) [OR]
# Block out any script trying to base64_encode/base64_decode data to send via URL
RewriteCond %{QUERY_STRING} base64_(en|de)code\(.*\) [OR]
## IMPORTANT: If the above line throws an HTTP 500 error, replace it with these 2 lines:
# RewriteCond %{QUERY_STRING} base64_encode\(.*\) [OR]
# RewriteCond %{QUERY_STRING} base64_decode\(.*\) [OR]
# Block out any script that includes a <script> tag in URL
RewriteCond %{QUERY_STRING} (<|%3C).*script.*(>|%3E) [NC,OR]
# Block out any script trying to set a PHP GLOBALS variable via URL
RewriteCond %{QUERY_STRING} GLOBALS(=|\[|\%[0-9A-Z]{0,2}) [OR]
# Block out any script trying to modify a _REQUEST variable via URL
RewriteCond %{QUERY_STRING} _REQUEST(=|\[|\%[0-9A-Z]{0,2})
# Return a 403 Forbidden header and show the content of the root homepage
RewriteRule .* index.php [F]
#
########## End - Rewrite rules to block out some common exploits
```
---
# Frontend .htaccess zelf doen (3)
```
## Back-end protection
## This also blocks fingerprinting attacks browsing for XML and INI files
RewriteRule ^administrator/?$ - [L]
RewriteRule ^administrator/index\.(php|html?)$ - [L]
RewriteRule ^administrator/index[23]\.php$ - [L]
RewriteRule ^administrator/(components|modules|templates|images|plugins)/.*\.(jp(e?g|2)?|png|gif|bmp|css|js|swf|html?|mp(eg?|[34])|avi|wav|og[gv]|xlsx?|docx?|pptx?|zip|rar|pdf|xps|txt|7z|svg|od[tsp]|flv|mov)$ - [L]
RewriteRule ^administrator/ - [F]
```
```
<FilesMatch "(?<!sitemap)\.xml$">
	Order allow,deny
	Deny from all
</FilesMatch>
```

---
# Frontend .htaccess - meer info
* https://docs.joomla.org/Htaccess_examples_(security)
* https://github.com/nikosdion/master-htaccess/blob/master/htaccess.txt

---
# Frontend .htaccess Admin Tools
@TODO Screenshot


---
# Verwijder onnodige bestanden
```
/CHANGELOG.php
/configuration.php-dist
/COPYRIGHT.php
/CREDITS.php
/htaccess.txt
/joomla.xml
/LICENSE.txt
/LICENSE.php
/README.txt
/robots.txt.dist
/web.config.txt
```

---
# phpinfo()
* verwijder van server
* kan gewoon via Joomla
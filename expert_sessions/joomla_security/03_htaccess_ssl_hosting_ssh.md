class: center, middle, intro
# Server-instellingen
## Via de server de veiligheid verhogen

---
# Database prefix
* Nieuwe installaties = random @TODO screenshot
* Nog `jos_` als prefix? Pas dit aan!
* @TODO: 3.4.5 hack voorkomen!

---
# Verwijder onnodige bestanden
Bestanden die Joomla niet gebruikt en eenvoudig oproepbaar zijn via `www.expertsessie.nl/joomla.xml`
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
# Bestanden met `phpinfo();`
* Verwijder en gebruik geen bestanden die PHP-info tonen
* Vaak `php.php`, `phpinfo.php`, etc...

--

* Informatie is via Joomla opvraagbaar:
<img src="joomla_security/images/phpinfo.png"/>
<span class="size-20">Locatie: `Systeem` &#10148; `Systeeminformatie` &#10148; `PHP informatie`</span>

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
Niet alleen voor SEF-url's en snelheid. Ook voor veiligheid!

--

Twee opties:
* Zelf samenstellen
* Genereren via extensie als Admin Tools

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
# Frontend .htaccess zelf doen (4)
Voorbeelden van .htaccess bestanden voor Joomla:
* https://docs.joomla.org/Htaccess_examples_(security)
* https://github.com/nikosdion/master-htaccess/blob/master/htaccess.txt

---
# Frontend .htaccess Admin Tools
@TODO Screenshot



---
class: center, middle, intro
# SSL-certificaten
## Is dat veiliger? Hoe werkt dat precies?

---
# SSL met Joomla sites
- SSL certificaat
    - SSL certificate authority
    - SSL certificate chain
- Server support voor SSL
- Eigen IP adres

---
# SSL certificaat
- Verificatie van eigenaar
    - Controle KvK, adres, bankgegevens
    - Extended Validation (EV)
- RSA key-pair (2048 bits)
- Protocollen
    - Verouderd: SSLv2, SSLv3
    - Modern: TLSv1.0, TLSv1.1, TLSv1.2
- SSL ciphers

---
# OpenSSL problemen
- Heartbleed
- Poodle
- PRNG zwakheden

Lange lijst: https://www.openssl.org/news/vulnerabilities.html

---
# SSL op alle paginas?
- Yireo SSLRedirect
- Google waardeert SSL meer dan non-SSL
- HTTP Strict Transport Security (HSTS)

---
# SSL online checks
- https://www.sslcheck.nl/
- https://www.ssllabs.com/ssltest/
- https://www.sslchecker.com/

---
# Tip: Test browsers
- Test SSL support in alle browsers
    - https://www.browserstack.com/
- Zorg bij iedere SSL site voor TLSv1.2
- Laat SSL ciphers aan hoster over



---
class: center, middle, intro
# PHP-instellingen
## Juiste PHP-instellingen voor Joomla

---
# Eventjes over PHP versies
- PHP 5.3 is stokoud
- PHP 5.4 is sinds september obsolete
- PHP 5.5 werkt gewoon
- PHP 5.6 is sneller
- PHP 7 is retesnel

---
# PHP settings
* expose_php = 0
* open_basedir = /home/USERX/domains/DOMAINY
* register_globals = 0

---
# PHP modules
* mod_security
* Suhosin



---
class: center, middle, intro
# FTP, FTPS, SFTP &amp; SSH
## (of: een veilige verbinding met de server)

---
# FTP: File Transfer Protocol
<img src="joomla_security/images/ftp.png"/>

---
# FTP
### Voordelen
* Gebruiksvriendelijk
* Compatibiliteit met derden

### Nadelen
* Onveilig (geen encryptie, wachtwoord op straat)
* Geeft vaak problemen met firewalls

---
# FTPS: FTP Secure
<img src="joomla_security/images/ftps.png"/>

---
# FTPS - FTP over SSL
### Voordelen
* Veiliger dan FTP
* Eenvoudige controle over toegangsrechten

### Nadelen
* SSL Certificaat vereist
* Geeft vaak problemen met firewalls

---
# SFTP: Secure File Transfer Protocol
<img src="joomla_security/images/sftp.png"/>

---
# SFTP - FTP over SSH
### Voordelen
* Veiligste oplossing
* Geen problemen met firewalls
* Geen SSL certificaat nodig

### Nadelen
* Controle over toegangsrechten complexer
* SSH toegang nodig van je hoster

---
# SSH: Secure Shell Protocol
Authenticatie met een publiek/geheim sleutelpaar (public/private key)

--

### SSH (shell) keys werken als een soort slot en sleutel 
* De Public Key (het slot) - plaats je op de SSH Shell `id_rsa_pub`
* Private Key (sleutel) - sla je op je computer op `id_rsa`

<img src="joomla_security/images/ssh-key.png"/>

--

### Informeer bij je webhost voor juiste procedure



---
class: center, middle, intro
# Linux-hosting
## Waar op letten met hosting?

---
# Het probleem van shared hosting
- Alle home-folders moeten leesbaar zijn
    - Uitlezen van wachtwoorden relatief makkelijk
- Vermijd goedkope hosters
- Pas op voor bestandspermissies
    - Bestanden: Niet 666 maar 644
    - Folders: Niet 777 maar 755

---
# Firewalls
- nftables / iptables / ipchains
    - TCP SYN attacks
    - ping flooding
- Apache ModSecurity

---
# Brute force detection
- DenyHosts
- Fail2Ban

---
# Intrusion detection
- `auditd`
- IDS
    - AppArmor
    - SELinux
- git

---
# Up to date blijven
- Shell Shock (bash)
- Zwakheden in OpenSSL
- Buffer overflows

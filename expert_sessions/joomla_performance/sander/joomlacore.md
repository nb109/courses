class: middle, center, intro
# Performance &amp;<br>Joomla! core
## door Sander Potjer
### <a href="http://twitter.com/sanderpotjer">@sanderpotjer</a>
<img src="images/logos.png">

---
# Update Joomla! & extensies
Gebruik de meest recente versies van Joomla en extensies

<img src="joomla_performance/sander/images/joomla-update-now.png">

---
# Ruim op!
- Verwijder ongebruikte extensies (scheelt ook onderhoud)
- Installeer niet meerdere extensies voor zelfde functionaliteit
- Let extra op Systeem Plugins
- Kies je extensies ook met oog op performance

---
# Zet databasetype op MySQLi

### Pas aan in algemene Joomla instellingen
<img src="joomla_performance/sander/images/mysqli.png">

### Of via configuration.php

`public $dbtype = 'mysqli';`

---
# Zet GZIP paginacompressie aan

### Pas aan in algemene Joomla instellingen
<img src="joomla_performance/sander/images/gzip.png">

### Of via configuration.php

`public $gzip = '1';`

### Let op!
Kan soms problemen geven, bijvoorbeeld met Facebook en LinkedIn. Oplossing in JED: <a href="https://extensions.joomla.org/extension/gzip-control/">Gzip Control</a>.

---
class: middle, center, intro
# Joomla! caching

---
# Wat is caching eigenlijk?

<img src="joomla_performance/sander/images/wat-is-cache.png">

---
# Soorten cache

<img src="joomla_performance/sander/images/soorten-cache.png">

---
# Joomla! cache opties

<img src="joomla_performance/sander/images/cache-instellingen.png">

---
# Conservatief vs Progressief

<img src="joomla_performance/sander/images/conservatief-vs-progressief.png">

---
# Module caching

<img src="joomla_performance/sander/images/module-caching.png">

---
# Joomla! Paginacache

<img src="joomla_performance/sander/images/joomla-page-cache.png">

---
class: center, middle, intro
# Bedankt!

<img src="/images/logos.png">

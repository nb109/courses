class: center, middle
# Een goede basis
## door Sander Potjer
### <a href="http://twitter.com/sanderpotjer">@sanderpotjer</a>

---
class: code-14
# Standaard template index.php ...
```php
<?php defined('_JEXEC') or die; ?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<jdoc:include type="head" />
	</head>

	<body>
		<jdoc:include type="modules" name="breadcrumbs" />
		<jdoc:include type="modules" name="search" />
		<jdoc:include type="message" />
		<jdoc:include type="component" />
		<jdoc:include type="modules" name="debug" />
	</body>
</html>
```

---
class: code-12
# ... resulteert in:
```html
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
	<head>
		  <base href="http://expertsessie.nl/" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title>Home</title>
  <link href="http://expertsessie.nl/" rel="canonical" />
  <link href="/templates/joomlabasis/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="/media/com_finder/css/finder.css" type="text/css" />
  <script src="/media/jui/js/jquery.min.js" type="text/javascript"></script>
  <script src="/media/jui/js/jquery-noconflict.js" type="text/javascript"></script>
  <script src="/media/jui/js/jquery-migrate.min.js" type="text/javascript"></script>
  <script src="/media/system/js/caption.js" type="text/javascript"></script>
  <script src="/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/media/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="/media/system/js/core.js" type="text/javascript"></script>
  <script src="/media/com_finder/js/autocompleter.js" type="text/javascript"></script>
  <script type="text/javascript">
jQuery(window).on('load',  function() {
				new JCaption('img.caption');
			});
jQuery(document).ready(function(){
	jQuery('.hasTooltip').tooltip({"html": true,"container": "body"});
});
  </script>

	</head>
```

---
# Nadelen
- Meerdere JavaScript frameworks (jQuery & Mootools)
- Ieder met eigen aanvullende JavaScript bestanden
- Vaak nog extra extensie JavaScript & CSS
- Soms zelfs dubbel tot vierdubbele jQuery files

--

## Conflicten gegarandeerd! (en dus debug-uren)

---
# Goede start is het halve werk
- Voorkom conflicten, bespaar uren debuggen en fixen
- Schone basis = volledige controle
- Geen overbodige kB's (of zelfs MB's...)

### Daarom output naar eigen hand zetten

---
class: code-14
# Broncode website - JS
```html
<script src="/media/jui/js/jquery.min.js" type="text/javascript"></script>
<script src="/media/jui/js/jquery-noconflict.js" type="text/javascript"></script>
<script src="/media/jui/js/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/media/system/js/caption.js" type="text/javascript"></script>
<script src="/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/media/system/js/mootools-core.js" type="text/javascript"></script>
<script src="/media/system/js/core.js" type="text/javascript"></script>
<script src="/media/com_finder/js/autocompleter.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(window).on('load',  function() {
				new JCaption('img.caption');
			});
jQuery(document).ready(function(){
	jQuery('.hasTooltip').tooltip({"html": true,"container": "body"});
});
</script>
```

---
class: code-14
# index.php - JavaScript opruimen
```php
// Unset unwanted JavaScript
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-core.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-more.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/caption.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/core.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-migrate.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/bootstrap.min.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/tabs-state.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/validate.js']);
unset($this->_scripts[$this->baseurl .'/media/com_finder/js/autocompleter.js']);
```

---
class: code-14
# Broncode website
```html
<script src="/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/media/system/js/mootools-core.js" type="text/javascript"></script>
<script src="/media/system/js/core.js" type="text/javascript"></script>
<script src="/media/com_finder/js/autocompleter.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(window).on('load',  function() {
				new JCaption('img.caption');
			});
jQuery(document).ready(function(){
	jQuery('.hasTooltip').tooltip({"html": true,"container": "body"});
});
</script>
```

---
class: code-14
# index.php - JavaScript opruimen
```php
if (isset($this->_script['text/javascript'])) 
{
	$this->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\'\,\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\);\s*}\s*\);\s*%', '', $this->_script['text/javascript']);

	$this->_script['text/javascript'] = preg_replace("%\s*jQuery\(document\)\.ready\(function\(\)\{\s*jQuery\('\.hasTooltip'\)\.tooltip\(\{\"html\":\s*true,\"container\":\s*\"body\"\}\);\s*\}\);\s*%", '', $this->_script['text/javascript']);

	// Unset completly if empty
	if (empty($this->_script['text/javascript'])) 
	{
		unset($this->_script['text/javascript']);
	}
}
```

---
class: code-14
# Broncode website
```html
<script src="/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/media/system/js/mootools-core.js" type="text/javascript"></script>
<script src="/media/system/js/core.js" type="text/javascript"></script>
<script src="/media/com_finder/js/autocompleter.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.hasTooltip').tooltip({"html": true,"container": "body"});
});
</script>

```

---
class: code-16
# Veroorzaker: mod_finder
```html
<body>
	<jdoc:include type="modules" name="breadcrumbs" />
	<jdoc:include type="modules" name="search" />
	<jdoc:include type="message" />
	<jdoc:include type="component" />
	<jdoc:include type="modules" name="debug" />
</body>
```
aanpassen in:
```html
<body>
	<jdoc:include type="modules" name="breadcrumbs" />

	<jdoc:include type="message" />
	<jdoc:include type="component" />
	<jdoc:include type="modules" name="debug" />
</body>
```

---
class: code-14
# Broncode website
```html
<script src="/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.hasTooltip').tooltip({"html": true,"container": "body"});
});
</script>	
```

---
class: code-16
# Veroorzaker: mod_breadcrumbs
```html
<body>
	<jdoc:include type="modules" name="breadcrumbs" />

	<jdoc:include type="message" />
	<jdoc:include type="component" />
	<jdoc:include type="modules" name="debug" />
</body>
```
aanpassen in:
```html
<body>


	<jdoc:include type="message" />
	<jdoc:include type="component" />
	<jdoc:include type="modules" name="debug" />
</body>
```

---
class: code-14
# Broncode website
```html
	
```

---
class: code-14
# Weghalen geen optie
```html
<body>
	<jdoc:include type="modules" name="breadcrumbs" />

	<jdoc:include type="message" />
	<jdoc:include type="component" />
	<jdoc:include type="modules" name="debug" />
</body>
```
Broncode website

```html
<script src="/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.hasTooltip').tooltip({"html": true,"container": "body"});
});
</script>	
```

---
class: code-18
# Waar komt het vandaan?
`modules/mod_breadcrumbs/tmpl/default.php` regel 12:
```php
JHtml::_('bootstrap.tooltip');
```

## Oplossingen:
- Template override
- via index.php truc

---
class: code-14
# Voorkeur heeft index.php
```html
<script src="/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.hasTooltip').tooltip({"html": true,"container": "body"});
});
</script>	
```
## Maar... waarom werkt dit dan niet?
```php
// Unset unwanted JavaScript
unset($this->_scripts[$this->baseurl .'/media/jui/js/bootstrap.min.js']);

$this->_script['text/javascript'] = preg_replace("%\s*jQuery\(document\)\.ready\(function\(\)\{\s*jQuery\('\.hasTooltip'\)\.tooltip\(\{\"html\":\s*true,\"container\":\s*\"body\"\}\);\s*\}\);\s*%", '', $this->_script['text/javascript']);
```

---
class: code-14
# index.php - JavaScript opruimen
```php
// Call JavaScript to be able to unset it :-S
JHtml::_('behavior.framework');
JHtml::_('bootstrap.framework');
JHtml::_('jquery.framework');
JHtml::_('bootstrap.tooltip');

// Unset unwanted JavaScript
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-core.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-more.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/caption.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/core.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-migrate.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/bootstrap.min.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/tabs-state.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/validate.js']);
unset($this->_scripts[$this->baseurl .'/media/com_finder/js/autocompleter.js']);
```

---
class: code-14
# Weghalen geen optie
```html
<body>
	<jdoc:include type="modules" name="breadcrumbs" />
	<jdoc:include type="modules" name="search" />
	<jdoc:include type="message" />
	<jdoc:include type="component" />
	<jdoc:include type="modules" name="debug" />
</body>
```
# Broncode website

```html
<link rel="stylesheet" href="/media/com_finder/css/finder.css" type="text/css" />
<script src="/media/com_finder/js/autocompleter.js" type="text/javascript"></script>	
```

---
class: code-18
# Waar komt het vandaan?
`modules/mod_finder/tmpl/default.php` regel 73:
```php
JHtml::stylesheet('com_finder/finder.css', false, true, false);
```
en regel 129:
```php
JHtml::_('script', 'com_finder/autocompleter.js', false, true);
```

## Oplossing:
- Template override

---
class: code-14
# index.php - CSS opruimen
```php
// Unset unwanted CSS
$unset_css = array('com_rsform' , 'com_finder' , 'com_nogiets' , 'mod_kanook' );

foreach($this->_styleSheets as $name=>$style) 
{
	foreach($unset_css as $css) 
	{
		if (strpos($name,$css) !== false) 
		{
			unset($this->_styleSheets[$name]);
		}
	}
}
```

---
class: code-12
# Broncode website was...
```html
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
	<head>
		  <base href="http://expertsessie.nl/" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title>Home</title>
  <link href="http://expertsessie.nl/" rel="canonical" />
  <link href="/templates/joomlabasis/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="/media/com_finder/css/finder.css" type="text/css" />
  <script src="/media/jui/js/jquery.min.js" type="text/javascript"></script>
  <script src="/media/jui/js/jquery-noconflict.js" type="text/javascript"></script>
  <script src="/media/jui/js/jquery-migrate.min.js" type="text/javascript"></script>
  <script src="/media/system/js/caption.js" type="text/javascript"></script>
  <script src="/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/media/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="/media/system/js/core.js" type="text/javascript"></script>
  <script src="/media/com_finder/js/autocompleter.js" type="text/javascript"></script>
  <script type="text/javascript">
jQuery(window).on('load',  function() {
				new JCaption('img.caption');
			});
jQuery(document).ready(function(){
	jQuery('.hasTooltip').tooltip({"html": true,"container": "body"});
});
  </script>

	</head>
```

---
class: code-12
# ... en is nu:
```html
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
	<head>
		  <base href="http://expertsessie.nl/" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title>Home</title>
  <link href="http://expertsessie.nl/" rel="canonical" />
  <link href="/templates/joomlabasis/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

	</head>
```

---
class: code-12
# Eigen JS, CSS & Meta toevoegen
```php
// Add Javascripts
$doc->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', 'text/javascript', true);
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/site.min.js', 'text/javascript', true);

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Set MetaData
$doc->setMetaData('viewport', 'width=device-width, initial-scale=1.0' );
$doc->setMetaData('content-type', 'text/html', true );
$doc->setGenerator($sitename);
```
## Merk op
- addScript met `true` aan het eind. Zorgt voor `defer="defer"`
- Google jQuery (waarschijnlijk al in browser cache)
- site.min.js met alle site-specifieke JavaScript

---
class: code-8
```php
<?php
defined('_JEXEC') or die;

// Call JavaScript to be able to unset it :-S
JHtml::_('behavior.framework');
JHtml::_('bootstrap.framework');
JHtml::_('jquery.framework');
JHtml::_('bootstrap.tooltip');

// Unset unwanted JavaScript
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-core.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-more.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/caption.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/core.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-migrate.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/bootstrap.min.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/tabs-state.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/validate.js']);
unset($this->_scripts[$this->baseurl .'/media/com_finder/js/autocompleter.js']);

if (isset($this->_script['text/javascript'])) {
	$this->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\'\,\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\);\s*}\s*\);\s*%', '', $this->_script['text/javascript']);
	$this->_script['text/javascript'] = preg_replace("%\s*jQuery\(document\)\.ready\(function\(\)\{\s*jQuery\('\.hasTooltip'\)\.tooltip\(\{\"html\":\s*true,\"container\":\s*\"body\"\}\);\s*\}\);\s*%", '', $this->_script['text/javascript']);
	if (empty($this->_script['text/javascript'])) {
		unset($this->_script['text/javascript']);
	}
}

// Unset unwanted CSS
$unset_css = array('com_rsform','com_finder');
foreach($this->_styleSheets as $name=>$style) {
	foreach($unset_css as $css) {
		if (strpos($name,$css) !== false) {
			unset($this->_styleSheets[$name]);
		}
	}
}

// Add Javascripts
$doc->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', 'text/javascript', true);
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/site.min.js', 'text/javascript', true);

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Set MetaData
$doc->setMetaData('viewport', 'width=device-width, initial-scale=1.0' );
$doc->setMetaData('content-type', 'text/html', true );
$doc->setGenerator($sitename);
?>
```

---
class: code-12
# Broncode website
```html
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
	<head>
		  <base href="http://expertsessie.nl/" />
  <meta http-equiv="content-type" content="text/html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="generator" content="Expert Sessie" />
  <title>Home</title>
  <link href="http://expertsessie.nl/" rel="canonical" />
  <link href="/templates/joomlabasis/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="/templates/joomlabasis/css/template.css" type="text/css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" defer="defer"></script>
  <script src="/templates/joomlabasis/js/site.min.js" type="text/javascript" defer="defer"></script>

	</head>
```

---
class: code-12
# Nette output
```html
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<jdoc:include type="head" />
	</head>
```
aanpassen in:
```html
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" /></head>
```

---
class: code-12
# Broncode website
```html
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
<head>
  <base href="http://expertsessie.nl/" />
  <meta http-equiv="content-type" content="text/html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="generator" content="Expert Sessie" />
  <title>Home</title>
  <link href="http://expertsessie.nl/" rel="canonical" />
  <link href="/templates/joomlabasis/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="/templates/joomlabasis/css/template.css" type="text/css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" defer="defer"></script>
  <script src="/templates/joomlabasis/js/site.min.js" type="text/javascript" defer="defer"></script>
</head>

```

---
# Eenmalig eigen basis opzetten
- Investeer eenmalig tijd in een goede basis
- Gebruik als kickstart voor ieder template-project
- Beheer basis via bijvoorbeeld een github-repo
- Maak bibliotheek van overrides, JavaScript, LESS

---
# Vragen?

<br><br>

## Resourcres
- [link naar PWT basis op github]

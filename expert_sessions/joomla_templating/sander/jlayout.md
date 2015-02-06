class: middle
# JLayout
## door Sander Potjer
### <a href="http://twitter.com/sanderpotjer">@sanderpotjer</a>

---
# JLayout, wat is dat?
- manier om (klein stukje) weergave op te bouwen
- enkel layout bestand met specifieke output
- data variabel meesturen

---
class: center, middle
# DRY

--

## Don't Repeat Yourself

---
# Voordelen gebruik JLayout
- herbruikbaar door gehele site (template en extensies)
- aanpassingen één keer doorvoeren in plaats op diverse plekken
- niet langer copy/pasten van code in template overrides

--
- <strong>herbruikbaar in verschillende projecten</strong>

---
class: center, middle
# Gebruik JLayout in Joomla core

---
# Gebruik JLayout in Joomla core
- op steeds meer plekken
- bijvoorbeeld voor tags
- artikel weergave bestaat uit veel JLayout files
- te vinden in `layouts/joomla/`

---
class: code-16
# Hoe ziet gebruik eruit?
Component output van bestand
```
components/com_content/views/category/tmpl/blog_item.php
``` 
Op regel 41:
```php
<?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
```
Aan `joomla.content.intro_image` is te zien waar dit layout bestand is te vinden. Dit is gelijk aan bestand:
```
layouts/joomla/content/intro_image.php
```

---
class: code-16
# intro_image.php
```php
<?php
defined('_JEXEC') or die;
$params  = $displayData->params;
?>
<?php $images = json_decode($displayData->images); ?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="pull-<?php echo htmlspecialchars($imgfloat); ?> item-image"> <img
	<?php if ($images->image_intro_caption):
		echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"';
	endif; ?>
	src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>" itemprop="thumbnailUrl"/> </div>
<?php endif; ?>
```

---
class: code-18
# Data meesturen
```php
JLayoutHelper::render('joomla.content.intro_image', $this->item);
```
Hierin kan je `$this->item` lezen als `$displayData`. Alles wat je meestuurt kan gebruikt worden in het JLayout bestand.
```php
$params = $displayData->params;
$images = json_decode($displayData->images);

```

---
class: center, middle
# JLayout overrides

---
class: code-18
# JLayout overrides
Locatie core-bestand
```
layouts/joomla/content/intro_image.php
```
Locatie template-override
```
templates/naam-template/html/layouts/joomla/content/intro_image.php
```

---
class: center, middle
# Eigen JLayouts

---
class: code-18
# Eigen JLayout maken
JLayout locatie
```
templates/naam-template/html/layouts/expertsessie.php
```
Bevat:
```php
<?php defined('JPATH_BASE') or die; ?> 

<h1>Welkom op de Joomla! Templates Expert Sessie</h1>
```

---
class: code-18
# Eigen JLayout weergeven
Vanuit bijvoorbeeld je template index.php
```
templates/naam-template/index.php
```
Bevat:
```php
<?php
	$layout = new JLayoutFile('expertsessie');
	$data = array(
		'event' => 'Expert Sessie',
		'thema' => 'Joomla! Templates'
	);
	echo $layout->render($data);
?>
```

---
class: code-18
# Eigen JLayout data
JLayout locatie
```
templates/naam-template/html/layouts/expertsessie.php
```
Bevat:
```php
<?php defined('JPATH_BASE') or die; ?> 

<h1>Welkom op de <?php echo $displayData['thema']; ?> <?php echo $displayData['event']; ?></h1>
```

---
class: code-18
# Eigen JLayout voordelen
Aanpassing maar op één locatie doorvoeren. 
```php
<h1>Welkom op de <?php echo $displayData['thema']; ?> <?php echo $displayData['event']; ?></h1>
```
Bijvoorbeeld toch h2 kop?
```php
<h2>Welkom op de <?php echo $displayData['thema']; ?> <?php echo $displayData['event']; ?></h2>
```
Of andere volgorde?
```php
<h2>Welkom op de <?php echo $displayData['event']; ?> <?php echo $displayData['thema']; ?></h2>
```

---
class: code-18
# Eigen JLayout variabelen
```php
<?php
	$layout = new JLayoutFile('expertsessie');
	$data = array(
		'event' => 'Expert Sessie',
		'thema' => 'Joomla! Templates',
		'kop' => 'h2'
	);
	echo $layout->render($data);
?>
```
Gebruik in JLayout
```php
<<?php echo $displayData['kop']; ?>>Welkom op de <?php echo $displayData['thema']; ?> <?php echo $displayData['event']; ?></<?php echo $displayData['kop']; ?>>
```


---
class: center, middle
# Sublayouts

---
class: code-18
# Sublayouts
```php
JLayoutHelper::render('invoice', $invoiceData);
```
Gebruikt bestand 
```
templates/naam-template/html/layouts/invoice.php
```
```html
<div class="header">
  <?php echo $this->sublayout('header', $displayData); ?>
</div>
<div class="products">
  <?php echo $this->sublayout('products', $displayData['products']); ?>
</div>
<div class="footer">
  <?php echo $this->sublayout('footer', $displayData); ?>
</div>
```

---
class: code-18
# Sublayout bestanden
JLayout locatie
```
templates/naam-template/html/layouts/invoice.php
```
Bevat sublayout
```html
<?php echo $this->sublayout('header', $displayData); ?>
```

Sublayout locatie
```
templates/naam-template/html/layouts/invoice/header.php
```

---
class: center, middle
# JLayout debuggen

---
class: code-16
# JLayout debuggen
```php
<?php
	$layout = new JLayoutFile('expertsessie');
	$data = array(
		'event' => 'Expert Sessie',
		'thema' => 'Joomla! Templates'
	);
	echo $layout->render($data);
?>
```
Voeg `, null, array('debug' => true)` toe aan `JLayoutFile`: 
```php
$layout = new JLayoutFile('expertsessie', null, array('debug' => true));
```
<i>Dit werkt ook zonder de Joomla-debug modus ingeschakeld.</i>

---
class: code-18
# JLayout debuggen output
```
Layout: expertsessie
Include Paths: Array
(
    [0] => expertsessie.nl/templates/protostar/html/layouts/com_content
    [1] => expertsessie.nl/components/com_content/layouts
    [2] => expertsessie.nl/templates/protostar/html/layouts
    [3] => expertsessie.nl/layouts
)

Searching layout for: expertsessie.php
Found layout: expertsessie.nl/templates/protostar/html/layouts/expertsessie.php
```

---
# Vragen?

<br><br>

## Resources
- <a href="https://docs.joomla.org/J3.x:Sharing_layouts_across_views_or_extensions_with_JLayout">JLayout Joomla Documentatie</a>
- <a href="http://magazine.joomla.org/issues/issue-nov-2013/item/1590-jlayout-layouts-improvements-joomla-3-2">JLayout Improvements for Joomla! 3.2 (JCM artikel)</a>

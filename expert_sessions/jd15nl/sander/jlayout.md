class: middle, center
# Don't Repeat Yourself met JLayout
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
class: center, middle
# Voorbeeld
<a href="http://funx.dev" target="_blank">Sander, klik hier</a>
---
# Voordelen gebruik JLayout
- herbruikbaar door gehele site (template en extensies)

--

- aanpassingen één keer doorvoeren in plaats op diverse plekken

--

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
```html
<?php $images = json_decode($displayData->images); ?>

<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>

	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>

	<div class="pull-<?php echo htmlspecialchars($imgfloat); ?> item-image"> 
	
	<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>"><img
	
	<?php if ($images->image_intro_caption):
		echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"';
	endif; ?>
	src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>" itemprop="thumbnailUrl"/>
	</a>
	</div>

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
class: code-22
# intro_image.php
```php

$params = $displayData->params; 
$images = json_decode($displayData->images); 
?>

<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>

	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
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
--

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
templates/naam-template/html/layouts/jd15nl.php
```
Bevat:
```php
<?php defined('JPATH_BASE') or die; ?> 

<h1>Welkom op de Joomla!dagen 2015</h1>
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
	$layout = new JLayoutFile('jd15nl');
	$data = array(
		'event' => 'Joomla!dagen',
		'year' => '2015'
	);
	echo $layout->render($data);
?>
```

---
class: code-18
# Eigen JLayout data
JLayout locatie
```
templates/naam-template/html/layouts/jd15nl.php
```
Bevat:
```php
<?php defined('JPATH_BASE') or die; ?> 

<h1>Welkom op de <?php echo $displayData['event']; ?> <?php echo $displayData['year']; ?></h1>
```

---
class: code-18
# Eigen JLayout voordelen
Aanpassing maar op één locatie doorvoeren. 
```php
<h1>Welkom op de <?php echo $displayData['event']; ?> <?php echo $displayData['year']; ?></h1>
```
--

Toch een h2 kop?
```php
<h2>Welkom op de <?php echo $displayData['event']; ?> <?php echo $displayData['year']; ?></h2>
```
--

Of andere volgorde?
```php
<h2><?php echo $displayData['year']; ?>: Een nieuwe editie van de  <?php echo $displayData['event']; ?></h2>
```

---
class: code-18
# Eigen JLayout variabelen
De view bevat
```php
<?php
	$layout = new JLayoutFile('jd15nl');
	$data = array(
		'event' => 'Joomla!dagen',
		'year' => '2015',
		'kop' => 'h2'
	);
	echo $layout->render($data);
?>
```
---
class: code-18
# Eigen JLayout variabelen
Gebruik in JLayout
```php
<<?php echo $displayData['kop']; ?>>Welkom op de <?php echo $displayData['event']; ?> <?php echo $displayData['year']; ?></<?php echo $displayData['kop']; ?>>
```
--

De output wordt:
```html
<h2>Welkom op de Joomla!dagen 2015</h2>
```

---
class: code-18
# Eigen JLayout variabelen
View:
```php
<?php
	$layout = new JLayoutFile('jd15nl');
	$data = array(
		'event' => 'Joomla!dagen',
		'year' => '2015',
		'kop' => 'h2'
	);
	echo $layout->render($data);
?>
```
Output:
```html
<h2>Welkom op de Joomla!dagen 2015</h2>
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
	$layout = new JLayoutFile('jd15nl');
	$data = array(
		'event' => 'Joomla!dagen',
		'year' => '2015'
	);
	echo $layout->render($data);
?>
```
Voeg `, null, array('debug' => true)` toe aan `JLayoutFile`: 
```php
$layout = new JLayoutFile('jd15nl', null, array('debug' => true));
```
<i>Dit werkt ook zonder de Joomla-debug modus ingeschakeld.</i>

---
class: code-18
# JLayout debuggen output
```
Layout: jd15nl
Include Paths: Array
(
    [0] => jlayout.nl/templates/protostar/html/layouts/com_content
    [1] => jlayout.nl/components/com_content/layouts
    [2] => jlayout.nl/templates/protostar/html/layouts
    [3] => jlayout.nl/layouts
)

Searching layout for: jd15nl.php
Found layout: jlayout.nl/templates/protostar/html/layouts/jd15nl.php
```
---

class: code-18
# Praktijkvoorbeeld
``` php
foreach($articles as $item)
{
    $data = array(
        'link' => JRoute::_(ContentHelperRoute::getArticleRoute($item->id, $item->catid)),
        'image' => json_decode($item->images),
        'label' => JHtml::_('date', $item->publish_up, 'j M'),
        'title' => $item->title,
        'description' => strip_tags($item->introtext),
        'limit' => '50'
    );
    echo Jlayouts::render('block-news', $data);
}	
```
---

class: code-14
# Praktijkvoorbeeld
``` html
<article class="block--wide block--animated block--triangle block--default block--news">
    <a class="block__spacer" href="<?php echo $displayData['link']; ?>" title="<?php echo $displayData['title']; ?>">
        <img class="block__image" src="<?php echo $displayData['image']->image_fulltext; ?>" alt="<?php echo $displayData['title']; ?>" aria-hidden="true" />
        <div class="block__content_wrapper">
            <div class="block__content_slider">
                <div class="block--default__title">
                    <span class="label--groen label--skew label--microphone"><?php echo $displayData['label']; ?></span>
                    <h3><?php echo $displayData['title']; ?></h3>
                </div>
                <?php if ($displayData['description']) : ?>
                    <div class="block--default__content">
                        <p><?php echo JHtml::_('string.truncate', $displayData['description'], $displayData['limit']); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </a>
</article>
```

---

class: code-18
# Praktijkvoorbeeld 2
<a href="http://funx.dev/music/artiesten/8335-broederliefde" target="_blank">Sander, klik hier voor dit voorbeeld</a>
``` php
$data = array(
    'heading' => 'Volg artiest op',
    'facebook' => $this->item->rb_facebook,
    'twitter' => $this->item->rb_twitter,
    'instagram' => $this->item->rb_instagram,
    'website' => $this->item->rb_website,
    'bio' => $this->item->bio_link
);
echo Jlayouts::render('snippet-follow', $data);
```
---

class: code-14
# Praktijkvoorbeeld 2
``` html
<?php if(!empty($displayData['twitter']) || !empty($displayData['facebook']) || !empty($displayData['website']) || !empty($displayData['instagram']) || !empty($displayData['bio']) || !empty($displayData['snapchat'])): ?>
	<h2 class="heading--medium">
		<?php echo $displayData['heading']?>
	</h2>
	<?php if(!empty($displayData['twitter'])): ?>
	<p><a class="button--magenta button--medium button--block button--twitter" href="http://twitter.com/<?php echo $displayData['twitter']?>">Twitter</a></p>
	<?php endif; ?>
	<?php if(!empty($displayData['facebook'])): ?>
	<p><a class="button--magenta button--medium button--block button--facebook" href="<?php echo $displayData['facebook']?>">Facebook</a></p>
	<?php endif; ?>
	<?php if(!empty($displayData['instagram'])): ?>
	<p><a class="button--magenta button--medium button--block button--instagram" href="<?php echo $displayData['instagram']?>">Instagram</a></p>
	<?php endif; ?>
	<?php if(!empty($displayData['website'])): ?>
	<p><a class="button--magenta button--medium button--block button--website" href="<?php echo $displayData['website']?>">Website</a></p>
	<?php endif; ?>
	<?php if(!empty($displayData['bio'])): ?>
	<p><a class="button--magenta button--medium button--block button--bio" href="<?php echo $displayData['bio']?>">Bio</a></p>
	<?php endif; ?>
	<?php if(!empty($displayData['snapchat'])): ?>
	<p><a class="button--magenta button--medium button--block button--bio" href="#"><?php echo $displayData['snapchat']?></a></p>
	<?php endif; ?>
<?php endif; ?>
```

---

class: code-16
# View vooral JLayouts
``` html
<div class="intro_container">
    <?php echo Jlayouts::render('header', array('title' => $this->escape($this->item->rb_name))); ?>
</div>
```
``` html
<div class="author">
    <?php
        $data = array(
            'heading' => 'Volg artiest op',
            'facebook' => $this->item->rb_facebook,
            'twitter' => $this->item->rb_twitter,
            'instagram' => $this->item->rb_instagram,
            'website' => $this->item->rb_website,
            'bio' => $this->item->bio_link
        );
        echo Jlayouts::render('snippet-follow', $data);
    ?>
</div>
```
---

class: code-16
# View vooral JLayouts
``` html
<div class="share">
    <?php
        $data = array(
            'facebook' => true,
            'twitter' => true,
            'youtube' => false,
            'instagram' => false,
            'soundcloud' => false
        );
        echo Jlayouts::render('snippet-share-page', $data);
    ?>
    <?php
    $data = array(
        'shares' => '0'
    );
    echo Jlayouts::render('snippet-share-stats', $data);
    ?>
</div>
```

---

class: code-16
# View vooral JLayouts
``` html
<div class="container__second">
    <?php
        foreach($this->songversions as $songversion)
        {
            $data = array(
                'id' => $songversion->radiobox_songversion_id,
                'image' => $songversion->rb_image_id,
                'image_artist' => $this->item->rb_image_id,
                'time' => '',
                'artist' => '',
                'track' => $songversion->rb_title
            );
            echo Jlayouts::render('block-track', $data);
        }
    ?>
</div>
```

---
# Vragen?

<br><br>

## Resources
- [JLayout Joomla Documentatie](https://docs.joomla.org/J3.x:Sharing_layouts_across_views_or_extensions_with_JLayout)
- [JLayout Improvements for Joomla! 3.2 (JCM artikel)](https://docs.joomla.org/J3.x:Sharing_layouts_across_views_or_extensions_with_JLayout)


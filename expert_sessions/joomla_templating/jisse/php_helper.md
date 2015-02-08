class: middle
# PHP helpers
## door Jisse Reitsma
### <a href="http://twitter.com/jissereitsma">@jissereitsma</a>

---
# PHP helper
* Een enkele PHP klasse binnen je template
* Alle handige trucs gebundeld
* PHP logica makkelijker gemaakt

Voorbeelden
* Yth (@yireo)
* ThisTemplate (@hans2103)

---
# Gebruik van een PHP helper
* Bestand met PHP klasse en daarbinnen PHP methoden
* Aanroep vanuit template

---
# Bestand met PHP klasse
templates/mytemplate/helper.php
```php
<?php
defined('_JEXEC') or die();

class MyHelper
{
    public function doSomething()
    {
    }
}
```

---
# Aanroep vanuit template
templates/mytemplate/index.php
```php
require_once __DIR__ . '/helper.php';
$helper = new MyHelper();
$helper->doSomething();
```

```php
<div>
    <?php echo $helper->doSomethingElseAgain(); ?>
</div>
```

---
# Interne variabelen toevoegen
```php
public function __construct()
{
    $this->doc = JFactory::getDocument();
    $this->app = JFactory::getApplication();
    $this->input = $this->app->input;
    $this->menu = $this->app->getMenu();
}
```

---
# Zitten we op de homepage?
```php
public function isHome($language = null)
{
    $active = $this->menu->getActive();
    return (boolean) $active->home;
}
```

Gebruik in template:
```html
<?php if ($helper->isHome()) : ?>
    <div>
        <jdoc:include type="modules" name="homepage" />
    </div>
<?php endif; ?>
```

---
# Zitten we op een artikelpagina?
```php
public function isArticle()
{
    return ($this->input->getCmd('option') == 'com_content' 
        && $this->input->getCmd('view') == 'article');
}
```

Gebruik in template:
```html
<?php if ($helper->isArticle()) : ?>
    <div>
        <jdoc:include type="modules" name="article" />
    </div>
<?php endif; ?>
```

---
# Zitten we op een blogpagina?
```php
public function isBlog()
{
    return ($this->input->getCmd('option') == 'com_content'
        && $this->input->getCmd('view') == 'category'
        && $this->input->getCmd('layout') == 'blog');
}
```

---
# Is de huidige gebruiker ingelogd?
```php
public function isLoggedIn()
{
    $user = JFactory::getUser();

    return ($user->guest == 0) ? true : false;
}
```

---
# Sitename ophalen
```php
public function getSitename()
{
    return JFactory::getConfig()->get('config.sitename');
}
```

Gebruik in template:
```html
<div class="logo">
    <img src="templates/<?php echo $this->template ?>/images/logo.png" 
        title="<?php echo $helper->getSitename(); ?>"
        alt="<?php echo $helper->getSitename(); ?>"
    />
</div>
```

---
class: code-16
# Nuttige classes voor de <body>
```php
public function getBodySuffix()
{
    $classes = array();
    $classes[] = 'option-' . str_replace('_', '-', $this->input->getCmd('option'));
    $classes[] = 'view-' . $this->input->getCmd('view');
    $classes[] = 'layout-' . $this->input->getCmd('layout', 'default');
    $classes[] = 'item-' . $this->input->getInt('Itemid', 0);
    $classes[] = 'home-' . (int) $this->isHome();
    $classes[] = 'guest-' . (int) $this->isGuest();
    return implode(' ', $classes);
}
```

Gebruik in template:
```html
<body class="<?php echo $yth->getBodySuffix(); ?>">
```

---
# JavaScript toevoegen
```php
public function addJs($js)
{
    $template = $this->app->getTemplate();

    return $this->doc->addScript('templates/' . $template . '/js/'.$js);
}
```

---
# CSS toevoegen
```php
public function addCss($css)
{
    $template = $this->app->getTemplate();

    return $this->doc->addStylesheet('templates/' . $template . '/css/'.$css);
}
```

---
# Dynamisch CSS toevoegen
```php
if ($helper->isHome() $helper->addCss('homepage.css');
if ($helper->isBlog() $helper->addCss('blog.css');
```

---
# Mogelijkheden van Yth
* Afbeeldingen als data URI
* Een globale titel toevoegen
* Splitmenu

# Extra brainstorm
* Inladen van Bootstrap 3 via CDN
* Verwijderen van MooTools
* Debug functie voor bepaalde IP adressen
    * Toevoegen extra CSS / JS bij debugging
    * Grunt liveupdater

---
# Vragen?

<br><br>

## Resources
* [Yireo Template Helper](https://github.com/yireo/yth)
* [@hans2103 ThisTemplate](https://github.com/hans2103/ThisTemplate)

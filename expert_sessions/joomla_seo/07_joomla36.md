class: center, middle, intro
# Joomla 3.6:<br> nieuwe router
## Hier kijken we al jaren naar uit!
<img src="/images/logos-seo.png">

---
class: middle, center, intro
# Router?!
## Wat is dat eigenlijk?

---
# Router
Het "routeren" van een URL naar de juiste pagina

--
### Van SEF-url: 
`expertsessie.com/event/2-joomla-seo`

### Naar non-SEF-url:
`expertsessie.com/index.php?option=com_content`
    `&view=article&id=2:joomla-seo&catid=1&Itemid=100`

Zodat Joomla de URL begrijpt

---
# Huidige router
Aanwezig vanaf Joomla 1.0 en niet echt veranderd sindsdien

--
## Problemen met huidige router
- Onnodige ID's in de URLs (`/2-joomla-seo`)
- Meerdere URLs voor dezelfde content (duplicate content)
- Laden van modules hangt af van `Itemid`
- URL-opbouw niet instelbaar
- Niet object georiënteerd
- Lastig om router te schrijven voor eigen extensie
- Huidige code is traag

---
class: middle, center, intro
# Nieuwe router
## Voorgesteld door<br>Hannes Papenberg

---
# Indiegogo.com campagne
<img src="joomla_seo/images/07_indiegogo.png">

---
# Voostel nieuwe router
- Instelbare URLs
    - `expertsessie.com/event/joomla-seo` (zonder artikel menu-item)
    - `expertsessie.com/-3536311` (permalink)
    - `expertsessie.com/2016/03/18/joomla-seo`
    - ???
- Snellere code
- Eenvoudiger te schrijven voor eigen extensies met minder code
    - com_content nu: 300 regels code
    - com_content straks: 30 regels code

---
class: middle, center, intro
# Mooi!
## Wanneer beschikbaar?

---
# Nieuwe Joomla router
Gepland voor Joomla 3.4

--

Toen verplaatst naar Joomla 3.5

--

Daarna naar Joomla 3.6

--

In Joomla 3.6, echt:

<img src="joomla_seo/images/07_routercommit.png">

---
# Hoe werkt het?
URL voor: `expertsessie.com/event/2-joomla-seo`

--
### Aanzetten
In de component `Opties` onder tabblad `Integraties`

<img src="joomla_seo/images/07_newrouteroption.png">

--
URL na: `expertsessie.com/event/2-joomla-seo`

---
class: code-14
# Maar ik zie geen verschil?!
Klopt, nog niet zichtbaar in de URLs, wel in de code:
``` php
class ContentRouter extends JComponentRouterView {
	public function __construct($app = null, $menu = null) {
		$categories = new JComponentRouterViewconfiguration('categories');
		$categories->setKey('id');
		$this->registerView($categories);
		$category = new JComponentRouterViewconfiguration('category');
		$category->setKey('id')->setParent($categories, 'catid')->setNestable()->addLayout('blog');
		$this->registerView($category);
		$article = new JComponentRouterViewconfiguration('article');
		$article->setKey('id')->setParent($category, 'catid');
		$this->registerView($article);
		$this->registerView(new JComponentRouterViewconfiguration('archive'));
		$this->registerView(new JComponentRouterViewconfiguration('featured'));
		$this->registerView(new JComponentRouterViewconfiguration('form'));

		parent::__construct($app, $menu);

		$this->attachRule(new JComponentRouterRulesMenu($this));
		$this->attachRule(new JComponentRouterRulesStandard($this));
	}
}
```

---
### De instel-opties volgen nog
<img src="joomla_seo/images/07_optionsvolgen.png">

---
class: middle, center, intro
# Bedankt!
## Hannes Papenberg
<img src="joomla_seo/images/07_hannesbedankt.jpg">

---
class: center, middle, intro
# Vragen?
## Hierna:<br>Social Media & SEO
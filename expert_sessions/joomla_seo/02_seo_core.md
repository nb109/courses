class: center, middle, intro
# Joomla core SEO
## Hoe zet ik de core optimaal in?
<img src="/images/logos-seo.png">

---
class: middle, center, intro
# Joomla-instellingen
## voor betere SEO

---
class: middle, center
# SEO-instellingen

<img src="joomla_seo/images/02-core-seosettings.png">

---
# Zoekmachinevriendelijke URLs

### Nee:

`expertsessie.com/index.php?option=com_content`
    `&view=article&id=2:joomla-seo&catid=1&Itemid=100`

### Ja:

`expertsessie.com/index.php/event/2-joomla-seo`

---
# Gebruik URL herschrijven
- Apache: hernoem htaccess.txt naar .htaccess
- IIS 7: hernoem web.config.txt naar web.config en installeer IIS URL Rewrite Module

### Nee:

`expertsessie.com/index.php/event/2-joomla-seo`

### Ja:

`expertsessie.com/event/2-joomla-seo`

---
# Voeg een achtervoegsel (suffix) aan URLs toe

### Nee:

`expertsessie.com/event/2-joomla-seo`

### Ja:

`expertsessie.com/event/2-joomla-seo.html`

---
# Unicode aliassen

### Nee:
- Prima voor Westerse talen

### Ja:
- Aanbevolen voor bijvoorbeeld Chinees

---
# Websitenaam in paginatitels invoegen

### Nee:
- Browsertitel: `Joomla SEO`

### Na:
- Browsertitel: `Joomla SEO - Expert Sessie`

### Voor:
- Browsertitel: `Expert Sessie - Joomla SEO`

---
class: middle, center
# Metadata-instellingen

<img src="joomla_seo/images/02-core-metadata.png">

---
# Metabeschrijving
- Korte omschrijving van de pagina van maximaal 150 leestekens
- Focus op je bezoeker en gebruik <strong>zoekwoorden</strong>
- Goede metabeschrijving belangrijk voor CTR


---
# Metatrefwoorden
- Maakt Google geen gebruik meer van
- Geen aandacht aan besteden

---
# Robots
Wil je gevonden worden? Stel dan `Robots` in de Algemene instellingen in op `Index, follow`

<img src="joomla_seo/images/02-core-robots.png">

---
# Inhoudsrechten
Ingevoerde waarde wordt getoond voor meta-tag `rights`

``` html
<meta name="rights" content="De website is van mij!" />
```

---
# Toon auteur metatag
Toont auteur van artikel voor meta-tag `author`

``` html
<meta name="author" content="Sander Potjer" />
```

Draagt niet bij aan SEO.

---
# Toon Joomla versie
Toont de specifieke Joomla versie in meta-tag `generator`

### Nee:
``` html
<meta name="generator" content="Joomla! - Open Source Content Management" />
```

### Ja:
``` html
<meta name="generator" content="Joomla! - Open Source Content Management - Version 3.4.8" />
```

--
### Reden:
Ooit toegevoegd vanwege Google Webmaster tools - update notificatie

---
# Generator tag weghalen
Plaats deze code in PHP gedeelte na `defined('_JEXEC') or die;`

``` php
JFactory::getDocument()->setGenerator();
```

## Of met eigen inhoud

``` php
JFactory::getDocument()->setGenerator('Expert Sessie');
```

---
class: middle, center, intro
# Joomla-inrichting
## voor betere SEO

---
# Begin met een plan!
- vooraf bedenken
    - sitemap uitwerken
    - content structuur uitwerken
- zelf in de hand, meeste winst mee te behalen!

---
# Beperk niveaus
Probeer maximaal 3 niveaus aan te houden. 
- gebruiksvriendelijk 
- beter voor de SEO

--

### Slecht: 
`expertsessie.com/expert-sessie/joomla/event/bussum/`
`joomla-seo` (5 niveaus)

### Goed: 
`expertsessie.com/event/joomla-seo` (2 niveaus)

---
# URL-opbouw in Joomla
Op basis van combinatie van menustructuur en categorieopbouw

--
## Artikel "Joomla SEO" in categorie "Event"

`expertsessie.com/event/23-joomla-seo`

### Ontsloten via:
- Menu item type `Blog` - niveau 1

---
# URL-opbouw in Joomla
Op basis van combinatie van menustructuur en categorieopbouw

## Artikel "Joomla SEO" in categorie "Event"

`expertsessie.com/event/joomla-seo`

### Ontsloten via:
- Menu item type `Blog` - niveau 1
- Menu item type `Artikel` - niveau 2

---
# Vermijd duplicate content
Maximaal één menu-item naar content

--
### Meer nodig?
Gebruik menu-item alias menu-type 

<img src="joomla_seo/images/02-core-menualias.png">

---
# Beperk aantal menu's
Probeer het aantal menu's te beperken (ook gebruiksvriendelijk!)

--
### Hoe?
Door meerdere menu-modules te tonen op verschillende posities, met andere niveaus
<img src="joomla_seo/images/02-core-menumodule.png">

---
# Bussum > Gebouwen > Watertoren
Gebruik Joomla kruimelpad module (breadcrumbs)
- gebruiksvriendelijk
- beter voor de SEO

Zeker een must-have voor sites met veel content / niveaus

---
# Pagina titels
Het `<title>` element van de pagina. Zeer belangrijk voor SEO! Maximaal 60-65 leestekens om afkapping te voorkomen.

--

## Op welke zou jij eerder klikken? (CTR)
- Welkom bij Expert Sessie Joomla SEO, Bussum
- Wordt Joomla SEO Expert in één middag! Expert Sessie in Bussum

--

## Instelbaar per menu-item
- Standaard titel van artikel
- Tenzij voor menu-item `Browserpaginatitel` ingevoerd

---
# Metabeschrijving
Instelbaar op 3 niveaus in Joomla

1. Menu-items
2. Artikelen / categorieën
3. Algemene instellingen

--
4. (Automatisch bepaald door zoekmachine)

--

## Algemene Metabeschrijving
Beter om Algemene Metabeschrijving leeg te laten, anders standaard overal zelfde

---
# Aliassen
Automatisch genereerd voor 
- Categorieën
- Artikelen
- Menu-items

Maar is aanpasbaar, benut dit ook!

---
class: middle, center, intro
# Benut Joomla!
## voor betere SEO

---
# Voorbeeld: Artikel - voor
<img src="joomla_seo/images/02-core-voor-artikel.png">


---
# Voorbeeld: Artikel - voor
URL: `expertsessie.com/event/2-expert-sessie-joomla-seo`

### Title-tag:
``` html
<title>Expert Sessie - Joomla SEO</title>
```

### Artikel titel
``` html
<h1>Expert Sessie - Joomla SEO</h1>
```

### Metabeschrijving
```

```

---
# Voorbeeld: Artikel, met menu - na
<img src="joomla_seo/images/02-core-na-menu1.png">

<img src="joomla_seo/images/02-core-na-menu2.png">

---
# Voorbeeld: Artikel, met menu - na
URL: `expertsessie.com/joomla-seo`

### Title-tag:
``` html
<title>Wordt Joomla SEO Expert in één middag! Expert Sessie in Bussum</title>
```

### Artikel titel
``` html
<h1>Expert Sessie - Joomla SEO</h1>
```

### Metabeschrijving
``` html
<meta name="description" content="Tijdens deze Expert Sessie op 18 maart nemen we een diepe duik in Joomla SEO. Leer hoe je mooie Joomla-website ook gevonden wordt in Google!" />
```

---
class: center, middle, intro
# Vragen?
## Hierna:<br>Joomla SEO extensies
class: center, middle, intro
# Social Media<br>&amp; SEO
## Zo ziet social media je site!
<img src="/images/logos-seo.png">

---
# Social Media & SEO
- De rich snippets voor social media.
- Open Graph protocol
---
# Praktijkvoorbeeld - zo moet het niet
- Watertoren Bussum biedt geen informatie

<img src="joomla_seo/images/08-watertoren_bussum.png"/>
---
# Praktijkvoorbeeld - zo is het al beter
- 24Kitchen news item over kookboek

<img src="joomla_seo/images/08-24kitchen-1.png"/>
---
# Praktijkvoorbeeld - zo is het al beter
- 24Kitchen news item over kookboek

<img src="joomla_seo/images/08-24kitchen-2.png"/>
---
# Praktijkvoorbeeld - zo moet het dus
- Joomla! SEO Expert Sessie biedt voldoende informatie

<img src="joomla_seo/images/08-Yireo_PWT-expertsessie.png"/>
---
# Vier verplichte items
``` html
<meta property="og:title" content="Joomla! SEO Expert Sessie">
<meta property="og:type"  content="article">
<meta property="og:image" content="https://perfectwebteam.nl/images/headers/joomla-expert-sessie.jpg">
<meta property="og:url"   content="https://perfectwebteam.nl/expert-sessie/joomla-seo">
```
##  Meerdere `og:type` "Object Types" 
- https://developers.facebook.com/docs/reference/opengraph
---
# Optioneel, maar wel handig
``` html
<meta property="og:description" content="Vindbaarheid op het web is natuurlijk superbelangrijk voor vrijwel elke website, anders heb je een mooie website die niemand kan vinden. In deze Expert Sessie nemen we een diepe duik in het onderwerp Zoekmachine Optimalisatie (SEO) voor Joomla.">
<meta property="og:locale" content="nl_NL">
<meta property="og:locale:alternate" content="fr_FR" />
<meta property="og:site_name" content="Perfect Web Team">
<meta property="fb:admins" content="USER_ID,USER_ID2,USER_ID3">
```
## fb:Admins user ID achterhalen
- http://findmyfbid.com/
---
# Validatie met FB debugger tool
- https://developers.facebook.com/tools/debug/

<img src="joomla_seo/images/08-fbdebugger.png"/>
---
# Gzip compressie uitschakelen
Facebook bot en LinkdIn bot kunnen Gzip niet uitpakken.

``` php
$unsupported = false;

if (isset($_SERVER['HTTP_USER_AGENT'])) {
	$pattern = strtolower('/facebookexternalhit|LinkedInBot/x');

	if (preg_match($pattern, strtolower($_SERVER['HTTP_USER_AGENT']))) {
		$unsupported = true;
	}
}

if (($this->app->get('gzip') == 1) && $unsupported) {
	$this->app->set('gzip', 0);
}
```
---
# Twitter heeft Twitter Cards
``` html
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@perfectwebteam" />
<meta name="twitter:title" content="Joomla! SEO Expert Sessie" />
<meta name="twitter:description" content="Vindbaarheid op het web is natuurlijk superbelangrijk voor vrijwel elke website, anders heb je een mooie website die niemand kan vinden. In deze Expert Sessie nemen we een diepe duik in het onderwerp Zoekmachine Optimalisatie (SEO) voor Joomla." />
```
## Meerdere `twitter:card` "Card Types"
- https://dev.twitter.com/cards/types
---
## Optioneel, maar wel handig
``` html
<meta name="twitter:image" content="https://perfectwebteam.nl/images/headers/joomla-expert-sessie.jpg" />
<meta property="twitter:creator" content="@sanderpotjer" >
```

## Mappings voorkomen dubbele code
- twitter:title -> og:title
- twitter:description -> og:description
---
# Validatie met Twitter Card validator
- https://cards-dev.twitter.com/validator

<img src="joomla_seo/images/08-twitter.png"/>
---
# Google+
* Schema.org microdata (aanbevolen)
* Open Graph protocol
* Title and meta "description" tags
* Gokje vanuit de pagina content (af te raden)

---
# Google+ Schema.org microdata
``` html
<html itemscope itemtype="http://schema.org/Article">
<meta itemprop="name" content="Joomla! SEO Expert Sessie">
<meta itemprop="description" content="Vindbaarheid op het web is natuurlijk superbelangrijk voor vrijwel elke website, anders heb je een mooie website die niemand kan vinden. In deze Expert Sessie nemen we een diepe duik in het onderwerp Zoekmachine Optimalisatie (SEO) voor Joomla.">
<meta itemprop="image" content="https://perfectwebteam.nl/images/headers/joomla-expert-sessie.jpg">
```
## Meer info over structured data
- http://schema.org
---
# Sinds Joomla 3.3.0 microdata

<img src="joomla_seo/images/08-microdata.png"/>
---
# Validatie met Structured Data Testing Tool
- https://developers.google.com/structured-data/testing-tool/

<img src="joomla_seo/images/08-googleplus.png"/>
---
# Tips 
## Pinterest kan er ook nog bij
- https://developers.pinterest.com/tools/url-debugger/

## Voor afbeeldingen
- Twitter thumbnail: 120x120px, Twitter large image: 280x150px
- Facebook: de standaarden verschillen. Minimaal 200x200px. Grote afbeeldingen tot 1200x630px.

## Open Graph als fallback
- Pinterest, Google+ en Twitter gebruiken Open Graph als fallback

---
# Extensions

- http://extensions.joomla.org/

---
# Extensions

- http://extensions.joomla.org/

## Of gewoon die van Hans Kuijpers 
`Joomla! plugin Social Meta Tags`

- https://github.com/hans2103/pkg_SocialMetaTags
- System en user plugin die al het eerder genoemde verwerkt
- Facebook Fix
- Gratisch
- Makkelijk te updaten
- Sta open voor verbeteringen

---
# Social Meta Tags - Plugin settings

<img src="joomla_seo/images/08-plugin-system.png"/>

---
# Social Meta Tags - User settings

<img src="joomla_seo/images/08-plugin-user.png"/>

---
class: center, middle, intro
# Vragen?
## Hierna:<br>Performance & SEO
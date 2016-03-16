class: center, middle, intro
# Social Media
## en SEO

---
# Social Media & SEO
- op dit moment     


---
# Open Graph Protocol
- De rich snippets voor social media. 
---
# Praktijkvoorbeeld - zo moet het niet
- Watertoren Bussum biedt geen informatie

<img src="joomla_seo/images/08-watertoren_bussum.png"/>
---
# Praktijkvoorbeeld - zo moet het wel
- Joomla! SEO Expert Sessie biedt voldoende informatie

<img src="joomla_seo/images/08-24kitchen.png"/>

---
# Vier verplichte items
- og:title :: Titel van de pagina of blog post
- og:url :: Url naar blog item
- og:image :: Afbeelding van blog item
- og:type :: Type content. 
- - *article* voor blog posts. 
- - *product* voor producten. 
- - overig: https://developers.facebook.com/docs/reference/opengraph/#object-type

---
# optioneel, maar wel handig
```
<meta property="og:description" content="">
<meta property="og:locale" content="">
<meta property="og:site_name" content="">
```
---
# Facebook debugger tool
Facebook debugger tool om meta informatie te valideren.

- https://developers.facebook.com/tools/debug/
---
# Gzip compressie uitschakelen
Facebook bot en LinkdIn bot kunnen Gzip niet uitpakken.

```
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
```
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@flickr" />
<meta name="twitter:title" content="Small Island Developing States Photo Submission" />
<meta name="twitter:description" content="View the album on Flickr." />
<meta name="twitter:image" content="https://farm6.staticflickr.com/5510/14338202952_93595258ff_z.jpg" />
```
---
# Google+

---
# Joomla! plugin Social Meta Tags
 
https://github.com/hans2103/pkg_SocialMetaTags

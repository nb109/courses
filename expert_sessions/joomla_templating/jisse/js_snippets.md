class: middle
# JavaScript snippets
## door Jisse Reitsma
### <a href="http://twitter.com/jissereitsma">@jissereitsma</a>

---
# JavaScript snippets
* Equal height
* Cookie notice
* Datum van bezoeker
* Eigen jQuery versie
* HTML 5 support
* Naar boven
* Scrollspy
---
# Opties
* Eigen JavaScript
* Op basis van jQuery (beste optie)
* Andere JavaScript frameworks
    * MooTools
    * ProtoType + Scriptaculous
    * Ext JS
    * Dojo
---
# Tips voor JavaScript
* jQuery.noConflict() modus
* Plaats eigen JS in los JS bestand
* Niet teveel fluff
* Het liefst een jQuery plugin met GitHub repository
---
# Equal heights (1/3)
Probleem van ongelijke kolommen
```html
<div class="container">
    <div class="col-xs">Test 1</div>
    <div class="col-xs">Test<br/>2</div>
    <div class="col-xs">Test 3</div>
</div>
```
---
# Equal heights (2/3)
* Pure CSS of JavaScript
* Alleen binnen container of alle elementen?
---
# Equal heights (3/3)
* CSS
	* Faux columns
	* Div als tabel
* jQuery
	* github.com/liabru/jquery-match-height
	* github.com/mattbanks/jQuery.equalHeights
---
# Cookie Notice
* Joomla extensie
	* Rene Kreijvelds CookieBanner
	* Nog 5 anderen
* jQuery oplossing in template
	* jQuery.CookieBar
	* CookieCuttr
	* CookieConsent
---
# Datum van bezoeker
* Oplossing voor verschil in tijdzones
* Mooie jaren 90 oplossing
* document.write(new Date());
---
# Eigen jQuery versie
* PHP template helper om core script weg te halen
* Eigen jQuery versie toevoegen
	* Lokale versie
	* jQuery CDN (MaxCDN)
	* Google CDN
---
# HTML 5 Shiv
* HTML 5 Shiv - HTML5 elementen voor IE
* Respond.js en Selectivizr
    * Joomla plugin `superfossil`

```html
<mark>
<section>
<header>
<footer>
```
---
# Naar boven (1/2)
* Gewoon met HTML
```html
<a name="top"></a>
<a href="#top">Naar boven</a>
```
* Met JavaScript
```html
<a href="#" onclick="window.scrollTo(0, 100);">
```
---
# Naar boven (1/2)
```html
<a href="#totop">Naar boven</a>
<script>
jQuery("a[href='#top']").click(function() {
  jQuery("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
</script>
```
---
# Scrollspy
* Onderdeel van Bootstrap
* Bij scrollen highlight nieuw nav element
* `<nav>` component nodig
---
# Parallax
* Bij scrollen veranderen elementen van positie
* Sources
	* github.com/IanLunn/jQuery-Parallax
	* github.com/stephband/jparallax
---
## Resources (1/2)
* https://github.com/renekreijveld/CookieBannerJ25
* http://www.primebox.co.uk/projects/jquery-cookiebar/
* http://cookiecuttr.com/
* http://www.cookieconsent.com/

---
## Resources (2/2)
* http://mustaqsheikh.github.io/plg_superfossil/
* https://github.com/liabru/jquery-match-height
* https://github.com/mattbanks/jQuery.equalHeights
* https://github.com/aFarkas/html5shiv
* https://github.com/stephband/jparallax
* https://github.com/IanLunn/jQuery-Parallax

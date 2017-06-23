class: middle, center, intro
# Accelerated Mobile Pages (AMP)
## door Simon Kloostra
### <a href="http://twitter.com/simonkloostra">@simonkloostra</a>
<img src="/images/logos.png">

---
<img src="joomla_performance/simon/images/emerce.png">

---
# Google: Bounce rate vs laadtijd
<img src="joomla_performance/simon/images/bouncerate.png">

<a href="https://www.thinkwithgoogle.com/articles/mobile-page-speed-new-industry-benchmarks.html">https://www.thinkwithgoogle.com/articles/mobile-page-speed-new-industry-benchmarks.html</a>

---
# Wat is AMP?
AMP definitie volgens Google zelf op www.ampproject.org:

> AMP is a way to build web pages for static content that render fast. AMP in action consists of three different parts:

> AMP HTML is HTML with some restrictions for reliable performance and some extensions for building rich content beyond basic HTML. The AMP JS library ensures the fast rendering of AMP HTML pages. The Google AMP Cache can be used to serve cached AMP HTML pages.
---
# Wat is AMP? (2)
- Accelerated Mobile Pages
- Google’s (succesvolle) antwoord op Facebook Instant Articles (10% van de sites versus 2%)
- Project site: https://www.ampproject.org/ 
- Bedoeld om statische pagina’s zeer snel weer te geven
- Alle opsmuk wordt zo veel mogelijk gestript
- Basale opmaak
- Kale HTML met beperkingen in gebruik van Javascript en CSS
- Gecached vanaf Google.com

---
# AMP in Google zoekresultaten
<img src="joomla_performance/simon/images/amp-in-google.png">

---
# Desktop versus AMP visueel
Gewone pagina versus AMP equivalent

<img src="joomla_performance/simon/images/desktop-vs-amp.png">

---
# Responsive versus AMP
Nu al weinig verschil, terwijl AMP veel sneller zal zijn

<img src="joomla_performance/simon/images/responsive-vs-amp.png">

---
# AMP vanaf Google.com
- Let op URL: Geserveerd vanaf Google.nl
- Wel een melding over het originele domein
- Welke URL gaan mensen delen...

<img src="joomla_performance/simon/images/amp-googlecom.png">

---
# Mobiele site: vaak traag
Nu.nl, gemeten met Gtmetrix.com:

<img src="joomla_performance/simon/images/amp-gtmetrix.png">

---
# Waarom wel AMP?
- Website sneller 
- Mogelijk hogere CTR en meer bezoekers
- Zichtbaarheid in SERP (carroussel)
- De concurrentie doet het ook
- Google wil het graag
- Offload van server

---
# Waarom niet AMP?
- Volledige controle bij Google: lock-in
- Gehost op Google.com: shares gaan vaak naar Google
- Phishing (bron van content lastig te verifieren middels URL)
- Minder advertentie-inkomsten
- Beperkte user-experience
- Gestripte Analytics
- Extra implementatie
- Issues met embedded content / iframes

---
# AMP: voor welke sites?
- Nu nog vooral nieuws-sites
- Blog sites
- Recepten sites
- Binnenkort ook webshops? Zie Ebay:

<img src="joomla_performance/simon/images/amp-ebay.png">

---
# AMP: voor welke pagina’s?
- AMP is bedoeld voor statische pagina’s, puur bedoeld om te lezen
- Vooral voor op zichzelf staande nieuwsartikelen, blogs, recepten
- Niet voor homepagina’s, blog overviews, webshops, etcetera

---
# AMP: Implementatie
<img src="joomla_performance/simon/images/amp-implementatie.png">

---
# AMP: Implementatie in Joomla
- wbAMP van Weeblr.com (<a href="https://weeblr.com/joomla-accelerated-mobile-pages/wbamp">https://weeblr.com/joomla-accelerated-mobile-pages/wbamp</a>) 
	- 20% korting met coupon `5RXHD-NYJNF-GFJ7H`
- jAMP van StoreJextensions (<a href="https://storejextensions.org/extensions/jamp.html">https://storejextensions.org/extensions/jamp.html</a>)

<img src="joomla_performance/simon/images/wbamp.png">

---
# wbAMP: welke pagina’s
Selecteer je statische pagina’s in Joomla (eventueel andere componenten):

<img src="joomla_performance/simon/images/wbamp-rule.png">

---
# Overwegingen
- AMP laadt het Joomla artikel (component). Geen probleem als dit gewoon tekst / plaatjes is: 
	- Pagebuilders zouden best eens problematisch kunnen zijn
- Let op specifieke implementaties in het artikel, bijvoorbeeld een slider die met een  	tag is toegevoegd binnen het artikel, bv `{slider vogeltjes}` (Widgetkit, Regularlabs)
- Denk na over de navigatie: laat je bezoekers binnen de AMP site navigeren of leid je ze weer	naar de gewone mobiele site?
- Implementeer eerst de test-modus (nog geen `rel=amp` verwijzingen)

---
# AMP valideren
- In Chrome `Developer tools` > `Console`. Voeg `#development=1` toe aan URL en refresh:
	- Resultaat: AMP validation succesvol of foutmeldingen
- Handiger: <a href="https://chrome.google.com/webstore/detail/amp-validator/nmoffdblmcmgeicmolmhobpoocbbmknc">Chrome extensie AMP validator </a>

<img src="joomla_performance/simon/images/amp-valideren.png">

---
class: center, middle, intro
# Bedankt!

<img src="/images/logos.png">

Next: <a href="slide.php?theme=joomla_performance&id=htaccess#1">htaccess performance door Hans Kuijpers</a>

<a href="joomla_performance">programma</a>
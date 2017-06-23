class: middle, center, intro
# Optimalisatie plugins
## door Simon Kloostra
### <a href="http://twitter.com/simonkloostra">@simonkloostra</a>
<img src="/images/logos.png">

---
# Waarom zou je ze gebruiken?

--
## Daarom:
<img src="joomla_performance/simon/images/extensions-daarom.png">

---
# Veel voorkomende problemen
- Veel afzonderlijke CSS bestanden
- Veel afzonderlijke Javascript bestanden
- Onnodige bestanden (Mootools, dubbele Jquery, slechte extensies)
- Te grote bestanden: witruimte neemt ook bytes in
- Sequentieel geladen bestanden
- Google Pagespeed eisen: laad CSS voor boven de vouw direct (inline) en de rest asynchroon later

---
# GT-Metrix
<img src="joomla_performance/simon/images/gtmetrix.png">

---
# Google Pagespeed Insights
<img src="joomla_performance/simon/images/pagespeed.png">

---
# Is op te lossen met eigen templates
- Bij eigenbouw kan je dit allemaal zelf regelen:
- 1 CSS bestand en 1 JS bestand, volledig gecomprimeerd
- Volledige controle over laden
- Ook de onnodig door Joomla of extensies geladen resources kun je dan weghalen
- Instructies: https://perfectwebteam.nl/expert-sessie/joomla-templating 

---
# Goede commerciële templates (min of meer)
- Moderne templates bieden vaak in ieder geval een (beperkte) set van optimalisaties
- Meestal: Compressie en combinatie van CSS en JS

<img src="joomla_performance/simon/images/templates.png">

---
# Wanneer gebruik je optimalisatie plugins
- Wat oudere, slecht geoptimaliseerde plugins
- Slechte frameworks, Artisteer

---
# Plugins: voor specifieke doeleinden
- Mootools Enabler/Disabler: Mootools wel of juist niet laden
- JCC - JS CSS Control: Specifiek bepaalde bestanden niet laden
- Rereplacer: idem
- Enzovoorts

---
# Plugins: super-extensies
- JCH-Optimize: Gratis met meer opties in de Pro-versie
- Scriptmerge: gratis met betaalde support
- RokBooster: gratis, speciaal voor Rockettheme templates
- Gebruik er maar 1

---
# Wat kunnen ze?
- CSS en Javascript bestanden combineren
- HTML, CSS en Javascript bestanden comprimeren
- Javascript uitvoering optimaliseren (defer en async)
- Specifieke bestanden, menu-items of extensies juist uitsluiten van optimalisatie
- Vaak per extensie specifiek nog meer opties
- Let op bij vooral de JS optimalisatie-opties: test je site goed!

---
# ScriptMerge extra opties
- Data URI’s
- WebP support
- Gecomprimeerde bestande opgeslagen  in /cache folder

<img src="joomla_performance/simon/images/scriptmerge.png">

---
# JCH-Optimize extra opties
- Leverage Browser caching (.htaccess edit)
- Sprite builder
- CDN support (Pro)
- Lazy Loading voor plaatjes (Pro)
- CSS Delivery voor Pagespeed (Pro)
- Image optimization met API (Pro)

---
# JCH-Optimize extra opties
<img src="joomla_performance/simon/images/jch.png">

---
# Correcte optimalisatie
<img src="joomla_performance/simon/images/sklabs.png">

---
# Minder correcte optimalisatie...
<img src="joomla_performance/simon/images/sklabs-fout.png">

---
class: center, middle, intro
# Bedankt!

<img src="/images/logos.png">

Next: <a href="slide.php?theme=joomla_performance&id=images#1">Optimaliseer afbeeldingen door Simon Kloostra</a>

<a href="joomla_performance">programma</a>
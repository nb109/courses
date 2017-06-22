class: middle, center, intro
# Content Delivery Networks (CDN)
## door Simon Kloostra
### <a href="http://twitter.com/simonkloostra">@simonkloostra</a>
<img src="/images/logos.png">

---
# Wat is een CDN?
- Netwerk van servers wereldwijd
- Liefst zo verspreid mogelijk
- Voor sites met een verspreid publiek
- Alleen in NL? Minder belangrijk voor performance (mits je server ook in NL staat!)
<img src="joomla_performance/simon/images/cdn.png">

---
# Voordelen van een CDN
- Data sneller bij de gebruiker
- Minder zwaar gebruik van de eigen server, zeker bij veel verkeer
- Soms goedkoper, afhankelijk van de host (bandwidth)
- Veiligheid, afhankelijk van de setup (bv DDOS aanvallen)
- Uptime, afhankelijk van de setup 
- Meer punten in Y-slow analyse:
<img src="joomla_performance/simon/images/yslow.png">

---
# Nadelen van een CDN
- Soms complex om op te zetten, zeker bij SSL sites
- SEO issues bij incorrecte installatie
- Extra kosten
- Een CDN kan ook down gaan

---
# Meerdere set-ups mogelijk
- Verkeer volledig via CDN geleid: vooral bij CDN’s met nadruk op security (Cloudflare, Succuri) 
	- Geen aparte Joomla set-up nodig, set-up op DNS niveau
- Pull-zones: de statische resources worden via het CDN geladen, maar het initiële request niet 
	- (MaxCDN, KeyCDN, enzovoorts. KeyCDN heeft gratis Let’s Encrypt SSL)
- Statische resources zijn vooral: 
	- Plaatjes , CSS , JS , Fonts, Enzovoorts
- Pull-zones zijn vrij makkelijk te implementeren in Joomla

---
# Pull-zones instellen
- Aan de CDN kant: website registreren
- Het CDN harkt alle statische bestanden binnen en verspreid deze over het netwerk
- Aan de website kant: instellen dat de bron van de statische bestanden binnenkomt vanaf CDN
	- Voor: `<img src="images/plaatje.jpg" /> `
	- Na: `<img src="https://cdn-url-xxxxx.netdna-cdn.com/images/plaatje.jpg" />`
- Stel in welke bestandstypes je wel of niet via het CDN wilt laden
- Klaar

---
# Denk na over je bron URL
- Default CDN URL is meestal iets als:
	- `https://cdn-url-xxxxx.netdna-cdn.com/`
- Dit ligt buiten je eigen domein. Beter is een subdomein voor je eigen domein te koppelen aan deze CDN URL (CNAME), bijvoorbeeld iets als: 	
	- `https://cdn.example.com/`
	
<img src="joomla_performance/simon/images/cdnjoomlaseo.png">

- Veel beter voor SEO!

---
# Regularlabs – CDN for Joomla
- Perfect en werkt simpel
- Ook CDN support in JCH-Optimize 
<img src="joomla_performance/simon/images/cdnforjoomla.png">

---
# SEO Overweging
- Plaatjes worden in principe geïndexeerd vanaf het CDN
- Gebruik daarom een custom domain als cdn.example.com
	- (Met custom domain is wisselen van CDN provider ook veel makkelijker!)
- CDN creëert duplicate content, vooral voor je images!
- Check voor elk CDN altijd de SEO instellingen
- Meestal is er een robots.txt bestand aan de CDN kant in te stellen

---
# CDN providers
- Cloudflare (DNS niveau, vaak gratis in basisversie, instellen via sommige webhosts)
- MaxCDN
- KeyCDN (gratis Let’s Encrypt SSL)
- Amazon Cloudfront
- Enzovoorts

---
# Resources
- Algemeen verhaal over Joomla CDN:
	- <a href="https://joomlaseo.com/performance/use-a-cdn-content-delivery-network">https://joomlaseo.com/performance/use-a-cdn-content-delivery-network</a> 
- Gedetailleerde instructie over MaxCDN met uitleg over custom domain: 
	- <a href="https://joomlaseo.com/blog/speed-up-joomla-with-a-cdn">https://joomlaseo.com/blog/speed-up-joomla-with-a-cdn</a>
	
---
class: center, middle, intro
# Bedankt!

<img src="/images/logos.png">

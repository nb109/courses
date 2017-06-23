class: middle, center, intro
# Optimaliseer afbeeldingen
## door Simon Kloostra
### <a href="http://twitter.com/simonkloostra">@simonkloostra</a>
<img src="/images/logos.png">

---
# Waarom?
- Plaatjes vaak grootste resource
- Zowel in grootte als in aantal
- Optimalisatie meestal zonder risico
<img src="joomla_performance/simon/images/imagessize.png">

---
# Ga verstandig om met plaatjes
- Denk na: heb ik hier echt een plaatje nodig?
	- Misschien volstaat een Fontawesome icoon of een CSS background
- Ga met name op de homepage efficiënt om met plaatjes
- Moet je echt een slider met 12 plaatjes gebruiken?

---
# Kies het goede formaat
- `GIF` voor kleine icoontjes
- `JPG` voor foto’s (met keuze tussen baseline en progressive)
- `PNG` voor transparantie en logo’s
- Maak ze in de laagste kwaliteit die goede resultaten levert (60% is vaak prima in Photoshop)
- Kies voor de laagste breedte die acceptabel is

---
# Gebruik Lossless / Lossy compressie
- Online met bijvoorbeeld: TinyPNG/JPG, Kraken.io, ImageRecycle, Compressor.io enzovoorts
<img src="joomla_performance/simon/images/compressor.png">

---
# Gebruik Lossless / Lossy compressie
- Online met bijvoorbeeld: TinyPNG/JPG, Kraken.io, ImageRecycle, Compressor.io enzovoorts
- JCE met “Remove EXIF data”
- ImageRecycle Joomla plugin (betaald)
- Lokaal: RIOT of andere tools

---
# Compressie: Online

(real live voorbeeld)

<img src="joomla_performance/simon/images/online.png">

---
# Compressie: JCE
`Editor Profiles` > `Editor Parameters` > `Filesystem`

<img src="joomla_performance/simon/images/jce.png">

---
# Compressie: ImageRecycle
Betaalde Joomla plugin:

<img src="joomla_performance/simon/images/imagerecycle.png">

---
# Base-encoding
- Zinvol voor erg kleine plaatjes: scheelt vooral HTTP-requests 
- Bij te grote plaatjes kost browser-processing teveel tijd

### Voorbeeld: 
```text
<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAYAAAAfSC3RAAAAI0lEQVR42mNgGHBwPF7nPwgTUsdEd5uZ6O7noezHgYtHmgEA5lgXNZwaK2gAAAAASUVORK5CYII=" />  
```
Dit levert het volgende plaatje op: 

<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAYAAAAfSC3RAAAAI0lEQVR42mNgGHBwPF7nPwgTUsdEd5uZ6O7noezHgYtHmgEA5lgXNZwaK2gAAAAASUVORK5CYII=" />  

### Via Joomla extensie
Support zit onder ander in Yireo ScriptMerge, maar het kan ook online: http://b64.io/ 

---
# Lazy-loading
- Alleen de plaatjes boven de vouw worden geladen
- De andere plaatjes laden pas na een scroll-actie
- Kan erg veel resources schelen, zeker op sites met veel plaatjes
- Verbruikt ook minder band-width
- Support in plugins als JCH-Optimize maar ook in Lazy-Load for Joomla van Viktor Vogel

---
# WebP formaat
- Geavanceerd format voor plaatjes
- Support in Yireo ScriptMerge maar vereist specifieke server-setup

---
# Mobiel gebruik
- Probeer de ideale content voor je device te tonen
- Adaptive images
- Srcset attribute

---
# Adaptive images
- Plaatjes laden op basis van het aangetroffen device
- Support in XT-adaptive images
- Kan ook met slim gebruik van: 	
	- Conditional Content (Regularlabs) 	
	- User Agent Detection (Rene Kreijveld) 	
	- Device Specific Content (Viktor Vogel)
	
---
# Gebruik srcset attribute
- Bied plaatjes aan in meerdere formaten en laad degene die best matched met de aangetroffen schermgrootte. Kan met zowel <img> als <picture> gebruikt worden:
<img src="joomla_performance/simon/images/srcset.png">

- Support is aanwezig in JCE Image Manager Extended onder het “responsive” tabje
- Meer info: https://responsiveimages.org/ 

---
class: center, middle, intro
# Bedankt!

<img src="/images/logos.png">

Next: <a href="slide.php?theme=joomla_performance&id=amp#1">Accelerated Mobile Pages door Simon Kloostra</a>

<a href="joomla_performance">programma</a>
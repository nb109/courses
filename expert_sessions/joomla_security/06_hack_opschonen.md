class: center, middle, intro
# Server opschonen
## Hoe spoor je schadelijke bestanden op?

---
# Services (buitenkant)
- Sucuri SiteCheck
- HackerTarget
- VirusTotal
- AVG Thread Labs

---
# Joomla tools
- Joomla Anti-Malware Scan Script (JAMSS)
- RSFirewall
- jProtection

---
# Linux commandos
* Commando `grep`
    - `base64_decode`
    - `eval`
* Commando `find`
    - Files die op datum X aangepast zijn
* Maldet
* PHP Shell Detector

---
# Services (binnenkant)
- Virus scanners
- MyJoomla



---
class: center, middle, intro
# Access logs
## Hoe zijn de hackers binnengekomen?

---
# Dweilen met de kraan open


---
# Uitlezen access logs (1)
POST-opdrachten vaak verdachte, zeker van onbekend IP.
```
zcat ~/weblogs/raw/*|awk '$6 == "\"POST" && $9 == 200 {print $7}'|sort|uniq -c|sort -nr|grep -e ".*php$"
```
* zoekt in logs van de afgelopen 30 dagen op POST opdrachten
* filtert de URL er uit
* telt het aantal keer dat de betreffende URI voorkomt
* sorteert op frequentie

```
15 /plugins/system/bfnetwork/bfnetwork/bfAudit.php
8 /administrator/index.php
4 /images/51.php
```

---
# Uitlezen access logs (2)
`/images/51.php` is vreemde vogel, nader bekijken
```
zcat ~/weblogs/raw/*|grep "/images/51.php"
```
Geeft:
```
expertsessie.nl 123.45.67.89 – – [23/Oct/2015:16:03:04 +0100] “POST /images/51.php HTTP/1.1” 301 248 “-” “Mozilla/5.0 (X11; Linux i686) AppleWebKit/534.34 (KHTML, like Gecko) Qt/4.7.4 Safari/534.34 ” “-” “-” 123.45.67.89 – pid:21055 585 0 0 0 0
```
Dus iemand met IP-adres `123.45.67.89`

---
# Uitlezen access logs (3)
Wat heeft IP-adres `123.45.67.89` nog meer gedaan?
```
zcat ~/weblogs/raw/*|grep "123.45.67.89"
```
Geeft:
```
123.45.67.89 - - [09/Oct/2015:13:25:09 +0200] "GET http://www.expertsessie.nl/administrator/index.php HTTP/1.1" 301 - "-" "-" "-" "123.45.67.89" 123.45.67.89 expertsessie.nl pid:12161 195952 0 4000 0 0
```
```
123.45.67.89 - - [09/Oct/2015:13:25:11 +0200] "POST http://www.expertsessie.nl/administrator/index.php HTTP/1.1" 301 - "-" "-" "-" "123.45.67.89" 123.45.67.89 expertsessie.nl pid:14368 218630 4000 0 0 0
```

---
# Meer info
* https://www.byte.nl/kennisbank/item/schadelijke_bestanden_opsporen


---
class: center, middle, intro
# Wachtwoorden
## Voorkom dat de hacker nogmaals binnenkomt

---
# Wachtwoorden aanpassen
* Server toegang (FTP / FTPS)
* Database wachtwoorden
* Joomla-gebruikers wachtwoorden
* Webhost controle paneel toegang

---
# Wachtwoorden kiezen
* Minimum lengte
    - Meer dan 10
* Complexiteit
    - Mix van vreemde en normale tekens
    - Zin uit obscuur boek
* Niet voorspelbaar
    - Geen "a" vervangen met "@"
    - Geen "e" vervangen met "3"
    - Niet gekoppeld aan je publieke leven
* Tijdelijk
    - Kies periodiek nieuw wachtwoord
    
---
# Wachtwoord niet zelf kiezen is beter
Maak gebruik van password-manager tools als:
* 1Password (https://agilebits.com/onepassword)
* LastPass (https://lastpass.com/nl/)



---
class: center, middle, intro
# Joomla opschonen
## Hoe krijg ik Joomla weer schoon?

---
# Backup terugzetten

---
# Schadelijke extensies opsporen
* Loop geinstalleerde extensies na
* Niet alleen via Joomla, ook op server
* Hackers zijn creatief! (Oke, soms)
* Joomla VEL (http://vel.joomla.org)

---
# Joomla opnieuw installeren?
* Wees voorzichtig, niet alles klakkeloos verwijderen
* Bestanden overschrijven

---
# Extensies opnieuw installeren?
* Kan een optie zijn
* Wel eerst verwijderen (backup database!)

---
# Gebruikers nalopen
* Controleer op vreemde gebruikers
* Vereis aanpassen van wachtwoord

---
class: center, middle, intro
# En nu?
## In de toekomst voorkomen!

---
# Bassale veiligheid
- Wachtwoorden
- Instellingen Joomla
- Template code
- Bestanden verwijderen
- `.htaccess`

---
# Continue aandacht
- Updates van core en extensies
- Admin Tools Pro, Marco SQL Injection Plugin
- Up to date blijven met PHP, Apache, MySQL
- Controle op Super Users
- Weet wat er speelt binnen Joomla

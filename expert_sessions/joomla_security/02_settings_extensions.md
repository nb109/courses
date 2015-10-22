class: middle, center, intro
# Joomla-instellingen
## Gebruik maken van de core-opties

---
# User `admin` met pass `admin`
<img src="joomla_security/images/settings-admin.png"/>
<span class="size-20">Locatie: `Gebruikers` &#10148; `Beheren`</span>

---
# Super Users?
<img src="joomla_security/images/settings-super-users.png"/>
<span class="size-20">Locatie: `Gebruikers` &#10148; `Beheren`</span>

---
# Gebruikersregistratie aan/uit
<img src="joomla_security/images/settings-user-registration.png"/>
<span class="size-20">Locatie: `Systeem` &#10148; `Algemene instellingen` &#10148; `Gebruikers`</span>

---
# Standaard gebruikersgroepen
<img src="joomla_security/images/settings-default-usergroup.png"/>
<span class="size-20">Locatie: `Systeem` &#10148; `Algemene instellingen` &#10148; `Gebruikers`</span>

---
# Gebruiker toevoegen
<img src="joomla_security/images/settings-new-user.png"/>
<span class="size-20">Locatie: `Gebruikers` &#10148; `Beheren` &#10148; `Nieuwe gebruiker toevoegen`</span>

---
# Wachtwoordsterkte
<img src="joomla_security/images/settings-password.png"/>
<span class="size-20">Locatie: `Systeem` &#10148; `Algemene instellingen` &#10148; `Gebruikers`</span>

---
# 2-Factor-authentication

---
# Foutrapportage
@TODO: screenshot

---
# Generator tag
`Systeem` &#10148; `Algemene instellingen` &#10148; `Toon Joomla versie` op `Ja`:
```html
<meta name="generator" content="Joomla! - Open Source Content Management  - Version 3.4.5" />
```
op `Nee`
```html
<meta name="generator" content="Joomla! - Open Source Content Management" />
```
Liever helemaal weg? Plaats in PHP van template `index.php`:
```php
$this->setGenerator(null);
```

---
# Gebruik van extensies
* Gebruik testomgeving voor testen
* Verwijder ongebruikte extensies (sorteer op ID)
* Beperk extensies tot noodzakelijke, verdiep in template overrides
* Installeer alleen van betrouwbare bron



---
class: middle, center, intro
# Joomla-extensies
## Voor verhogen van de veiligheid

---
# Veilige admin URL
```
http://JOOMLA/administrator?i3ts_v3iligs
```
* Akeeba Admin Tools Pro
* kSecure
* jSecure
* AdminExile

---
# PHP filtering
* Marcos SQL Injection
* RSFirewall
* JomDefender
* SecurityCheck
* jHackGuard
* OSE Secure

---
# Anders extensies
- Brute Force Stop
- R Antispam
- SEF extensies
    - JoomSEF
    - sh404SEF
- Yireo Dynamic404
- Yireo HTTP Authentication



---
class: middle, center, intro
# Joomla ACL
## Specifieke gebruikerstoegang

---
# ACL?
* Access Control List
* Wie kan wat?
* Sinds Joomla 1.6 volledig instelbaar

---
# Waarom gebruiken?
* Alleen toegang tot wat noodzakelijk is
* Gebruiksvriendelijk
* Voorkom veiligheidsproblemen

---
# Toegang tot enkel component
@TODO: video opzetten ACL

---
# Twee gebruikersaccounts
* Voor noodgevallen & ontevreden met webbouwer
* Voor dagelijks gebruik
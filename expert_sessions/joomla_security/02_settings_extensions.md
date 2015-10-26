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
# 2-Factor-authentication (1)
<img src="joomla_security/images/2factor-plugin.png"/>
<span class="size-20">Locatie: `Extensies` &#10148; `Plugin` &#10148; `Authenticatie in twee stappen`</span>

---
# 2-Factor-authentication (2)
<img src="joomla_security/images/2factor-user.png"/>

---
# 2-Factor-authentication (3)
<img src="joomla_security/images/2factor-user2.png"/>
<span class="size-20">Locatie: `Gebruikers` &#10148; `Beheren` &#10148; `Bewerk een gebruiker`</span>

---
# 2-Factor-authentication (4)
<img src="joomla_security/images/2factor-login.png"/>


---
# Foutrapportage
<img src="joomla_security/images/settings-foutrapportage.png"/>
<span class="size-20">Locatie: `Systeem` &#10148; `Algemene instellingen` &#10148; `Server` &#10148; `Foutrapportage` op `Geen`</span>

---
# Secret key
Wat is eigenlijk die secret key in `configuration.php`:
```php
public $secret = 'pIRRJDXCsdUb21wj3I';
```

--
* Wordt gebruikt voor Joomla interne veiligheid, o.a. voor sessies. 
* Kan aangepast worden, al verlopen bestaande sessies dan

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
* Gebruik testomgeving
* Beperk extensies tot noodzakelijke, verdiep in bijv template overrides
* Installeer alleen van betrouwbare bron
* Verwijder ongebruikte extensies (sorteer op ID)

--

<img src="joomla_security/images/extensiebeheer.png"/>


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
# Andere extensies
- Brute Force Stop
- R Antispam
- SEF extensies
    - JoomSEF
    - sh404SEF
- Yireo Dynamic404
- Yireo HTTP Authentication
- Wemahu



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
<div class="player">
    <video controls>
        <source src="joomla_security/videos/joomla_acl.mp4" type="video/mp4">
    </video>
</div>

---
# Twee gebruikersaccounts
* Voor noodgevallen & ontevreden met webbouwer
* Voor dagelijks gebruik
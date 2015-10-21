class: middle
# Joomla settings
## Joomla Security
### door: Sander

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
# Extensies
* Gebruik testomgeving voor testen
* Verwijder ongebruikte extensies (sorteer op ID)
* Beperk extensies tot noodzakelijke, verdiep in template overrides
* Installeer alleen van betrouwbare bron
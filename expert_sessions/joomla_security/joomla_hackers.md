class: middle
# Hoe denkt een hacker?
## Joomla Security
### door: Jisse

---
# Doelen
* Glorie en faam
    - Defacing van websites
    - DOS aanvallen
* Commerciele doelen
    - Spammen
    - Chantage

---
# Exploits aan voorkant
- SQL Injection
    - Rare code in URLs om database queries aan te passen
- Cross Site Scripting (XSS)
    - Foute JavaScript in forum post
- Cross Site Request Forgery (CSRF)
    - Submit button op site A doet Joomla login

---
# Workflow
- Exploit aan voorkant
- PHP shells uploaden
- Linux root vulnerability
    - Buffer overflow
    - Race conditions
- Linux rootkits

---
# Voorbeelden van PHP shells
- C99 shell
- SimShell
- My Shell
- Antichat shell

---
# Voorbeelden van PHP shell names
- fatal.php
- ftpsearch.php
- cw.php
- pws.php
- cpanel.php

---
# Linux rootkits
- Verbergen van zichzelf
    - Overschrijven van system calls
    - Vervangen van system binaries
    - Linux Kernel Module (LKM) rootkits
- Remote toegang als root
- Automatisch opzoeken van botnet

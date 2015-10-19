class: middle
# Linux hosting
## Joomla Security
### door: Jisse

---
# Het probleem van shared hosting
- Alle home-folders moeten leesbaar zijn
    - Uitlezen van wachtwoorden relatief makkelijk
- Vermijd goedkope hosters
- Pas op voor bestandspermissies
    - Bestanden: Niet 666 maar 644
    - Folders: Niet 777 maar 755


---
# Firewalls
- iptables
    - TCP SYN attacks
    - ping flooding
- Apache mod_security

---
# Intrusion detection
- IDS
    - AppArmor
    - SELinux

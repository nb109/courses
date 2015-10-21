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
- nftables / iptables / ipchains
    - TCP SYN attacks
    - ping flooding
- Apache ModSecurity

---
# Brute force detection
- DenyHosts
- Fail2Ban

---
# Intrusion detection
- `auditd`
- IDS
    - AppArmor
    - SELinux
- git

---
# Up to date blijven
- Shell Shock (bash)
- Zwakheden in OpenSSL
- Buffer overflows

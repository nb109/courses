class: middle, center, intro
# Joomla! Security
## Expert Sessie

---
# Yireo
<img src="joomla_security/images/yireo.png" />

---
# Perfect Web Team
<img src="joomla_security/images/perfectwebteam.png"/>

---
class: middle, center, intro
# Joomla! 3.4.5
## Veiligheidsrelease

---
# vr 16 okt 2015: Aankondiging 
<img src="joomla_security/images/345-announcement.png"/>

---
# do 22 okt 2015, 16:00 uur: Release 
<img src="joomla_security/images/345-release.png"/>

---
# do 22 okt 2015, 16:50 uur: Exploit
<img src="joomla_security/images/345-exploit.png"/>

---
# Veiligheidsissues 
### High Priority - Core - SQL Injection (J! 3.2 t/m 3.4.4)
"Inadequate filtering of request data leads to a SQL Injection vulnerability."

### Medium Priority - Core - ACL Violations (J! 3.2 t/m 3.4.4)
"Inadequate ACL checks in com_contenthistory provide potential read access to data which should be access restricted."

### Medium Priority - Core - ACL Violations (J! 3.0 t/m 3.4.4)
"Inadequate ACL checks in com_content provide potential read access to data which should be access restricted."

---
# Update belangrijk?

---
class: middle, center, intro
# JA!
 
---
# Randvoorwaarden voor slagen hack
* De echte Joomla admin moet ingelogd zijn
* Hacker moet een NIET valide content ID opgeven
* Sessie handler moet de database zijn
* Error pagina die SQL-error toont

---
# Hoe kon ik dit voorkomen?
- Op tijd uitloggen uit backend
- Sessies opslaan in Redis of memcached
- Error pagina (`error.php`) aanpassen

---
class: middle, center, intro
# Live Demo
## Hacken!

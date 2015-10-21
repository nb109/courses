class: middle
# SSL certificaten
## Joomla Security
### door: Jisse

---
# SSL met Joomla sites
- SSL certificaat
    - SSL certificate authority
    - SSL certificate chain
- Server support voor SSL
- Eigen IP adres

---
# SSL certificaat
- Verificatie van eigenaar
    - Controle KvK, adres, bankgegevens
    - Extended Validation (EV)
- RSA key-pair (2048 bits) 
- Protocollen
    - Verouderd: SSLv2, SSLv3
    - Modern: TLSv1.0, TLSv1.1, TLSv1.2
- SSL ciphers

---
# OpenSSL problemen
- Heartbleed
- Poodle
- PRNG zwakheden

Lange lijst: https://www.openssl.org/news/vulnerabilities.html

---
# SSL op alle paginas?
- Yireo SSLRedirect
- Google waardeert SSL meer dan non-SSL
- HTTP Strict Transport Security (HSTS)

---
# SSL online checks
- https://www.sslcheck.nl/
- https://www.ssllabs.com/ssltest/
- https://www.sslchecker.com/

---
# Tip: Test browsers
- Test SSL support in alle browsers
    - https://www.browserstack.com/
- Zorg bij iedere SSL site voor TLSv1.2
- Laat SSL ciphers aan hoster over

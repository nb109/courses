class: middle
# Meertalige componenten
## door Jisse Reitsma
### <a href="http://twitter.com/jissereitsma">@jissereitsma</a>

---
# Meertalige componenten
- Taalbestanden
- Content in meerdere talen
    - Strategie van content beheer
    - Routing
    - Database queries
    - Content associaties

---
# Routing
- Voeg altijd een `lang` parameter toe
```php
index.php?option=com_example&view=item&id=1&lang=nl-NL
```

---
# Database queries
- Selecteer altijd op basis van de taal
```php
$currentLanguage = JFactory::getLanguage();
$language = $db->quote($currentLanguage->getTag());
$query->where('a.language IN (' . $language . ', '.$db->quote('*').')');
```

---
# Content beheer
- 1 tabel per taal (VM-style)
    - `#__mycomponent_item_nl`
    - `#__mycomponent_item_en`
- 1 tabel voor alle talen
    - Veld `language` (`en-GB`, `nl-NL`)
    - Associaties tussen items

---
# Content associaties
Bestand `components/com_example/helpers/association.php`:
```
abstract class ExampleHelperAssociation
{
    static public function getAssociations($id = 0, $view = null)
    {
        return array(
            'nl-NL' => $this->getItemRoute(2, 'nl-NL'),
            'en-GB' => $this->getItemRoute(3, 'en-GB'),
        );
    }

    static public function getItemRoute($id, $language)
    {
        $url = 'index.php?option=com_example';
        $url .= '&view=item';
        $url .= '&id=' . $id;
        $url .= '&lang=' . $language;

        return JRoute::_($url);
    }
}
```


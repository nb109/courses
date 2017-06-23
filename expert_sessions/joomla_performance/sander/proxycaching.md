class: middle, center, intro
# Proxy caching
## door Sander Potjer
### <a href="http://twitter.com/sanderpotjer">@sanderpotjer</a>
<img src="/images/logos.png">

---
class: middle, center, 
# HTTP Proxy caching?

Een proxy server zit tussen jou en de webserver in. Als deze gecached wordt komt jouw verzoek niet op de webserver uit.

## Voorbeelden:
Varnish &amp; CDN

---
# Websites zonder Varnish

<img src="joomla_performance/sander/images/webhosting-zonder-varnish.png">

---
# Websites met Varnish

<img src="joomla_performance/sander/images/webhosting-met-varnish.png">

---
# Varnish = supersnel!
<img src="joomla_performance/sander/images/varnishspeedtest.png">

Test zelf: <a href="http://varnishspeedtest.nl">http://varnishspeedtest.nl</a>

---
# Afhankelijk van webhosting
Of je zelf een proxy caching kunt gebruiken is afhankelijk van je webhosting.
- Byte: Varnish
- Siteground: SuperCacher (vergelijkbaar)

---
# Statische HTML
Elke URL wordt opgeslagen als statisch HTML pagina. Dus let op:

- Geen dynamische elmenten die per page-load wisselen
- Device afhankelijke elmenten alleen via JavaScript
- Voorkom dat gebruikersgegevens in cache komen
	- Jan ziet info van Piet
	- Winkelmandjes
- Pagina's uitsluiten van caching
- Aanpassingen niet direct zichtbaar

---
# Byte &amp; Varnish &amp; Joomla
Plugin beschikbaar voor purgen van pagina's na wijzigingen en uitsluiten van menu's en componenten.

<img src="joomla_performance/sander/images/joomlavarnish.png">
In JED: <a href="https://extensions.joomla.org/extension/cluster-varnish-for-joomla/">Cluster Varnish for Joomla</a>

---
# Purgen van pagina's
<img src="joomla_performance/sander/images/joomlavarnishpurge.png">

---
class: middle, center, intro
# Maar ik wil een dynamische & snelle site!

---
# Voorbeeld: NPO Radio 1
<img src="joomla_performance/sander/images/nporadio1.png">

---
# Voorbeeld: NPO Radio 1
<img src="joomla_performance/sander/images/nporadio1playlist.png">

---
# Dynamische elementen via Ajax

```javascript
function _requestSuggestions(callback) {
	jQuery.ajax({
		url: '/index.php',
		cache: true,
		dataType: 'json',
		data: {
			option: 'com_nporadio1',
			view: 'items',
			task: 'suggestions',
			npo_cc_skip_wall: true,
			data: '{}' // user favorites will go in here
		},
		beforeSend: function () {
			callback.beforeSend();
		},
		success: function (response) {
			if (response.success) {
				// only store items we haven't had allready
				for (var i = 0, l = response.items.length; i < l; i++) {
					var item = response.items[i];

					if (_getItem(item.id).i == -1) {
						_aSuggestions.push(item);
					}
				}
				_changed();

				if (typeof callback.success == 'function') {
					callback.success(response.items);
				}
			}

			_dTimeOnRequest = Date.now();
		},
		complete: function() {
			if (typeof callback.complete == 'function') {
				callback.complete();
			}
		}
	});
}
```

---
# Dynamische elementen via Ajax

<img src="joomla_performance/sander/images/ajax-call.png">


```php
if ($app->input->get('task') == 'suggestions')
{
	$model = JModelLegacy::getInstance('Suggestions', 'Nporadio1Model');

	$this->items = array(
		'success' => true, 
		'items' => $model->getItems()
	);

	parent::display('json');
	JFactory::getApplication()->close();
}
```

<img src="joomla_performance/sander/images/ajax-response.png">

---
# Tonen via JavaScript

```javascript
function _swapElementsWithItem(html, item) {
	var aIsUrl = ['item_url', 'item_download', 'item_image', 'share_facebook', 'share_twitter', 'share_mail'];
	for (var key in item) {
		if (key === 'item_image') {
			html = html.replace('/{{' + key + '}}', 'background-image: url(\'' + encodeURI(item[key]) + '\');' || '');
			html = html.replace('{{' + key + '}}', 'background-image: url(\'' + encodeURI(item[key]) + '\');' || '');
		} else {
			// sometimes this is required, so we try this version first
			if (aIsUrl.indexOf(key) !== -1) {
				html = html.replace('/{{' + key + '}}', item[key] || '');
			}

			html = html.replace('{{' + key + '}}', item[key] || '');
		}

	}

	return html;
}
```

---
class: middle, center, intro
# Pfff, waar start ik?

---
# Joomla heeft com_ajax
Goed om mee van start te gaan om zelf data dynamisch te laden

- Documentatie: <a href="https://docs.joomla.org/Using_Joomla_Ajax_Interface">https://docs.joomla.org/Using_Joomla_Ajax_Interface</a>
- Leuk module voorbeeld van Niels van der veer: <a href="https://github.com/n9iels/mod_jversions">https://github.com/n9iels/mod_jversions</a>

---
# mod_jversions JavaScript
`mod_jversions/tmpl/default.php`

```javascript
$(document).ready(function() {
	var request = {
		'option': 'com_ajax',
		'module': 'jversions',
		'prefixes': " . json_encode($params->get('prefixes', array("Joomla! 3"))) . ",
		'update_url' : '" . $params->get('update_url', 'https://update.joomla.org/core/list.xml') . "',
		'format': 'raw'
	};
	$.ajax({
		type: 'POST',
		data: request,
		dataType: 'json',
		success: function (response) {
			$.each(response, function(index, value) {
				$('.latest-versions').append('<div class=\"jversion\"><span class=\"icon icon-joomla\"></span><span class=\"text\">' + value + '</span></div>');
			});
		},
		error: function (response) {
			$('.latest-versions').html('" . JText::_('MOD_JVERSIONS_RESPONSE_ERROR') . "');
		}
	});
	return false;
});
```

---
# mod_jversions PHP

`mod_jversions/helper.php`

```php
public static function getAjax()
{
	// Get input variables
	$url      = JFactory::getApplication()->input->get('update_url', null, 'raw');
	$prefixes = JFactory::getApplication()->input->get('prefixes', null, 'raw');

	// Get response
	$response = self::getLatest(self::getLatestVersions(), $prefixes);

	if ($response === null)
	{
		return false;
	}

	return json_encode($response);
}
```

---
class: center, middle, intro
# Bedankt!

<img src="/images/logos.png">

Next: <a href="slide.php?theme=joomla_performance&id=cdn#1">Content Delivery Networks (CDN) door Simon Kloostra</a>

<a href="joomla_performance">programma</a>
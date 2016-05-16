# Environment Label

_Nice coloured labels to help distinguish your CraftCMS environments ...so you don't forget where you are._

by [Tom Davies](http://madebykind.com/) and [Michael Rog](https://topshelfcraft.com)



### TL;DR.

The _Environment Label_ plugin adds a nice coloured banner to your CraftCMS control panel so you'll never forget what environment you're using.

The colors and text of the environment label are configurable via the plugin config file using config files.

![Screenshot](environmentlabel/resources/docs/staging.jpg)

* * *


### Installation

Drop the `environmentlabel` directory into `craft/plugins`, visit the _Settings_ page of the CP, and click to _Install_ the Environment Variable plugin.

### Config

You can configure the colour and text of the environment label using the plugin config file.

Just a `environmentlabel.php` file to your `craft/config` directory, and copy in the default plugin config:


```php
<?php

return array(

	'showLabel' => true,
	'label' => CRAFT_ENVIRONMENT,
	'prefix' => null,
	'suffix' => null,
	'labelColor' => #cc5643,
	'textColor' => #ffffff,

);
```

By default, the environment label will pull in the value of Craft's `CRAFT_ENVIRONMENT` constant, which is set to the current hostname unless you override it.

_(In other words, out of the box, you get a red banner with white text that alerts you to the current hostname.)_

The plugin config can use Craft's [Multi-Environment Config](https://craftcms.com/docs/multi-environment-configs) syntax, which allows you to tweak the appearance and text of the environment label for each installation.

For example, your `environmentlabel.php` config file might use environment variables set by the server:

```php
<?php

return array(

	'*' => array(
		'label' => getenv('CRAFT_ENV_LABEL'),
		'suffix' => " // NO LIVE CONTENT",
	),

	'myProductionDomain.com' => array(
		'showLabel' => false,
	),

	'.dev' => array(
		'labelColor' => '#337799',
	)

);
```

_(We highly recommend using [dotenv](https://github.com/vlucas/phpdotenv) to store and deploy environment variables on your server. It'll change your life.)_

### Template globals

_Environment Label_ also makes its data available via a Twig template global variable:

```twig
{{ environmentLabel.label }}
{{ environmentLabel.prefix }}
{{ environmentLabel.suffix }}
{{ environmentLabel.fullText }}
{{ environmentLabel.labelColor }}
{{ environmentLabel.textColor }}
```

### JavaScript globals

_Environment Label_ makes its label and full text available as JS globals on each authenticated CP page:

```js
window.CRAFT_ENVIRONMENT
window.CRAFT_ENVIRONMENT_LABEL
```

### What are the system requirements?

Craft 2.5+ and PHP 5.4+



### I found a bug.

Please open a GitHub Issue, submit a PR to the `dev` branch, or just email Tom.


* * *

#### Contributors:

  - Plugin development: [Michael Rog](http://michaelrog.com) / @michaelrog
  - Plugin development: [Tom Davies](https://github.com/tomdavies) / @metadaptive
  - Icon: [NAS](http://nasztu.com/), via [The Noun Project](https://thenounproject.com/search/?q=label&i=28588)
# Labelled environments for Craft

Provides colour-coded labels in your Craft CMS control panel to help easily distinguish between environments:

![Screenshot of development env](https://raw.github.com/madebykind/craft.labelenvironment/master/development.jpg)

![Screenshot of staging env](https://raw.github.com/madebykind/craft.labelenvironment/master/staging.jpg)

## Installation

Drop the `labelenvironment` directory into `craft/plugins`, and install from the CP.

## Set up

Out of the box Craft sets `CRAFT_ENVIRONMENT` to the current hostname. The plugin consumes the value of `CRAFT_ENVIRONMENT`, and expects that to be something friendly like `development`, `staging`, `preview` or `production`.

We do this using [PHP dotenv](https://github.com/vlucas/phpdotenv), which you should totally also use to keep your db config details out of source control.

Our index.php looks like this:

```php
// Path to your craft/ folder
$craftPath = '../craft';


// Composer: https://getcomposer.org/doc/
require_once('../vendor/autoload.php');

$root_dir = dirname(dirname(__FILE__));
if (file_exists($root_dir . '/.env')) {
  Dotenv::load($root_dir);
  Dotenv::required(array('DB_NAME', 'DB_USER', 'DB_PASS', 'DB_HOST', 'CRAFT_ENV'));
}

define('CRAFT_ENVIRONMENT', getenv('CRAFT_ENV'));
```

The plugin still works with just the hostname, but its output won't be so pretty.


## Configuration

Colors can be set per-environment from the plugin's settings page.

You can customise the look of the environment label by editing `resources/environment.css`.


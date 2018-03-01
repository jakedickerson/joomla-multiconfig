
# Joomla Multiconfig
Multiple configuration.php files for Joomla based on domains

## Overview
If your Joomla site has several environments running on different domains it can make using version control difficult. You could exclude configuration.php, but then you are unable to change the other site settings. You may also wish to copy the site around different environments without having to change the configuration each time. 

Joomla Multiconfig allows you to create multiple configuration.php files which are loaded only when the domain matches your configuration. It also includes improved error pages in the event that a configuration file cannot be found or if a connection cannot be made to the database server.

## Getting started
First, create a local copy of the repo in a temporary directory where you can setup your configuration. You can create a new configuration by simply creating a new directory and copying the corresponding configuration.php for that site. The directory should follow the format of your domain (without http/https) followed by '--' followed by a simple description of the configuration. E.g.
```
/config/mysite.com--production/configuration.php
```
There are two example directories in the config directory to show how to format the directory name. You should delete these before moving the files to your site's environments. Once you have set up all your configuration files, you can move the files to each instance of your Joomla site.

## A note on security
Typically, it is not recommended to include sensitive details in version control systems. If this is a problem, you can create an .env file to contain your database configuration while configuration.php contains the other site information. This defeats the purpose of this repo somewhat, so it is a playoff between security and convenience. If you need to create an .env file see [dotenv](https://github.com/motdotla/dotenv "Dotenv"), which allows creating env files easily. You can then load env variables into your configuration.php file in the following way,
```php
class JConfig {
	public $user = '';
	public $password = '';
  // etc...
	public function __construct() {
		$this->user = getenv("DB_USER");
		$this->password = getenv("DB_PASS");
    // etc...
	}
}
```

## Disclaimer
So far, the setup has only been tested on one configuration (Joomla 3.8.5/MySQLi). It is, therefore, recommended that you take a backup before modifying your site and report any issues you encounter so they can be fixed.

# DAW PHP Config - English documentation

[![Latest Stable Version](https://poser.pugx.org/dev-and-web/daw-php-config/v/stable)](https://packagist.org/packages/dev-and-web/daw-php-config)
[![License](https://poser.pugx.org/dev-and-web/daw-php-config/license)](https://packagist.org/packages/dev-and-web/daw-php-config)

DAW PHP Config is a PHP library of a Open Source simple system of configuration.

*Retrieve a value from a configuration file with nice syntax!*
```php
<?php

if (config('app.debug')) {
    ini_set('display_errors', '1');
} else {
    ini_set('display_errors', '0');
}
```




### Requirements

* PHP >= 7.0






## * Summary *

* Introduction
* Installation
* How to do?
* Example
* Other simple example
* Contributing






## Introduction

With this Open Source library, you can easily create and load PHP configuration files.

The configuration files must be PHP files that return array.






## Installation

Installation via Composer:
```
php composer.phar require dev-and-web/daw-php-config 1.1.*
```


If you do not use Composer to install this package,
you will have to manually "require" before using this package.
Example:
```php
<?php

require_once 'your-path/daw-php-config/src/DawPhpConfig/bootstrap/load.php';
```






## How to do?

_You must create a folder that is named "config" at the root of your application.

_In your "config" folder you just created, you can create as many configuration files as you like.

 These files must have the extension ".php". And the file name must contain no point (except for the extension).

_You must create a function that is called "config" (this function must be accessible from anywhere in your application).

_In this "config" function, you must specify your path where you created your "config" folder in parameter of "Config::getInstance('your-path/config')".

_You can then load a configuration with this syntax: config('app.connections.mysql');




## Example

For example, in the root of our application we create a folder which we name "config".
In this folder, we create a configuration file which we name "app.php".
And in this file we put this:

```php
<?php

return [

    'debug' => true,

    'connections' => [
        'mysql' => ['host'=>'', 'database'=>'', 'username'=>'', 'password'=>'', 'charset'=>'utf8', 'prefix'=>''],
        'oci' => ['host'=>'', 'database'=>'', 'username'=>'', 'password'=>'', 'charset'=>'utf8', 'prefix'=>''],
        'sqlserver' => ['host'=>'', 'database'=>'', 'username'=>'', 'password'=>'', 'charset'=>'utf8', 'prefix'=>''],
        'postgresql' => ['host'=>'', 'database'=>'', 'username'=>'', 'password'=>'', 'charset'=>'utf8', 'prefix'=>''],
        'sqlite' => ['database'=>'', 'username'=>'', 'password'=>'', 'charset'=>'utf8', 'prefix'=>''],
    ],

];
```


Then, to load a configuration we can make this:

```php
<?php

use DawPhpConfig\Config;

/**
 * @param string $method
 * @return mixed
 */
function config($method)
{
    return Config::getInstance('config')->$method();
}

var_dump(config('app'));    // return array: content of the configuration file

var_dump(config('app.debug'));    // return bool: true
// it's the same that:
var_dump(config('app')['debug']);

var_dump(config('app.connections.mysql'));    // return array: configuration of mysql
// it's the same that:
var_dump(config('app')['connections']['mysql']);
```




## Other simple example

```php
<?php

error_reporting(E_ALL);

// If the debug is activated, we show the possible errors
if (config('app.debug')) {
    ini_set('display_errors', '1');
} else {
    ini_set('display_errors', '0');
}
```






## Contributing

### Bugs and security Vulnerabilities

If you discover a bug or a security vulnerability within DAW PHP Config, please send an message to Steph. Thank you.
All beg and all security vulnerabilities will be promptly addressed.




### License

The DAW PHP Config is Open Source software licensed under the MIT license.

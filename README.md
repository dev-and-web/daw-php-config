# DAW PHP Config - Library - Configuration with PHP files

[![Latest Stable Version](https://poser.pugx.org/dev-and-web/daw-php-config/v/stable)](https://packagist.org/packages/dev-and-web/daw-php-config)
[![License](https://poser.pugx.org/dev-and-web/daw-php-config/license)](https://packagist.org/packages/dev-and-web/daw-php-config)

DAW PHP Config is a PHP library of a Open Source simple system of configuration.

*Retrieve a value from a configuration file with nice syntax!*




### Author

Package developed by:
[Freelance PHP](https://www.devandweb.fr/freelance/developpeur-php)
[![Developpeur web](https://www.devandweb.fr/medias/app/website/developpeur-web.png)](https://www.devandweb.fr)




### Simple example

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




### Documentation

* The documentation is in folder "docs" of this package:

[English](https://github.com/dev-and-web/daw-php-config/blob/master/docs/en/doc.md)
|
[French](https://github.com/dev-and-web/daw-php-config/blob/master/docs/fr/doc.md)




## Installation

Installation via Composer:
```
php composer.phar require dev-and-web/daw-php-config 1.1.*
```






## Contributing

### Bugs and security Vulnerabilities

If you discover a bug or a security vulnerability within DAW PHP Config, please send an message to Steph. Thank you.
All beg and all security vulnerabilities will be promptly addressed.




### License

The DAW PHP Config is Open Source software licensed under the MIT license.

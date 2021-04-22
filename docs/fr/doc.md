# DAW PHP Config - Documentation Française

[![Latest Stable Version](https://poser.pugx.org/dev-and-web/daw-php-config/v/stable)](https://packagist.org/packages/dev-and-web/daw-php-config)
[![License](https://poser.pugx.org/dev-and-web/daw-php-config/license)](https://packagist.org/packages/dev-and-web/daw-php-config)

DAW PHP Config est une librarie Open Source d'un simple système de configuration.

*Récupérer la valeur d'un fichier de configuration avec une belle syntaxe !*
```php
<?php

if (config('app.debug')) {
    ini_set('display_errors', '1');
} else {
    ini_set('display_errors', '0');
}
```




### Pré-requis

* PHP >= 7.0






## * Sommaire *

* Introduction
* Installation
* Comment faire ?
* Exemple
* Un autre simple exemple
* Contribuer






## Introduction

Avec cette bibliothèque Open Source, vous pouvez facilement créer et charger des fichiers de configuration PHP.

Les fichiers de configuration doivent être des fichiers PHP qui renvoient un tableau.






## Installation

Installation avec Composer :
```
composer require dev-and-web/daw-php-config
```


Si vous n'avez pas utilisé Composer pour avoir installé ce package,
Vous devrez manuellement le "require" avant d'utiliser ce package.
Exemple :
```php
<?php

require_once 'your-path/daw-php-config/src/DawPhpConfig/bootstrap/load.php';
```






## Comment faire ?

_Vous devez créer un dossier nommé "config" à la racine de votre application.

_Dans votre dossier "config" que vous venez de créer, vous pouvez créer autant de fichiers de configuration que vous le souhaitez.

 Ces fichiers doivent avoir l'extension ".php". Et le nom du fichier ne doit contenir aucun point (à l'exception de l'extension).

_Vous devez créer une fonction appelée "config" (cette fonction doit être accessible depuis n'importe où dans votre application).

_Dans cette fonction "config", vous devez indiquer votre chemin où vous avez créé votre dossier "config" dans le paramètre de "Config::getInstance(votre-chemin/config')".

_Vous pouvez ensuite charger une configuration avec cette syntaxe : config('app.connections.mysql');




## Exemple

Par exemple, à la racine de notre application, nous créons un dossier que nous nommons "config".
Dans ce dossier, nous créons un fichier de configuration que nous appelons "app.php".
Et dans ce fichier, nous mettons ceci :

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


Ensuite, pour charger une configuration, nous pouvons faire :

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

var_dump(config('app'));    // return array : contenu du fichier de configuration

var_dump(config('app.debug'));    // return bool : true
// est pareil que :
var_dump(config('app')['debug']);

var_dump(config('app.connections.mysql'));    // return array : configuration de mysql
// est pareil que :
var_dump(config('app')['connections']['mysql']);
```




## Un autre simple exemple

```php
<?php

error_reporting(E_ALL);

// Si le debug est activé, on affiche les erreurs
if (config('app.debug')) {
    ini_set('display_errors', '1');
} else {
    ini_set('display_errors', '0');
}
```






## Contribuer

### Bugs et vulnérabilités de sécurité

Si vous découvrez un bug ou une faille de sécurité au sein de DAW PHP Config, merci d'envoyez message à Steph. Tout les bugs et failles de sécurité seront traitées rapidement.




### License

DAW PHP Config est une librarie Open Source sous la licence MIT.

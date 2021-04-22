<?php

/**
 * Si le package n'a pas été téléchargé avec Composer, il faut "require" manuellement ce fichier
 */

require_once __DIR__.'/../Exception/ConfigException.php';

require_once __DIR__.'/../Contracts/SingletonConfigInterface.php';

require_once __DIR__.'/../SingletonConfig.php';

require_once __DIR__.'/../Config.php';

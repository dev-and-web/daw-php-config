<?php

namespace DawPhpConfig;

use DawPhpConfig\Exception\ConfigException;

/**
 * Classe client
 *
 * Pour require les fichiers qui sont dans le dossier de config
 *
 * @link     https://github.com/dev-and-web/daw-php-config
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class Config extends SingletonConfig
{
    /**
     * @var Config
     */
    protected static $instance;

    /**
     * @var array - Pour charger qu'une seule fois un fichier
     */
    private static $require = [];

    /**
     * Pour charger les fichiers de config (un fichier est chargé qu'une seule fois)
     *
     * @param string $method - Fichier à require (+ éventuellement keys)
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $method, array $arguments)
    {
        if (strpos($method, '.') !== false) {
            return $this->withCallWithPoints($method);
        } else {
            return $this->withCallWithoutPoints($method);
        }
    }

    /**
     * Pour utiliser ce format : config('config-file.key.key2');
     *
     * self::$require[$file] aura le contenu du fichier
     * $keyToExtractValue sera la clé de la valeur à récupérer
     *
     * @param string $method - Fichier à require
     * @return mixed
     * @throws ConfigException
     */
    private function withCallWithPoints(string $method)
    {
        $methodEx = explode('.', $method);
        
        $file = $methodEx[0];
        unset($methodEx[0]);

        if (!isset(self::$require[$file])) {
            $path = $this->pathPrefix.'/'.$file.'.php';

            if (file_exists($path)) {
                self::$require[$file] = require_once $path; 
            } else {
                throw new ConfigException('Config File "'.$path.'" not found.');
            }
        }

        // utile pour ces format : config('email.array.key_existe') ou : config('email.key_inexistante')
        // mais pas utile pour ce format : config('file.key_existe')
        $keyToExtractValue = end($methodEx);

        if (!isset(self::$require[$file][$keyToExtractValue])) {
            self::$require[$file][$keyToExtractValue] = $this->exctactArrayFile(self::$require[$file], $methodEx, $keyToExtractValue, 0);
        }

        return self::$require[$file][$keyToExtractValue];
    }

    /**
    * Function réursive pour retrourner valeur voulue selon key (la key est la "valeur" après le dernier ".")
    *
    * @param array $requireFile - File chargé avec require_once
    * @param array $methodEx - Le path explosé (sans le file "$methodEx[0]")
    * @param string $key - Key sur laquelle récupérer la valeur (la key est la "valeur" après le dernier ".")
    * @param int $i - L'index du array
    * @return mixed
    * @throws ConfigException
    */
    private function exctactArrayFile(array $requireFile, array $methodEx, string $key, int $i)
    {
        $i++;

        if (array_key_exists($methodEx[$i], $requireFile) && is_array($requireFile[$methodEx[$i]]) && $methodEx[$i] !== $key) {
            $result = $this->exctactArrayFile($requireFile[$methodEx[$i]], $methodEx, $key, $i);
        } else {
            if (!array_key_exists($key, $requireFile)) throw new ConfigException('Key "'.$key.'" not foud.');

            $result = $requireFile[$key];
        }

        return $result;
    }

    /**
     * Pour utiliser ce format : echo config('config-file')['key']['key2'];
     *
     * @param string $method - Fichier à require
     * @return mixed
     * @throws ConfigException
     */
    private function withCallWithoutPoints(string $method)
    {
        if (!isset(self::$require[$method])) {
            $path = $this->pathPrefix.'/'.$method.'.php';

            if (file_exists($path)) {
                self::$require[$method] = require_once $path; 
            } else {
                throw new ConfigException('Config File "'.$path.'" not exists.');
            }
        }

        return self::$require[$method];
    }
}

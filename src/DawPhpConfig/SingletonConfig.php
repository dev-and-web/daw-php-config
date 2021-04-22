<?php

namespace DawPhpConfig;

use DawPhpConfig\Contracts\SingletonConfigInterface;

/**
 * Classe parent des classe(s) de config
 *
 * @link     https://github.com/dev-and-web/daw-php-config
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
abstract class SingletonConfig implements SingletonConfigInterface
{
    /**
     * @var string
     */
    protected $pathPrefix;

    /**
     * Pour charger fichier(s)
     *
     * @param string $method - Fichier à require (+ éventuellement keys)
     * @param array $arguments
     * @return mixed
     */
    abstract public function __call(string $method, array $arguments);

    /**
     * Singleton
     *
     * @param string $path
     * @return mixed
     */
    final public static function getInstance(string $path)
    {
        if (static::$instance === null) {
            static::$instance = new static($path);
        }

        return static::$instance;
    }

    /**
     * SingletonConfig constructor.
     * private - car n'est pas autorisé à etre appelée de l'extérieur
     *
     * @param string $path
     */
    private function __construct(string $path)
    {
        $this->pathPrefix = $path;
    }

    /**
     * private - empêcher l'occurrence d'être cloné
     */
    private function __clone()
    {

    }
}

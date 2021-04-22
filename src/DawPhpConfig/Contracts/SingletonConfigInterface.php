<?php

namespace DawPhpConfig\Contracts;

/**
 * @link     https://github.com/dev-and-web/daw-php-config
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
Interface SingletonConfigInterface
{
    /**
     * Singleton
     *
     * @param string $path
     * @return mixed
     */
    public static function getInstance(string $path);
}

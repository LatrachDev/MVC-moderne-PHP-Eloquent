<?php

namespace App\Core;

function config($key)
{
    $parts = explode('.', $key);
    $file = array_shift($parts);
    $path = __DIR__ . '/../config/' . $file . '.php';

    if (!file_exists($path)) {
        throw new \Exception("Configuration file not found: {$file}");
    }

    $config = require $path;

    foreach ($parts as $part) {
        if (!isset($config[$part])) {
            throw new \Exception("Configuration key not found: {$key}");
        }
        $config = $config[$part];
    }

    return $config;
}
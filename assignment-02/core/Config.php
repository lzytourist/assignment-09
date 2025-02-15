<?php

class Config {
    public static function get($path) {
        $path = explode('/', $path);
        $config = $GLOBALS['config'];

        foreach ($path as $part) {
            if (isset($config[$part])) {
                $config = $config[$part];
            }
        }

        return $config;
    }
}
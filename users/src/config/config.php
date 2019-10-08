<?php
defined('APP_PATH') || define('APP_PATH', realpath('.'));

$config = new \Phalcon\Config([
    'database' => [
        'path' => '/var/www/users/database/sqlite.db'
    ]
]);
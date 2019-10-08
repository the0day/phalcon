<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Di\FactoryDefault;


$di = new FactoryDefault();

$di->setShared('http', function () use ($config) {
    return $connection = new Sqlite(["dbname" => $config->database->path]);
});
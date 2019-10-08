<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Sqlite;

$di = new FactoryDefault();

/** Подключение к sqlite **/
$di->setShared('db', function () use ($config) {
    return $connection = new Sqlite(["dbname" => $config->database->path]);
});
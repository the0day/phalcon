<?php
use Phalcon\Loader;

$loader = new Loader();
$loader->registerNamespaces(
    [
       'App'    => '../Http',
       'Datto\JsonRpc' => '../Http/JsonRpc',
       'Datto\JsonRpc\Exceptions' => '../Http/JsonRpc/Exceptions'
    ]
)->register();
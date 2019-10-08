<?php

use Phalcon\Mvc\Micro;
use Phalcon\Loader;
use Lightbulb\Json\Rpc2\Server;

define('APP_PATH', realpath('..'));


require_once __DIR__ . '/../vendor/autoload.php';
include APP_PATH . '/config/config.php';
include APP_PATH . '/config/services.php';

$app = new Micro($di);


$app->post(
    "/",
    function () {

        $server = new Server();
        $server->{'auth.login'} = function($login, $password) {
            $user = $this->db->fetchOne(
                "SELECT * FROM users WHERE login=:login",
                \Phalcon\Db::FETCH_ASSOC,
                [
                    'login'=>$login
                ]
            );

            return $user!==false && $this->security->checkHash($password, $user['password']);
        };

        $server->supressOutput();
        $output = $server->handle();
        $this->response->setContent($server->getRawOutput())->send();
        //$rawOutput = $server->getRawOutput();
        //echo $rawOutput;
        
    }
);


$app->handle();
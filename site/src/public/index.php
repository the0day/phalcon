<?php

use Phalcon\Mvc\Micro;
use Phalcon\Http\Client\Request;
use Lightbulb\Json\Rpc2\Server;

define('APP_PATH', realpath('..'));

require_once __DIR__ . '/../vendor/autoload.php';
include APP_PATH . '/config/loader.php';
include APP_PATH . '/config/services.php';

$app = new Micro($di);

/** Форма авторизации **/
$app->get(
    '/',
    function () {
        require '../views/login.php';
    }
);

/** Отправляем запрос на "users". Если в ответа result = true, то редиректим на /dashboard иначе на /?fail (показываем ошибку) **/
$app->post(
    '/login',
    function () use ($app) {
        $login = $app->request->getPost('login');
        $password = $app->request->getPost('password');

        $client = new Lightbulb\Json\Rpc2\Client('http://172.28.1.3/');
        $response = $client->auth->login($login, $password);

        if ($response->result==true) {
            return $this->response->redirect('/dashboard');
        } else {
            return $this->response->redirect('/?fail');
        }
    }
);

/** Показываем после успешной авторизации **/
$app->get(
    '/dashboard',
    function () {
        $this->response->setContent('Успешная авторизация')->send();
    }
);


$app->handle();
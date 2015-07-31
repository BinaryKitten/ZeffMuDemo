<?php
chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$app = \ZeffMu\App::init();
$app
    ->route('/', function () {
        return '<a href="/hello">HEllo!</a>';
    })
    ->route('/hello', function () {
        return 'Hi!';
    })
//    ->route('/array_route', array(ArrayRouteController::class, 'method'))
    ->route('/hello/:name', function ($params) use ($app) {
        return 'Hello ' . $params['name'];
    })
    ->route('/hello/:name/:surname', function ($params) use ($app) {
        return 'Hello, Mr. ' . $params['surname'] . ', or shall I call you ' . $params['name'] . '?';
    })
    ->route('/api/:action', 'GET', function ($params) use ($app) {
        return $params;
    })
    ->run();

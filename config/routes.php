<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'CakeSimpleModelHistory',
    ['path' => '/cake-simple-model-history'],
    function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'ActivityLogs', 'action' => 'index']);
        $routes->fallbacks(DashedRoute::class);
    }
);
//Router::plugin(
//    'ActivityLogs',
//    ['path' => '/activity-logs'],
//    function ($routes) {
//        $routes->fallbacks(DashedRoute::class);
//    }
//);

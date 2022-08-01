<?php

 /*
 |--------------------------------------------------------------------------
 | Файл маршрутизации SDFramework
 |--------------------------------------------------------------------------
 |
 | Нужен для реализация маршрутов внутри ресурса
 | Подробнее: 
 |
 */

namespace Roast\Routes;
$route->get('/', '\Roast\Controllers\Regular\DefaultController@welcome');

$route->get('/api/services/(\w+)', function($service_index) {
  echo \Roast\Controllers\Regular\DefaultController::getServices($service_index);
});

$route->get('/api/news/all:(\w+)/step:(\w+)', function($all_flag, $step) {
    echo \Roast\Controllers\Regular\DefaultController::getNews($all_flag, $step);
});



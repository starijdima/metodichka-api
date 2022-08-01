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

$route->get('/api/news/id:(\w+)/step:(\w+)', function($news_id, $step) {
    echo \Roast\Controllers\Regular\DefaultController::getNews($news_id, $step);
});



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

$route->post('/api/services/(\w+)', function($service_name) {
  echo \Roast\Controllers\Regular\DefaultController::getServices($service_name);
});


